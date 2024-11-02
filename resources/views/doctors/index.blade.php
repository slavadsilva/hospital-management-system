@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row py-5">
        <h1 class="text-center text-primary fw-bold">Doctors</h1>
    </div>
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    <div class="d-flex justify-content-center">
        <form class="d-flex pb-3 w-75" role="search" action="{{url('search-doctor')}}" method="GET">
            @csrf
            <input class="form-control me-2" type="search" type="text" name="search" placeholder="search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    @if(!empty($row) && $row->isNotEmpty())
        @foreach($row as $row)
        <div class="row py-3">
            <h5 class="text-center">Search Result</h5>
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                </tr>
                <tr>
                    <td>{{$row->first_name}}</td>
                    <td>{{$row->last_name}}</td>
                    <td>{{$row->specialization}}</td>
                </tr>
            </table>
        </div>
        @endforeach
        @endif
    <div class="row py-3 justify-content-end">
        <a href="{{route('doctors.create')}}" class="btn btn-primary w-25">Add New Doctor</a>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table align-middle">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Hopital</th>
                <th>Specialization</th>
                <th>Contact No.</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach($doctors as $doctor)
            <tr>
                <td>{{$doctor->first_name}}</td>
                <td>{{$doctor->last_name}}</td>
                <td>{{($doctor->hospital)->name}}</td>
                <td>{{$doctor->specialization}}</td>
                <td>{{$doctor->contact_number}}</td>
                <td>
                    <a href="{{route('doctors.edit', $doctor->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{route('doctors.destroy', $doctor->id)}}" method="POST">
                        @csrf 
                        @method('DELETE')

                        <button type="delete" onclick="return confirm('Are You Sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        </div>  
    </div>
</div>

@endsection