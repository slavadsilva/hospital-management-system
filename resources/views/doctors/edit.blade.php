@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row py-5">
        <h1 class="text-center text-primary fw-bold">Edit Doctor</h1>
    </div>
    <div class="row">
        <form action="{{route('doctors.update', $doctor->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="{{$doctor->first_name}}" value="{{$doctor->first_name}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" placeholder="{{$doctor->last_name}}" value="{{$doctor->last_name}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Hospital</label>
                <select class="form-select" aria-label="Default select example" name="hospital_id">
                    @foreach($hospitals as $hospital)
                    <option value="{{$hospital->id}}" {{$doctor->hospital_id == $hospital->id ? 'selected' : ''}}>{{$hospital->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Specialization</label>
                <input type="text" class="form-control" name="specialization" placeholder="{{$doctor->specialization}}" value="{{$doctor->specialization}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Contact Number</label>
                <input type="number" class="form-control" name="contact_number" placeholder="{{$doctor->contact_number}}" value="{{$doctor->contact_number}}">
            </div>
            <div class="text-center">
                <button type="update" class="btn btn-primary w-25 rounded-4">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection