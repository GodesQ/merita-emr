<div class="container border p-1">
    <h3 class="font-weight-bold">Current Findings</h3>
    <div class="row my-1">
        @if ($exam_physical)
            @if($exam_physical->remarks_status == 'findings')
            <div class="col-md-6 my-50">
                <h5><b>PE</b></h5>
                <span style="font-size: 12px;">@php echo nl2br($exam_physical->finding)@endphp</span>
                <input type="hidden" value="PE: @php echo nl2br($exam_physical->finding) @endphp" name="findings[]" />
            </div>
            @endif
        @endif
        @if ($exam_visacuity)
            @if($exam_visacuity->remarks_status == 'findings')
            <div class="col-md-6 my-50">
                <h5><b>Visual Acuity</b></h5>
                <span style="font-size: 12px;">@php echo nl2br($exam_visacuity->remarks) @endphp</span>
                <input type="hidden" value="Visual Acuity: @php echo nl2br($exam_visacuity->remarks) @endphp" name="findings[]" />
            </div>
            @endif
        @endif

        @if ($exam_dental)
            @if($exam_dental->remarks_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>Dental</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($exam_dental->remarks) @endphp</span>
                    <input type="hidden" value="Dental: @php echo nl2br($exam_dental->remarks) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($exam_psycho)
            @if($exam_psycho->remarks_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>Psychological</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($exam_psycho->remarks) @endphp</span>
                    <input type="hidden" value="Psychological: @php echo nl2br($exam_psycho->remarks) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($exam_audio)
            @if($exam_audio->remarks_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>Audiometry</b></h5>
                    <span style="font-size: 12px; ">@php echo nl2br($exam_audio->remarks) @endphp</span>
                    <input type="hidden" value="Audiometry: @php echo nl2br($exam_audio->remarks) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($exam_ishihara)
            @if($exam_ishihara->remarks_status == 'findings')
            <div class="col-md-6 my-50">
                <h5><b>Ishihara</b></h5>
                <span style="font-size: 12px;">@php echo
                    nl2br($exam_ishihara->remarks) @endphp</span>
                <input type="hidden" value="Ishihara: @php echo nl2br($exam_ishihara->remarks) @endphp" name="findings[]" />
            </div>
            @endif
        @endif

        @if ($exam_crf)
            @if($exam_crf->remarks_status == 'findings')
            <div class="col-md-6 my-50">
                <h5><b>Cardiac Risk Factor</b></h5>
                <span style="font-size: 12px;">@php echo nl2br($exam_crf->remarks)
                    @endphp</span>
                <input type="hidden" value="Cardiac Risk Factor: @php echo nl2br($exam_crf->remarks) @endphp" name="findings[]" />
            </div>
            @endif
        @endif

        @if ($exam_cardio)
            @if($exam_cardio->remarks_status == 'findings')
            <div class="col-md-6 my-50">
                <h5><b>Cardiovascular</b></h5>
                <span style="font-size: 12px;">@php echo
                    nl2br($exam_cardio->remarks) @endphp</span>
                <input type="hidden" value="Cardiovascular: @php echo nl2br($exam_cardio->remarks) @endphp" name="findings[]" />
            </div>
            @endif
        @endif

        @if ($exam_stresstest)
            @if($exam_stresstest->remarks_status == 'findings')
            <div class="col-md-6 my-50">
                <h5><b>Stress Test</b></h5>
                <span style="font-size: 12px;">@php echo
                    nl2br($exam_stresstest->remarks) @endphp</span>
                <input type="hidden" value="Stress Test: @php echo nl2br($exam_stresstest->remarks) @endphp" name="findings[]" />
            </div>
            @endif
        @endif

        @if ($exam_echoplain)
            @if($exam_echoplain->remarks_status == 'findings')
            <div class="col-md-6 my-50">
                <h5><b>2D Echo Plain</b></h5>
                <span style="font-size: 12px;">@php echo
                    nl2br($exam_echoplain->remarks) @endphp</span>
                <input type="hidden" value="2D Echo Plain: @php echo nl2br($exam_echoplain->remarks) @endphp" name="findings[]" />
            </div>
            @endif
        @endif

        @if ($exam_echodoppler)
            @if($exam_echodoppler->remarks_status == 'findings')
            <div class="col-md-6 my-50">
                <h5><b>2D Echo Doppler</b></h5>
                <span style="font-size: 12px;">@php echo
                    nl2br($exam_echodoppler->remarks) @endphp</span>
                <input type="hidden" value="2D Echo Doppler: @php echo nl2br($exam_echodoppler->remarks) @endphp" name="findings[]" />
            </div>
            @endif
        @endif

        @if ($exam_ppd)
            @if($exam_ppd->remarks_status == 'findings')
            <div class="col-md-6 my-50">
                <h5><b>PPD</b></h5>
                <span style="font-size: 12px;"><?php echo nl2br($exam_ppd->remarks) ?></span>
                <input type="hidden" value="PPD: <?php echo nl2br($exam_ppd->remarks) ?>" name="findings[]" />
            </div>
            @endif
        @endif

        @if ($exam_stressecho)
            @if($exam_stressecho->remarks_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>Stress Echo</b></h5>
                    <span style="font-size: 12px;"><?php echo nl2br($exam_stressecho->remarks) ?></span>
                    <input type="hidden" value="Stress Echo: @php echo nl2br($exam_stressecho->remarks) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($exam_ultrasound)
            @if($exam_ultrasound->kub_exam_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>KUB Exam: </b></h5>
                    <span style="font-size: 12px;"><?php echo nl2br($exam_ultrasound->kub_exam_findings) ?></span>
                    <input type="hidden" value="KUB Exam: <?php echo nl2br($exam_ultrasound->kub_exam_findings) ?>" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($exam_ultrasound)
            @if($exam_ultrasound->hbt_exam_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>HBT Exam: </b></h5>
                    <span style="font-size: 12px;"><?php echo nl2br($exam_ultrasound->hbt_exam_findings) ?></span>
                    <input type="hidden" value="HBT Exam: <?php echo nl2br($exam_ultrasound->hbt_exam_findings) ?>" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($exam_ultrasound)
            @if($exam_ultrasound->thyroid_exam_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>THYROID Exam: </b></h5>
                    <span style="font-size: 12px;"><?php echo nl2br($exam_ultrasound->thyroid_exam_findings) ?></span>
                    <input type="hidden" value="THYROID Exam: @php echo nl2br($exam_ultrasound->thyroid_exam_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($exam_ultrasound)
            @if($exam_ultrasound->breast_exam_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>BREAST Exam: </b></h5>
                    <span style="font-size: 12px;"><?php echo nl2br($exam_ultrasound->breast_exam_findings) ?></span>
                    <input type="hidden" value="BREAST Exam: <?php echo nl2br($exam_ultrasound->breast_exam_findings) ?>" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($exam_ultrasound)
            @if($exam_ultrasound->whole_abdomen_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>WHOLE ABDOMEN Exam: </b></h5>
                    <span style="font-size: 12px;"><?php echo nl2br($exam_ultrasound->whole_abdomen_findings) ?></span>
                    <input type="hidden" value="WHOLE ABDOMEN Exam: <?php echo nl2br($exam_ultrasound->whole_abdomen_findings) ?>" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($exam_ultrasound)
            @if($exam_ultrasound->genitals_exam_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>GENITALS Exam: </b></h5>
                    <span style="font-size: 12px;"><?php echo nl2br($exam_ultrasound->genitals_exam_findings) ?></span>
                    <input type="hidden" value="GENITALS Exam: <?php echo nl2br($exam_ultrasound->genitals_exam_findings) ?>" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($exam_psychobpi)
            @if($exam_psychobpi->remarks_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>Psycho BPI</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_psychobpi->remarks) @endphp</span>
                    <input type="hidden" value="Psycho BPI: @php echo nl2br($exam_psychobpi->remarks) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($examlab_hema)
            @if($examlab_hema->remarks_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>Hematology</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($examlab_hema->remarks) @endphp</span>
                    <input type="hidden" value="Hematology: @php echo nl2br($examlab_hema->remarks) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($examlab_urin)
            @if($examlab_urin->remarks_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>Urinalysis</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($examlab_urin->remarks) @endphp</span>
                    <input type="hidden" value="Urinalysis: @php echo nl2br($examlab_urin->remarks) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($examlab_pregnancy)
            @if($examlab_pregnancy->remarks_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>Pregnancy</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($examlab_pregnancy->remarks) @endphp</span>
                    <input type="hidden" value="Pregnancy: @php echo nl2br($examlab_pregnancy->remarks) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($examlab_feca)
            @if($examlab_feca->remarks_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>Fecalysis</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($examlab_feca->remarks) @endphp</span>
                    <input type="hidden" value="Fecalysis: @php echo nl2br($examlab_feca->remarks) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($examlab_hepa)
            @if($examlab_hepa->remarks_status == 'findings')
            <div class="col-md-6 my-50">
                <h5><b>Hepatitis</b></h5>
                <span style="font-size: 12px;">@php echo nl2br($examlab_hepa->remarks) @endphp</span>
                <input type="hidden" value="Hepatitis: @php echo nl2br($examlab_hepa->remarks) @endphp" name="findings[]" />
            </div>
            @endif
        @endif

        @if ($examlab_hiv)
            @if($examlab_hiv->remarks_status == 'findings')
            <div class="col-md-6 my-50">
                <h5><b>HIV</b></h5>
                <span style="font-size: 12px;">@php echo
                    nl2br($examlab_hiv->remarks) @endphp</span>
                <input type="hidden" value="HIV: @php echo nl2br($examlab_hiv->remarks) @endphp" name="findings[]" />
            </div>
            @endif
        @endif

        @if ($examlab_drug)
            @if($examlab_drug->remarks_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>Drug Test</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($examlab_drug->remarks) @endphp</span>
                    <input type="hidden" value="Drug Test: @php echo nl2br($examlab_drug->remarks) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if ($examlab_misc)
            @if($examlab_misc->remarks_status == 'findings')
                <div class="col-md-6 my-50">
                    <h5><b>Miscellaneous</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($examlab_misc->remarks) @endphp</span>
                    <input type="hidden" value="Miscellaneous: @php echo nl2br($examlab_misc->remarks) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_physical)
            @if(!$exam_physical->a1)
                <div class="col-md-6 my-50">
                    <h5><b>Skin</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_physical->a1_findings) @endphp</span>
                     <input type="hidden" value="Skin: @php echo nl2br($exam_physical->a1_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_physical)
            @if(!$exam_physical->b1)
                <div class="col-md-6 my-50">
                    <h5><b>Neck, Lymph Node,Thyroid</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_physical->b1_findings) @endphp</span>
                    <input type="hidden" value="Neck, Lymph Node,Thyroid: @php echo nl2br($exam_physical->b1_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_physical)
            @if(!$exam_physical->a2)
                <div class="col-md-6 my-50">
                    <h5><b>Head, Neck,Scalp</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($exam_physical->a2_findings) @endphp</span>
                    <input type="hidden" value="Head, Neck, Scalp: @php echo nl2br($exam_physical->a2_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->b7)
                <div class="col-md-6 my-50">
                    <h5><b>Neurology</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($exam_physical->b2_findings) @endphp</span>
                    <input type="hidden" value="Neurology: @php echo nl2br($exam_physical->b2_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->a3)
                <div class="col-md-6 my-50">
                    <h5><b>Eyes(external)</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($exam_physical->a3_findings) @endphp</span>
                    <input type="hidden" value="Eyes(external): @php echo nl2br($exam_physical->a3_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->b2)
                <div class="col-md-6 my-50">
                    <h5><b>Breast,Axilla</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($exam_physical->b3_findings) @endphp</span>
                    <input type="hidden" value="Breast,Axilla: @php echo nl2br($exam_physical->b3_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->a4)
                <div class="col-md-6 my-50">
                    <h5><b>Pupils</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_physical->a4_findings) @endphp</span>
                    <input type="hidden" value="Pupils: @php echo nl2br($exam_physical->a4_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->b3)
                <div class="col-md-6 my-50">
                    <h5><b>Chest and Lungs</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($exam_physical->b4_findings) @endphp</span>
                    <input type="hidden" value="Chest and Lungs: @php echo nl2br($exam_physical->b4_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->a5)
                <div class="col-md-6 my-50">
                    <h5><b>Ears</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($exam_physical->a5_findings) @endphp</span>
                    <input type="hidden" value="Ears: @php echo nl2br($exam_physical->a5_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->b4)
                <div class="col-md-6 my-50">
                    <h5><b>Heart</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_physical->b5_findings) @endphp</span>
                    <input type="hidden" value="Heart: @php echo nl2br($exam_physical->b5_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->a6)
                <div class="col-md-6 my-50">
                    <h5><b>Nose,Sinuses</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($exam_physical->a6_findings) @endphp</span>
                    <input type="hidden" value="Nose,Sinuses: @php echo nl2br($exam_physical->a6_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->b5)
                <div class="col-md-6 my-50">
                    <h5><b>Abdomen,Liver,Spleen</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_physical->b6_findings) @endphp</span>
                    <input type="hidden" value="Abdomen,Liver,Spleen: @php echo nl2br($exam_physical->b6_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->a7)
                <div class="col-md-6 my-50">
                    <h5><b>Mouth,Throat</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_physical->a7_findings) @endphp</span>
                    <input type="hidden" value="Mouth,Throat: @php echo nl2br($exam_physical->a7_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->b6)
                <div class="col-md-6 my-50">
                    <h5><b>Back</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_physical->b7_findings) @endphp</span>
                    <input type="hidden" value="Back: @php echo nl2br($exam_physical->b7_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->c1)
                <div class="col-md-6 my-50">
                    <h5><b>Anus-Rectum</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_physical->c1_findings) @endphp</span>
                    <input type="hidden" value="Anus-Rectum: @php echo nl2br($exam_physical->c1_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->c2)
                <div class="col-md-6 my-50">
                    <h5><b>Genito-Urinary System</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_physical->c2_findings) @endphp</span>
                    <input type="hidden" value="Genito-Urinary System: @php echo nl2br($exam_physical->c2_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->c3)
                <div class="col-md-6 my-50">
                    <h5><b>Inguinals,Genitals</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_physical->c3_findings) @endphp</span>
                    <input type="hidden" value="Inguinals,Genitals: @php echo nl2br($exam_physical->c3_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->c4)
                <div class="col-md-6 my-50">
                    <h5><b>Extremities</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_physical->c4_findings) @endphp</span>
                    <input type="hidden" value="Extremities: @php echo nl2br($exam_physical->c4_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->c5)
                <div class="col-md-6 my-50">
                    <h5><b>Reflexes</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_physical->c5_findings) @endphp</span>
                    <input type="hidden" value="Reflexes: @php echo nl2br($exam_physical->c5_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($exam_physical)
            @if(!$exam_physical->c6)
                <div class="col-md-6 my-50">
                    <h5><b>Dental(Teeth/Gums)</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_physical->c6_findings) @endphp</span>
                    <input type="hidden" value="Dental(Teeth/Gums): @php echo nl2br($exam_physical->c6_findings) @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->hba1c < 4 && is_numeric(optional($exam_blood_serology)->hba1c) || optional($exam_blood_serology)->hba1c > 6.5)
                <div class="col-md-6 my-50">
                    <h5><b>HBA1C</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->hba1c) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->hba1c < 4 && is_numeric(optional($exam_blood_serology)->hba1c))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->hba1c > 6.5 && is_numeric(optional($exam_blood_serology)->hba1c))
                            H
                        @endif</span>
                    <input type="hidden" value="HBA1C: @php
                        echo nl2br($exam_blood_serology->hba1c) . ' - ';
                        if(optional($exam_blood_serology)->hba1c < 4 && is_numeric(optional($exam_blood_serology)->hba1c)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->hba1c > 6.5 && is_numeric(optional($exam_blood_serology)->hba1c)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->ppbg > 200)
                <div class="col-md-6 my-50">
                    <h5><b>PPBG</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->ppbg) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->ppbg > 200 && is_numeric(optional($exam_blood_serology)->ppbg))
                            H
                        @endif
                    </span>
                    <input type="hidden" value="PPBG: @php
                        echo nl2br($exam_blood_serology->ppbg) . ' - ';
                        if(optional($exam_blood_serology)->ppbg > 200 && is_numeric(optional($exam_blood_serology)->ppbg)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->fbs < 70 && is_numeric(optional($exam_blood_serology)->fbs) || optional($exam_blood_serology)->fbs > 110)
                <div class="col-md-6 my-50">
                    <h5><b>FBS</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->fbs) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->fbs < 70 && is_numeric(optional($exam_blood_serology)->fbs))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->fbs > 110 && is_numeric(optional($exam_blood_serology)->fbs))
                            H
                        @endif</span>
                    <input type="hidden" value="FBS: @php
                        echo nl2br($exam_blood_serology->fbs) . ' - ';
                        if(optional($exam_blood_serology)->fbs < 70 && is_numeric(optional($exam_blood_serology)->fbs)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->fbs > 110 && is_numeric(optional($exam_blood_serology)->fbs)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->bun < 5 && is_numeric(optional($exam_blood_serology)->bun) || optional($exam_blood_serology)->bun > 20)
                <div class="col-md-6 my-50">
                    <h5><b>BUN</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->bun) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->bun < 5 && is_numeric(optional($exam_blood_serology)->bun))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->bun > 20 && is_numeric(optional($exam_blood_serology)->bun))
                            H
                        @endif</span>
                    <input type="hidden" value="BUN: @php
                        echo nl2br($exam_blood_serology->bun) . ' - ';
                        if(optional($exam_blood_serology)->bun < 5 && is_numeric(optional($exam_blood_serology)->bun)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->bun > 20 && is_numeric(optional($exam_blood_serology)->bun)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->creatinine < 0.8 && is_numeric(optional($exam_blood_serology)->creatinine) || optional($exam_blood_serology)->creatinine > 1.2)
                <div class="col-md-6 my-50">
                    <h5><b>CREATININE</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->creatinine) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->creatinine < 0.8 && is_numeric(optional($exam_blood_serology)->creatinine))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->creatinine > 1.2 && is_numeric(optional($exam_blood_serology)->creatinine))
                            H
                        @endif</span>
                    <input type="hidden" value="CREATININE: @php
                        echo nl2br($exam_blood_serology->creatinine) . ' - ';
                        if(optional($exam_blood_serology)->creatinine < 0.8 && is_numeric(optional($exam_blood_serology)->creatinine)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->creatinine > 1.2 && is_numeric(optional($exam_blood_serology)->creatinine)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->cholesterol < 125 && is_numeric(optional($exam_blood_serology)->cholesterol) || optional($exam_blood_serology)->cholesterol > 200)
                <div class="col-md-6 my-50">
                    <h5><b>CHOLESTEROL</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->cholesterol) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->cholesterol < 125 && is_numeric(optional($exam_blood_serology)->cholesterol))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->cholesterol > 200 && is_numeric(optional($exam_blood_serology)->cholesterol))
                            H
                        @endif</span>
                    <input type="hidden" value="CHOLESTEROL: @php
                        echo nl2br($exam_blood_serology->cholesterol) . ' - ';
                        if(optional($exam_blood_serology)->cholesterol < 125 && is_numeric(optional($exam_blood_serology)->cholesterol)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->cholesterol > 200 && is_numeric(optional($exam_blood_serology)->cholesterol)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->triglycerides < 35 && is_numeric(optional($exam_blood_serology)->triglycerides) || optional($exam_blood_serology)->triglycerides > 160)
                <div class="col-md-6 my-50">
                    <h5><b>TRIGLYCERIDES</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->triglycerides) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->triglycerides < 35 && is_numeric(optional($exam_blood_serology)->triglycerides))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->triglycerides > 160 && is_numeric(optional($exam_blood_serology)->triglycerides))
                            H
                        @endif</span>
                    <input type="hidden" value="TRIGLYCERIDES: @php
                        echo nl2br($exam_blood_serology->triglycerides) . ' - ';
                        if(optional($exam_blood_serology)->triglycerides < 35 && is_numeric(optional($exam_blood_serology)->triglycerides)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->triglycerides > 160 && is_numeric(optional($exam_blood_serology)->triglycerides)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->hdl < 40 && is_numeric(optional($exam_blood_serology)->hdl))
                <div class="col-md-6 my-50">
                    <h5><b>HDL Chole</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->hdl) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->hdl < 40 && is_numeric(optional($exam_blood_serology)->hdl))
                            L
                        @endif
                    </span>
                    <input type="hidden" value="HDL Chole: @php
                        echo nl2br($exam_blood_serology->hdl) . ' - ';
                        if(optional($exam_blood_serology)->hdl < 40 && is_numeric(optional($exam_blood_serology)->hdl)) {
                            echo 'L';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->ldl > 100 && is_numeric(optional($exam_blood_serology)->ldl))
                <div class="col-md-6 my-50">
                    <h5><b>LDL Chole</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->ldl) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->ldl > 40 && is_numeric(optional($exam_blood_serology)->ldl))
                            H
                        @endif
                    </span>
                    <input type="hidden" value="LDL Chole: @php
                        echo nl2br($exam_blood_serology->ldl) . ' - ';
                        if(optional($exam_blood_serology)->ldl > 40 && is_numeric(optional($exam_blood_serology)->ldl)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->vldl < 7 && is_numeric(optional($exam_blood_serology)->vldl) || optional($exam_blood_serology)->vldl > 32)
                <div class="col-md-6 my-50">
                    <h5><b>VLDL Chole</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->vldl) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->vldl < 7 && is_numeric(optional($exam_blood_serology)->vldl))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->vldl > 32 && is_numeric(optional($exam_blood_serology)->vldl))
                            H
                        @endif</span>
                    <input type="hidden" value="VLDL Chole: @php
                        echo nl2br($exam_blood_serology->vldl) . ' - ';
                        if(optional($exam_blood_serology)->vldl < 7 && is_numeric(optional($exam_blood_serology)->vldl)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->vldl > 32 && is_numeric(optional($exam_blood_serology)->vldl)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->uricacid < 140 && is_numeric(optional($exam_blood_serology)->uricacid) || optional($exam_blood_serology)->uricacid > 430)
                <div class="col-md-6 my-50">
                    <h5><b>URIC ACID</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->uricacid) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->uricacid < 140 && is_numeric(optional($exam_blood_serology)->uricacid))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->uricacid > 430 && is_numeric(optional($exam_blood_serology)->uricacid))
                            H
                        @endif</span>
                    <input type="hidden" value="URIC ACID: @php
                        echo nl2br($exam_blood_serology->uricacid) . ' - ';
                        if(optional($exam_blood_serology)->uricacid < 140 && is_numeric(optional($exam_blood_serology)->uricacid)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->uricacid > 430 && is_numeric(optional($exam_blood_serology)->uricacid)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->sgot < 0 && is_numeric(optional($exam_blood_serology)->sgot) || optional($exam_blood_serology)->sgot > 40)
                <div class="col-md-6 my-50">
                    <h5><b>SGOT (AST)</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->sgot) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->sgot < 0 && is_numeric(optional($exam_blood_serology)->sgot))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->sgot > 40 && is_numeric(optional($exam_blood_serology)->sgot))
                            H
                        @endif</span>
                    <input type="hidden" value="SGOT (AST): @php
                        echo nl2br($exam_blood_serology->sgot) . ' - ';
                        if(optional($exam_blood_serology)->sgot < 0 && is_numeric(optional($exam_blood_serology)->sgot)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->sgot > 40 && is_numeric(optional($exam_blood_serology)->sgot)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->sgpt < 0 && is_numeric(optional($exam_blood_serology)->sgpt) || optional($exam_blood_serology)->sgpt > 41)
                <div class="col-md-6 my-50">
                    <h5><b>SGPT (ALT)</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->sgpt) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->sgpt < 0 && is_numeric(optional($exam_blood_serology)->sgpt))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->sgpt > 41 && is_numeric(optional($exam_blood_serology)->sgpt))
                            H
                        @endif</span>
                    <input type="hidden" value="SGPT (ALT): @php
                        echo nl2br($exam_blood_serology->sgpt) . ' - ';
                        if(optional($exam_blood_serology)->sgpt < 0 && is_numeric(optional($exam_blood_serology)->sgpt)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->sgpt > 41 && is_numeric(optional($exam_blood_serology)->sgpt)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->ggt < 0 && is_numeric(optional($exam_blood_serology)->ggt) || optional($exam_blood_serology)->ggt > 55)
                <div class="col-md-6 my-50">
                    <h5><b>GGT</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->ggt) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->ggt < 0 && is_numeric(optional($exam_blood_serology)->ggt))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->ggt > 55 && is_numeric(optional($exam_blood_serology)->ggt))
                            H
                        @endif</span>
                    <input type="hidden" value="GGT: @php
                        echo nl2br($exam_blood_serology->ggt) . ' - ';
                        if(optional($exam_blood_serology)->ggt < 0 && is_numeric(optional($exam_blood_serology)->ggt)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->ggt > 55 && is_numeric(optional($exam_blood_serology)->ggt)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->alkphos < 35 && is_numeric(optional($exam_blood_serology)->alkphos) || optional($exam_blood_serology)->alkphos > 129)
                <div class="col-md-6 my-50">
                    <h5><b>ALK. PHOS.</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->alkphos) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->alkphos < 35 && is_numeric(optional($exam_blood_serology)->alkphos))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->alkphos > 129 && is_numeric(optional($exam_blood_serology)->alkphos))
                            H
                        @endif</span>
                    <input type="hidden" value="ALK. PHOS.: @php
                        echo nl2br($exam_blood_serology->alkphos) . ' - ';
                        if(optional($exam_blood_serology)->alkphos < 35 && is_numeric(optional($exam_blood_serology)->alkphos)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->alkphos > 129 && is_numeric(optional($exam_blood_serology)->alkphos)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->ttlbilirubin < 5 && is_numeric(optional($exam_blood_serology)->ttlbilirubin) || optional($exam_blood_serology)->ttlbilirubin > 21)
                <div class="col-md-6 my-50">
                    <h5><b>TOTAL BILIRUBIN</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->ttlbilirubin) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->ttlbilirubin < 5 && is_numeric(optional($exam_blood_serology)->ttlbilirubin))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->ttlbilirubin > 21 && is_numeric(optional($exam_blood_serology)->ttlbilirubin))
                            H
                        @endif</span>
                    <input type="hidden" value="TOTAL BILIRUBIN: @php
                        echo nl2br($exam_blood_serology->ttlbilirubin) . ' - ';
                        if(optional($exam_blood_serology)->ttlbilirubin < 5 && is_numeric(optional($exam_blood_serology)->ttlbilirubin)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->ttlbilirubin > 21 && is_numeric(optional($exam_blood_serology)->ttlbilirubin)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->dirbilirubin < 0 && is_numeric(optional($exam_blood_serology)->dirbilirubin) || optional($exam_blood_serology)->dirbilirubin > 5.1)
                <div class="col-md-6 my-50">
                    <h5><b>DIRECT BILIRUBIN</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->dirbilirubin) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->dirbilirubin < 0 && is_numeric(optional($exam_blood_serology)->dirbilirubin))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->dirbilirubin > 5.1 && is_numeric(optional($exam_blood_serology)->dirbilirubin))
                            H
                        @endif</span>
                    <input type="hidden" value="DIRECT BILIRUBIN: @php
                        echo nl2br($exam_blood_serology->dirbilirubin) . ' - ';
                        if(optional($exam_blood_serology)->dirbilirubin < 0 && is_numeric(optional($exam_blood_serology)->dirbilirubin)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->dirbilirubin > 5.1 && is_numeric(optional($exam_blood_serology)->dirbilirubin)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->indbilirubin < 0 && is_numeric(optional($exam_blood_serology)->indbilirubin) || optional($exam_blood_serology)->indbilirubin > 16)
                <div class="col-md-6 my-50">
                    <h5><b>INDIRECT BILIRUBIN</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->indbilirubin) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->indbilirubin < 0 && is_numeric(optional($exam_blood_serology)->indbilirubin))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->indbilirubin > 16 && is_numeric(optional($exam_blood_serology)->indbilirubin))
                            H
                        @endif</span>
                    <input type="hidden" value="INDIRECT BILIRUBIN: @php
                        echo nl2br($exam_blood_serology->indbilirubin) . ' - ';
                        if(optional($exam_blood_serology)->indbilirubin < 0 && is_numeric(optional($exam_blood_serology)->indbilirubin)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->indbilirubin > 16 && is_numeric(optional($exam_blood_serology)->indbilirubin)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->ttlprotein < 66 && is_numeric(optional($exam_blood_serology)->ttlprotein) || optional($exam_blood_serology)->ttlprotein > 87)
                <div class="col-md-6 my-50">
                    <h5><b>TOTAL PROTEIN</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->ttlprotein) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->ttlprotein < 66 && is_numeric(optional($exam_blood_serology)->ttlprotein))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->ttlprotein > 87 && is_numeric(optional($exam_blood_serology)->ttlprotein))
                            H
                        @endif</span>
                    <input type="hidden" value="TOTAL PROTEIN: @php
                        echo nl2br($exam_blood_serology->ttlprotein) . ' - ';
                        if(optional($exam_blood_serology)->ttlprotein < 66 && is_numeric(optional($exam_blood_serology)->ttlprotein)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->ttlprotein > 87 && is_numeric(optional($exam_blood_serology)->ttlprotein)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->albumin < 35 && is_numeric(optional($exam_blood_serology)->albumin) || optional($exam_blood_serology)->albumin > 52)
                <div class="col-md-6 my-50">
                    <h5><b>ALBUMIN</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->albumin) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->albumin < 35 && is_numeric(optional($exam_blood_serology)->albumin))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->albumin > 52 && is_numeric(optional($exam_blood_serology)->albumin))
                            H
                        @endif</span>
                    <input type="hidden" value="ALBUMIN: @php
                        echo nl2br($exam_blood_serology->albumin) . ' - ';
                        if(optional($exam_blood_serology)->albumin < 35 && is_numeric(optional($exam_blood_serology)->albumin)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->albumin > 52 && is_numeric(optional($exam_blood_serology)->albumin)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->globulin < 31 && is_numeric(optional($exam_blood_serology)->globulin) || optional($exam_blood_serology)->globulin > 35)
                <div class="col-md-6 my-50">
                    <h5><b>GLOBULIN</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->globulin) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->globulin < 31 && is_numeric(optional($exam_blood_serology)->globulin))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->globulin > 35 && is_numeric(optional($exam_blood_serology)->globulin))
                            H
                        @endif</span>
                    <input type="hidden" value="GLOBULIN: @php
                        echo nl2br($exam_blood_serology->globulin) . ' - ';
                        if(optional($exam_blood_serology)->globulin < 31 && is_numeric(optional($exam_blood_serology)->globulin)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->globulin > 35 && is_numeric(optional($exam_blood_serology)->globulin)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->sodium < 135.0 && is_numeric(optional($exam_blood_serology)->sodium) || optional($exam_blood_serology)->sodium > 148)
                <div class="col-md-6 my-50">
                    <h5><b>SODIUM</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->sodium) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->sodium < 135.0 && is_numeric(optional($exam_blood_serology)->sodium))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->sodium > 148 && is_numeric(optional($exam_blood_serology)->sodium))
                            H
                        @endif</span>
                    <input type="hidden" value="SODIUM: @php
                        echo nl2br($exam_blood_serology->sodium) . ' - ';
                        if(optional($exam_blood_serology)->sodium < 135.0 && is_numeric(optional($exam_blood_serology)->sodium)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->sodium > 148 && is_numeric(optional($exam_blood_serology)->sodium)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->potassium < 3.5 && is_numeric(optional($exam_blood_serology)->potassium) || optional($exam_blood_serology)->potassium > 5.3)
                <div class="col-md-6 my-50">
                    <h5><b>POTASSIUM</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->potassium) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->potassium < 3.5 && is_numeric(optional($exam_blood_serology)->potassium))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->potassium > 5.3 && is_numeric(optional($exam_blood_serology)->potassium))
                            H
                        @endif</span>
                    <input type="hidden" value="POTASSIUM: @php
                        echo nl2br($exam_blood_serology->potassium) . ' - ';
                        if(optional($exam_blood_serology)->potassium < 3.5 && is_numeric(optional($exam_blood_serology)->potassium)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->potassium > 5.3 && is_numeric(optional($exam_blood_serology)->potassium)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->chloride < 96.0 && is_numeric(optional($exam_blood_serology)->chloride) || optional($exam_blood_serology)->chloride > 108)
                <div class="col-md-6 my-50">
                    <h5><b>CHLORIDE</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->chloride) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->chloride < 96.0 && is_numeric(optional($exam_blood_serology)->chloride))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->chloride > 108 && is_numeric(optional($exam_blood_serology)->chloride))
                            H
                        @endif</span>
                    <input type="hidden" value="CHLORIDE: @php
                        echo nl2br($exam_blood_serology->chloride) . ' - ';
                        if(optional($exam_blood_serology)->chloride < 96.0 && is_numeric(optional($exam_blood_serology)->chloride)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->chloride > 108 && is_numeric(optional($exam_blood_serology)->chloride)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->calcium < 2.10 && is_numeric(optional($exam_blood_serology)->calcium) || optional($exam_blood_serology)->calcium > 2.90)
                <div class="col-md-6 my-50">
                    <h5><b>CALCIUM</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->calcium) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->calcium < 2.10 && is_numeric(optional($exam_blood_serology)->calcium))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->calcium > 2.90 && is_numeric(optional($exam_blood_serology)->calcium))
                            H
                        @endif</span>
                    <input type="hidden" value="CALCIUM: @php
                        echo nl2br($exam_blood_serology->calcium) . ' - ';
                        if(optional($exam_blood_serology)->calcium < 2.10 && is_numeric(optional($exam_blood_serology)->calcium)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->calcium > 2.90 && is_numeric(optional($exam_blood_serology)->calcium)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if(optional($exam_blood_serology)->ag_ratio < 0.6 && is_numeric(optional($exam_blood_serology)->ag_ratio) || optional($exam_blood_serology)->ag_ratio > 1.7)
                <div class="col-md-6 my-50">
                    <h5><b>A/G RATIO</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->ag_ratio) . ' - '
                        @endphp
                        @if(optional($exam_blood_serology)->ag_ratio < 0.6 && is_numeric(optional($exam_blood_serology)->ag_ratio))
                            L
                        @endif
                        @if(optional($exam_blood_serology)->ag_ratio > 1.7 && is_numeric(optional($exam_blood_serology)->ag_ratio))
                            H
                        @endif</span>
                    <input type="hidden" value="A/G RATIO: @php
                        echo nl2br($exam_blood_serology->ag_ratio) . ' - ';
                        if(optional($exam_blood_serology)->ag_ratio < 0.6 && is_numeric(optional($exam_blood_serology)->ag_ratio)) {
                            echo 'L';
                        }
                        if(optional($exam_blood_serology)->ag_ratio > 1.7 && is_numeric(optional($exam_blood_serology)->ag_ratio)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->hemoglobin < 120 && is_numeric(optional($examlab_hema)->hemoglobin) || optional($examlab_hema)->hemoglobin > 170)
                <div class="col-md-6 my-50">
                    <h5><b>Hemoglobin</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->hemoglobin) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->hemoglobin < 120 && is_numeric(optional($examlab_hema)->hemoglobin))
                            L
                        @endif
                        @if(optional($examlab_hema)->hemoglobin > 170 && is_numeric(optional($examlab_hema)->hemoglobin))
                            H
                        @endif</span>
                    <input type="hidden" value="Hemoglobin: @php
                        echo nl2br($examlab_hema->hemoglobin) . ' - ';
                        if(optional($examlab_hema)->hemoglobin < 120 && is_numeric(optional($examlab_hema)->hemoglobin)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->hemoglobin > 170 && is_numeric(optional($examlab_hema)->hemoglobin)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->hematocrit < 0.40 && is_numeric(optional($examlab_hema)->hematocrit) || optional($examlab_hema)->hematocrit > 0.54)
                <div class="col-md-6 my-50">
                    <h5><b>Hematocrit</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->hematocrit) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->hematocrit < 0.40 && is_numeric(optional($examlab_hema)->hematocrit))
                            L
                        @endif
                        @if(optional($examlab_hema)->hematocrit > 0.54 && is_numeric(optional($examlab_hema)->hematocrit))
                            H
                        @endif</span>
                    <input type="hidden" value="Hematocrit: @php
                        echo nl2br($examlab_hema->hematocrit) . ' - ';
                        if(optional($examlab_hema)->hematocrit < 0.40 && is_numeric(optional($examlab_hema)->hematocrit)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->hematocrit > 0.54 && is_numeric(optional($examlab_hema)->hematocrit)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->rbc < 3.5 && is_numeric(optional($examlab_hema)->rbc) || optional($examlab_hema)->rbc > 5.5)
                <div class="col-md-6 my-50">
                    <h5><b>RBC</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->rbc) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->rbc < 3.5 && is_numeric(optional($examlab_hema)->rbc))
                            L
                        @endif
                        @if(optional($examlab_hema)->rbc > 5.5 && is_numeric(optional($examlab_hema)->rbc))
                            H
                        @endif</span>
                    <input type="hidden" value="RBC: @php
                        echo nl2br($examlab_hema->rbc) . ' - ';
                        if(optional($examlab_hema)->rbc < 3.5 && is_numeric(optional($examlab_hema)->rbc)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->rbc > 5.5 && is_numeric(optional($examlab_hema)->rbc)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->wbc < 5 && is_numeric(optional($examlab_hema)->wbc) || optional($examlab_hema)->wbc > 100)
                <div class="col-md-6 my-50">
                    <h5><b>WBC</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->wbc) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->wbc < 5 && is_numeric(optional($examlab_hema)->wbc))
                            L
                        @endif
                        @if(optional($examlab_hema)->wbc > 100 && is_numeric(optional($examlab_hema)->wbc))
                            H
                        @endif</span>
                    <input type="hidden" value="WBC: @php
                        echo nl2br($examlab_hema->wbc) . ' - ';
                        if(optional($examlab_hema)->wbc < 5 && is_numeric(optional($examlab_hema)->wbc)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->wbc > 100 && is_numeric(optional($examlab_hema)->wbc)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->neuthrophils < 0.50 && is_numeric(optional($examlab_hema)->neuthrophils) || optional($examlab_hema)->neuthrophils > 0.70)
                <div class="col-md-6 my-50">
                    <h5><b>Neutrophil</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->neuthrophils) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->neuthrophils < 0.50 && is_numeric(optional($examlab_hema)->neuthrophils))
                            L
                        @endif
                        @if(optional($examlab_hema)->neuthrophils > 0.70 && is_numeric(optional($examlab_hema)->neuthrophils))
                            H
                        @endif</span>
                    <input type="hidden" value="Neutrophil: @php echo nl2br($examlab_hema->neuthrophils) . ' - ';
                        if(optional($examlab_hema)->neuthrophils < 0.50 && is_numeric(optional($examlab_hema)->neuthrophils)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->neuthrophils > 0.70 && is_numeric(optional($examlab_hema)->neuthrophils)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->lymphocytes < 0.20 && is_numeric(optional($examlab_hema)->lymphocytes) || optional($examlab_hema)->lymphocytes > 0.40)
                <div class="col-md-6 my-50">
                    <h5><b>Lymphocyte</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->lymphocytes) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->lymphocytes < 0.20 && is_numeric(optional($examlab_hema)->lymphocytes))
                            L
                        @endif
                        @if(optional($examlab_hema)->lymphocytes > 0.40 && is_numeric(optional($examlab_hema)->lymphocytes))
                            H
                        @endif</span>
                    <input type="hidden" value="Lymphocyte: @php
                        echo nl2br($examlab_hema->lymphocytes) . ' - ';
                        if(optional($examlab_hema)->lymphocytes < 0.20 && is_numeric(optional($examlab_hema)->lymphocytes)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->lymphocytes > 0.40 && is_numeric(optional($examlab_hema)->lymphocytes)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->eosinophils < 0.00 && is_numeric(optional($examlab_hema)->eosinophils) || optional($examlab_hema)->eosinophils > 0.05)
                <div class="col-md-6 my-50">
                    <h5><b>Eosinophil</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->eosinophils) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->eosinophils < 0.00 && is_numeric(optional($examlab_hema)->eosinophils))
                            L
                        @endif
                        @if(optional($examlab_hema)->eosinophils > 0.05 && is_numeric(optional($examlab_hema)->eosinophils))
                            H
                        @endif</span>
                    <input type="hidden" value="Eosinophil: @php
                        echo nl2br($examlab_hema->eosinophils) . ' - ';
                        if(optional($examlab_hema)->eosinophils < 0.00 && is_numeric(optional($examlab_hema)->eosinophils)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->eosinophils > 0.05 && is_numeric(optional($examlab_hema)->eosinophils)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->monophils < 0.00 && is_numeric(optional($examlab_hema)->monophils) || optional($examlab_hema)->monophils > 0.10)
                <div class="col-md-6 my-50">
                    <h5><b>Monocyte</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->monophils) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->monophils < 0.00 && is_numeric(optional($examlab_hema)->monophils))
                            L
                        @endif
                        @if(optional($examlab_hema)->monophils > 0.10 && is_numeric(optional($examlab_hema)->monophils))
                            H
                        @endif</span>
                    <input type="hidden" value="Monocyte: @php
                        echo nl2br($examlab_hema->monophils) . ' - ';
                        if(optional($examlab_hema)->monophils < 0.00 && is_numeric(optional($examlab_hema)->monophils)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->monophils > 0.10 && is_numeric(optional($examlab_hema)->monophils)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->baspophils < 0.00 && is_numeric(optional($examlab_hema)->baspophils) || optional($examlab_hema)->baspophils > 0.01)
                <div class="col-md-6 my-50">
                    <h5><b>Basophil</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->baspophils) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->baspophils < 0.00 && is_numeric(optional($examlab_hema)->baspophils))
                            L
                        @endif
                        @if(optional($examlab_hema)->baspophils > 0.01 && is_numeric(optional($examlab_hema)->baspophils))
                            H
                        @endif</span>
                    <input type="hidden" value="Basophil: @php
                        echo nl2br($examlab_hema->baspophils) . ' - ';
                        if(optional($examlab_hema)->baspophils < 0.00 && is_numeric(optional($examlab_hema)->baspophils)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->baspophils > 0.01 && is_numeric(optional($examlab_hema)->baspophils)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->platelet < 150 && is_numeric(optional($examlab_hema)->platelet) || optional($examlab_hema)->platelet > 450)
                <div class="col-md-6 my-50">
                    <h5><b>Platelet</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->platelet) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->platelet < 150 && is_numeric(optional($examlab_hema)->platelet))
                            L
                        @endif
                        @if(optional($examlab_hema)->platelet > 450 && is_numeric(optional($examlab_hema)->platelet))
                            H
                        @endif</span>
                    <input type="hidden" value="Platelet: @php
                        echo nl2br($examlab_hema->platelet) . ' - ';
                        if(optional($examlab_hema)->platelet < 150 && is_numeric(optional($examlab_hema)->platelet)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->platelet > 450 && is_numeric(optional($examlab_hema)->platelet)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->bleeding < 1 && is_numeric(optional($examlab_hema)->bleeding) || optional($examlab_hema)->bleeding > 7)
                <div class="col-md-6 my-50">
                    <h5><b>Bleeding Time</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->bleeding) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->bleeding < 1 && is_numeric(optional($examlab_hema)->bleeding))
                            L
                        @endif
                        @if(optional($examlab_hema)->bleeding > 7 && is_numeric(optional($examlab_hema)->bleeding))
                            H
                        @endif</span>
                    <input type="hidden" value="Bleeding Time: @php
                        echo nl2br($examlab_hema->bleeding) . ' - ';
                        if(optional($examlab_hema)->bleeding < 1 && is_numeric(optional($examlab_hema)->bleeding)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->bleeding > 7 && is_numeric(optional($examlab_hema)->bleeding)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->clotting < 5 && is_numeric(optional($examlab_hema)->clotting) || optional($examlab_hema)->clotting > 15)
                <div class="col-md-6 my-50">
                    <h5><b>Clotting Time</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->clotting) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->clotting < 5 && is_numeric(optional($examlab_hema)->clotting))
                            L
                        @endif
                        @if(optional($examlab_hema)->clotting > 15 && is_numeric(optional($examlab_hema)->clotting))
                            H
                        @endif</span>
                    <input type="hidden" value="Clotting Time: @php
                        echo nl2br($examlab_hema->clotting) . ' - ';
                        if(optional($examlab_hema)->clotting < 5 && is_numeric(optional($examlab_hema)->clotting)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->clotting > 15 && is_numeric(optional($examlab_hema)->clotting)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->esr < 0 && is_numeric(optional($examlab_hema)->esr) || optional($examlab_hema)->esr > 10)
                <div class="col-md-6 my-50">
                    <h5><b>ESR</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->esr) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->esr < 0 && is_numeric(optional($examlab_hema)->esr))
                            L
                        @endif
                        @if(optional($examlab_hema)->esr > 10 && is_numeric(optional($examlab_hema)->esr))
                            H
                        @endif</span>
                    <input type="hidden" value="ESR: @php
                        echo nl2br($examlab_hema->esr) . ' - ';
                        if(optional($examlab_hema)->esr < 0 && is_numeric(optional($examlab_hema)->esr)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->esr > 10 && is_numeric(optional($examlab_hema)->esr)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->mcv < 80 && is_numeric(optional($examlab_hema)->mcv) || optional($examlab_hema)->mcv > 100)
                <div class="col-md-6 my-50">
                    <h5><b>MCV</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->mcv) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->mcv < 80 && is_numeric(optional($examlab_hema)->mcv))
                            L
                        @endif
                        @if(optional($examlab_hema)->mcv > 100 && is_numeric(optional($examlab_hema)->mcv))
                            H
                        @endif</span>
                    <input type="hidden" value="MCV: @php
                        echo nl2br($examlab_hema->mcv) . ' - ';
                        if(optional($examlab_hema)->mcv < 80 && is_numeric(optional($examlab_hema)->mcv)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->mcv > 100 && is_numeric(optional($examlab_hema)->mcv)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->mch < 27 && is_numeric(optional($examlab_hema)->mch) || optional($examlab_hema)->mch > 34)
                <div class="col-md-6 my-50">
                    <h5><b>MCH</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->mch) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->mch < 27 && is_numeric(optional($examlab_hema)->mch))
                            L
                        @endif
                        @if(optional($examlab_hema)->mch > 34 && is_numeric(optional($examlab_hema)->mch))
                            H
                        @endif</span>
                    <input type="hidden" value="MCH: @php
                        echo nl2br($examlab_hema->mch) . ' - ';
                        if(optional($examlab_hema)->mch < 27 && is_numeric(optional($examlab_hema)->mch)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->mch > 34 && is_numeric(optional($examlab_hema)->mch)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if(optional($examlab_hema)->mchc < 320 && is_numeric(optional($examlab_hema)->mchc) || optional($examlab_hema)->mchc > 360)
                <div class="col-md-6 my-50">
                    <h5><b>MCHC</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->mchc) . ' - '
                        @endphp
                        @if(optional($examlab_hema)->mchc < 320 && is_numeric(optional($examlab_hema)->mchc))
                            L
                        @endif
                        @if(optional($examlab_hema)->mchc > 360 && is_numeric(optional($examlab_hema)->mchc))
                            H
                        @endif</span>
                    <input type="hidden" value="MCHC: @php
                        echo nl2br($examlab_hema->mchc) . ' - ';
                        if(optional($examlab_hema)->mchc < 320 && is_numeric(optional($examlab_hema)->mchc)) {
                            echo 'L';
                        }
                        if(optional($examlab_hema)->mchc > 360 && is_numeric(optional($examlab_hema)->mchc)) {
                            echo 'H';
                        }
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->vdrl_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>VDRL</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->vdrl_result) @endphp
                    </span>
                    <input type="hidden" value="VDRL: @php
                        echo nl2br($examlab_hepa->vdrl_result);
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->tpha_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>TPHA</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->tpha_result) @endphp
                    </span>
                    <input type="hidden" value="TPHA: @php
                        echo nl2br($examlab_hepa->tpha_result);
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->hbsag_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>HBSAG</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->hbsag_result) @endphp
                    </span>
                    <input type="hidden" value="HBSAG: @php
                        echo nl2br($examlab_hepa->hbsag_result);
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->antihbs_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>Anti-HBs</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->antihbs_result) @endphp
                    </span>
                    <input type="hidden" value="Anti-HBs: @php
                        echo nl2br($examlab_hepa->antihbs_result);
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->hbeag_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>HBeAg</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->hbeag_result) @endphp
                    </span>
                    <input type="hidden" value="HBeAg: @php
                        echo nl2br($examlab_hepa->hbeag_result);
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->antihbe_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>Anti-HBe</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->antihbe_result) @endphp
                    </span>
                    <input type="hidden" value="Anti-HBe: @php
                        echo nl2br($examlab_hepa->antihbe_result);
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->antihbclgm_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>Anti-HBc (lgM)</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->antihbclgm_result) @endphp
                    </span>
                    <input type="hidden" value="Anti-HBc (lgM): @php
                        echo nl2br($examlab_hepa->antihbclgm_result);
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->antihbclgg_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>Anti-HBc (lgG)</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->antihbclgg_result) @endphp
                    </span>
                    <input type="hidden" value="Anti-HBc (lgG): @php
                        echo nl2br($examlab_hepa->antihbclgg_result);
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->antihavlgm_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>Anti-HAV (lgM)</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->antihavlgm_result) @endphp
                    </span>
                    <input type="hidden" value="Anti-HAV (lgM): @php
                        echo nl2br($examlab_hepa->antihavlgm_result);
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($examlab_hepa)
            @if($examlab_hepa->antihavlgg_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>Anti-HAV (lgG)</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->antihavlgg_result) @endphp
                    </span>
                    <input type="hidden" value="Anti-HAV (lgG): @php
                        echo nl2br($examlab_hepa->antihavlgg_result);
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif
        @if($examlab_hepa)
            @if($examlab_hepa->antihcv_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>Anti-HCV</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->antihcv_result) @endphp
                    </span>
                    <input type="hidden" value="Anti-HCV: @php
                        echo nl2br($examlab_hepa->antihcv_result);
                    @endphp" name="findings[]" />
                </div>
            @endif
        @endif
    </div>
</div>
