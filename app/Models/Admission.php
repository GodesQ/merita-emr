<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $table = 'tran_admission';
    public $timestamps = false;
    protected $guarded = [];

    public function patient()
    {
        return $this->hasOne(Patient::class, 'admission_id', 'id')->latest('id');;
    }

    public function followup() {
        return $this->hasOne(ReassessmentFindings::class, 'admission_id', 'id');
    }

    public function cashier_or() {
        return $this->belongsTo(CashierOR::class, 'id', 'admission_id');
    }

    public function package() {
        return $this->hasOne(ListPackage::class, 'id', 'package_id');
    }

    public function agency() {
        return $this->belongsTo(Agency::class)->latest('id');
    }

    public function exam_audio() {
        return $this->hasOne(Audiometry::class)->latest('id');
    }

    public function exam_bloodsero() {
        return $this->hasOne(BloodSerology::class)->latest('id');
    }

    public function exam_crf() {
        return $this->hasOne(CardiacRiskFactor::class)->latest('id');
    }

    public function exam_cardio() {
        return $this->hasOne(CardioVascular::class)->latest('id');
    }

    public function exam_dental() {
        return $this->hasOne(Dental::class)->latest('id');
    }

    public function exam_drug() {
        return $this->hasOne(DrugTest::class)->latest('id');
    }

    public function exam_urin() {
        return $this->hasOne(Urinalysis::class)->latest('id');
    }

    public function exam_echodoppler() {
        return $this->hasOne(EchoDoppler::class)->latest('id');
    }

    public function exam_echoplain() {
        return $this->hasOne(EchoPlain::class)->latest('id');
    }

    public function exam_feca() {
        return $this->hasOne(Fecalysis::class)->latest('id');
    }

    public function exam_hema() {
        return $this->hasOne(Hematology::class)->latest('id');
    }

    public function exam_hepa() {
        return $this->hasOne(Hepatitis::class)->latest('id');
    }

    public function exam_hiv() {
        return $this->hasOne(HIV::class)->latest('id');
    }

    public function exam_ishihara() {
        return $this->hasOne(Ishihara::class)->latest('id');
    }

    public function exam_misc() {
        return $this->hasOne(Miscellaneous::class)->latest('id');
    }

    public function exam_physical() {
        return $this->hasOne(PhysicalExam::class)->latest('id');
    }

    public function exam_pregnancy() {
        return $this->hasOne(Pregnancy::class)->latest('id');
    }

    public function exam_psychobpi() {
        return $this->hasOne(PsychoBPI::class)->latest('id');
    }

    public function exam_psycho() {
        return $this->hasOne(Psychological::class)->latest('id');
    }

    public function exam_stressecho() {
        return $this->hasOne(StressEcho::class)->latest('id');
    }

    public function exam_stresstest() {
        return $this->hasOne(StressTest::class)->latest('id');
    }

    public function exam_ultrasound() {
        return $this->hasOne(UltraSound::class)->latest('id');
    }

    public function exam_visacuity() {
        return $this->hasOne(VisualAcuity::class)->latest('id');
    }

    public function exam_xray() {
        return $this->hasOne(XRay::class)->latest('id');
    }


    public function exam_ecg() {
        return $this->hasOne(ECG::class)->latest('id');
    }

    public function exam_blood_serology() {
        return $this->hasOne(BloodSerology::class)->latest('id');
    }


    public function admission_exams()
    {
        return $this->hasMany(AdmissionExam::class, 'main_id');
    }

    public function getStatusExams($patient_exams = null) {
        $exams = [];

        if ($patient_exams) {
            foreach ($patient_exams as $key => $exam) {
                $exams[$exam->examname] = 'completed';
                if (preg_match('/audiometry/i', $exam->examname)) {
                    if (!$this->exam_audio) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/cardiac/i', $exam->examname) || preg_match('/Spirometry/i', $exam->examname)) {
                    if (!$this->exam_crf) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/cardio/i', $exam->examname)) {
                    if (!$this->exam_cardio) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/dental/i', $exam->examname)) {
                    if (!$this->exam_dental) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/ecg/i', $exam->examname)) {
                    if (!$this->exam_ecg) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/doppler/i', $exam->examname)) {
                    if (!$this->exam_echodoppler) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/plain/i', $exam->examname)) {
                    if (!$this->exam_echoplain) {
                        $exams[$exam->examname] = '';
                    }
                }

                if (preg_match('/ishihara/i', $exam->examname)) {
                    if (!$this->exam_ishihara) {
                        $exams[$exam->examname] = '';
                    }
                }

                if (preg_match('/Complete PE and Medical History/i', $exam->examname) || preg_match('/STOOL/i', $exam->examname)) {
                    if (!$this->exam_physical) {
                        $exams[$exam->examname] = '';
                    }
                }

                if (preg_match('/pyschological/i', $exam->examname) || preg_match('/Psychometric/i', $exam->examname)) {
                    if (!$this->exam_psycho) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/STRESS ECHO/i', $exam->examname)) {
                    if (!$this->exam_stressecho) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Treadmill/i', $exam->examname)) {
                    if (!$this->exam_stresstest) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Acuity/i', $exam->examname)) {
                    if (!$this->exam_visacuity) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Ultrasound/i', $exam->category)) {
                    if (!$this->exam_ultrasound) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Xray/i', $exam->category)) {
                    if (!$this->exam_xray) {
                        $exams[$exam->examname] = '';
                    }
                }

                if (preg_match('/Serology/i', $exam->category) || preg_match('/Chemistry/i', $exam->category) || preg_match('/Enzymes/i', $exam->category) ||  preg_match('/SGPT/i', $exam->examname)
                    || preg_match('/BLOOD/i', $exam->examname) || preg_match('/Anti HBe/i', $exam->examname) || preg_match('/Anti HAV/i', $exam->examname) || preg_match('/Anti HBc/i', $exam->examname)
                    || preg_match('/Anti HCV/i', $exam->examname) || preg_match('/Anti HCV/i', $exam->examname) || preg_match('/HepaB/i', $exam->examname) || preg_match('/TPHA/i', $exam->examname)
                    ||  preg_match('/Electrolytes/i', $exam->category) ||  preg_match('/Sodium/i', $exam->examname) ||  preg_match('/Potassium/i', $exam->examname) ||  preg_match('/Calcium/i', $exam->examname)
                    ||  preg_match('/Albumin/i', $exam->examname) ||  preg_match('/Creatinine/i', $exam->examname) ||  preg_match('/Uric Acid/i', $exam->examname) ||  preg_match('/Anti HBs/i', $exam->examname)) {
                    if (!$this->exam_blood_serology) {
                        $exams[$exam->examname] = '';
                    }
                }

                if (preg_match('/HIV/i', $exam->examname)) {
                    if (!$this->exam_hiv) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/drug/i', $exam->examname) || preg_match('/Drug/i', $exam->category)) {
                    if (!$this->exam_drug) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Fecalysis/i', $exam->examname)) {
                    if (!$this->exam_feca) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Hematology/i', $exam->category) || preg_match('/CBC/i', $exam->examname)) {
                    if (!$this->exam_hema) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Hepatitis Profile/i', $exam->examname)) {
                    if (!$this->exam_hepa) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Pregnancy/i', $exam->examname)) {
                    if (!$this->exam_pregnancy) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Urinalysis/i', $exam->examname)) {
                    if (!$this->exam_urin) {
                        $exams[$exam->examname] = '';
                    }
                }
                if (preg_match('/Miscellaneous/i', $exam->examname)) {
                    if (!$this->exam_misc) {
                        $exams[$exam->examname] = '';
                    }
                }
            }
        } else {
            $exams = null;
        }

        $status = null;

        if ($exams) {
            $completed_exams = array_filter($exams, function ($exam) {
                return $exam == 'completed';
            });

            $on_going_exams = array_filter($exams, function ($exam) {
                return $exam == '';
            });

            if ($this && !$status) {
                if($this->lab_status == 2) {
                    $status = '<div class="badge mx-1 p-75 bg-success">FIT TO WORK</div>';
                } else if($this->lab_status == 1) {
                    $status = '<div class="badge mx-1 p-75 bg-primary bg-darken-3">NEED REASSESSMENT</div>';
                } else if($this->lab_status == 3) {
                    $status = '<div class="badge mx-1 p-75 bg-primary bg-darken-5">UNFIT TO WORK</div>';
                } else if($this->lab_status == 4) {
                    $status = '<div class="badge mx-1 p-75 bg-info bg-darken-2">UNFIT TEMPORARILY</div>';
                }
            }

            if(count($exams) == count($completed_exams) && !$status) {
                $status = '<div class="badge mx-1 p-1 bg-success bg-darken-2">MEDICAL DONE</div>';
            }

            if (in_array('completed', $exams) && !$status) {
                $status = '<div class="badge mx-1 p-1 bg-secondary">TAKING EXAM</div>';
            }

            if ($this->id && !$status) {
                $status = '<div class="badge mx-1 p-1 bg-warning">ADMITTED</div>';
            }

        } else {
            if(!$status) {
                $status = '<div class="badge mx-1 p-1 bg-danger">NO EXAMS</div>';
            }
        }
        return $status;
    }

    // public function getPatientStatus($exams) {
    //     $exam_audio
    // }
}
