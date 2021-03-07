@extends('backend.layouts.layout')
@include('backend.plugins.datatables')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Recipes Management</h4>
                <p class="text-muted mb-4 font-13">
                    <a class="btn btn-primary" href="/crecipes">Add Recipe</a>
                </p>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Recipe ID</th>
                            <th> Name</th>
                            <th>Description</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\App\Recipe::all() as $Rec)
                        <tr>
                            <td>{{$Rec->id}}</td>
                            <td>{{$Rec->name}}</td>
                            <td>{{$Rec->description}}</td>
                            <td>
                                <a href="{{route('getrecipes',$Rec->id)}}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                        
                                <a href="{{route('editrecipes',$Rec->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                               

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                    <tbody>

                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection