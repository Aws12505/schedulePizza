<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use DateTime;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $employees = $request->all();

        foreach ($employees as $data) {
            Employee::create([
                'name' => $data['name'],
                'emp_id' => $data['emp_id'] ?? null,
                'hired_date' => $data['hired_date'] ?? null,
                'hourly_pay' => $data['hourly_pay'] ?? null,
                'hourly_perf_pay' => $data['hourly_perf_pay'] ?? null,
                'is_1099' => $data['is_1099'] ?? false,
                'family' => $data['family'] ?? false,
                'car' => $data['car'] ?? false,
                'dob' => $data['dob'] ?? null,

                'tuesday_vci' => $data['tuesday']['vci'] ?? false,
                'tuesday_in' => $this->convertTo24Hour($data['tuesday']['in'] ?? null),
                'tuesday_out' => $this->convertTo24Hour($data['tuesday']['out'] ?? null),

                'wednesday_vci' => $data['wednesday']['vci'] ?? false,
                'wednesday_in' => $this->convertTo24Hour($data['wednesday']['in'] ?? null),
                'wednesday_out' => $this->convertTo24Hour($data['wednesday']['out'] ?? null),

                'thursday_vci' => $data['thursday']['vci'] ?? false,
                'thursday_in' => $this->convertTo24Hour($data['thursday']['in'] ?? null),
                'thursday_out' => $this->convertTo24Hour($data['thursday']['out'] ?? null),

                'friday_vci' => $data['friday']['vci'] ?? false,
                'friday_in' => $this->convertTo24Hour($data['friday']['in'] ?? null),
                'friday_out' => $this->convertTo24Hour($data['friday']['out'] ?? null),

                'saturday_vci' => $data['saturday']['vci'] ?? false,
                'saturday_in' => $this->convertTo24Hour($data['saturday']['in'] ?? null),
                'saturday_out' => $this->convertTo24Hour($data['saturday']['out'] ?? null),

                'sunday_vci' => $data['sunday']['vci'] ?? false,
                'sunday_in' => $this->convertTo24Hour($data['sunday']['in'] ?? null),
                'sunday_out' => $this->convertTo24Hour($data['sunday']['out'] ?? null),

                'monday_vci' => $data['monday']['vci'] ?? false,
                'monday_in' => $this->convertTo24Hour($data['monday']['in'] ?? null),
                'monday_out' => $this->convertTo24Hour($data['monday']['out'] ?? null),
            ]);
        }

        return response()->json(['message' => 'Employees saved successfully'], 201);
    }

    /**
     * Convert time from 12-hour format (e.g., "1:00:00 PM") to 24-hour format (e.g., "13:00:00").
     */
    private function convertTo24Hour(?string $time): ?string
    {
        if (empty($time)) {
            return null;
        }

        // Try to parse with AM/PM format
        $dt = DateTime::createFromFormat('h:i:s A', trim($time));
        return $dt ? $dt->format('H:i:s') : null;
    }
}
