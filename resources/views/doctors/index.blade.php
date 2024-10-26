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
    <div class="row float-end">
        <a href="{{route('doctors.create')}}" class="btn btn-primary">Add New Doctor</a>
    </div>
    <div class="row">
        <table>
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

@endsection