<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Audiometry;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\User;
use App\Models\EmployeeLog;

class AudiometryController extends Controller
{
    //
    public function add_audiometry(Request $request)
    {
        try {
            $id = $request->id;

            $admission = Admission::where('id', $id)->with('patient')->latest('id')->first();

            $audiometricians = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Audiometrician%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Audiometrician%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();

            $otolaries = User::where('position', 'LIKE', '%Otolaryngologist%')->get();
            return view('Audiometry.add-audiometry', compact('admission', 'audiometricians', 'otolaries'));

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_audiometry(Request $request)
    {
        try {
            $data = $request->except('_token', 'action', 'patient_id', 'patientname', 'patientcode', 'peme_date', 'id');
            $save = Audiometry::create($data);

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Add Audiometry from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            $path = 'patient_edit?id=' . $request->patient_id . '&patientcode=' . $request->patientcode;
            return redirect($path)->with('status', 'Audiometry added.')->with('redirect', 'basic-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab1;tabVerticalLeft1');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function edit_audiometry()
    {
        try {
            $id = $_GET['id'];

            $exam = Audiometry::where('admission_id', $id)->with('admission')->latest('id')->first();

            $audiometricians = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Audiometrician%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Audiometrician%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();

            $otolaries = User::where('position', 'LIKE', '%Otolaryngologist%')->get();

            return view('Audiometry.edit-audiometry', compact('exam', 'audiometricians', 'otolaries'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_audiometry(Request $request)
    {
        try {
            $id = $request->id;
            $data = $request->except('_token', 'action', 'patient_id', 'patientname', 'patientcode', 'peme_date', 'id', 'admission_id', 'trans_date');
            $save = Audiometry::where('id', $id)->update($data);

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Update Audiometry from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            return back()->with('status', 'Audiometry updated.');
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}
