@extends('backend.layouts.layout')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('updaterecipes', $recipe->id)}}" class="form-horizontal well" role="form" enctype="multipart/form-data">

                    <h4 class="mt-0 header-title">Edit Recipes</h4>
                    <div class="form-group">
                        <label for="name">Recipes Name</label>
                        <textarea required class="form-control" id="name" name="name" rows="1" >{!! $recipe->name !!}</textarea>
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#sales" role="tab">Edit Recipes ingredient</a>
                        </li>
                    </ul>
                    @if($recingredients)
                    @foreach ($recingredients as $recingredient)
                    <div class="repeater-custom-show-hide">
                                    <div data-repeater-list="ingredient">
                                        <div data-repeater-item="">
                    <div class="form-group row  d-flex align-items-end">
                                          
                                          <div class="col-sm-4">
                                              <br>
                                              <label class="control-label">ingredient</label>
                                             
                                              <select name="exist_ingredient_id" class="form-control" id="">

                                               <option value="{{$recingredient->ingredients_id}}" >{{$recingredient->ingredients->name}}</option>
                                                 
                                              </select>
                                          </div>
                                          <!--end col-->

                                          <div class="col-sm-3">
                                              <label class="control-label">Quantity</label>
                                              <input type="number" name="exist_quantity" placeholder="Enter Quantity" class="form-control" value="{{$recingredient->quantity}}">
                                          </div>
                                          <!--end col-->


                                          <div class="col-sm-4">
                                              <label class="control-label">Notes</label>
                                              <input type="text" name="exist_notes" placeholder="Enter Notes" class="form-control"  value="{{ $recingredient->notes}}">
                                          </div>
                                          <!--end col-->

                                          <div class="col-sm-1">
                                          <form action="{{ route('destroyingredients', $recingredient->id) }}" method="POST">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-danger">Delete </button>
                                            </form>
                                          </div>
                                          <!--end col-->
                                       
                                      </div>
                                      </div>
                                      </div>
                                      <!--end row-->
                                      @endforeach
                                      @else 

                                      @endif
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane p-" id="sales" role="tabpanel">
                            @csrf
                           
                            <fieldset>
                       
                                <div class="repeater-custom-show-hide">
                                    <div data-repeater-list="ingredient">
                                        <div data-repeater-item="">
                                     
                                            <div class="form-group row  d-flex align-items-end">
                                          
                                                <div class="col-sm-4">
                                                    <br>
                                                    <label class="control-label">ingredient</label>
                                                   
                                                    <select name="ingredient_id" class="form-control" id="">

                                                   <option>Select ingredient</option>
                                                        @foreach ($recipe_ingre as $recipe_ingre)
                                                        <option value="{{$recipe_ingre->id}}">{{$recipe_ingre->name}}</option>
                                                        @endforeach
                                                       
                                                    </select>
                                                </div>
                                                <!--end col-->

                                                <div class="col-sm-3">
                                                    <label class="control-label">Quantity</label>
                                                    <input type="number" name="quantity" placeholder="Enter Quantity" class="form-control" value="">
                                                </div>
                                                <!--end col-->


                                                <div class="col-sm-4">
                                                    <label class="control-label">Notes</label>
                                                    <input type="text" name="notes" placeholder="Enter Notes" class="form-control"  value="">
                                                </div>
                                                <!--end col-->

                                                <div class="col-sm-1">
                                                    <span data-repeater-delete="" class="btn btn-danger btn-sm">
                                                        <span class="far fa-trash-alt mr-1"></span> Delete
                                                    </span>
                                                </div>
                                                <!--end col-->
                                             
                                            </div>
                                           
                                            <!--end row-->
                                        </div>
                                        <!--end /div-->
                                     
                                    </div>
                                    <!--end repet-list-->
                                 
                                    <div class="form-group">
                                        <label for="notes">Edit Recipes Description</label>
                                        <textarea required class="form-control" id="description" name="description" rows="5">{!! $recipe->description !!}</textarea>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-sm-12">
                                            <span data-repeater-create="" class="btn btn-light btn-md">
                                                <span class="fa fa-plus"></span> Edit
                                            </span>
                                            <input type="submit" value="Submit" class="btn btn-success">
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end repeter-->

                            </fieldset>
                            <!--end fieldset-->
                </form>
                <!--end form-->
            </div>

        </div>

    </div>
</div>
</div>
</div>

@endsection

@include('backend.plugins.repeater')