@extends('layouts.layout')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <form action="{{ route('make.payment') }}" method="POST">
        @csrf
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_51M51nyFaj0TxPMzIhA29LFxM4KO0v783LldfgwvhVzwQfHcPgYk93QhcU1zVRAzo9IdIQQHQgKxkVZgIXtizFnYG00FgbXjrlV"
            data-name="Food Marketplace" data-description="10 cucumbers from Roger's Farm" data-amount="2000"></script>
    </form>
@endsection
