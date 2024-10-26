@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row py-5">
        <h1 class="text-center text-primary fw-bold">Add Patient</h1>
    </div>
    <div class="row">
        <form action="{{route('patients.update', $patient->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="{{$patient->first_name}}" value="{{$patient->first_name}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" placeholder="{{$patient->last_name}}" value="{{$patient->last_name}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Doctor</label>
                <select name="doctor_id" class="form-select w-50" aria-label="Default select example">
                    @foreach($doctors as $doctor)
                    <option value="{{$doctor->id}}" {{$patient->doctor_id == $doctor->id ? 'selected' : '' }}>Dr. {{$doctor->first_name}} {{$doctor->last_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 col-sm-12">
                    <label class="form-label">Admit Date</label>
                    <input type="date" class="form-control" name="admit_date" placeholder="{{$patient->admit_date}}" value="{{$patient->admit_date}}">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label class="form-label">Discharge Date</label>
                    <input type="date" class="form-control" name="discharge_date" placeholder="{{$patient->discharge_date}}" value="{{$patient->discharge_date}}">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Contact No.</label>
                <input type="number" class="form-control" name="contact_number" placeholder="{{$patient->contact_number}}" value="{{$patient->contact_number}}">
            </div>
            <!-- <div class="mb-3">
                <label for="formFile" class="form-label">Hospital Logo</label>
                <input class="form-control" type="file" id="formFile" name="logo">
            </div> -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-25 rounded-4">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection