<div class="tab-pane fade" id="account-invoice" role="tabpanel" aria-labelledby="account-pill-invoice" aria-expanded="false">
    <div class="card">
        @if ($patient_or)
            @include('Patient.edit-patient-invoice', [
                $patient,
                $patientInfo,
                $exam_groups,
                $patient_package,
                $patient_or,
            ])
        @else
            @include('Patient.add-patient-invoice', [
                $patient,
                $patientInfo,
                $exam_groups,
                $patient_package,
                $admissionPatient,
            ])
        @endif
    </div>
</div>
