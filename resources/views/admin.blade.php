@extends('layouts.main')

@section('content')
<div class="container">

<form class="d-flex pt-3 px-5" role="search" action="{{ url('search-data') }}" method="GET">
    @csrf
    <input class="form-control me-2" type="search" type="text" name="search" placeholder="search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
    @if(!empty($hospitals) && $hospitals->isNotEmpty())
    @foreach($hospitals as $hospital)
    <div class="row py-5">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Location</th>
            </tr>
            <tr>
                <td>{{$hospital->name}}</td>
                <td>{{$hospital->location}}</td>
            </tr>
        </table>
    </div>
    @endforeach
    @endif
</div>
@endsection