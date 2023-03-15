<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hepatitis;
use App\Models\Patient;
use App\Models\Admission;
use App\Models\User;
use App\Models\BloodSerology;
use App\Models\EmployeeLog;

class HepatitisController extends Controller
{
    //
    public function edit_hepatitis(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $exam = Hepatitis::select(
                'examlab_hepa.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('examlab_hepa.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'examlab_hepa.admission_id'
                )
                ->latest('id')
                ->first();
    
            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $admission = Admission::where('id', $exam->admission_id)->first();
            $medical_techs = User::where('position', '=', 'Medical Technologist')->get();
            $pathologists = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Pathologist%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Pathologist%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();
            
            return view('Hepatitis.edit-hepatitis', compact('exam', 'patient', 'admission', 'medical_techs', 'pathologists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_hepatitis(Request $request)
    {   
        try {
            $id = $request->id;
            $data = $request->except('_token', 'peme_date', 'patientname', 'patientcode', 'action', 'id');
            $save = Hepatitis::where('id', $id)->latest('id')->update($data);
            
            // $exam = Hepatitis::findOrFail($id);
            // $exam->hbsag_result = $request->hbsag_result;
            // $exam->hbsag_cutoff = $request->hbsag_cutoff;
            // $exam->hbsag_value = $request->hbsag_value;
            // $exam->antihbs_result = $request->antihbs_result;
            // $exam->antihbs_cutoff = $request->antihbs_cutoff;
            // $exam->antihbs_value = $request->antihbs_value;
            // $exam->hbeag_result = $request->hbeag_result;
            // $exam->hbeag_cutoff = $request->hbeag_cutoff;
            // $exam->hbeag_value = $request->hbeag_value;
            // $exam->antihbe_result = $request->antihbe_result;
            // $exam->antihbe_cutoff = $request->antihbe_cutoff;
            // $exam->antihbe_value = $request->antihbe_value;
            // $exam->antihbclgm_result = $request->antihbclgm_result;
            // $exam->antihbclgm_cutoff = $request->antihbclgm_cutoff;
            // $exam->antihbclgm_value = $request->antihbclgm_value;
            // $exam->antihbclgg_result = $request->antihbclgg_result;
            // $exam->antihbclgg_cutoff = $request->antihbclgg_cutoff;
            // $exam->antihbclgg_value = $request->antihbclgg_value;
            // $exam->antihavlgm_result = $request->antihavlgm_result;
            // $exam->antihavlgm_cutoff = $request->antihavlgm_cutoff;
            // $exam->antihavlgm_value = $request->antihavlgm_value;
            // $exam->antihavlgg_result = $request->antihavlgg_result;
            // $exam->antihavlgg_cutoff = $request->antihavlgg_cutoff;
            // $exam->antihavlgg_value = $request->antihavlgg_value;
            // $exam->antihcv_result = $request->antihcv_result;
            // $exam->antihcv_cutoff = $request->antihcv_cutoff;
            // $exam->antihcv_value = $request->antihcv_value;
            // $exam->others_result = $request->others_result;
            // $exam->others_cutoff = $request->others_cutoff;
            // $exam->others_value = $request->others_value;
            // $exam->remarks = $request->remarks;
            // $exam->remarks_status = $request->remarks_status;
            // $exam->technician_id = $request->technician_id;
            // $exam->technician2_id = $request->technician2_id;
            // $save = $exam->save();

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update Hepatitis from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            if ($save) {
                return back()->with('status', 'Hepatitis updated');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_hepatitis()
    {   
        try {
            $id = $_GET['id'];
            $admission = Admission::select(
                'tran_admission.*',
                'mast_patient.firstname as firstname',
                'mast_patient.lastname as lastname',
                'mast_patient.id as patient_id'
            )
                ->where('tran_admission.id', $id)
                ->leftJoin(
                    'mast_patient',
                    'mast_patient.patientcode',
                    'tran_admission.patientcode'
                )
                ->latest('mast_patient.id')
                ->first();
                
            $medical_techs = User::where('position', '=', 'Medical Technologist')->get();
            $pathologists = User::select('mast_employee.*', 'mast_employeeinfo.otherposition')
            ->where('mast_employee.position', 'LIKE', '%Pathologist%')
            ->orWhere('mast_employeeinfo.otherposition', 'LIKE', '%Pathologist%')
            ->leftJoin('mast_employeeinfo', 'mast_employee.id', 'mast_employeeinfo.main_id')
            ->get();
            $exam_bloodsero = BloodSerology::where('admission_id', $admission->id)->latest('admission_id')->first();
            // dd($exam_bloodsero);
            return view('Hepatitis.add-hepatitis', compact('admission', 'medical_techs', 'pathologists', 'exam_bloodsero'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }

    }

    public function store_hepatitis(Request $request)
    {   
        try {
            $data = $request->except('_token', 'patient_id', 'peme_date', 'patientname', 'patientcode', 'action', 'id');
            $save = Hepatitis::create($data);
            // $exam = new Hepatitis();
            // $exam->trans_date = $request->trans_date;
            // $exam->admission_id = $request->admission_id;
            // $exam->hbsag_result = $request->hbsag_result;
            // $exam->hbsag_cutoff = $request->hbsag_cutoff;
            // $exam->hbsag_value = $request->hbsag_value;
            // $exam->antihbs_result = $request->antihbs_result;
            // $exam->antihbs_cutoff = $request->antihbs_cutoff;
            // $exam->antihbs_value = $request->antihbs_value;
            // $exam->hbeag_result = $request->hbeag_result;
            // $exam->hbeag_cutoff = $request->hbeag_cutoff;
            // $exam->hbeag_value = $request->hbeag_value;
            // $exam->antihbe_result = $request->antihbe_result;
            // $exam->antihbe_cutoff = $request->antihbe_cutoff;
            // $exam->antihbe_value = $request->antihbe_value;
            // $exam->antihbclgm_result = $request->antihbclgm_result;
            // $exam->antihbclgm_cutoff = $request->antihbclgm_cutoff;
            // $exam->antihbclgm_value = $request->antihbclgm_value;
            // $exam->antihbclgg_result = $request->antihbclgg_result;
            // $exam->antihbclgg_cutoff = $request->antihbclgg_cutoff;
            // $exam->antihbclgg_value = $request->antihbclgg_value;
            // $exam->antihavlgm_result = $request->antihavlgm_result;
            // $exam->antihavlgm_cutoff = $request->antihavlgm_cutoff;
            // $exam->antihavlgm_value = $request->antihavlgm_value;
            // $exam->antihavlgg_result = $request->antihavlgg_result;
            // $exam->antihavlgg_cutoff = $request->antihavlgg_cutoff;
            // $exam->antihavlgg_value = $request->antihavlgg_value;
            // $exam->antihcv_result = $request->antihcv_result;
            // $exam->antihcv_cutoff = $request->antihcv_cutoff;
            // $exam->antihcv_value = $request->antihcv_value;
            // $exam->others_result = $request->others_result;
            // $exam->others_cutoff = $request->others_cutoff;
            // $exam->others_value = $request->others_value;
            // $exam->remarks = $request->remarks;
            // $exam->remarks_status = $request->remarks_status;
            // $exam->technician_id = $request->technician_id;
            // $exam->technician2_id = $request->technician2_id;
            // $save = $exam->save();
            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Add Serology from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();
    
            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'Serology added')->with('redirect', 'lab-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab26;tabVerticalLeft26');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }

    }
}