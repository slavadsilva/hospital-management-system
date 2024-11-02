<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Restore Deleted Data
        //$patients = Patient::withTrashed()->get();
        
        $patients = Patient::all();
        $doctors = Doctor::all();

        return view('patients.index', compact('patients','doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::all();

        return view('patients.create',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'first_name' => 'required',
            'doctor_id' => 'required',
            'last_name' => 'nullable',
            'contact_number' => 'nullable',
            'admit_date' => 'nullable',
            'discharge_date' => 'nullable',
        ]);

        Patient::create($validateData);

        return redirect()->route('patients.index')->with('success','patient added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        $hospital = Hospital::all();
        $doctor = Doctor::all();    

        return view('patients.show', compact('patient','hospital','doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        $doctors = Doctor::all();
        
        return view('patients.edit', compact('patient','doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success','patient updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success','patient deleted successfully!');
    }

    public function restore(Patient $patient)
    {
        $data = Patient::withTrashed()->$patient;

        $data->restore();

        return redirect()->route('patients.index')->with('success','patient restored successfully!');

    }

    public function search(Request $request)
    {
        $patients = Patient::all();

        $search = $request->search;

        $row = Patient::where(function($query) use ($search)
        {
            $query->where('first_name','like',"%$search%")
            ->orWhere('last_name','like',"%$search%");
        })->get();

        return view('patients.index', compact('patients','row'));   
    }

    public function report(Patient $patient)
    {
        $data = [
            'title' => 'Patient Report',
            'patient' => $patient,
            'hospital' => Hospital::all(),
            'doctor' => Doctor::all(),
        ];
        
        $pdf = Pdf::loadView('patients.pdf', $data);

        return $pdf->download('patient_report.pdf');
    }
}
