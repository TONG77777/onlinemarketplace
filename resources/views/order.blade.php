@extends('layouts.layout')

@section('content')
<div class="container" data-aos="fade-up">
<div class="card-body">
    <h5 class="card-title">Recent Sales <span>| Today</span></h5>
    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
        <div class="dataTable-top">
            <div class="dataTable-dropdown"><label><select class="dataTable-selector">
                        <option value="5">5</option>
                        <option value="10" selected="">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                    </select> entries per page</label></div>
            <div class="dataTable-search"><input class="dataTable-input" placeholder="Search..." type="text"></div>
        </div>
        <div class="dataTable-container">
            <table class="table table-borderless datatable dataTable-table">
                <thead>
                    <tr>
                        <th scope="col" data-sortable="" style="width: 10.9116%;"><a href="#"
                                class="dataTable-sorter">#</a></th>
                        <th scope="col" data-sortable="" style="width: 24.0331%;"><a href="#"
                                class="dataTable-sorter">Customer</a></th>
                        <th scope="col" data-sortable="" style="width: 40.1934%;"><a href="#"
                                class="dataTable-sorter">Product</a></th>
                        <th scope="col" data-sortable="" style="width: 9.80663%;"><a href="#"
                                class="dataTable-sorter">Price</a></th>
                        <th scope="col" data-sortable="" style="width: 15.0552%;"><a href="#"
                                class="dataTable-sorter">Status</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td><a href="#" class="text-primary">At praesentium minu</a></td>
                        <td>$64</td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>Bridie Kessler</td>
                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                        <td>$47</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>Ashleigh Langosh</td>
                        <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                        <td>$147</td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Angus Grady</td>
                        <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                        <td>$67</td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                    </tr>
                    <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Raheem Lehner</td>
                        <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                        <td>$165</td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="dataTable-bottom">
            <div class="dataTable-info">Showing 1 to 5 of 5 entries</div>
            <nav class="dataTable-pagination">
                <ul class="dataTable-pagination-list"></ul>
            </nav>
        </div>
    </div>
</div>
</div>
@endsection