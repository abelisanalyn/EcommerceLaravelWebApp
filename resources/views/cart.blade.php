@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')

<div class="container">
    <h1 style="margin-bottom: 30px; color: #333;">Shopping Cart</h1>
    
    <div class="alert alert-info" role="alert">
        Your cart is currently empty. <a href="{{ url('/product') }}" style="color: #d63384;">Continue shopping</a>
    </div>
</div>

@endsection
