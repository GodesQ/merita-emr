<div class="tab-pane fade" id="account-admission" role="tabpanel" aria-labelledby="account-pill-admission"
    aria-expanded="false">
    @if ($admissionPatient)
        @include('Admission.edit-admission')
    @else
        @include('Admission.add-admission', [$patient, $patientInfo, $list_exams])
    @endif
</div>
