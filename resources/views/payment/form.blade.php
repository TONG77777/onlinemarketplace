@extends('layouts.layout')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    @php
        $total = 0;
    @endphp

    <form action="{{ route('make.payment') }}" method="POST">
        @csrf
    
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_51M51nyFaj0TxPMzIhA29LFxM4KO0v783LldfgwvhVzwQfHcPgYk93QhcU1zVRAzo9IdIQQHQgKxkVZgIXtizFnYG00FgbXjrlV"
            data-name="Online Marketplace" data-description="" data-amount=""></script>
    </form>
@endsection
