@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row py-5">
        <h1 class="text-center text-primary fw-bold">Edit Hospital</h1>
    </div>
    <div class="row">
        <form action="{{route('hospitals.update', $hospital->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="{{$hospital->name}}" value="{{$hospital->name}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" class="form-control"  name="location" placeholder="{{$hospital->location}}" value="{{$hospital->name}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Staff Count</label>
                <input type="number" class="form-control" name="staff_count" placeholder="{{$hospital->staff_count}}" value="{{$hospital->name}}">
            </div>
            <div class="mb-3">
            <label class="form-label">Old Image</label><br>
            <img src="{{ asset('/storage/uploads/hospitals/'.$hospital->logo) }}"  alt="hospital_logo" width="100px"><br><br>
                <label for="formFile" class="form-label">New Hospital Logo</label>
                <input class="form-control" type="file" name="logo" id="formFile">
            </div>
            <div class="text-center py-5">
                <button class="btn btn-primary w-25 rounded-4" type="update">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection