@extends('backend.layouts.layout')
@include('backend.plugins.datatables')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Suppliers Management</h4>
                <p class="text-muted mb-4 font-13">
                    <a class="btn btn-primary" href="{{route('backend.suppliers.create')}}">Add Supplier</a>
                </p>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{$supplier->name}}</td>
                            <td>{{$supplier->email}}</td>
                            <td>{{$supplier->address}}</td>
                            <td>{{$supplier->phone_number}}</td>
                            <td>
                                <a href="{{route('backend.suppliers.show',$supplier->id)}}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                <a href="{{route('backend.suppliers.edit',$supplier->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <form style="display:inline-block;" action="{{route('backend.suppliers.destroy',$supplier->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>        
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
