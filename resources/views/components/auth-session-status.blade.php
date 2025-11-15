@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'success-text font-medium']) }}>
        {{ $status }}
    </div>
@endif
