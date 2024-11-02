<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Restore Deleted Data
        //$hospitals = Hospital::withTrashed()->get();
        
        $hospitals = Hospital::all();

        return view('hospitals.index', compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hospitals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'location' => 'required',
            'staff_count' => 'required',
            'logo' => 'nullable|max: 2000',
        ]);

        $data = new Hospital($validateData);

        if ($request->hasFile('logo')) {
            $filename = time() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(storage_path('app/public/uploads/hospitals'), $filename);
            $data->logo = $filename;
        }

        $data->save();

        return redirect()->route('hospitals.index')->with('success', 'Hospital Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hospital $hospital)
    {
        return view('hospitals.edit', compact('hospital')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hospital $hospital)
    {
        $validateData = $request->validate([
            'logo' => 'nullable|max: 2000',
        ]);

        $hospital->fill($validateData);

        if ($request->hasFile('logo')) {
            $filename = time() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(storage_path('app/public/uploads/hospitals'), $filename);
            $hospital->logo = $filename;
        }

        $hospital->save();

        return redirect()->route('hospitals.index')->with('success','hospital details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hospital $hospital)
    {
        $hospital->delete();

        return redirect()->route('hospitals.index')->with('success','hospital deleted successfully!');
    }

    public function search(Request $request)
    {
        $hospitals = Hospital::all();

        $search = $request->search;

        $row = Hospital::where(function($query) use ($search)
        {
            $query->where('name','like',"%$search%")
            ->orWhere('location','like',"%$search%");
        })->get();

        return view('hospitals.index', compact('hospitals','row'));
    }
}
