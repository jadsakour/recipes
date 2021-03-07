@extends('backend.layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">        
                <h4 class="mt-0 header-title">Create Supllier</h4>
                
                <form class="" action="{{route('backend.suppliers.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required placeholder="Enter Name"/>
                    </div><!--end form-group-->

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="Enter Email"/>
                    </div><!--end form-group-->

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" required placeholder="Enter Address"/>
                    </div><!--end form-group-->

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" required placeholder="Enter Number"/>
                    </div><!--end form-group-->

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            Submit
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                            Cancel
                        </button>
                    </div><!--end form-group-->
                </form><!--end form-->        
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!-- end col -->

</div> <!-- end row --> 
    
@endsection