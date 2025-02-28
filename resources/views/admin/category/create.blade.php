@extends('admin.layouts.layout')
@section('admin_page_title')
Create Category
@endsection
@section('admin_layout')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create Category</h5>
            </div>
            <div class="card-body">
                <form action="" methods="post"></form>
                    @csrf
                    <label for="category_name" class="">Give Name of Your Category</label>
                    <input type="text" class="form-control" placeholder="Enter Category Name" required>
            </div>
        </div>
    </div>
@endsection