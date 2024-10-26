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
            'logo' => 'max: 2000',
        ]);

        // if ($request->hasFile('logo')) {
        //     $file = $request->file('logo');
        //     $extension = $file->getClientOriginalExtension();
        //     $logoFilename = time() . '.' . $extension;
        //     $file->move(storage_path('app/public/uploads/hospitals'), $logoFilename);
        // }

        Hospital::create($validateData);

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
        $hospital->update($request->all());

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
}
