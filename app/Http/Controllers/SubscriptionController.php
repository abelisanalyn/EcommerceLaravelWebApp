<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SubscriptionController extends Controller implements HasMiddleware
{
    use AuthorizesRequests;
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $subscriptions = $user->subscriptions()->with('plan')->get();
        return view('subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plans = SubscriptionPlan::where('is_active', true)->get();
        return view('subscriptions.create', compact('plans'));
    }

    /**
     * Show subscription checkout form
     */
    public function checkout(Request $request)
    {
        $request->validate([
            'subscription_plan_id' => 'required|exists:subscription_plans,id',
            'start_date' => 'required|date|after:today',
            'meals_per_week' => 'required|integer|min:1|max:7',
        ]);

        $plan = SubscriptionPlan::find($request->subscription_plan_id);
        $planData = [
            'plan_id' => $plan->id,
            'plan_name' => $plan->name,
            'plan_price' => $plan->price,
            'start_date' => $request->start_date,
            'meals_per_week' => $request->meals_per_week,
        ];

        // Store plan data in session temporarily
        session(['subscription_checkout' => $planData]);

        return view('subscriptions.checkout', compact('plan', 'planData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'shipping_name' => 'required|string|max:255',
            'shipping_address' => 'required|string|max:255',
            'shipping_city' => 'required|string|max:255',
            'shipping_phone' => 'required|string|max:20',
        ]);

        $planData = session('subscription_checkout');
        if (!$planData) {
            return redirect()->route('subscriptions.create')->with('error', 'Invalid subscription data.');
        }

        try {
            $subscription = Subscription::create([
                'user_id' => Auth::id(),
                'subscription_plan_id' => $planData['plan_id'],
                'status' => 'active',
                'start_date' => $planData['start_date'],
                'next_delivery_date' => $planData['start_date'],
                'meals_per_week' => $planData['meals_per_week'],
                'total_price' => $planData['plan_price'],
                'shipping_name' => $request->shipping_name,
                'shipping_address' => $request->shipping_address,
                'shipping_city' => $request->shipping_city,
                'shipping_phone' => $request->shipping_phone,
            ]);

            session()->forget('subscription_checkout');

            return redirect()->route('subscriptions.show', $subscription->id)
                            ->with('success', 'Subscription created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('subscriptions.create')->with('error', 'An error occurred while creating your subscription. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        $this->authorize('view', $subscription);
        return view('subscriptions.show', compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        $this->authorize('update', $subscription);
        $plans = SubscriptionPlan::where('is_active', true)->get();
        return view('subscriptions.edit', compact('subscription', 'plans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscription $subscription)
    {
        $this->authorize('update', $subscription);

        $request->validate([
            'status' => 'required|in:active,paused,cancelled',
            'meals_per_week' => 'required|integer|min:1|max:7',
        ]);

        $subscription->update($request->only(['status', 'meals_per_week']));

        return redirect()->route('subscriptions.index')
                        ->with('success', 'Subscription updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        $this->authorize('delete', $subscription);

        $subscription->update(['status' => 'cancelled', 'cancelled_at' => now()]);

        return redirect()->route('subscriptions.index')
                        ->with('success', 'Subscription cancelled successfully!');
    }
}
