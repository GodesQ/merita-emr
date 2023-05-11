<tr>
    <td>HBA1C</td>
    <td>
        <input oninput="getBloodRemarks(this, 'HBA1C', '4.0', '6.4', '@isset($exam) {{ optional($exam)->hba1c }} @endisset')"
            name="hba1c" type="text" class="form-control" id="hba1c"
            value="@isset($exam) {{ optional($exam)->hba1c }} @endisset" />
    </td>
    <td class="">4.0-6.4%</td>
    {{-- <td><input name="hba1c_findings" type="text" class="form-control"
            style="width:350px" id="hba1c_findings"
            value="@isset($exam) {{ optional($exam)->hba1c_findings }} @endisset"></td> --}}
    <td>
        <input name="hba1c_recommendation" type="text" class="form-control" style="width:350px"
            id="hba1c_recommendation"
            value="@isset($exam) {{ optional($exam)->hba1c_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>2hrs. PPBG</td>
    <td>
        <input
            oninput="getBloodRemarks(this, 'PPBG', '', '200', '@isset($exam) {{ optional($exam)->hba1c }} @endisset')"
            name="ppbg" type="text" class="form-control" id="ppbg"
            value="@isset($exam) {{ optional($exam)->ppbg }} @endisset">
    </td>
    <td class="">&lt; 200 mg/dL</td>
    {{-- <td><input name="ppbg_findings" type="text" class="form-control"
            style="width:350px" id="ppbg_findings"
            value="@isset($exam) {{ optional($exam)->ppbg_findings }} @endisset"></td> --}}
    <td><input name="ppbg_recommendation" type="text" class="form-control" style="width:350px" id="ppbg_recommendation"
            value="@isset($exam) {{ optional($exam)->ppbg_recommendation }} @endisset"></td>
</tr>
<tr>
    <td>FBS</td>
    <td>
        <input
            oninput="getBloodRemarks(this, 'FBS', '70', '110', '@isset($exam) {{ optional($exam)->fbs }} @endisset')"
            name="fbs" type="text" class="form-control" id="fbs"
            value="@isset($exam) {{ optional($exam)->fbs }} @endisset" />
    </td>
    <td class=""> 70-110 mg/dL </td>
    {{-- <td><input name="fbs_findings" type="text" class="form-control"
            style="width:350px" id="fbs_findings" value="@isset($exam) {{ optional($exam)->fbs_findings }} @endisset">
    </td> --}}
    <td><input name="fbs_recommendation" type="text" class="form-control" style="width:350px" id="fbs_recommendation"
            value="@isset($exam) {{ optional($exam)->fbs_recommendation }} @endisset"></td>
</tr>
<tr>
    <td>BUN</td>
    <td>
        <input
            oninput="getBloodRemarks(this, 'BUN', '5', '20','@isset($exam) {{ optional($exam)->bun }} @endisset')"
            name="bun" type="text" class="form-control" id="bun"
            value="@isset($exam) {{ optional($exam)->bun }} @endisset" />
    </td>
    <td class=""> 5-20 mg/dL </td>
    {{-- <td><input name="bun_findings" type="text" class="form-control"
            style="width:350px" id="bun_findings" value="@isset($exam) {{ optional($exam)->bun_findings }} @endisset">
    </td> --}}
    <td><input name="bun_recommendation" type="text" class="form-control" style="width:350px" id="bun_recommendation"
            value="@isset($exam) {{ optional($exam)->bun_recommendation }} @endisset"></td>
</tr>
<tr>
    <td>CREATININE</td>
    <td>
        <input
            oninput="getBloodRemarks(this, 'CREATININE', '0.8', '1.2', '@isset($exam) {{ optional($exam)->creatinine }} @endisset')"
            name="creatinine" type="text" class="form-control" id="creatinine"
            value="@isset($exam) {{ optional($exam)->creatinine }} @endisset" />
    </td>
    <td class=""> 0.8-1.2 mg/dL </td>
    {{-- <td><input name="creatinine_findings" type="text" class="form-control"
            style="width:350px" id="creatinine_findings"
            value="@isset($exam) {{ optional($exam)->creatinine_findings }} @endisset"></td> --}}
    <td><input name="creatinine_recommendation" type="text" class="form-control" style="width:350px"
            id="creatinine_recommendation"
            value="@isset($exam) {{ optional($exam)->creatinine_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>CHOLESTEROL</td>
    <td>
        <input
            oninput="getBloodRemarks(this, 'CHOLESTEROL', '125', '200', '@isset($exam) {{ optional($exam)->cholesterol }} @endisset')"
            name="cholesterol" type="text" class="form-control" id="cholesterol"
            value="@isset($exam) {{ optional($exam)->cholesterol }} @endisset" />
    </td>
    <td class=""> 125-200 mg/dL </td>
    {{-- <td><input name="cholesterol_findings" type="text" class="form-control"
            style="width:350px" id="cholesterol_findings"
            value="@isset($exam) {{ optional($exam)->cholesterol_findings }} @endisset"></td> --}}
    <td><input name="cholesterol_recommendation" type="text" class="form-control" style="width:350px"
            id="cholesterol_recommendation"
            value="@isset($exam) {{ optional($exam)->cholesterol_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>TRIGLYCERIDES</td>
    <td>
        <input
            oninput="getBloodRemarks(this, 'TRIGLYCERIDES', '35', '130', '@isset($exam) {{ optional($exam)->triglycerides }} @endisset')"
            name="triglycerides" type="text" class="form-control" id="triglycerides"
            value="@isset($exam) {{ optional($exam)->triglycerides }} @endisset" />
    </td>
    <td class=""> M:40-160 F:35-130 </td>
    {{-- <td><input name="triglycerides_findings" type="text" class="form-control"
            style="width:350px" id="triglycerides_findings"
            value="@isset($exam) {{ optional($exam)->triglycerides_findings }} @endisset"></td> --}}
    <td><input name="triglycerides_recommendation" type="text" class="form-control" style="width:350px"
            id="triglycerides_recommendation"
            value="@isset($exam) {{ optional($exam)->triglycerides_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>HDL Chole</td>
    <td>
        <input oninput="getBloodRemarks(this, 'HDL Chole', '40', '', '@isset($exam) {{ optional($exam)->hdl }} @endisset')"
            name="hdl" type="text" class="form-control" id="hdl"
            value="@isset($exam) {{ optional($exam)->hdl }} @endisset" />
    </td>
    <td class=""> &gt;40 mg/dL </td>
    {{-- <td><input name="hdl_findings" type="text" class="form-control"
            style="width:350px" id="hdl_findings" value="@isset($exam) {{ optional($exam)->hdl_findings }} @endisset"> --}}
    </td>
    <td><input name="hdl_recommendation" type="text" class="form-control" style="width:350px"
            id="hdl_recommendation"
            value="@isset($exam) {{ optional($exam)->hdl_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>LDL Chole</td>
    <td>
        <input
            oninput="getBloodRemarks(this, 'HDL Chole', '', '100', '@isset($exam) {{ optional($exam)->ldl }} @endisset')"
            name="ldl" type="text" class="form-control" id="ldl"
            value="@isset($exam) {{ optional($exam)->ldl }} @endisset" />
    </td>
    <td class=""> &lt;100 mg/dL </td>
    {{-- <td><input name="ldl_findings" type="text" class="form-control"
            style="width:350px" id="ldl_findings" value="@isset($exam) {{ optional($exam)->ldl_findings }} @endisset">
    </td> --}}
    <td><input name="ldl_recommendation" type="text" class="form-control" style="width:350px"
            id="ldl_recommendation"
            value="@isset($exam) {{ optional($exam)->ldl_recommendation }} @endisset"></td>
</tr>
<tr>
    <td>VLDL Chole</td>
    <td>
        <input name="vldl" type="text" class="form-control" id="vldl"
            value="@isset($exam) {{ optional($exam)->vldl }} @endisset" />
    </td>
    <td class=""> M:8-32 F:7-26 </td>
    {{-- <td><input name="vldl_findings" type="text" class="form-control"
            style="width:350px" id="vldl_findings"
            value="@isset($exam) {{ optional($exam)->vldl_findings }} @endisset"></td> --}}
    <td><input name="vldl_recommendation" type="text" class="form-control" style="width:350px"
            id="vldl_recommendation"
            value="@isset($exam) {{ optional($exam)->vldl_recommendation }} @endisset"></td>
</tr>
<tr>
    <td>URIC ACID</td>
    <td>
        <input
            oninput="getBloodRemarks(this, 'URIC ACID', '140', '430', '@isset($exam) {{ optional($exam)->uricacid }} @endisset')"
            name="uricacid" type="text" class="form-control" id="uricacid"
            value="@isset($exam) {{ optional($exam)->uricacid }} @endisset" />
    </td>
    <td class=""> 140-430 umol/L </td>
    {{-- <td><input name="uricacid_findings" type="text" class="form-control"
            style="width:350px" id="uricacid_findings"
            value="@isset($exam) {{ optional($exam)->uricacid_findings }} @endisset"></td> --}}
    <td><input name="uricacid_recommendation" type="text" class="form-control" style="width:350px"
            id="uricacid_recommendation"
            value="@isset($exam) {{ optional($exam)->uricacid_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>SGOT (AST)</td>
    <td>
        <input
            oninput="getBloodRemarks(this, 'SGOT', '0', '40', '@isset($exam) {{ optional($exam)->sgot }} @endisset')"
            name="sgot" type="text" class="form-control" id="sgot"
            value="@isset($exam) {{ optional($exam)->sgot }} @endisset" />
    </td>
    <td class=""> 0-40 u/L </td>
    {{-- <td><input name="sgot_findings" type="text" class="form-control"
            style="width:350px" id="sgot_findings"
            value="@isset($exam) {{ optional($exam)->sgot_findings }} @endisset"></td> --}}
    <td><input name="sgot_recommendation" type="text" class="form-control" style="width:350px"
            id="sgot_recommendation"
            value="@isset($exam) {{ optional($exam)->sgot_recommendation }} @endisset"></td>
</tr>
<tr>
    <td>SGPT (ALT)</td>
    <td>
        <input
            oninput="getBloodRemarks(this, 'SGPT', '0', '41', '@isset($exam) {{ optional($exam)->sgpt }} @endisset')"
            name="sgpt" type="text" class="form-control" id="sgpt"
            value="@isset($exam) {{ optional($exam)->sgpt }} @endisset" />
    </td>
    <td class="">0-41 u/L</td>
    {{-- <td><input name="sgpt_findings" type="text" class="form-control"
            style="width:350px" id="sgpt_findings"
            value="@isset($exam) {{ optional($exam)->sgpt_findings }} @endisset"></td> --}}
    <td><input name="sgpt_recommendation" type="text" class="form-control" style="width:350px"
            id="sgpt_recommendation"
            value="@isset($exam) {{ optional($exam)->sgpt_recommendation }} @endisset"></td>
</tr>
<tr>
    <td>GGT</td>
    <td>
        <input
            oninput="getBloodRemarks(this, 'GGT', '0', '55', '@isset($exam) {{ optional($exam)->ggt }} @endisset')"
            name="ggt" type="text" class="form-control" id="ggt"
            value="@isset($exam) {{ optional($exam)->ggt }} @endisset" />
    </td>
    <td class=""> 0-55 u/L </td>
    {{-- <td><input name="ggt_findings" type="text" class="form-control"
            style="width:350px" id="ggt_findings" value="@isset($exam) {{ optional($exam)->ggt_findings }} @endisset">
    </td> --}}
    <td><input name="ggt_recommendation" type="text" class="form-control" style="width:350px"
            id="ggt_recommendation"
            value="@isset($exam) {{ optional($exam)->ggt_recommendation }} @endisset"></td>
</tr>
<tr>
    <td>ALK. PHOS.</td>
    <td>
        <input
            oninput="getBloodRemarks(this, 'ALK. PHOS.', '35', '129', '@isset($exam) {{ optional($exam)->alkphos }} @endisset')"
            name="alkphos" type="text" class="form-control" id="alkphos"
            value="@isset($exam) {{ optional($exam)->alkphos }} @endisset" />
    </td>
    <td class=""> 35-129 u/L </td>
    {{-- <td><input name="alkphos_findings" type="text" class="form-control"
            style="width:350px" id="alkphos_findings"
            value="@isset($exam) {{ optional($exam)->alkphos_findings }} @endisset"></td> --}}
    <td><input name="alkphos_recommendation" type="text" class="form-control" style="width:350px"
            id="alkphos_recommendation"
            value="@isset($exam) {{ optional($exam)->alkphos_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>TOTAL BILIRUBIN</td>
    <td>
        <input oninput="getBloodRemarks(this, 'TOTAL BILIRUBIN', '5', '21', '@isset($exam) {{ optional($exam)->ttlbilirubin }} @endisset')"
            name="ttlbilirubin" type="text" class="form-control" id="ttlbilirubin"
            value="@isset($exam) {{ optional($exam)->ttlbilirubin }} @endisset" />
    </td>
    <td class="">5-21 umol/L</td>
    {{-- <td><input name="ttlbilirubin_findings" type="text" class="form-control"
            style="width:350px" id="ttlbilirubin_findings"
            value="@isset($exam) {{ optional($exam)->ttlbilirubin_findings }} @endisset"></td> --}}
    <td><input name="ttlbilirubin_recommendation" type="text" class="form-control" style="width:350px"
            id="ttlbilirubin_recommendation"
            value="@isset($exam) {{ optional($exam)->ttlbilirubin_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>DIRECT BILIRUBIN</td>
    <td><input oninput="getBloodRemarks(this, 'DIRECT BILIRUBIN', '0', '5.1', '@isset($exam) {{ optional($exam)->dirbilirubin }} @endisset')"
            name="dirbilirubin" type="text" class="form-control" id="dirbilirubin"
            value="@isset($exam) {{ optional($exam)->dirbilirubin }} @endisset" />
    </td>
    <td class=""> 0-5.1 umol/L </td>
    {{-- <td><input name="dirbilirubin_findings" type="text" class="form-control"
            style="width:350px" id="dirbilirubin_findings"
            value="@isset($exam) {{ optional($exam)->dirbilirubin_findings }} @endisset"></td> --}}
    <td><input name="dirbilirubin_recommendation" type="text" class="form-control" style="width:350px"
            id="dirbilirubin_recommendation"
            value="@isset($exam) {{ optional($exam)->dirbilirubin_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>INDIRECT BILIRUBIN</td>
    <td><input oninput="getBloodRemarks(this, 'INDIRECT BILIRUBIN', '0', '16', '@isset($exam) {{ optional($exam)->indbilirubin }} @endisset')"
            name="indbilirubin" type="text" class="form-control" id="indbilirubin"
            value="@isset($exam) {{ optional($exam)->indbilirubin }} @endisset" />
    </td>
    <td class=""> 0-16 umol/L </td>
    {{-- <td><input name="indbilirubin_findings" type="text" class="form-control"
            style="width:350px" id="indbilirubin_findings"
            value="@isset($exam) {{ optional($exam)->indbilirubin_findings }} @endisset"></td> --}}
    <td><input name="indbilirubin_recommendation" type="text" class="form-control" style="width:350px"
            id="indbilirubin_recommendation"
            value="@isset($exam) {{ optional($exam)->indbilirubin_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>TOTAL PROTEIN</td>
    <td>
        <input
            oninput="getBloodRemarks(this, 'TOTAL PROTEIN', '66', '87', '@isset($exam) {{ optional($exam)->ttlprotein }} @endisset')"
            name="ttlprotein" type="text" class="form-control" id="ttlprotein"
            value="@isset($exam) {{ optional($exam)->ttlprotein }} @endisset" />
    </td>
    <td class=""> 66-87 g/L </td>
    {{-- <td><input name="ttlprotein_findings" type="text" class="form-control" style="width:350px" id="ttlprotein_findings"
            value="@isset($exam) {{ optional($exam)->ttlprotein_findings }} @endisset"></td> --}}
    <td><input name="ttlprotein_recommendation" type="text" class="form-control" style="width:350px" id="ttlprotein_recommendation"
            value="@isset($exam) {{ optional($exam)->ttlprotein_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td width="24%">ALBUMIN</td>
    <td>
        <input oninput="getBloodRemarks(this, 'ALBUMIN', '35', '52', '@isset($exam) {{ optional($exam)->albumin }} @endisset')"
            name="albumin" type="text" class="form-control" id="albumin"
            value="@isset($exam) {{ optional($exam)->albumin }} @endisset" />
    </td>
    <td width="50%" class=""> 35-52 g/L </td>
    {{-- <td><input name="albumin_findings" type="text" class="form-control"
            style="width:350px" id="albumin_findings"
            value="@isset($exam) {{ optional($exam)->albumin_findings }} @endisset"></td> --}}
    <td><input name="albumin_recommendation" type="text" class="form-control" style="width:350px"
            id="albumin_recommendation" value="@isset($exam) {{ optional($exam)->albumin_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>GLOBULIN</td>
    <td>
        <input
            oninput="getBloodRemarks(this, 'GLOBULIN', '31', '35', '@isset($exam) {{ optional($exam)->globulin }} @endisset')"
            name="globulin" type="text" class="form-control" id="globulin" value="@isset($exam) {{ optional($exam)->globulin }} @endisset" />
    </td>
    <td class=""> 31-35 g/L </td>
    {{-- <td><input name="globulin_findings" type="text" class="form-control"
            style="width:350px" id="globulin_findings"
            value="@isset($exam) {{ optional($exam)->globulin_findings }} @endisset"></td> --}}
    <td><input name="globulin_recommendation" type="text" class="form-control" style="width:350px"
            id="globulin_recommendation" value="@isset($exam) {{ optional($exam)->globulin_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>SODIUM</td>
    <td>
        <input oninput="getBloodRemarks(this, 'SODIUM', '135', '148', '@isset($exam) {{ optional($exam)->sodium }} @endisset')"
            name="sodium" type="text" class="form-control" id="sodium"
            value="@isset($exam) {{ optional($exam)->sodium }} @endisset" />
    </td>
    <td class="">135.0-148 mmol/L</td>
    {{-- <td><input name="sodium_findings" type="text" class="form-control"
            style="width:350px" id="sodium_findings"
            value="@isset($exam) {{ optional($exam)->sodium_findings }} @endisset"></td> --}}
    <td><input name="sodium_recommendation" type="text" class="form-control" style="width:350px"
            id="sodium_recommendation"
            value="@isset($exam) {{ optional($exam)->sodium_recommendation }} @endisset"></td>
</tr>
<tr>
    <td>POTASSIUM</td>
    <td>
        <input name="potassium" type="text" class="form-control" id="potassium"
            oninput="getBloodRemarks(this, 'POTASSIUM', '3.5', '5.3', '@isset($exam) {{ optional($exam)->potassium }} @endisset')"
            value="@isset($exam) {{ optional($exam)->potassium }} @endisset" />
    </td>
    <td class="">3.5-5.3 mmol/L</td>
    {{-- <td><input name="potassium_findings" type="text" class="form-control"
            style="width:350px" id="potassium_findings"
            value="@isset($exam) {{ optional($exam)->potassium_findings }} @endisset"></td> --}}
    <td><input name="potassium_recommendation" type="text" class="form-control" style="width:350px"
            id="potassium_recommendation"
            value="@isset($exam) {{ optional($exam)->potassium_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>CHLORIDE</td>
    <td>
        <input name="chloride" type="text" class="form-control" id="chloride"
            value="@isset($exam) {{ optional($exam)->chloride }} @endisset"
            oninput="getBloodRemarks(this, 'CHLORIDE', '96', '108', '@isset($exam) {{ optional($exam)->chloride }} @endisset')" />
    </td>
    <td class="">96.0-108 mmol/L</td>
    {{-- <td><input name="chloride_findings" type="text" class="form-control"
            style="width:350px" id="chloride_findings"
            value="@isset($exam) {{ optional($exam)->chloride_findings }} @endisset"></td> --}}
    <td><input name="chloride_recommendation" type="text" class="form-control" style="width:350px"
            id="chloride_recommendation"
            value="@isset($exam) {{ optional($exam)->chloride_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>CALCIUM</td>
    <td>
        <input name="calcium" type="text" class="form-control" id="calcium"
            value="@isset($exam) {{ optional($exam)->calcium }} @endisset"
            oninput="getBloodRemarks(this, 'CALCIUM', '2.10', '2.90', '@isset($exam) {{ optional($exam)->calcium }} @endisset')" />
    </td>
    <td class="">2.10-2.90 mmol/L</td>
    {{-- <td><input name="calcium_findings" type="text" class="form-control"
            style="width:350px" id="calcium_findings"
            value="@isset($exam) {{ optional($exam)->calcium_findings }} @endisset"></td> --}}
    <td><input name="calcium_recommendation" type="text" class="form-control" style="width:350px"
            id="calcium_recommendation"
            value="@isset($exam) {{ optional($exam)->calcium_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td>A/G RATIO</td>
    <td>
        <input name="ag_ratio" type="text"
            value="@isset($exam) {{ optional($exam)->ag_ratio }} @endisset"
            class="form-control" id="ag_ratio" oninput="getBloodRemarks(this, 'AG RATIO', '0.6', '1.7')">
    </td>
    <td class="">1: 0.6-1.7</td>
    {{-- <td><input name="ag_ratio_findings" type="text" class="form-control"
            style="width:350px" id="ag_ratio_findings"
            value="@isset($exam) {{ optional($exam)->ag_ratio_findings }} @endisset"></td> --}}
    <td><input name="ag_ratio_recommendation" type="text" class="form-control" style="width:350px"
            id="ag_ratio_recommendation"
            value="@isset($exam) {{ optional($exam)->ag_ratio_recommendation }} @endisset">
    </td>
</tr>
<tr>
    <td align="left" class="brdAll">OTHERS:
        <input name="others" type="text" class="form-control" id="others"
            value="@isset($exam) {{ optional($exam)->others }} @endisset" style="width: 150px;"/>
    </td>
    <td valign="bottom">
        <input name="others_result" type="text" class="form-control" id="others_result"
            value="@isset($exam) {{ optional($exam)->others_result }} @endisset" />
    </td>
    {{-- <td valign="bottom">
        <input name="others_nv" type="text" class="form-control"
            style="width:200px" id="others_nv" value="@isset($exam) {{ optional($exam)->others_nv }} @endisset" />
    </td> --}}
</tr>
