@extends('backend.layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">        
                <h4 class="mt-0 header-title">Edit Product</h4>
                
                <form class="" action="{{route('backend.products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" />
                    </div><!--end form-group-->
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$product->name}}" required placeholder="Enter Name"/>
                    </div><!--end form-group-->

                    <div class="form-group">
                        <label>Description</label>
                        <textarea required class="form-control" name="description" rows="5">{{$product->description}}"</textarea>
                    </div><!--end form-group-->
                    
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control" id="">
                            @foreach (\App\Models\Category::all() as $category)
                                @if ($product->category_id === $category->id)
                                <option selected value="{{$category->id}}">{{$category->name}}</option>
                                @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div><!--end form-group-->

                    <div class="form-group">
                        <label>Supplier</label>
                        <select name="supplier_id" class="form-control" id="">
                            @foreach (\App\Models\Supplier::all() as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>
                    </div><!--end form-group-->

                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" class="form-control" value="{{$product->code}}" name="code" required placeholder="Enter Code"/>
                    </div><!--end form-group-->

                    <div class="form-group">
                        <label>Unit</label>
                        <input type="text" class="form-control" value="{{$product->unit}}" name="unit" required placeholder="Enter Unit"/>
                    </div><!--end form-group-->

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" value="{{$product->price}}" name="price" required placeholder="Enter Sale Price"/>
                    </div><!--end form-group-->

                    {{-- <div class="form-group">
                        <label>Purchase Price</label>
                        <input type="text" class="form-control" value="{{$product->purchase_price}}" name="pruchase_price" required placeholder="Enter Purchase Price"/>
                    </div><!--end form-group--> --}}

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