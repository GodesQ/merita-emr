<div class="row my-1">
    <div class="col-6">
        <a href="edit_bloodsero?id={{ $exam_blood_serology->admission_id }}" class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/examlab_bloodsero_print?id={{ $exam_blood_serology->admission_id }}&type=blood", "width=800,height=650").print()'
            class="btn btn-dark btn-solid" title="Print">Print Blood Chemistry Only</button>
        <button
            onclick='window.open("/examlab_bloodsero_print?id={{ $exam_blood_serology->admission_id }}&type=both", "width=800,height=650").print()'
            class="btn btn-dark btn-solid" title="Print">Print Blood & Serology</button>
    </div>
</div>
<table width="100%" cellpadding="2" cellspacing="2" class="table table-bordered">
    <tbody>
        <tr>
            <td colspan="3">
                <h4><b>BLOOD CHEMISTRY</b></h4>
            </td>
        </tr>
        <tr>
            <td width="24%"><b>EXAMINATION</b>
            </td>
            <td width="26%"> <b>RESULTS</b></td>
            <td width="50%"><b>NORMAL VALUE</b>
            </td>
        </tr>
        <tr>
            <td>HBA1C</td>
            <td class="{{ $exam_blood_serology->hba1c < '4.0' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->hba1c }}
            </td>
            <td class="">4.0-6.4%</td>
        </tr>
        <tr>
            <td>FBS</td>
            <td class="{{ $exam_blood_serology->fbs < '70' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->fbs }}

            </td>
            <td class=""> 70-110 mg/dL </td>
        </tr>
        <tr>
            <td>BUN</td>
            <td class="{{ $exam_blood_serology->bun < '5' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->bun }}
            </td>
            <td class=""> 5-20 mg/dL </td>
        </tr>
        <tr>
            <td>CREATININE</td>
            <td class="{{ $exam_blood_serology->creatinine < '0.8' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->creatinine }}
            </td>
            <td class=""> 0.8-1.2 mg/dL </td>
        </tr>
        <tr>
            <td>CHOLESTEROL</td>
            <td class="{{ $exam_blood_serology->cholesterol < '125' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->cholesterol }}
            </td>
            <td class=""> 125-200 mg/dL </td>
        </tr>
        <tr>
            <td>TRIGLYCERIDES</td>
            <td>
                {{ $exam_blood_serology->triglycerides }}
            </td>
            <td class=""> M:40-160 F:35-130
            </td>
        </tr>
        <tr>
            <td>HDL Chole</td>
            <td class="{{ $exam_blood_serology->hdl < '40' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->hdl }}
            </td>
            <td class=""> &gt;40 mg/dL </td>
        </tr>
        <tr>
            <td>LDL Chole</td>
            <td class="{{ $exam_blood_serology->ldl > '100' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->ldl }}
            </td>
            <td class=""> &lt;100 mg/dL </td>
        </tr>
        <tr>
            <td>VLDL Chole</td>
            <td>
                {{ $exam_blood_serology->vldl }}
            </td>
            <td class=""> M:8-32 F:7-26 </td>
        </tr>
        <tr>
            <td>URIC ACID</td>
            <td class="{{ $exam_blood_serology->uricacid < '140' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->uricacid }}
            </td>
            <td class=""> 140-430 umol/L </td>
        </tr>
        <tr>
            <td>SGOT (AST)</td>
            <td class="{{ $exam_blood_serology->sgot < '0' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->sgot }}
            </td>
            <td class=""> 0-38 u/L </td>
        </tr>
        <tr>
            <td>SGPT (ALT)</td>
            <td class="{{ $exam_blood_serology->sgpt < '0' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->sgpt }}
            </td>
            <td class="">0-41 u/L</td>
        </tr>
        <tr>
            <td>GGT</td>
            <td class="{{ $exam_blood_serology->ggt < '7' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->ggt }}
            </td>
            <td class=""> 7-50 u/L </td>
        </tr>
        <tr>
            <td>ALK. PHOS.</td>
            <td class="{{ $exam_blood_serology->alkphos < '35' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->alkphos }}
            </td>
            <td class=""> 35-129 u/L </td>
        </tr>
        <tr>
            <td>TOTAL BILIRUBIN</td>
            <td class="{{ $exam_blood_serology->ttlbilirubin < '0' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->ttlbilirubin }}
            </td>
            <td class="">0-17 umol/L</td>
        </tr>
        <tr>
            <td>DIRECT BILIRUBIN</td>
            <td class="{{ $exam_blood_serology->dirbilirubin < '0' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->dirbilirubin }}
            </td>
            <td class=""> 0-4.3 umol/L </td>
        </tr>
        <tr>
            <td>INDIRECT BILIRUBIN</td>
            <td class="{{ $exam_blood_serology->indbilirubin < '0' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->indbilirubin }}
            </td>
            <td class=""> 0-12.7 umol/L </td>
        </tr>
        <tr>
            <td>TOTAL PROTEIN</td>
            <td class="{{ $exam_blood_serology->ttlprotein < '66' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->ttlprotein }}
            </td>
            <td class=""> 66-87 g/L </td>
        </tr>
        <tr>
            <td width="24%">ALBUMIN</td>
            <td class="{{ $exam_blood_serology->albumin < '35' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->albumin }}
            </td>
            <td width="50%" class=""> 35-52 g/L
            </td>
        </tr>
        <tr>
            <td>GLOBULIN</td>
            <td class="{{ $exam_blood_serology->globulin < '31' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->globulin }}
            </td>
            <td class=""> 31-35 g/L </td>
        </tr>
        <tr>
            <td>SODIUM</td>
            <td class="{{ $exam_blood_serology->sodium < '135' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->sodium }}
            </td>
            <td class="">135.0-148 mmol/L</td>
        </tr>
        <tr>
            <td>POTASSIUM</td>
            <td class="{{ $exam_blood_serology->potassium < '3.5' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->potassium }}
            </td>
            <td class="">3.5-5.3 mmol/L</td>
        </tr>
        <tr>
            <td>CHLORIDE</td>
            <td class="{{ $exam_blood_serology->chloride < '96' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->chloride }}
            </td>
            <td class="">96.0-108 mmol/L</td>
        </tr>
        <tr>
            <td>CALCIUM</td>
            <td class="{{ $exam_blood_serology->calcium < '2.10' ? 'text-danger' : null }}">
                {{ $exam_blood_serology->calcium }}
            </td>
            <td class="">2.10-2.90 mmol/L</td>
        </tr>
        <tr>
            <td align="left" class="brdAll">
                OTHERS:
                {{ $exam_blood_serology->others }}
            </td>
            <td valign="bottom"><br>
                {{ $exam_blood_serology->others_result }}
            </td>
            <td valign="bottom"><br>
                {{ $exam_blood_serology->others_nv }}
            </td>
        </tr>
    </tbody>
</table>
<table width="100%" border="0" cellpadding="2" cellspacing="2" class="table table-bordered">
    <tbody>
        <tr>
            <td colspan="4">
                <h4><b>SEROLOGY</b></h4>
            </td>
        </tr>
        <tr class="brdAll">
            <td width="24%" class="brdBtm">
                <b>EXAMINATION</b>
            </td>
            <td class="brdLeftBtm">
                <b>RESULTS</b>
            </td>
            <td class="brdLeftBtm"><b>CUT-OFF
                    VALUE</b>
            </td>
            <td class="brdLeftBtm"><b>PATIENT'S
                    VALUE</b></td>
        </tr>
        <tr>
            <td align="left" class="brdAll">
                VDRL/RPR
            </td>
            <td width="36%">
                {{ $exam_blood_serology->vdrl_result }}
            </td>
            <td width="20%">&nbsp;</td>
            <td width="20%">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" class="brdAll">
                HBsAg
                (Hepatitis B)
            </td>
            <td>
                {{ $exam_blood_serology->hbsag_result }}
            </td>
            <td>
                {{ $exam_blood_serology->hbsag_cov }}
            </td>
            <td>
                {{ $exam_blood_serology->hbsag_pv }}
            </td>
        </tr>
        <tr>
            <td align="left" class="brdAll">
                Anti-HCV
                (Hepatitis
                C)
            </td>
            <td>
                {{ $exam_blood_serology->antihcv_result }}
            </td>
            <td>
                {{ $exam_blood_serology->antihcv_cov }}
            </td>
            <td>
                {{ $exam_blood_serology->antihcv_pv }}
            </td>
        </tr>
        <tr>
            <td align="left" class="brdAll">
                Anti-HAV
                IgM
            </td>
            <td>
                {{ $exam_blood_serology->antihavigm_result }}
            </td>
            <td>
                {{ $exam_blood_serology->antihavigm_cov }}
            </td>
            <td>
                {{ $exam_blood_serology->antihavigm_pv }}
            </td>
        </tr>
        <tr>
            <td>
                {{ $exam_blood_serology->hbsag_result }}
            </td>
            <td>
                {{ $exam_blood_serology->hbsag_cov }}
            </td>
            <td>
                {{ $exam_blood_serology->hbsag_pv }}
            </td>
        </tr>
        <tr>
            <td height="40" align="left" class="brdAll">
                TPHA
            </td>
            <td>{{ $exam_blood_serology->tpha_result }}
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr class="table no-border">
            <td align="left" valign="top">
                Anti-HBs
            </td>
            <td>
                {{ $exam_blood_serology->antihbs_result }}
            </td>
            <td>
                {{ $exam_blood_serology->antihbs_cov }}
            </td>
            <td>
                {{ $exam_blood_serology->antihbs_pv }}
            </td>
        </tr>
        <tr class="table no-border">
            <td align="left" valign="top">HBeAg
            </td>
            <td>
                {{ $exam_blood_serology->hbeag_result }}
            </td>
            <td>
                {{ $exam_blood_serology->hbeag_cov }}
            </td>
            <td>
                {{ $exam_blood_serology->hbeag_pv }}
            </td>
        </tr>
        <tr class="table no-border">
            <td align="left" valign="top">
                Anti-HBe
            </td>
            <td>
                {{ $exam_blood_serology->antihbe_result }}
            </td>
            <td>
                {{ $exam_blood_serology->antihbe_cov }}
            </td>
            <td>
                {{ $exam_blood_serology->antihbe_pv }}
            </td>
        </tr>
        <tr class="table no-border">
            <td align="left" valign="top">
                Anti-HBc
                (lgM):</td>
            <td>
                {{ $exam_blood_serology->antihbclgm_result }}
            </td>
            <td>
                {{ $exam_blood_serology->antihbclgm_cov }}
            </td>
            <td>
                {{ $exam_blood_serology->antihbclgm_pv }}
            </td>
        </tr>
        <tr class="table no-border">
            <td align="left" valign="top">
                Anti-HBc
                (lgG)
            </td>
            <td>
                {{ $exam_blood_serology->antihbclgg_result }}
            </td>
            <td>
                {{ $exam_blood_serology->antihbclgg_cov }}
            </td>
            <td>
                {{ $exam_blood_serology->antihbclgg_pv }}
            </td>
        </tr>
        <tr>
            <td align="left" class="brdAll">
                OTHERS:
                {{ $exam_blood_serology->sothers }}
            </td>
            <td valign="bottom">
                {{ $exam_blood_serology->sothers_result }}
            </td>
            <td valign="bottom">
                {{ $exam_blood_serology->sothers_cov }}
            </td>
            <td valign="bottom">
                {{ $exam_blood_serology->sothers_pv }}
            </td>
        </tr>
    </tbody>
</table>
