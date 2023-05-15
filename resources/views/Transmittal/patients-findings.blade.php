@if($patient->exam_audio)
   @if($patient->exam_audio->remarks_status == "findings")
       <b>Audiometry :</b> {{$patient->exam_audio->remarks}} <br>
   @endif
@endif
@if($patient->exam_ecg)
   @if($patient->exam_ecg->ecg == "Significant Findings")
       <b>ECG :</b> {{$patient->exam_ecg->remarks}} <br>
   @endif
@endif
@if($patient->exam_visacuity)
   @if($patient->exam_visacuity->remarks_status == "findings")
       <b>Visual Acuity :</b> {{$patient->exam_visacuity->remarks}} <br>
   @endif
@endif
@if($patient->exam_crf)
   @if($patient->exam_crf->remarks_status == "findings")
       <b>CRF :</b> {{$patient->exam_crf->remarks}} <br>
   @endif
@endif
@if($patient->exam_cardio)
   @if($patient->exam_cardio->remarks_status == "findings")
       <b>Cardiovascular :</b> {{$patient->exam_cardio->remarks}} <br>
   @endif
@endif
@if($patient->exam_dental)
   @if($patient->exam_dental->remarks_status == "findings")
       <b>Dental :</b> {{$patient->exam_dental->remarks}} <br>
   @endif
@endif
@if($patient->exam_drug)
   @if($patient->exam_drug->remarks_status == "findings")
       <b>Drug Test :</b> {{$patient->exam_drug->remarks}} <br>
   @endif
@endif
@if($patient->exam_echodoppler)
   @if($patient->exam_echodoppler->remarks_status == "findings")
       <b>Echo Doppler :</b> {{$patient->exam_echodoppler->remarks}} <br>
   @endif
@endif
@if($patient->exam_echoplain)
   @if($patient->exam_echoplain->remarks_status == "findings")
       <b>Echo Plain :</b> {{$patient->exam_echoplain->remarks}} <br>
   @endif
@endif
@if($patient->exam_feca)
   @if($patient->exam_feca->remarks_status == "findings")
       <b>Fecalysis :</b> {{$patient->exam_feca->remarks}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->remarks_status == "findings")
       <b>Hematology :</b> {{$patient->exam_hema->remarks}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->remarks_status == "findings")
       <b>Hepatitis :</b> {{$patient->exam_hepa->remarks}} <br>
   @endif
@endif
@if($patient->exam_hiv)
   @if($patient->exam_hiv->remarks_status == "findings")
       <b>HIV :</b> {{$patient->exam_hiv->remarks}} <br>
   @endif
@endif
@if($patient->exam_ishihara)
   @if($patient->exam_ishihara->remarks_status == "findings")
       <b>Ishihara :</b> {{$patient->exam_ishihara->remarks}} <br>
   @endif
@endif
@if($patient->exam_misc)
   @if($patient->exam_misc->remarks_status == "findings")
       <b>MISC :</b> {{$patient->exam_misc->remarks}} <br>
   @endif
@endif
@if($patient->exam_psychobpi)
   @if($patient->exam_psychobpi->remarks_status == "findings")
       <b>Psycho BPI :</b> {{$patient->exam_psychobpi->remarks}} <br>
   @endif
@endif
@if($patient->exam_psycho)
   @if($patient->exam_psycho->remarks_status == "findings")
       <b>Psychological :</b> {{$patient->exam_psycho->remarks}} <br>
   @endif
@endif
@if($patient->exam_stressecho)
   @if($patient->exam_stressecho->remarks_status == "findings")
       <b>Stress Echo :</b> {{$patient->exam_stressecho->remarks}} <br>
   @endif
@endif
@if($patient->exam_stresstest)
   @if($patient->exam_stresstest->remarks_status == "findings")
       <b>Stress Test :</b> {{$patient->exam_stresstest->remarks}} <br>
   @endif
@endif

@if($patient->exam_ultrasound)
   @if($patient->exam_ultrasound->kub_exam_status == "findings")
       <b>KUB Ultrasound :</b> {{$patient->exam_ultrasound->kub_exam_findings}} <br>
   @endif
@endif

@if($patient->exam_ultrasound)
   @if($patient->exam_ultrasound->hbt_exam_status == "findings")
       <b>HBT Ultrasound :</b> {{$patient->exam_ultrasound->hbt_exam_findings}} <br>
   @endif
@endif

@if($patient->exam_ultrasound)
   @if($patient->exam_ultrasound->thyroid_exam_status == "findings")
       <b>THYROID Ultrasound :</b> {{$patient->exam_ultrasound->thyroid_exam_findings}} <br>
   @endif
@endif

@if($patient->exam_ultrasound)
   @if($patient->exam_ultrasound->breast_exam_status == "findings")
       <b>BREAST Ultrasound :</b> {{$patient->exam_ultrasound->breast_exam_findings}} <br>
   @endif
@endif

@if($patient->exam_xray)
   @if($patient->exam_xray->remarks_status == "findings")
       <b>Xray :</b> {{$patient->exam_xray->remarks}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->hba1c_findings)
       <b>HBA1C :</b> {{$patient->exam_bloodsero->hba1c_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->ppbg_findings)
       <b>PPBG :</b> {{$patient->exam_bloodsero->ppbg_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->fbs_findings)
       <b>FBS :</b> {{$patient->exam_bloodsero->fbs_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->bun_findings)
       <b>BUN :</b> {{$patient->exam_bloodsero->bun_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->creatinine_findings)
       <b>CREATININE :</b> {{$patient->exam_bloodsero->creatinine_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->cholesterol_findings)
       <b>CHOLESTEROL :</b> {{$patient->exam_bloodsero->cholesterol_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->triglycerides_findings)
       <b>TRIGLYCERIDES :</b> {{$patient->exam_bloodsero->triglycerides_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->hdl_findings)
       <b>HDL Chole :</b> {{$patient->exam_bloodsero->hdl_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->ldl_findings)
       <b>LDL Chole :</b> {{$patient->exam_bloodsero->ldl_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->vldl_findings)
       <b>VLDL Chole :</b> {{$patient->exam_bloodsero->vldl_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->uricacid_findings)
       <b>URIC ACID :</b> {{ $patient->exam_bloodsero->uricacid_findings }} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->sgot_findings)
       <b>SGOT (AST) :</b> {{$patient->exam_bloodsero->sgot_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->sgpt_findings)
       <b>SGPT (ALT) :</b> {{ $patient->exam_bloodsero->sgpt_findings }} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->ggt_findings)
       <b>GGT :</b> {{ $patient->exam_bloodsero->ggt_findings }} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->alkphos_findings)
       <b>ALK. PHOS. :</b> {{ $patient->exam_bloodsero->alkphos_findings }} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->ttlbilirubin_findings)
       <b>TOTAL BILIRUBIN :</b> {{ $patient->exam_bloodsero->ttlbilirubin_findings }} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->dirbilirubin_findings)
       <b>DIRECT BILIRUBIN :</b> {{$patient->exam_bloodsero->dirbilirubin_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->indbilirubin_findings)
       <b>INDIRECT BILIRUBIN :</b> {{$patient->exam_bloodsero->indbilirubin_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->ttlprotein_findings)
       <b>TOTAL PROTEIN :</b> {{$patient->exam_bloodsero->ttlprotein_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->albumin_findings)
       <b>ALBUMIN :</b> {{$patient->exam_bloodsero->albumin_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->globulin_findings)
       <b>GLOBULIN :</b> {{$patient->exam_bloodsero->globulin_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->sodium_findings)
       <b>SODIUM :</b> {{$patient->exam_bloodsero->sodium_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->potassium_findings)
       <b>POTASSIUM :</b> {{$patient->exam_bloodsero->potassium_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->chloride_findings)
       <b>CHLORIDE :</b> {{$patient->exam_bloodsero->chloride_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->calcium_findings)
       <b>CALCIUM :</b> {{$patient->exam_bloodsero->calcium_findings}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->ag_ratio_findings)
       <b>A/G RATIO :</b> {{$patient->exam_bloodsero->ag_ratio_findings}} <br>
   @endif
@endif

@if($patient->exam_hepa)
   @if($patient->exam_hepa->vdrl_findings)
       <b>VDRL :</b> {{$patient->exam_hepa->vdrl_findings}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->tpha_findings)
       <b>TPHA :</b> {{$patient->exam_hepa->tpha_findings}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->hbsag_findings)
       <b>HBSAG :</b> {{$patient->exam_hepa->hbsag_findings}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->antihbs_findings)
       <b>Anti-HBs :</b> {{$patient->exam_hepa->antihbs_findings}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->hbeag_findings)
       <b>HBeAg :</b> {{$patient->exam_hepa->hbeag_findings}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->antihbe_findings)
       <b>Anti-HBe :</b> {{$patient->exam_hepa->antihbe_findings}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->antihbclgm_findings)
       <b>Anti-HBc (lgM) :</b> {{$patient->exam_hepa->antihbclgm_findings}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->antihbclgg_findings)
       <b>Anti-HBc (lgG) :</b> {{$patient->exam_hepa->antihbclgg_findings}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->antihavlgm_findings)
       <b>Anti-HAV (lgM) :</b> {{$patient->exam_hepa->antihavlgm_findings}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->antihavlgg_findings)
       <b>Anti-HAV (lgG) :</b> {{$patient->exam_hepa->antihavlgg_findings}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->antihcv_findings)
       <b>Anti-HCV :</b> {{$patient->exam_hepa->antihcv_findings}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->others_findings)
       <b>Others :</b> {{$patient->others_findings}} <br>
   @endif
@endif

@if($patient->exam_hema)
   @if($patient->exam_hema->hemoglobin_findings)
       <b>Hemoglobin :</b> {{$patient->exam_hema->hemoglobin_findings}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->hematocrit_findings)
       <b>Hematocrit :</b> {{$patient->exam_hema->hematocrit_findings}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->wbc_findings)
       <b>WBC :</b> {{$patient->exam_hema->wbc_findings}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->rbc_findings)
       <b>RBC :</b> {{$patient->exam_hema->rbc_findings}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->neuthrophils_findings)
       <b>Neutrophil :</b> {{$patient->exam_hema->neuthrophils_findings}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->lymphocytes_findings)
       <b>Lymphocyte :</b> {{$patient->exam_hema->lymphocytes_findings}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->eosinophils_findings)
       <b>Monocyte :</b> {{$patient->exam_hema->eosinophils_findings}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->monophils_findings)
       <b>Eosinophil :</b> {{$patient->exam_hema->monophils_findings}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->baspophils_findings)
       <b>Basophil :</b> {{$patient->exam_hema->baspophils_findings}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->platelet_findings)
       <b>Platelet :</b> {{$patient->exam_hema->platelet_findings}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->blood_findings)
       <b>Blood Type :</b> {{$patient->exam_hema->blood_findings}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->rhfactor_findings)
       <b>Rh Factor	 :</b> {{$patient->exam_hema->rhfactor_findings}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->esr_findings)
       <b>ESR :</b> {{$patient->exam_hema->esr_findings}} <br>
   @endif
@endif
@if($patient->exam_hema)
@if($patient->exam_hema->bleeding_findings)
    <b>Bleeding Time :</b> {{$patient->exam_hema->bleeding_findings}} <br>
@endif
@endif
@if($patient->exam_hema)
@if($patient->exam_hema->clotting_findings)
    <b>Clotting Time :</b> {{$patient->exam_hema->clotting_findings}} <br>
@endif
@endif
@if($patient->exam_hema)
@if($patient->exam_hema->mcv_findings)
    <b>MCV :</b> {{$patient->exam_hema->mcv_findings}} <br>
@endif
@endif
@if($patient->exam_hema)
@if($patient->exam_hema->mch_findings)
    <b>MCH :</b> {{$patient->exam_hema->mch_findings}} <br>
@endif
@endif
@if($patient->exam_hema)
@if($patient->exam_hema->mchc_findings)
    <b>MCHC :</b> {{$patient->exam_hema->mchc_findings}} <br>
@endif
@endif
@if($patient->exam_hema)
@if($patient->exam_hema->others_findings)
    <b>OTHERS :</b> {{$patient->exam_hema->others_findings}} <br>
@endif
@endif




<!-- @if($patient->exam_physical)
   @if($patient->exam_physical->a1_findings)
       <b>SKIN :</b> {{$patient->a1_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->b1_findings)
       <b>Neck, Lymph Node,Thyroid :</b> {{$patient->b1_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->a2_findings)
       <b>Head, Neck,Scalp :</b> {{$patient->a2_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->b2_findings)
       <b>Neurology :</b> {{$patient->b2_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->a3_findings)
       <b>Eyes(external) :</b> {{$patient->a3_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->b3_findings)
       <b>Breast,Axilla :</b> {{$patient->b3_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->a4_findings)
       <b>Pupils :</b> {{$patient->a4_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->b4_findings)
       <b>Chest and Lungs :</b> {{$patient->b4_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->a5_findings)
       <b>Ears :</b> {{$patient->a5_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->b5_findings)
       <b>Heart :</b> {{$patient->b5_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->a6_findings)
       <b>Nose,Sinuses :</b> {{$patient->a6_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->b6_findings)
       <b>Abdomen,Liver,Spleen :</b> {{$patient->b6_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->a7_findings)
       <b>Mouth,Throat :</b> {{$patient->a7_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->b7_findings)
       <b>Back :</b> {{$patient->b7_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->c1_findings)
       <b>Anus-Rectum :</b> {{$patient->c1_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->c2_findings)
       <b>Genito-Urinary System :</b> {{$patient->c2_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->c3_findings)
       <b>Inguinals,Genitals :</b> {{$patient->c3_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->c4_findings)
       <b>Extremities :</b> {{$patient->c4_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->c5_findings)
       <b>Reflexes :</b> {{$patient->c5_findings}} <br>
   @endif
@endif
@if($patient->exam_physical)
   @if($patient->exam_physical->c6_findings)
       <b>Dental(Teeth/Gums) :</b> {{$patient->c6_findings}} <br>
   @endif
@endif -->
