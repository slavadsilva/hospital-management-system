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
    <div class="d-flex justify-content-center">
        <form class="d-flex pb-3 w-75" role="search" action="{{url('search-hospital')}}" method="GET">
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
                    <td>{{$row->name}}</td>
                    <td>{{$row->location}}</td>
                </tr>
            </table>
        </div>
        @endforeach
        @endif
    <div class="row py-3 justify-content-end">
        <a href="{{route('hospitals.create')}}" class="btn btn-primary w-25">Add New Hospital</a>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table align-middle">
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
                    <td><img src="{{ asset('/storage/uploads/hospitals/'.$hospital->logo) }}" alt="hospital_logo" width="100px"></td>
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
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection