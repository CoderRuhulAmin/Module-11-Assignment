@extends('backend.layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6 mt-5">
        <div class="card border-success mb-3">
            <div class="card-header bg-transparent border-success border-0">
                <div class="d-flex align-items-center">
                    <h3 class="card-title mb-0 flex-grow-1">Create New Stock</h3>
                </div>
            </div>

            <form action="{{ route( 'dashboard.products.store' ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body text-success">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="batchNo-field" class="form-label">Batch No*</label>
                            <input type="text" 
                            name="batch_no" 
                            id="batchNo-field" 
                            class="form-control" 
                            placeholder="Batch No" 
                            value="{{ old('batch_no') }}"
                            >
                            @error('batch_no')
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
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="productName-field" class="form-label">Product Name*</label>
                            <select name="product_id" class="form-control" id="productName-field">
                                <option value="">Select a Product</option>

                                @foreach($products as $product)
                                    
                                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>

                                @endforeach

                            </select>
                            @error('product_id')
                                <p class="text-danger">
                                    {{ "Please Select a Product Name. It's Required!" }}
                                </p>
                            @enderror
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="unitCost-field" class="form-label">Unit Cost*</label>
                            <input type="text" 
                            name="unit_cost" 
                            id="unitCost-field" 
                            class="form-control" 
                            placeholder="Unit Cost" 
                            value="{{ old('unit_cost') }}"
                            >
                            @error('unit_cost')
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
                            <label for="unitPrice-field" class="form-label">Unit Price*</label>
                            <input type="text" 
                            name="unit_price" 
                            id="unitPrice-field" 
                            class="form-control" 
                            placeholder="Unit Price" 
                            value="{{ old('unit_price') }}"
                            >
                            @error('unit_price')
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
                            <label for="totalPrice-field" class="form-label">Total Price*</label>
                            <input type="text" 
                            name="total_price" 
                            id="totalPrice-field" 
                            class="form-control" 
                            placeholder="Total Price" 
                            value="{{ old('total_price') }}"
                            >
                            @error('total_price')
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
                            <label for="totalPrice-field" class="form-label">Total Price*</label>
                            <input type="text" 
                            name="total_price" 
                            id="totalPrice-field" 
                            class="form-control" 
                            placeholder="Total Price" 
                            value="{{ old('total_price') }}"
                            >
                            @error('total_price')
                                <p class="text-danger">
                                    {{ $message }}
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