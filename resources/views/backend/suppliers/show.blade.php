@extends('backend.layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-lg-12 align-self-center">
                        <div class="single-pro-detail">
                            <p class="mb-1">Supplier Details</p>
                            <div class="custom-border"></div>
                            <h3 class="pro-title">Name: {{$supplier->name}}</h3>
                            <h3 class="pro-title">address: {{$supplier->address}} </h3>
                            <h3 class="pro-title">Email: {{$supplier->email}} </h3>
                            <h3 class="pro-title">Phone Number: {{$supplier->phone_number}} </h3>
                            <p class="text-muted mb-2"></p>                                 
                        </div>
                    </div><!--end col-->                                            
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end card-->
        
    </div><!--end col-->
</div><!--end row-->
@endsection