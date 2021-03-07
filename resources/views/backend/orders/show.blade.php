@extends('backend.layouts.layout')
@include('backend.plugins.datatables')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Recipes Info</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Recipe ID</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>

                            <td> {{ $data[0]['id'] }}</td>
                            <td> {{ $data[0]['name'] }}</td>
                            <td> {{ $data[0]['description'] }}</td>


                        </tr>


                    </tbody>
                </table>

                <h4 class="mt-0 header-title">Recipes Ingredients</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ingredients</th>
                            <th>Quantity</th>
                            <th>Notes</th>

                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($rec_ing as $recingredient)
                        <tr>
                            <td>{{$recingredient->id}}</td>
                            <td>{{$recingredient->ingredients->name}}</td>
                            <td>{{$recingredient->quantity}}    {{$recingredient->ingredients->measure}}</td>
                            <td>{{$recingredient->notes}}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection