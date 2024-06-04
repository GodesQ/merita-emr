<?php

namespace App\Http\Controllers;

use App\Models\SchedulePatient;
use Illuminate\Http\Request;

class SchedulePatientController extends Controller
{
    public function index() {

    }

    public function create(Request $request) { 
    
    }

    public function store(Request $request) {
    
    }

    public function edit(Request $request, $id) {
    
    }

    public function update(Request $request, $id) {
        $schedule = SchedulePatient::where('id', $id)->first();

        $schedule->update([
            'date' => $request->date,
        ]);

        return back()->with('success', 'Schedule successfully updated.');
    }
}
