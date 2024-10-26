@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row py-5">
        <h1 class="text-center text-primary fw-bold">Patients</h1>
    </div>
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    <div class="row float-end">
        <a href="{{route('patients.create')}}" class="btn btn-primary">Add New Patient</a>
    </div>
    <div class="row">
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Doctor</th>
                <th>Admit Date</th>
                <th>Discharge Date</th>
                <th>Contact No</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach($patients as $patient)
            <tr>
                <td>{{$patient->first_name}}</td>
                <td>{{$patient->last_name}}</td>
                <td>Dr. {{($patient->Doctor)->first_name}}  {{($patient->Doctor)->last_name}}</td>
                <td>{{$patient->admit_date}}</td>
                <td>{{$patient->discharge_date}}</td>
                <td>{{$patient->contact_number}}</td>
                <td>
                    <a href="{{route('patients.edit', $patient->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{route('patients.destroy', $patient->id)}}" method="POST">
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