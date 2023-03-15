<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use App\Models\Dental;
use App\Models\Admission;
use App\Models\EmployeeLog;
use App\Models\User;

class DentalController extends Controller
{
    //
    public function edit_dental(Request $request)
    {   
        try {
            $id = $_GET['id'];
            $exam = Dental::select(
                'exam_dental.*',
                'tran_admission.patientcode as patientcode'
            )
                ->where('exam_dental.admission_id', $id)
                ->leftJoin(
                    'tran_admission',
                    'tran_admission.id',
                    'exam_dental.admission_id'
                )
                ->latest('id')
                ->first();
            // dd($exam);
            
            $dental_services = DB::table('exam_dental_services')->where('main_id', $exam->id)->get();
            $dental_uploads = DB::table('exam_dental_upload')->where('main_id', $exam->id)->get();
    
            $patient = Patient::where('patientcode', $exam->patientcode)->latest('id')->first();
            $admission = Admission::where('id', $exam->admission_id)->first();
            $dentists = User::where('position', 'LIKE', '%Dentist%')->get();
            return view('Dental.edit-dental', compact('exam', 'patient', 'admission', 'dental_services', 'dental_uploads', 'dentists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function update_dental(Request $request)
    {   
        try {
            // dd($request->all());
            $id = $request->id;
            $exam = Dental::where('id', $id)->latest('id')->first();
            $exam->hygiene = $request->hygiene;
            $exam->gingiva = $request->gingiva;
            $exam->color = $request->color;
            $exam->tongue = $request->tongue;
            $exam->high_blood = $request->high_blood;
            $exam->diabetis = $request->diabetis;
            $exam->tuberculosis = $request->tuberculosis;
            $exam->hepatitis = $request->hepatitis;
            $exam->goiter = $request->goiter;
            $exam->allergy = $request->allergy;
            $exam->food = $request->food;
            $exam->drugs = $request->drugs;
            $exam->anesthesia = $request->anesthesia;
            $exam->fainting = $request->fainting;
            $exam->others = $request->others;
            $exam->tooth18 = $request->tooth18;
            $exam->tooth17 = $request->tooth17;
            $exam->tooth16 = $request->tooth16;
            $exam->tooth15 = $request->tooth15;
            $exam->tooth14 = $request->tooth14;
            $exam->tooth13 = $request->tooth13;
            $exam->tooth12 = $request->tooth12;
            $exam->tooth11 = $request->tooth11;
            $exam->tooth21 = $request->tooth21;
            $exam->tooth22 = $request->tooth22;
            $exam->tooth23 = $request->tooth23;
            $exam->tooth24 = $request->tooth24;
            $exam->tooth25 = $request->tooth25;
            $exam->tooth26 = $request->tooth26;
            $exam->tooth27 = $request->tooth27;
            $exam->tooth28 = $request->tooth28;
            $exam->tooth48 = $request->tooth48;
            $exam->tooth47 = $request->tooth47;
            $exam->tooth46 = $request->tooth46;
            $exam->tooth45 = $request->tooth45;
            $exam->tooth44 = $request->tooth44;
            $exam->tooth43 = $request->tooth43;
            $exam->tooth42 = $request->tooth42;
            $exam->tooth41 = $request->tooth41;
            $exam->tooth31 = $request->tooth31;
            $exam->tooth32 = $request->tooth32;
            $exam->tooth33 = $request->tooth33;
            $exam->tooth34 = $request->tooth34;
            $exam->tooth35 = $request->tooth35;
            $exam->tooth36 = $request->tooth36;
            $exam->tooth37 = $request->tooth37;
            $exam->tooth38 = $request->tooth38;
            $exam->decidous1 = $request->decidous1;
            $exam->decidous2 = $request->decidous2;
            $exam->dentition1 = $request->dentition1;
            $exam->dentition2 = $request->dentition2;
            $exam->dentition18 = $request->dentition18;
            $exam->dentition17 = $request->dentition17;
            $exam->dentition16 = $request->dentition16;
            $exam->dentition15 = $request->dentition15;
            $exam->dentition14 = $request->dentition14;
            $exam->dentition13 = $request->dentition13;
            $exam->dentition12 = $request->dentition12;
            $exam->dentition11 = $request->dentition11;
            $exam->dentition21 = $request->dentition21;
            $exam->dentition22 = $request->dentition22;
            $exam->dentition23 = $request->dentition23;
            $exam->dentition24 = $request->dentition24;
            $exam->dentition25 = $request->dentition25;
            $exam->dentition26 = $request->dentition26;
            $exam->dentition27 = $request->dentition27;
            $exam->dentition28 = $request->dentition28;
            $exam->dentition48 = $request->dentition48;
            $exam->dentition47 = $request->dentition47;
            $exam->dentition46 = $request->dentition46;
            $exam->dentition45 = $request->dentition45;
            $exam->dentition44 = $request->dentition44;
            $exam->dentition43 = $request->dentition43;
            $exam->dentition42 = $request->dentition42;
            $exam->dentition41 = $request->dentition41;
            $exam->dentition31 = $request->dentition31;
            $exam->dentition32 = $request->dentition32;
            $exam->dentition33 = $request->dentition33;
            $exam->dentition34 = $request->dentition34;
            $exam->dentition35 = $request->dentition35;
            $exam->dentition36 = $request->dentition36;
            $exam->dentition37 = $request->dentition37;
            $exam->dentition38 = $request->dentition38;
            $exam->remarks_status = $request->remarks_status;
            $exam->remarks = $request->remarks;
            $exam->recommendation = $request->recommendation;
            $exam->technician_id = $request->technician_id;
            $save = $exam->save();

            DB::table('exam_dental_services')->where('main_id', $exam->id)->delete();
            
            foreach ($request->dates as $key => $date) {
                if($date && $request->services[$key] && $request->teeth[$key]) {
                    // INSERT NEW RECORD
                    $new_record = DB::table('exam_dental_services')->insert([
                        "main_id" => $exam->id,
                        "date" => $date,
                        "service" => $request->services[$key],
                        "teeth" => $request->teeth[$key]
                    ]);
                }
            }

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description =
                'Update Dental from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            if ($save) {
                return back()->with('status', 'Dental Exam updated');
            } else {
                return back()->with('status', 'Dental Exam not updated');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function add_dental(Request $request)
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
            $dentists = User::where('position', 'LIKE', '%Dentist%')->get();
            return view('Dental.add-dental', compact('admission', 'dentists'));
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

    public function store_dental(Request $request)
    {       
        try {
            $exam = new Dental();
            $exam->trans_date = $request->trans_date;
            $exam->admission_id = $request->admission_id;
            $exam->hygiene = $request->hygiene;
            $exam->gingiva = $request->gingiva;
            $exam->color = $request->color;
            $exam->tongue = $request->tongue;
            $exam->high_blood = $request->high_blood;
            $exam->diabetis = $request->diabetis;
            $exam->tuberculosis = $request->tuberculosis;
            $exam->hepatitis = $request->hepatitis;
            $exam->goiter = $request->goiter;
            $exam->allergy = $request->allergy;
            $exam->food = $request->food;
            $exam->drugs = $request->drugs;
            $exam->anesthesia = $request->anesthesia;
            $exam->fainting = $request->fainting;
            $exam->others = $request->others;
            $exam->tooth18 = $request->tooth18;
            $exam->tooth17 = $request->tooth17;
            $exam->tooth16 = $request->tooth16;
            $exam->tooth15 = $request->tooth15;
            $exam->tooth14 = $request->tooth14;
            $exam->tooth13 = $request->tooth13;
            $exam->tooth12 = $request->tooth12;
            $exam->tooth11 = $request->tooth11;
            $exam->tooth21 = $request->tooth21;
            $exam->tooth22 = $request->tooth22;
            $exam->tooth23 = $request->tooth23;
            $exam->tooth24 = $request->tooth24;
            $exam->tooth25 = $request->tooth25;
            $exam->tooth26 = $request->tooth26;
            $exam->tooth27 = $request->tooth27;
            $exam->tooth28 = $request->tooth28;
            $exam->tooth48 = $request->tooth48;
            $exam->tooth47 = $request->tooth47;
            $exam->tooth46 = $request->tooth46;
            $exam->tooth45 = $request->tooth45;
            $exam->tooth44 = $request->tooth44;
            $exam->tooth43 = $request->tooth43;
            $exam->tooth42 = $request->tooth42;
            $exam->tooth41 = $request->tooth41;
            $exam->tooth31 = $request->tooth31;
            $exam->tooth32 = $request->tooth32;
            $exam->tooth33 = $request->tooth33;
            $exam->tooth34 = $request->tooth34;
            $exam->tooth35 = $request->tooth35;
            $exam->tooth36 = $request->tooth36;
            $exam->tooth37 = $request->tooth37;
            $exam->tooth38 = $request->tooth38;
            $exam->decidous1 = $request->decidous1;
            $exam->decidous2 = $request->decidous2;
            $exam->dentition1 = $request->dentition1;
            $exam->dentition2 = $request->dentition2;
            $exam->dentition18 = $request->dentition18;
            $exam->dentition17 = $request->dentition17;
            $exam->dentition16 = $request->dentition16;
            $exam->dentition15 = $request->dentition15;
            $exam->dentition14 = $request->dentition14;
            $exam->dentition13 = $request->dentition13;
            $exam->dentition12 = $request->dentition12;
            $exam->dentition11 = $request->dentition11;
            $exam->dentition21 = $request->dentition21;
            $exam->dentition22 = $request->dentition22;
            $exam->dentition23 = $request->dentition23;
            $exam->dentition24 = $request->dentition24;
            $exam->dentition25 = $request->dentition25;
            $exam->dentition26 = $request->dentition26;
            $exam->dentition27 = $request->dentition27;
            $exam->dentition28 = $request->dentition28;
            $exam->dentition48 = $request->dentition48;
            $exam->dentition47 = $request->dentition47;
            $exam->dentition46 = $request->dentition46;
            $exam->dentition45 = $request->dentition45;
            $exam->dentition44 = $request->dentition44;
            $exam->dentition43 = $request->dentition43;
            $exam->dentition42 = $request->dentition42;
            $exam->dentition41 = $request->dentition41;
            $exam->dentition31 = $request->dentition31;
            $exam->dentition32 = $request->dentition32;
            $exam->dentition33 = $request->dentition33;
            $exam->dentition34 = $request->dentition34;
            $exam->dentition35 = $request->dentition35;
            $exam->dentition36 = $request->dentition36;
            $exam->dentition37 = $request->dentition37;
            $exam->dentition38 = $request->dentition38;
            $exam->remarks = $request->remarks;
            $exam->recommendation = $request->recommendation;
            $exam->technician_id = $request->technician_id;
            $save = $exam->save();

            foreach ($request->dates as $key => $date) {
                if($date && $request->services[$key] && $request->teeth[$key]) {
                    // INSERT NEW RECORD
                    $new_record = DB::table('exam_dental_services')->insert([
                        "main_id" => $exam->id,
                        "date" => $date,
                        "service" => $request->services[$key],
                        "teeth" => $request->teeth[$key]
                    ]);
                }
            }

            $employeeInfo = session()->all();
            $log = new EmployeeLog();
            $log->employee_id = $employeeInfo['employeeId'];
            $log->description = 'Add Dental from Patient ' . $request->patientcode;
            $log->date = date('Y-m-d');
            $log->save();

            $path =
                'patient_edit?id=' .
                $request->patient_id .
                '&patientcode=' .
                $request->patientcode;
            if ($save) {
                return redirect($path)->with('status', 'Dental Exam added')->with('redirect', 'basic-exam;child-basic-tab;child-basic-component;baseVerticalLeft1-tab4;tabVerticalLeft4');
            }
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }

     public function upload_dental(Request $request)
    {   
        try {
            $this->validate($request, [
                'upload_files' => 'required',
                'upload_files.*' => 'mimes:pdf,jpg,png,jpeg'
            ]);
    
            if($request->hasFile('upload_files')) {
                foreach($request->file('upload_files') as $file)
                {
                    $name= $file->getClientOriginalName();
                    $file->move(public_path().'/app-assets/images/dental_files', $name);  
                 
                    $save_file = DB::table('exam_dental_upload')->insert([
                        "main_id" => $request->patient_id,
                        "file" => $name,
                        "created_date" => date("Y-m-d")
                    ]);
                }
                
                if($save_file) {
                    return back()->with('status', 'Upload Successfully');
                }
            }
        } catch (\Exception $exception) {
            
            $this->validate($request, [
                'upload_files' => 'required',
                'upload_files.*' => 'mimes:pdf,jpg,png,jpeg'
            ]);
            
            $message = $exception->getMessage();
            $file = $exception->getFile();
            return view('errors.error', compact('message', 'file'));
        }
    }
}