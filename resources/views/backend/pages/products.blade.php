@extends('backend.layouts.app')

@section('content')

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Products</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Products</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" id="tasksList">
                                <div class="card-header border-0">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title mb-0 flex-grow-1">All Products</h5>
                                        <div class="flex-shrink-0">
                                           <div class="d-flex flex-wrap gap-2">
                                                <a href="{{route('dashboard.products.create')}}"><button class="btn btn-soft-primary add-btn" data-bs-toggle="modal" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add New Product </button></a>
                                            	<button class="btn btn-soft-secondary" id="remove-actions" onclick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border border-dashed border-end-0 border-start-0">
                                    <form>
                                        <div class="row g-3">
                                            <div class="col-xxl-5 col-sm-12">
                                                <div class="search-box">
                                                    <input type="text" class="form-control search bg-light border-light" placeholder="Search for tasks or something...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-xxl-3 col-sm-4">
                                                <input type="text" class="form-control bg-light border-light" id="demo-datepicker" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" placeholder="Select date range">
                                            </div>
                                            <!--end col-->

                                            <div class="col-xxl-3 col-sm-4">
                                                <div class="input-light">
                                                    <select class="form-control" data-choices="" data-choices-search-false="" name="choices-single-default" id="idStatus">
                                                        <option value="">Status</option>
                                                        <option value="all" selected="">All</option>
                                                        <option value="New">New</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Inprogress">Inprogress</option>
                                                        <option value="Completed">Completed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-1 col-sm-4">
                                                <button type="button" class="btn btn-primary w-100" onclick="SearchData();"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                                    Filters
                                                </button>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end card-body-->
                                <div class="card-body">
                                    <div class="table-responsive table-card mb-4">
                                        <table class="table align-middle table-nowrap mb-0" id="tasksTable">
                                            <thead class="table-light text-muted">
                                                <tr>
                                                    <th scope="col" style="width: 40px;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                        </div>
                                                    </th>
                                                    <th class="sort" data-sort="id">SN</th>
                                                    <th class="sort" data-sort="product_name">Product Name</th>
                                                    <th class="sort" data-sort="category_name">Category</th>
                                                    <th class="sort" data-sort="brand_name">Brand</th>
                                                    <th class="sort" data-sort="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach($products as $product)
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                            </div>
                                                        </th>
                                                        <td class="id">{{ 1 }}</td>
                                                        <td class="product_name">{{ $product->product_name }}</td>
                                                        <td class="category_name">{{ $product->category_name }}</td>
                                                        <td class="brand_name">{{ $product->brand_name }}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0 ms-4">
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item"><a href="apps-tasks-details.html"><i class="ri-eye-fill align-bottom me-2 text-muted"></i></a></li>
                                                                        <li class="list-inline-item"><a class="edit-item-btn" href="#showModal" data-bs-toggle="modal"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i></a></li>
                                                                        <li class="list-inline-item"><a class="remove-item-btn" data-bs-toggle="modal" href="#deleteOrder"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!--end table-->
                                        <div class="noresult" style="display: none">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#25a0e2,secondary:#00bd9d" style="width:75px;height:75px"></lord-icon>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                <p class="text-muted mb-0">We've searched more than 200k+ tasks We did not find any tasks for you search.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <div class="pagination-wrap hstack gap-2">
                                            <a class="page-item pagination-prev disabled" href="#">
                                                Previous
                                            </a>
                                            <ul class="pagination listjs-pagination mb-0"><li class="active"><a class="page" href="#" data-i="1" data-page="8">1</a></li></ul>
                                            <a class="page-item pagination-next" href="#">
                                                Next
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body p-5 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#25a0e2,secondary:#00bd9d" style="width:90px;height:90px"></lord-icon>
                                    <div class="mt-4 text-center">
                                        <h4>You are about to delete a task ?</h4>
                                        <p class="text-muted fs-14 mb-4">Deleting your task will remove all of
                                            your information from our database.</p>
                                        <div class="hstack gap-2 justify-content-center remove">
                                            <button class="btn btn-link btn-ghost-primary fw-medium text-decoration-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                            <button class="btn btn-primary" id="delete-record">Yes, Delete It</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end delete modal -->


@endsection