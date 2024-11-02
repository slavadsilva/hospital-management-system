<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $hospitals = Hospital::where(function($query) use ($search)
        {
            $query->where('name','like',"%$search%")
            ->orWhere('location','like',"%$search%");
        })->get();

        return view('admin', compact('hospitals'));
    }
}
