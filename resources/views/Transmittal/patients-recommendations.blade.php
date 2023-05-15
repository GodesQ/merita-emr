@if($patient->exam_audio)
   @if($patient->exam_audio->recommendation)
       <b>Audiometry :</b> {{$patient->exam_audio->recommendation}} <br>
   @endif
@endif
@if($patient->exam_ecg)
   @if($patient->exam_ecg->recommendation)
       <b>ECG :</b> {{$patient->exam_ecg->recommendation}} <br>
   @endif
@endif
@if($patient->exam_visacuity)
   @if($patient->exam_visacuity->recommendation)
       <b>Visual Acuity :</b> {{$patient->exam_visacuity->recommendation}} <br>
   @endif
@endif
@if($patient->exam_crf)
   @if($patient->exam_crf->recommendation)
       <b>CRF :</b> {{$patient->exam_crf->recommendation}} <br>
   @endif
@endif
@if($patient->exam_cardio)
   @if($patient->exam_cardio->recommendation)
       <b>Cardiovascular :</b> {{$patient->exam_cardio->recommendation}} <br>
   @endif
@endif
@if($patient->exam_dental)
   @if($patient->exam_dental->recommendation)
       <b>Dental :</b> {{$patient->exam_dental->recommendation}} <br>
   @endif
@endif
@if($patient->exam_drug)
   @if($patient->exam_drug->recommendation)
       <b>Drug Test :</b> {{$patient->exam_drug->recommendation}} <br>
   @endif
@endif
@if($patient->exam_echodoppler)
   @if($patient->exam_echodoppler->recommendation)
       <b>Echo Doppler :</b> {{$patient->exam_echodoppler->recommendation}} <br>
   @endif
@endif
@if($patient->exam_echoplain)
   @if($patient->exam_echoplain->recommendation)
       <b>Echo Plain :</b> {{$patient->exam_echoplain->recommendation}} <br>
   @endif
@endif
@if($patient->exam_feca)
   @if($patient->exam_feca->recommendation)
       <b>Fecalysis :</b> {{$patient->exam_feca->recommendation}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->recommendation)
       <b>Hematology :</b> {{$patient->exam_hema->recommendation}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->recommendation)
       <b>Hepatitis :</b> {{$patient->exam_hepa->recommendation}} <br>
   @endif
@endif
@if($patient->exam_hiv)
   @if($patient->exam_hiv->recommendation)
       <b>HIV :</b> {{$patient->exam_hiv->recommendation}} <br>
   @endif
@endif
@if($patient->exam_ishihara)
   @if($patient->exam_ishihara->recommendation)
       <b>Ishihara :</b> {{$patient->exam_ishihara->recommendation}} <br>
   @endif
@endif
@if($patient->exam_misc)
   @if($patient->exam_misc->recommendation)
       <b>MISC :</b> {{$patient->exam_misc->recommendation}} <br>
   @endif
@endif
@if($patient->exam_psychobpi)
   @if($patient->exam_psychobpi->recommendation)
       <b>Psycho BPI :</b> {{$patient->exam_psychobpi->recommendation}} <br>
   @endif
@endif
@if($patient->exam_psycho)
   @if($patient->exam_psycho->recommendation)
       <b>Psychological :</b> {{$patient->exam_psycho->recommendation}} <br>
   @endif
@endif
@if($patient->exam_stressecho)
   @if($patient->exam_stressecho->recommendation)
       <b>Stress Echo :</b> {{$patient->exam_stressecho->recommendation}} <br>
   @endif
@endif
@if($patient->exam_stresstest)
   @if($patient->exam_stresstest->recommendation)
       <b>Stress Test :</b> {{$patient->exam_stresstest->recommendation}} <br>
   @endif
@endif
@if($patient->exam_ultrasound)
   @if($patient->exam_ultrasound->recommendation)
       <b>Ultrasound :</b> {{$patient->exam_ultrasound->recommendation}} <br>
   @endif
@endif
@if($patient->exam_xray)
   @if($patient->exam_xray->recommendation)
       <b>Xray :</b> {{$patient->exam_xray->recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->hba1c_recommendation)
       <b>HBA1C :</b> {{$patient->exam_bloodsero->hba1c_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->ppbg_recommendation)
       <b>PPBG :</b> {{$patient->exam_bloodsero->ppbg_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->fbs_recommendation)
       <b>FBS :</b> {{$patient->exam_bloodsero->fbs_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->bun_recommendation)
       <b>BUN :</b> {{$patient->exam_bloodsero->bun_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->creatinine_recommendation)
       <b>CREATININE :</b> {{$patient->exam_bloodsero->creatinine_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->cholesterol_recommendation)
       <b>CHOLESTEROL :</b> {{$patient->exam_bloodsero->cholesterol_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->triglycerides_recommendation)
       <b>TRIGLYCERIDES :</b> {{$patient->exam_bloodsero->triglycerides_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->hdl_recommendation)
       <b>HDL Chole :</b> {{$patient->exam_bloodsero->hdl_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->ldl_recommendation)
       <b>LDL Chole :</b> {{$patient->exam_bloodsero->ldl_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->vldl_recommendation)
       <b>VLDL Chole :</b> {{$patient->exam_bloodsero->vldl_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->uricacid_recommendation)
       <b>URIC ACID :</b> {{$patient->exam_bloodsero->uricacid_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->sgot_recommendation)
       <b>SGOT (AST) :</b> {{$patient->exam_bloodsero->sgot_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->sgpt_recommendation)
       <b>SGPT (ALT) :</b> {{$patient->exam_bloodsero->sgpt_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->ggt_recommendation)
       <b>GGT :</b> {{$patient->exam_bloodsero->ggt_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->alkphos_recommendation)
       <b>ALK. PHOS. :</b> {{$patient->exam_bloodsero->alkphos_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->ttlbilirubin_recommendation)
       <b>TOTAL BILIRUBIN :</b> {{$patient->exam_bloodsero->ttlbilirubin_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->dirbilirubin_recommendation)
       <b>DIRECT BILIRUBIN :</b> {{$patient->exam_bloodsero->dirbilirubin_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->indbilirubin_recommendation)
       <b>INDIRECT BILIRUBIN :</b> {{$patient->exam_bloodsero->indbilirubin_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->ttlprotein_recommendation)
       <b>TOTAL PROTEIN :</b> {{$patient->exam_bloodsero->ttlprotein_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->albumin_recommendation)
       <b>ALBUMIN :</b> {{$patient->exam_bloodsero->albumin_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->globulin_recommendation)
       <b>GLOBULIN :</b> {{$patient->exam_bloodsero->globulin_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->sodium_recommendation)
       <b>SODIUM :</b> {{$patient->exam_bloodsero->sodium_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->potassium_recommendation)
       <b>POTASSIUM :</b> {{$patient->exam_bloodsero->potassium_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->chloride_recommendation)
       <b>CHLORIDE :</b> {{$patient->exam_bloodsero->chloride_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->calcium_recommendation)
       <b>CALCIUM :</b> {{$patient->exam_bloodsero->calcium_recommendation}} <br>
   @endif
@endif
@if($patient->exam_bloodsero)
   @if($patient->exam_bloodsero->ag_ratio_recommendation)
       <b>A/G RATIO :</b> {{$patient->exam_bloodsero->ag_ratio_recommendation}} <br>
   @endif
@endif

@if($patient->exam_hepa)
   @if($patient->exam_hepa->vdrl_recommendation)
       <b>VDRL :</b> {{$patient->exam_hepa->vdrl_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->tpha_recommendation)
       <b>TPHA :</b> {{$patient->exam_hepa->tpha_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->hbsag_recommendation)
       <b>HBSAG :</b> {{$patient->exam_hepa->hbsag_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->antihbs_recommendation)
       <b>Anti-HBs :</b> {{$patient->exam_hepa->antihbs_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->hbeag_recommendation)
       <b>HBeAg :</b> {{$patient->exam_hepa->hbeag_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->antihbe_recommendation)
       <b>Anti-HBe :</b> {{$patient->exam_hepa->antihbe_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->antihbclgm_recommendation)
       <b>Anti-HBc (lgM) :</b> {{$patient->exam_hepa->antihbclgm_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->antihbclgg_recommendation)
       <b>Anti-HBc (lgG) :</b> {{$patient->exam_hepa->antihbclgg_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->antihavlgm_recommendation)
       <b>Anti-HAV (lgM) :</b> {{$patient->exam_hepa->antihavlgm_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->antihavlgg_recommendation)
       <b>Anti-HAV (lgG) :</b> {{$patient->exam_hepa->antihavlgg_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->antihcv_recommendation)
       <b>Anti-HCV :</b> {{$patient->exam_hepa->antihcv_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hepa)
   @if($patient->exam_hepa->others_recommendation)
       <b>Others :</b> {{$patient->exam_hepa->others_recommendation}} <br>
   @endif
@endif

@if($patient->exam_hema)
   @if($patient->exam_hema->hemoglobin_recommendation)
       <b>Hemoglobin :</b> {{$patient->exam_hema->hemoglobin_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->hematocrit_recommendation)
       <b>Hematocrit :</b> {{$patient->exam_hema->hematocrit_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->wbc_recommendation)
       <b>WBC :</b> {{$patient->exam_hema->wbc_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->rbc_recommendation)
       <b>RBC :</b> {{$patient->exam_hema->rbc_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->neuthrophils_recommendation)
       <b>Neutrophil :</b> {{$patient->exam_hema->neuthrophils_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->lymphocytes_recommendation)
       <b>Lymphocyte :</b> {{$patient->exam_hema->lymphocytes_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->eosinophils_recommendation)
       <b>Monocyte :</b> {{$patient->exam_hema->eosinophils_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->monophils_recommendation)
       <b>Eosinophil :</b> {{$patient->exam_hema->monophils_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->baspophils_recommendation)
       <b>Basophil :</b> {{$patient->exam_hema->baspophils_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->platelet_recommendation)
       <b>Platelet :</b> {{$patient->exam_hema->platelet_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->blood_recommendation)
       <b>Blood Type :</b> {{$patient->exam_hema->blood_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->rhfactor_recommendation)
       <b>Rh Factor	 :</b> {{$patient->exam_hema->rhfactor_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hema)
   @if($patient->exam_hema->esr_recommendation)
       <b>ESR :</b> {{$patient->exam_hema->esr_recommendation}} <br>
   @endif
@endif
@if($patient->exam_hema)
@if($patient->exam_hema->bleeding_recommendation)
    <b>Bleeding Time :</b> {{$patient->exam_hema->bleeding_recommendation}} <br>
@endif
@endif
@if($patient->exam_hema)
@if($patient->exam_hema->clotting_recommendation)
    <b>Clotting Time :</b> {{$patient->exam_hema->clotting_recommendation}} <br>
@endif
@endif
@if($patient->exam_hema)
@if($patient->exam_hema->mcv_recommendation)
    <b>MCV :</b> {{$patient->exam_hema->mcv_recommendation}} <br>
@endif
@endif
@if($patient->exam_hema)
@if($patient->exam_hema->mch_recommendation)
    <b>MCH :</b> {{$patient->exam_hema->mch_recommendation}} <br>
@endif
@endif
@if($patient->exam_hema)
@if($patient->exam_hema->mchc_recommendation)
    <b>MCHC :</b> {{$patient->exam_hema->mchc_recommendation}} <br>
@endif
@endif
@if($patient->exam_hema)
@if($patient->exam_hema->others_recommendation)
    <b>OTHERS :</b> {{$patient->exam_hema->others_recommendation}} <br>
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
