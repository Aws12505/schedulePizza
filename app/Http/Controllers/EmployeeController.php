<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $employees = $request->all();

        foreach ($employees as $data) {
            Employee::create([
                'name' => $data['name'],
                'emp_id' => $data['emp_id'],
                'hired_date' => $data['hired_date'] ?? null,
                'hourly_pay' => $data['hourly_pay'] ?? null,
                'hourly_perf_pay' => $data['hourly_perf_pay'] ?? null,
                'is_1099' => $data['is_1099'] ?? false,
                'family' => $data['family'] ?? false,
                'car' => $data['car'] ?? false,
                'dob' => $data['dob'] ?? null,

                'tuesday_vci' => $data['tuesday']['vci'] ?? false,
                'tuesday_in' => $data['tuesday']['in'] ?? null,
                'tuesday_out' => $data['tuesday']['out'] ?? null,

                'wednesday_vci' => $data['wednesday']['vci'] ?? false,
                'wednesday_in' => $data['wednesday']['in'] ?? null,
                'wednesday_out' => $data['wednesday']['out'] ?? null,

                'thursday_vci' => $data['thursday']['vci'] ?? false,
                'thursday_in' => $data['thursday']['in'] ?? null,
                'thursday_out' => $data['thursday']['out'] ?? null,

                'friday_vci' => $data['friday']['vci'] ?? false,
                'friday_in' => $data['friday']['in'] ?? null,
                'friday_out' => $data['friday']['out'] ?? null,

                'saturday_vci' => $data['saturday']['vci'] ?? false,
                'saturday_in' => $data['saturday']['in'] ?? null,
                'saturday_out' => $data['saturday']['out'] ?? null,

                'sunday_vci' => $data['sunday']['vci'] ?? false,
                'sunday_in' => $data['sunday']['in'] ?? null,
                'sunday_out' => $data['sunday']['out'] ?? null,

                'monday_vci' => $data['monday']['vci'] ?? false,
                'monday_in' => $data['monday']['in'] ?? null,
                'monday_out' => $data['monday']['out'] ?? null,
            ]);
        }

        return response()->json(['message' => 'Employees saved successfully'], 201);
    }
}
