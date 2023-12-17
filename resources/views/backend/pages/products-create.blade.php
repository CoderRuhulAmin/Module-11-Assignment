@extends('backend.layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6 mt-5">
        <div class="card border-success mb-3">
            <div class="card-header bg-transparent border-success border-0">
                <div class="d-flex align-items-center">
                    <h3 class="card-title mb-0 flex-grow-1">Create New Product</h3>
                </div>
            </div>

            <form action="{{ route( 'dashboard.products.store' ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body text-success">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="productName-field" class="form-label">Product Name*</label>
                            <input type="text" 
                            name="product_name" 
                            id="productName-field" 
                            class="form-control" 
                            placeholder="Product name" 
                            value="{{ old('product_name') }}"
                            >
                            @error('product_name')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="categoryName-field" class="form-label">Category Name*</label>
                            <select name="category_id" class="form-control" id="categoryName-field">
                                <option value="">Select a Category</option>

                                @foreach($categories as $category)
                                    
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                                @endforeach

                            </select>
                            @error('category_id')
                                <p class="text-danger">
                                    {{ "Please Select a Category Name. It's Required!" }}
                                </p>
                            @enderror
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="brandName-field" class="form-label">Brand Name*</label>
                            <select name="brand_id" class="form-control" id="brandName-field">
                                <option value="">Select a Brand</option>
                                
                                @foreach($brands as $brand)

                                    <option value="{{ $brand->id }}"> {{ $brand->brand_name }} </option>
                                
                                @endforeach

                            </select>
                            @error('brand_id')
                                <p class="text-danger">
                                    {{ "Please Select a Brand Name. It's Required!" }}
                                </p>
                            @enderror
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <div class="card-footer bg-transparent border-success">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" >Back</button>
                        <button type="submit" class="btn btn-success" >Add Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection