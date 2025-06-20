<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Show the add‑employee form.
     */
    public function create()
    {
        return view('add-employee');
    }

    /**
     * Handle the POST from the form.
     */
    public function store(Request $request)
    {
        /* ------------------------------ 1) Validate ------------------------------ */
        $request->validate([
            'name'             => 'required|string|max:255',
            'surname'          => 'required|string|max:255',
            'email'            => 'required|email|unique:employees,email',
            'home_address'     => 'required|string',
            'phone'            => 'required|string|max:20',
            'kin_name'         => 'required|string|max:255',
            'kin_surname'      => 'required|string|max:255',
            'kin_relationship' => 'required|string|in:Brother,Sister,Mother,Father,Other',
            'kin_phone' => 'required|string',

            'employee_id'      => 'required|file|mimes:pdf,jpg,jpeg,png',
            'contract'         => 'required|file|mimes:pdf',
        ]);

        /* ----------- 2) Generate sequential code like EMP01, EMP02 … ----------- */
        $last = Employee::latest('id')->first();          // highest id so far
        $nextNumber   = $last ? $last->id + 1 : 1;        // increment
        $employeeCode = 'EMP' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        /* ---------------------------- 3) Store files --------------------------- */
        $idPath       = $request->file('employee_id')
                               ->store('employee_ids', 'public');   // storage/app/public/employee_ids
        $contractPath = $request->file('contract')
                               ->store('contracts', 'public');      // storage/app/public/contracts

        /* ---------------------------- 4) Save row ------------------------------ */
        Employee::create([
            'employee_code'    => $employeeCode,
            'name'             => $request->name,
            'surname'          => $request->surname,
            'email'            => $request->email,
            'home_address'     => $request->home_address,
            'phone'            => $request->phone,
            'kin_name'         => $request->kin_name,
            'kin_surname'      => $request->kin_surname,
            'kin_relationship' => $request->kin_relationship,
            'kin_phone' => $request->kin_phone,
            'employee_id_path' => $idPath,
            'contract_path'    => $contractPath,
        ]);

        return back()->with('success', 'Employee added successfully!');
    }

   //new
   public function index()
{
    $employees = \App\Models\Employee::all();
    return view('employees.index', compact('employees'));
}


}
