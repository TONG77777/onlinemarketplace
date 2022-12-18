@extends('layouts.admin_layout')

@section('content')
    <div class="breadcrumbs">
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ route('admin.index') }}">{{ __('Home') }}</a></li>
                    <li>{{ __('Dashboard') }}</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->
    <div class="container" data-aos="fade-up" style="height:auto; min-height:500px;">
        <br>
        <br>
        <div class="card-body">
            <h5 class="card-title">Report</h5>
            <hr>
            <div class="row">
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Total <span>| Category</span></h5>
                            <div class="d-flex align-items-center">

                                <i class="bi bi-tags-fill"></i>

                                <div class="ps-3">
                                    <h6>{{$category}}</h6>
                                    <span class="text-success small pt-1 fw-bold"><a href="/admin/category">View
                                            Details</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Total <span>| Products</span></h5>
                            <div class="d-flex align-items-center">

                                <i class="bi bi-bag-fill"></i>

                                <div class="ps-3">
                                    <h6>{{ $product }}</h6>
                                    <span class="text-success small pt-1 fw-bold"><a
                                            href="{{ route('admin.products.index') }}">View Details</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-12">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Total <span>| User</span></h5>
                            <div class="d-flex align-items-center">

                                <i class="bi bi-people-fill"></i>

                                <div class="ps-3">
                                    <h6>{{ $user }}</h6>
                                    <span class="text-success small pt-1 fw-bold"><a
                                            href="{{ route('admin.users.index') }}">View Details</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-12">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Total <span>| Order</span></h5>
                            <div class="d-flex align-items-center">

                                <i class="bi bi-list-check"></i>

                                <div class="ps-3">
                                    <h6>{{ $order }}</h6>
                                    <span class="text-success small pt-1 fw-bold"><a
                                            href="{{ route('admin.order.index') }}">View Details</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

                <div class="col-xxl-3 col-xl-12">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Total <span>| Admin</span></h5>
                            <div class="d-flex align-items-center">

                                <i class="bi bi-people-fill"></i>

                                <div class="ps-3">
                                    <h6>{{ $admin }}</h6>
                                    <span class="text-success small pt-1 fw-bold"><a
                                            href="{{ route('admin.admins.index') }}">View Details</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-12">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Total <span>| Payments</span></h5>
                            <div class="d-flex align-items-center">

                                <i class="bi bi-people-fill"></i>

                                <div class="ps-3">
                                    <h6>{{ $payment }}</h6>
                                    <span class="text-success small pt-1 fw-bold"><a
                                            href="{{ route('admin.payments.index') }}">View Details</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <br>
                <br>
                <hr>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Bar Chart - Total Category Type</h5>

                            <!-- Bar Chart -->
                            <canvas id="barChart" style="max-height: 400px;"></canvas>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#barChart'), {
                                        type: 'bar',
                                        data: {
                                            labels: bar_x,
                                            datasets: [{
                                                label: 'Bar Chart - Order Status',
                                                data: bar_y,
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)', //red
                                                    'rgba(255, 159, 64, 0.2)', //orange
                                                    'rgba(255, 205, 86, 0.2)', //yellow
                                                    'rgba(75, 192, 192, 0.2)', //green
                                                    'rgba(54, 162, 235, 0.2)', //blue
                                                    'rgba(153, 102, 255, 0.2)', //purple
                                                    'rgba(201, 203, 207, 0.2)' //grey
                                                ],
                                                borderColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(255, 159, 64)',
                                                    'rgb(255, 205, 86)',
                                                    'rgb(75, 192, 192)',
                                                    'rgb(54, 162, 235)',
                                                    'rgb(153, 102, 255)',
                                                    'rgb(201, 203, 207)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                });
                            </script>
                            <!-- End Bar CHart -->

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Line Chart - Total Monthly Sales</h5>

                            <!-- Line Chart -->
                            <canvas id="lineChart" style="max-height: 400px;"></canvas>
                            <script> 
                            // _xdata==month
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#lineChart'), {
                                        type: 'line',
                                        data: {
                                            labels: _xdata,
                                            datasets: [{
                                                label: 'Line Chart - Total Amount (Monthly)',
                                                data: totalamount,
                                                fill: false,
                                                borderColor: 'rgb(75, 192, 192)',
                                                tension: 0.1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                });
                            </script>
                            <!-- End Line CHart -->

                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pie Chart - Total Order Status</h5>

                            <!-- Pie Chart -->
                            <canvas id="pieChart" style="max-height: 400px;"></canvas>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#pieChart'), {
                                        type: 'pie',
                                        data: {
                                            labels: [
                                                pie_x[0], pie_x[1], pie_x[2], pie_x[3], pie_x[4], 
                                            ],
                                            datasets: [{
                                                label: 'My First Dataset',
                                                data: pie_y,
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)', //red
                                                    'rgba(255, 159, 64, 0.2)', //orange
                                                    'rgba(255, 205, 86, 0.2)', //yellow
                                                    'rgba(75, 192, 192, 0.2)', //green
                                                    'rgba(54, 162, 235, 0.2)', //blue
                                                    'rgba(153, 102, 255, 0.2)', //purple
                                                    'rgba(201, 203, 207, 0.2)' //grey
                                                ],
                                                hoverOffset: 4
                                            }]
                                        }
                                    });
                                });
                            </script>
                            <!-- End Pie CHart -->

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Doughnut Chart - Total Payment Status</h5>

                            <!-- Doughnut Chart -->
                            <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#doughnutChart'), {
                                        type: 'doughnut',
                                        data: {
                                            labels: [
                                                dou_x[0], dou_x[1], dou_x[2]
                                            ],
                                            datasets: [{
                                                label: 'My First Dataset',
                                                data: dou_y,
                                                backgroundColor: [
                                                    dou_color[0], dou_color[1], dou_color[2]
                                                ],
                                                hoverOffset: 4
                                            }]
                                        }
                                    });
                                });
                            </script>
                            <!-- End Doughnut CHart -->

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
    {{-- {{dd($_xdata)}} --}}
    {{-- {{dd($month)}}
            {{$monthCount}} --}}
   {{-- {{dd($totalamount)}} --}}
   {{-- {{dd($monthCount)}} --}}
    </div>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script type="text/javascript">
    var _ydata = @json($monthCount);
    var _xdata = @json($month);
    var bar_x = @json($bar_x);
    var bar_y = @json($bar_y);
    var dou_x = @json($dou_x);
    var dou_y = @json($dou_y);
    var dou_color = @json($dou_color);
    var pie_x = @json($pie_x);
    var pie_y = @json($pie_y);
    var totalamount = @json($totalamount);
</script>
