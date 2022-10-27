@extends('layouts.layout')
@section('content')
    <div class="container pt-5 my-5">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Condition</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                    <div class="portfolio-info">
                        <td><a href="/detail" class="">Casio ZR-1200</a></td>
                    </div>
                    <td>RM 1500</td>
                    <td>Used</td>
                </tr>
                <tr>
                    <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                    <td><a href="/detail" class="">Supreme Tiffany Box Logo</a></td>
                    <td>RM 46</td>
                    <td>Like New</td>
                </tr>
                <tr>
                    <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                    <td><a href="/detail" class="">HP Monitor</a></td>
                    <td>RM 59</td>
                    <td>Well Used</td>
                </tr>
                <tr>
                    <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                    <td><a href="/detail" class="">Vivo Y02s</a></td>
                    <td>RM 342</td>
                    <td>Well USed</td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection
