@extends('layouts.main')

@section('content')
<div class="my-5 p-3 border rounded">
    <div class="row py-5">
        <h1 class="text-center">Hospital Management System</h1>
    </div>
    <div class="row p-3 border-0">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>First Name</th>
                    <td>: {{$patient->first_name}}</td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>: {{$patient->last_name}}</td>
                </tr>
                <tr>
                    <th>Doctor</th>
                    <td>: Dr. {{($patient->Doctor)->first_name}} {{($patient->Doctor)->last_name}}</td>
                    <th>Specialize</th>
                    <td>: {{($patient->Doctor)->specialization}}</td>
                    <th>Contact No</th>
                    <td>: {{($patient->Doctor)->contact_number}}</td>
                </tr>
                <tr>
                    <th>Admit Date</th>
                    <td>: {{$patient->admit_date}}</td>
                </tr>
                <tr>
                    <th>Discharge Date</th>
                    <td>: {{$patient->discharge_date}}</td>
                </tr>
            </table>
            <div class="text-center py-3">
            <a href="{{url('patient-report', $patient->id)}}" class="btn btn-primary">Generate PDF</a>

            </div>
        </div>
    </div>
</div>
@endsection