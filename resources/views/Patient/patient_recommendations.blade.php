<div class="container border p-1">
    <h3 class="font-weight-bold">Current Recommendations</h3>
    <div class="row my-1">
        <div class="col-md-6">
            <h4>Basic & Special Exams</h4>
            @if ($exam_physical)
                @if($exam_physical->remarks_status == 'findings' && $exam_physical->recommendations)
                <div class="my-75">
                    <h5><b>PE</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_physical->recommendations)@endphp</span>
                    <input type="hidden" value="PE: @php echo nl2br($exam_physical->recommendations) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif
            @if ($exam_physical)
                @if($exam_physical->vital_sign_recommendation)
                    <div class="my-75">
                        <h5><b>Vital Sign</b></h5>
                        <span style="font-size: 12px;">@php echo nl2br($exam_physical->vital_sign_recommendation) @endphp</span>
                        <input type="hidden" value="Vital Sign: @php echo nl2br($exam_physical->vital_sign_recommendation) @endphp" name="recommendation[]" />
                    </div>
                @endif
            @endif
            @if ($exam_physical)
                @if($exam_physical->pe1_recommendation)
                    <div class="my-75">
                        <h5><b>PE-1</b></h5>
                        <span style="font-size: 12px;">@php echo nl2br($exam_physical->pe1_recommendation)@endphp</span>
                        <input type="hidden" value="PE-1: @php echo nl2br($exam_physical->pe1_recommendation) @endphp" name="recommendation[]" />
                    </div>
                @endif
            @endif
            @if ($exam_visacuity)
                @if($exam_visacuity->remarks_status == 'findings' && $exam_visacuity->recommendation)
                <div class="my-75">
                    <h5><b>Visual Acuity</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_visacuity->recommendation) @endphp</span>
                    <input type="hidden" value="Visual Acuity: @php echo nl2br($exam_visacuity->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif
            @if ($exam_dental)
                @if($exam_dental->remarks_status == 'findings' && $exam_dental->recommendation)
                <div class="my-75">
                    <h5><b>Dental</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_dental->recommendation) @endphp</span>
                    <input type="hidden" value="Dental: @php echo nl2br($exam_dental->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif
            @if ($exam_psycho)
                @if($exam_psycho->remarks_status == 'findings' && $exam_psycho->recommendation)
                <div class="my-75">
                    <h5><b>Psychological</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($exam_psycho->recommendation) @endphp</span>
                    <input type="hidden" value="Psychological: @php echo nl2br($exam_psycho->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif
            @if ($exam_audio)
                @if($exam_audio->remarks_status == 'findings' && $exam_audio->recommendation)
                <div class="my-75">
                    <h5><b>Audiometry</b></h5>
                    <span style="font-size: 12px; ">@php echo nl2br($exam_audio->recommendation) @endphp</span>
                    <input type="hidden" value="Audiometry: @php echo nl2br($exam_audio->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif
            @if ($exam_ishihara)
                @if($exam_ishihara->remarks_status == 'findings' && $exam_ishihara->recommendation)
                <div class="my-75">
                    <h5><b>Ishihara</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_ishihara->recommendation) @endphp</span>
                    <input type="hidden" value="Ishihara: @php echo nl2br($exam_ishihara->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif
            @if ($exam_ecg)
                @if($exam_ecg->ecg == 'Significant Findings' && $exam_ecg->recommendation)
                <div class="my-75">
                    <h5><b>ECG</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($exam_ecg->recommendation) @endphp</span>
                </div>
                @endif
            @endif

            @if ($exam_xray)
                @if($exam_xray->remarks_status == 'findings' && $exam_xray->recommendation)
                <div class="my-75">
                    <h5><b>X Ray</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($exam_xray->recommendation) @endphp</span>
                    <input type="hidden" value="X Ray: @php echo nl2br($exam_xray->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif

            @if ($exam_crf)
                @if($exam_crf->remarks_status == 'findings' && $exam_crf->recommendation)
                <div class="my-75">
                    <h5><b>Cardiac Risk Factor</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($exam_crf->recommendation)
                        @endphp</span>
                    <input type="hidden" value="Cardiac Risk Factor: @php echo nl2br($exam_crf->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif

            @if ($exam_cardio)
                @if($exam_cardio->remarks_status == 'findings' && $exam_cardio->recommendation)
                <div class="my-75">
                    <h5><b>Cardiovascular</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_cardio->recommendation) @endphp</span>
                    <input type="hidden" value="Cardiovascular: @php echo nl2br($exam_cardio->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif

            @if ($exam_stresstest)
                @if($exam_stresstest->remarks_status == 'findings' && $exam_stresstest->recommendation)
                <div class="my-75">
                    <h5><b>Stress Test</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_stresstest->recommendation) @endphp</span>
                    <input type="hidden" value="Stress Test: @php echo nl2br($exam_stresstest->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif

            @if ($exam_echoplain)
                @if($exam_echoplain->remarks_status == 'findings' && $exam_echoplain->recommendation)
                <div class="my-75">
                    <h5><b>2D Echo Plain</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_echoplain->recommendation) @endphp</span>
                    <input type="hidden" value="2D Echo Plain: @php echo nl2br($exam_echoplain->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif

            @if ($exam_ppd)
                @if($exam_ppd->remarks_status == 'findings' && $exam_ppd->recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>PPD</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_ppd->recommendation) @endphp</span>
                    <input type="hidden" value="PPD: @php echo nl2br($exam_ppd->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif

            @if ($exam_stressecho)
                @if($exam_stressecho->remarks_status == 'findings' && $exam_stressecho->recommendation)
                <div class="my-75">
                    <h5><b>Stress Echo</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($exam_stressecho->recommendation) @endphp</span>
                    <input type="hidden" value="Stress Echo: @php echo nl2br($exam_stressecho->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif

            @if ($exam_ultrasound)
                @if($exam_ultrasound->kub_exam_status == 'findings' && $exam_ultrasound->kub_exam_recommendation)
                    <div class="col-md-6 my-50">
                        <h5><b>KUB Exam: </b></h5>
                        <span style="font-size: 12px;"><?php echo nl2br($exam_ultrasound->kub_exam_recommendation) ?></span>
                        <input type="hidden" value="KUB Exam: <?php echo nl2br($exam_ultrasound->kub_exam_recommendation) ?>" name="recommendation[]" />
                    </div>
                @endif
            @endif

            @if ($exam_ultrasound)
                @if($exam_ultrasound->hbt_exam_status == 'findings' && $exam_ultrasound->hbt_exam_recommendation)
                    <div class="col-md-6 my-50">
                        <h5><b>HBT Exam: </b></h5>
                        <span style="font-size: 12px;"><?php echo nl2br($exam_ultrasound->hbt_exam_recommendation) ?></span>
                        <input type="hidden" value="HBT Exam: <?php echo nl2br($exam_ultrasound->hbt_exam_recommendation) ?>" name="recommendation[]" />
                    </div>
                @endif
            @endif

            @if ($exam_ultrasound)
                @if($exam_ultrasound->thyroid_exam_status == 'findings' && $exam_ultrasound->thyroid_exam_recommendation)
                    <div class="col-md-6 my-50">
                        <h5><b>THYROID Exam: </b></h5>
                        <span style="font-size: 12px;"><?php echo nl2br($exam_ultrasound->thyroid_exam_recommendation) ?></span>
                        <input type="hidden" value="THYROID Exam: <?php echo nl2br($exam_ultrasound->thyroid_exam_recommendation) ?>" name="recommendation[]" />
                    </div>
                @endif
            @endif
            @if ($exam_ultrasound)
                @if($exam_ultrasound->breast_exam_status == 'findings' && $exam_ultrasound->breast_exam_recommendation)
                    <div class="col-md-6 my-50">
                        <h5><b>BREAST Exam: </b></h5>
                        <span style="font-size: 12px;"><?php echo nl2br($exam_ultrasound->breast_exam_recommendation) ?></span>
                        <input type="hidden" value="BREAST Exam: <?php echo nl2br($exam_ultrasound->breast_exam_recommendation) ?>" name="recommendation[]" />
                    </div>
                @endif
            @endif
            @if ($exam_ultrasound)
                @if($exam_ultrasound->whole_abdomen_status == 'findings' && $exam_ultrasound->whole_abdomen_recommendation)
                    <div class="col-md-6 my-50">
                        <h5><b>WHOLE ABDOMEN Exam: </b></h5>
                        <span style="font-size: 12px;"><?php echo nl2br($exam_ultrasound->whole_abdomen_recommendation) ?></span>
                        <input type="hidden" value="WHOLE ABDOMEN Exam: <?php echo nl2br($exam_ultrasound->whole_abdomen_recommendation) ?>" name="recommendation[]" />
                    </div>
                @endif
            @endif
            @if ($exam_ultrasound)
                @if($exam_ultrasound->genitals_exam_status == 'findings' && $exam_ultrasound->genitals_exam_recommendation)
                    <div class="col-md-6 my-50">
                        <h5><b>GENITALS Exam: </b></h5>
                        <span style="font-size: 12px;"><?php echo nl2br($exam_ultrasound->genitals_exam_recommendation) ?></span>
                        <input type="hidden" value="GENITALS Exam: <?php echo nl2br($exam_ultrasound->genitals_exam_recommendation) ?>" name="recommendation[]" />
                    </div>
                @endif
            @endif
        </div>
        <div class="col-md-6">
            <h4>Lab Exams</h4>
            @if ($examlab_hema)
                @if($examlab_hema->remarks_status == 'findings' && $examlab_hema->recommendation)
                <div class="my-75">
                    <h5><b>Hematology</b></h5>
                    <span style="font-size: 12px;">@php echo nl2br($examlab_hema->recommendation) @endphp</span>
                    <input type="hidden" value="Hematology: @php echo nl2br($examlab_hema->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif
            @if ($examlab_urin)
                @if($examlab_urin->remarks_status == 'findings' && $examlab_urin->recommendation)
                <div class="my-75">
                    <h5><b>Urinalysis</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($examlab_urin->recommendation) @endphp</span>
                    <input type="hidden" value="Urinalysis: @php echo nl2br($examlab_urin->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif
            @if ($examlab_feca)
                @if($examlab_feca->remarks_status == 'findings' && $examlab_feca->recommendation)
                <div class="my-75">
                    <h5><b>Fecalysis</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($examlab_feca->recommendation) @endphp</span>
                    <input type="hidden" value="Fecalysis: @php echo nl2br($examlab_feca->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif
            @if ($examlab_hepa)
                @if($examlab_hepa->remarks_status == 'findings' && $examlab_hepa->recommendation)
                <div class="my-75">
                    <h5><b>Hepatitis</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($examlab_hepa->recommendation) @endphp</span>
                    <input type="hidden" value="Hepatitis: @php echo nl2br($examlab_hepa->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif
            @if ($examlab_hiv)
                @if($examlab_hiv->remarks_status == 'findings' && $examlab_hiv->recommendation)
                <div class="my-75">
                    <h5><b>HIV</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($examlab_hiv->recommendation) @endphp</span>
                    <input type="hidden" value="HIV: @php echo nl2br($examlab_hiv->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif
            @if ($examlab_drug)
                @if($examlab_drug->remarks_status == 'findings' && $examlab_drug->recommendation)
                <div class="my-75">
                    <h5><b>Drug Test</b></h5>
                    <span style="font-size: 12px;">@php echo
                        nl2br($examlab_drug->recommendation) @endphp</span>
                    <input type="hidden" value="Drug Test: @php echo nl2br($examlab_drug->recommendation) @endphp" name="recommendation[]" />
                </div>
                @endif
            @endif
        </div>

        @if($exam_blood_serology)
            @if($exam_blood_serology->fbs_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>FBS</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->fbs_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="FBS: @php
                        echo nl2br($exam_blood_serology->fbs_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->bun_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>BUN</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->bun_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="BUN: @php
                        echo nl2br($exam_blood_serology->bun_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->creatinine_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>CREATININE</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->creatinine_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="CREATININE: @php
                        echo nl2br($exam_blood_serology->creatinine_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->cholesterol_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>CHOLESTEROL</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->cholesterol_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="CHOLESTEROL: @php
                        echo nl2br($exam_blood_serology->cholesterol_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->triglycerides_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>TRIGLYCERIDES</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->triglycerides_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="TRIGLYCERIDES: @php
                        echo nl2br($exam_blood_serology->triglycerides_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->hdl_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>HDL Chole</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->hdl_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="HDL Chole: @php
                        echo nl2br($exam_blood_serology->hdl_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->ldl_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>LDL Chole</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->ldl_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="LDL Chole: @php
                        echo nl2br($exam_blood_serology->ldl_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->vldl_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>VLDL Chole</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->vldl_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="VLDL Chole: @php
                        echo nl2br($exam_blood_serology->vldl_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->uricacid_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>URIC ACID</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->uricacid_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="URIC ACID: @php
                        echo nl2br($exam_blood_serology->uricacid_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->sgot_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>SGOT (AST)</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->sgot_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="SGOT (AST): @php
                        echo nl2br($exam_blood_serology->sgot_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->sgpt_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>SGPT (ALT)</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->sgpt_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="SGPT (ALT): @php
                        echo nl2br($exam_blood_serology->sgpt_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->ggt_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>GGT</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->ggt_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="GGT: @php
                        echo nl2br($exam_blood_serology->ggt_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->alkphos_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>ALK. PHOS.</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->alkphos_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="ALK. PHOS.: @php
                        echo nl2br($exam_blood_serology->alkphos_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->ttlbilirubin_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>TOTAL BILIRUBIN</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->ttlbilirubin_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="TOTAL BILIRUBIN: @php
                        echo nl2br($exam_blood_serology->ttlbilirubin_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->dirbilirubin_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>DIRECT BILIRUBIN</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->dirbilirubin_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="DIRECT BILIRUBIN: @php
                        echo nl2br($exam_blood_serology->dirbilirubin_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->indbilirubin_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>INDIRECT BILIRUBIN</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->indbilirubin_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="INDIRECT BILIRUBIN: @php
                        echo nl2br($exam_blood_serology->indbilirubin_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->ttlprotein_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>TOTAL PROTEIN</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->ttlprotein_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="TOTAL PROTEIN: @php
                        echo nl2br($exam_blood_serology->ttlprotein_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->albumin_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>ALBUMIN</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->albumin_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="ALBUMIN: @php
                        echo nl2br($exam_blood_serology->albumin_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->globulin_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>GLOBULIN</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->globulin_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="GLOBULIN: @php
                        echo nl2br($exam_blood_serology->globulin_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->sodium_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>SODIUM</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->sodium_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="SODIUM: @php
                        echo nl2br($exam_blood_serology->sodium_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->potassium_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>POTASSIUM</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->potassium_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="POTASSIUM: @php
                        echo nl2br($exam_blood_serology->potassium_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->chloride_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>CHLORIDE</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->chloride_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="CHLORIDE: @php
                        echo nl2br($exam_blood_serology->chloride_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->calcium_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>CALCIUM</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->calcium_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="CALCIUM: @php
                        echo nl2br($exam_blood_serology->calcium_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($exam_blood_serology)
            @if($exam_blood_serology->ag_ratio_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>A/G RATIO</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($exam_blood_serology->ag_ratio_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="A/G RATIO: @php
                        echo nl2br($exam_blood_serology->ag_ratio_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->hemoglobin_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>Hemoglobin</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->hemoglobin_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="Hemoglobin: @php
                        echo nl2br($examlab_hema->hemoglobin_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->hematocrit_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>Hematocrit</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->hematocrit_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="Hematocrit: @php
                        echo nl2br($examlab_hema->hematocrit_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->rbc_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>RBC</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->rbc_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="RBC: @php
                        echo nl2br($examlab_hema->rbc_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->wbc_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>WBC</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->wbc_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="WBC: @php
                        echo nl2br($examlab_hema->wbc_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->neuthrophils_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>Neutrophil</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->neuthrophils_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="Neutrophil: @php
                        echo nl2br($examlab_hema->neuthrophils_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->lymphocytes_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>Lymphocyte</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->lymphocytes_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="Lymphocyte: @php
                        echo nl2br($examlab_hema->lymphocytes_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->eosinophils_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>Eosinophil</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->eosinophils_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="Eosinophil: @php
                        echo nl2br($examlab_hema->eosinophils_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->monophils_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>Monocyte</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->monophils_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="Monocyte: @php
                        echo nl2br($examlab_hema->monophils_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->platelet_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>Platelet</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->platelet_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="Platelet: @php
                        echo nl2br($examlab_hema->platelet_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->bleeding_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>Bleeding Time</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->bleeding_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="Bleeding Time: @php
                        echo nl2br($examlab_hema->bleeding_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->baspophils_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>Basophil</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->baspophils_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="Basophil: @php
                        echo nl2br($examlab_hema->baspophils_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->clotting_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>Clotting Time</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->clotting_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="Clotting Time: @php
                        echo nl2br($examlab_hema->clotting_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->esr_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>ESR</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->esr_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="ESR: @php
                        echo nl2br($examlab_hema->esr_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->mcv_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>MCV</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->mcv_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="MCV: @php
                        echo nl2br($examlab_hema->mcv_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->mch_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>MCH</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->mch_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="MCH: @php
                        echo nl2br($examlab_hema->mch_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hema)
            @if($examlab_hema->mchc_recommendation)
                <div class="col-md-6 my-50">
                    <h5><b>MCHC</b></h5>
                    <span style="font-size: 12px;">
                        @php
                            echo nl2br($examlab_hema->mchc_recommendation)
                        @endphp
                    </span>
                    <input type="hidden" value="MCHC: @php
                        echo nl2br($examlab_hema->mchc_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->vdrl_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>VDRL</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->vdrl_recommendation) @endphp
                    </span>
                    <input type="hidden" value="VDRL: @php
                        echo nl2br($examlab_hepa->vdrl_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->tpha_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>TPHA</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->tpha_recommendation) @endphp
                    </span>
                    <input type="hidden" value="TPHA: @php
                        echo nl2br($examlab_hepa->tpha_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->hbsag_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>HBSAG</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->hbsag_recommendation) @endphp
                    </span>
                    <input type="hidden" value="HBSAG: @php
                        echo nl2br($examlab_hepa->hbsag_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->antihbs_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>Anti-HBs</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->antihbs_recommendation) @endphp
                    </span>
                    <input type="hidden" value="Anti-HBs: @php
                        echo nl2br($examlab_hepa->antihbs_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->hbeag_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>HBeAg</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->hbeag_recommendation) @endphp
                    </span>
                    <input type="hidden" value="HBeAg: @php
                        echo nl2br($examlab_hepa->hbeag_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->antihbe_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>Anti-HBe</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->antihbe_recommendation) @endphp
                    </span>
                    <input type="hidden" value="Anti-HBe: @php
                        echo nl2br($examlab_hepa->antihbe_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->antihbclgm_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>Anti-HBc (lgM)</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->antihbclgm_recommendation) @endphp
                    </span>
                    <input type="hidden" value="Anti-HBc (lgM): @php
                        echo nl2br($examlab_hepa->antihbclgm_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->antihbclgg_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>Anti-HBc (lgG)</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->antihbclgg_recommendation) @endphp
                    </span>
                    <input type="hidden" value="Anti-HBc (lgG): @php
                        echo nl2br($examlab_hepa->antihbclgg_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->antihavlgm_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>Anti-HAV (lgM)</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->antihavlgm_recommendation) @endphp
                    </span>
                    <input type="hidden" value="Anti-HAV (lgM): @php
                        echo nl2br($examlab_hepa->antihavlgm_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->antihavlgg_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>Anti-HAV (lgG)</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->antihavlgg_recommendation) @endphp
                    </span>
                    <input type="hidden" value="Anti-HAV (lgG): @php
                        echo nl2br($examlab_hepa->antihavlgg_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif

        @if($examlab_hepa)
            @if($examlab_hepa->antihcv_result == 'Reactive')
                <div class="col-md-6 my-50">
                    <h5><b>Anti-HCV</b></h5>
                    <span style="font-size: 12px;">
                        @php echo nl2br($examlab_hepa->antihcv_recommendation) @endphp
                    </span>
                    <input type="hidden" value="Anti-HCV: @php
                        echo nl2br($examlab_hepa->antihcv_recommendation);
                    @endphp" name="recommendation[]" />
                </div>
            @endif
        @endif
    </div>
</div>
