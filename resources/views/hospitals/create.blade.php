@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row py-5">
        <h1 class="text-center text-primary fw-bold">Add Hospital   </h1>
    </div>
    <div class="row">
        <form action="{{route('hospitals.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" class="form-control" name="location">
            </div>
            <div class="mb-3">
                <label class="form-label">Staff Count</label>
                <input type="number" class="form-control" name="staff_count">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Hospital Logo</label>
                <input class="form-control" type="file" id="formFile" name="logo">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-25 rounded-4">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection