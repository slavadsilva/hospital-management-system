@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row py-5">
        <h1 class="text-center text-primary fw-bold">Hospital</h1>
    </div>
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    <div class="row float-end">
        <a href="{{route('hospitals.create')}}" class="btn btn-primary">Add New Hospital</a>
    </div>
    <div class="row">
        <table>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Staff Count</th>
                <th>Logo</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach($hospitals as $hospital)
            <tr>
                <td>{{$hospital->name}}</td>
                <td>{{$hospital->location}}</td>
                <td>{{$hospital->staff_count}}</td>
                <td><img src="" alt="hospital_logo"></td>
                <td>
                    <a href="{{route('hospitals.edit', $hospital->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{route('hospitals.destroy', $hospital->id)}}" method="POST">
                        @csrf 
                        @method('DELETE')

                        <button type="update" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <!-- <td><img src="{{ asset('/storage/uploads/hospitals/'.$hospital->logo) }}" alt=""></td> -->
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection