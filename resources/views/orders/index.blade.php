@extends('layouts.layout')

@section('content')
    <div class="breadcrumbs">
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li>{{ __('Orders') }}</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->
    <div class="container pt-5 my-5" style="height:auto; min-height:450px">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->get('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="card-body">

            <div class="accordion" id="accordionExample">
                <h5 class="card-title">My Orders</h5>

            </div>
        </div>

        @if ($orders->count() > 0)
            <table class="table">

                <thead class="table-active" style="thead-light">
                    <tr>
                        <th scope="col">{{ __('Order Id') }}</th>
                        <th scope="col">{{ __('Status') }}</th>
                        <th scope="col">{{ __('Total Price') }}</th>
                        <th scope="col">{{ __('Order Details') }}</th>
                        <th scope="col">{{ __('Completed At') }}</th>
                        <th scope="col">{{ __('Action') }}</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- pending, confirmed, shipping, completed, cancelled --}}
                        @php $total = 0; @endphp
                        @foreach ($orders as $order)
                            <td>{{ __('#') }}{{ $order->id }}</td>

                            @if ($order->status == 'pending')
                                <td><span class="badge bg-warning text-dark">{{ $order->status }}</span></td>
                            @elseif($order->status == 'cancelled')
                                <td><span class="badge bg-danger">{{ $order->status }}</span></td>
                            @elseif($order->status == 'completed')
                                <td><span class="badge bg-success">{{ $order->status }}</span></td>
                            @elseif($order->status == 'shipping')
                                <td><span class="badge bg-info">{{ $order->status }}</span></td>
                            @elseif($order->status == 'confirmed')
                                <td><span class="badge bg-primary">{{ $order->status }}</span></td>
                            @endif
                            <td>RM {{ $total = $order->amount_to_pay + $order->shipping_fee }}</td>

                            <form action="{{ route('order.show', $order->id) }}" method="GET">
                                @csrf
                                <td><button type="submit" class="btn btn-outline-success">Details</button></td>
                            </form>
                            @if ($order->status == 'completed')
                                <td>{{ $order->updated_at }}</td>
                            @else
                                <td></td>
                            @endif
                            {{-- //button complete order --}}
                            @if ($order->status == 'shipping')
                                <form action="{{ route('order.completed', $order->id) }}" method="GET">
                                    @csrf
                                    <td><button type="submit" class="btn btn-outline-secondary">Complete Order</button>
                                    </td>
                                </form>
                            @else
                                <td><button type="submit" class="btn btn-outline-secondary" disabled>Complete
                                        Order</button></td>
                            @endif

                    </tr>
        @endforeach
        </tbody>
        </table>
    @else
        <div class="alert alert-info">
            {{ __('You have no orders yet.') }}
        </div>
        @endif
    </div>

    </div>
    </div>
@endsection
