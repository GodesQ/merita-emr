@extends('layouts.admin-layout')

@section('content')
  <div class="app-content content bg-white">
    <div class="container">
    <div class="row">
      <div class="col-md-12 my-3">
      <div class="card">
        <div class="card-header">
        <div class="card-title">
          <div class="row">
          <div class="col-md-6">
            <h3>Edit Urinalysis</h3>
          </div>
          <div class="col-md-6 text-right">
            <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}"
            class="btn btn-primary">Back to Patient</a>
            <button
            onclick='window.open("/examlab_urinalysis_print?id={{ $exam->admission_id }}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid" title="Print">Print</button>
          </div>
          </div>
        </div>
        </div>
        <div class="card-content p-2">
        <form name="frm" method="post" action="/update_urinalysis" role="form">
          <table id="tblExam" width="100%" cellpadding="2" cellspacing="2" class="table table-bordered">
          @if (Session::get('status'))
          @push('scripts')
        <script>
        toastr.success('{{ Session::get('status') }}', 'Success');
        </script>
        @endpush
      @endif
          @csrf
          <input type="hidden" name="id" value="{{ $exam->id }}">
          <tbody>
            <tr>
            <td width="92"><b>PEME Date</b></td>
            <td width="247">
              <input name="peme_date" type="text" id="peme_date" value="{{ $admission->trans_date }}"
              class="form-control" readonly="">
            </td>
            <td width="113"><b>Admission No.</b></td>
            <td width="322">
              <div class="col-md-10" style="margin-left: -14px">
              <input name="admission_id" type="text" id="admission_id" value="{{ $exam->admission_id }}"
                class="form-control input-sm pull-left" placeholder="Admission No." readonly="">
              </div>
            </td>
            </tr>
            <tr>
            <td><b>Exam Date</b></td>
            <td><input name="trans_date" type="date" id="trans_date" value="{{ $exam->trans_date }}"
              class="form-control">
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td><b>Patient</b></td>
            <td>
              <input name="patientname" id="patientname" type="text"
              value="{{ $admission->patient->lastname . ', ' . $admission->patient->firstname }}"
              class="form-control" readonly="">
            </td>
            <td><b>Patient Code</b></td>
            <td><input name="patientcode" id="patientcode" type="text" value="{{ $exam->patientcode }}"
              class="form-control" readonly="">
            </td>
            </tr>

          </tbody>
          </table>
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table no-border">
          <tbody>
            <tr>
            <td width="186"><b>MACROSCOPIC</b></td>
            <td width="387"><span class="brdBtm"><b>RESULTS</b></span></td>
            <td width="207">&nbsp;</td>
            </tr>
            <tr>
            <td align="right" valign="top" class="brdAll">Color</td>
            <td>
              <select name="color" id="color" class="form-control move">
              <option value="" {{  $exam->color == "" ? "selected" : ""  }}>--SELECT--
              </option>
              <option value="Yellow" {{  $exam->color == "Yellow" ? "selected" : ""  }}>
                Yellow
              </option>
              <option value="Light Yellow" {{ $exam->color == "Light Yellow" ?
    "selected" : ""  }}>
                Light Yellow</option>
              <option value="Dark Yellow" {{  $exam->color == "Dark Yellow" ?
    "selected" : ""  }}>
                Dark Yellow</option>
              <option value="Orange" {{ $exam->color == 'Orange' ? 'selected' : null }}>Orange
              </option>
              <option value="Red" {{ $exam->color == 'Red' ? 'selected' : null }}>
                Red
              </option>
              </select>
            </td>
            <td align="left" valign="top" class="brdAll">&nbsp;</td>
            </tr>
            <tr>
            <td align="right" valign="top" class="brdAll">Transparency</td>
            <td>
              <select name="transparency" id="transparency" class="form-control move">
              <option value="" {{ $exam->transparency == "" ? "selected" : ""  }}>
                --SELECT--</option>
              <option value="Clear" {{ $exam->transparency == "Clear" ? "selected" : "" }}>
                Clear
              </option>
              <option value="Sl. Turbid" {{ $exam->transparency == "Sl. Turbid"
    ? "selected" : "" }}>
                Sl. Turbid</option>
              <option value="Turbid" {{ $exam->transparency == "Turbid" ?
    "selected" : "" }}>
                Turbid</option>
              <option value="Slightly Hazy" {{ $exam->transparency == 'Slightly Hazy' ? 'selected' : null }}>
                Slightly Hazy
              </option>
              <option value="Hazy" {{ $exam->transparency == 'Hazy' ? 'selected' : null }}>
                Hazy
              </option>
              </select>
            </td>
            <td align="left" valign="top" class="brdAll">&nbsp;</td>
            </tr>
            <tr>
            <td align="right" valign="top" class="brdAll">pH</td>
            <td>
              <select name="ph" id="ph" class="form-control move">
              <option value="">--SELECT--</option>
              <option {{ $exam->ph == '5.0' ? 'selected' : null }} value="5.0">
                5.0</option>
              <option {{ $exam->ph == '5.5' ? 'selected' : null }} value="5.5">
                5.5</option>
              <option {{ $exam->ph == '6.0' ? 'selected' : null }} value="6.0">
                6.0</option>
              <option {{ $exam->ph == '6.5' ? 'selected' : null }} value="6.5">
                6.5</option>
              <option {{ $exam->ph == '7.0' ? 'selected' : null }} value="7.0">
                7.0</option>
              <option {{ $exam->ph == '7.5' ? 'selected' : null }} value="7.5">
                7.5</option>
              <option {{ $exam->ph == '8.0' ? 'selected' : null }} value="8.0">
                8.0</option>
              </select>
            </td>
            <td align="left" valign="top" class="brdAll">&nbsp;</td>
            </tr>
            <tr>
            <td align="right" valign="top" class="brdAll">Specific Gravity</td>
            <td>
              <select name="spgravity" id="spgravity" class="form-control move">
              <option value="">--SELECT--</option>
              <option {{ $exam->spgravity == '1.000' ? 'selected' : null }} value="1.000">1.000</option>
              <option {{ $exam->spgravity == '1.005' ? 'selected' : null }} value="1.005">1.005</option>
              <option {{ $exam->spgravity == '1.010' ? 'selected' : null }} value="1.010">1.010</option>
              <option {{ $exam->spgravity == '1.015' ? 'selected' : null }} value="1.015">1.015</option>
              <option {{ $exam->spgravity == '1.020' ? 'selected' : null }} value="1.020">1.020</option>
              <option {{ $exam->spgravity == '1.020' ? 'selected' : null }} value="1.025">1.025</option>
              <option {{ $exam->spgravity == '1.030' ? 'selected' : null }} value="1.030">1.030</option>
              </select>
            </td>
            <td align="left" valign="top" class="brdAll">&nbsp;</td>
            </tr>
            <tr>
            <td height="30" align="right" valign="top" class="brdAll">Sugar</td>
            <td>
              @foreach (['Negative', '+1', '+2', '+3', '+4', ''] as $index => $val)
                <input onchange="handleFindingChange(this, 'Sugar', 'Negative')" 
                  name="sugar"
                  style="width: 20px; height: 20px;" 
                  type="radio" class="m-1"
                  value="{{ $val }}" {{ $exam->sugar == $val ? 'checked' : '' }} />
                  {{ $val === '' ? 'Reset' : $val }}
              @endforeach
            </td>
            <td align="left" valign="top" class="brdAll">&nbsp;</td>
            </tr>
            <tr>
            <td height="30" align="right" valign="top" class="brdAll">
              Protein/Albumin</td>
            <td>
                @foreach (['Negative', '+1', '+2', '+3', '+4', ''] as $index => $val)
                  <input onchange="handleFindingChange(this, 'Protein/Albumin', 'Negative')" 
                    name="albumin"
                    style="width: 20px; height: 20px;" 
                    type="radio" class="m-1"
                    value="{{ $val }}" {{ $exam->albumin == $val ? 'checked' : '' }} />
                    {{ $val === '' ? 'Reset' : $val }}
                @endforeach
              </td>
            <td align="left" valign="top" class="brdAll">&nbsp;</td>
            </tr>
            <tr>
            <td height="30" align="right" valign="top" class="brdAll">Ketone</td>
            <td>
              @foreach (['Negative', '+1', '+2', '+3', '+4', ''] as $index => $val)
                <input onchange="handleFindingChange(this, 'Ketone', 'Negative')" 
                  name="ketone"
                  style="width: 20px; height: 20px;" 
                  type="radio" class="m-1"
                  value="{{ $val }}" {{ $exam->ketone == $val ? 'checked' : '' }} />
                  {{ $val === '' ? 'Reset' : $val }}
              @endforeach
            </td>
            <td align="left" valign="top" class="brdAll">&nbsp;</td>
            </tr>
            <tr>
            <td height="30" align="right" valign="top" class="brdAll">Urobilinogen
            </td>
            <td>
              @foreach (['Normal', '+1', '+2', '+3', '+4', ''] as $index => $val)
                <input 
                  onchange="handleFindingChange(this, 'Urobilinogen', 'Normal')" name="urobilinogen"
                  type="radio" class="m-1 move" 
                  style="width: 20px; height: 20px;" 
                  value="{{ $val }}" {{ $exam->urobilinogen == $val ? 'checked' : '' }} />
                  {{ $val === '' ? 'Reset' : $val }}
              @endforeach
            </td>
            <td align="left" valign="top" class="brdAll">&nbsp;</td>
            </tr>
            <tr>
            <td height="30" align="right" valign="top" class="brdAll">Bilirubin
            </td>
            <td>
              @foreach (['Negative', '+1', '+2', '+3', '+4', ''] as $index => $val)
                <input onchange="handleFindingChange(this, 'Bilirubin', 'Negative')" 
                  name="bilirubin"
                  style="width: 20px; height: 20px;" 
                  type="radio" class="m-1"
                  value="{{ $val }}" {{ $exam->bilirubin == $val ? 'checked' : '' }} />
                  {{ $val === '' ? 'Reset' : $val }}
              @endforeach
            </td>
            <td align="left" valign="top" class="brdAll">&nbsp;</td>
            </tr>
            <tr>
            <td height="30" align="right" valign="top" class="brdAll">Nitrite</td>
            <td>
              @foreach (['Negative', '+1', '+2', '+3', '+4', ''] as $index => $val)
                <input onchange="handleFindingChange(this, 'Nitrite', 'Negative')" 
                  name="nitrite"
                  style="width: 20px; height: 20px;" 
                  type="radio" class="m-1"
                  value="{{ $val }}" {{ $exam->nitrite == $val ? 'checked' : '' }} />
                  {{ $val === '' ? 'Reset' : $val }}
              @endforeach
            </td>
            <td align="left" valign="top" class="brdAll">&nbsp;</td>
            </tr>
            <tr>
            <td height="30" align="right" valign="top" class="brdAll">Leukocyte</td>
            <td>
              @foreach (['Negative', '+1', '+2', '+3', '+4', ''] as $index => $val)
                <input onchange="handleFindingChange(this, 'Leukocyte', 'Negative')" 
                  name="leukocyte"
                  style="width: 20px; height: 20px;" 
                  type="radio" class="m-1" 
                  value="{{ $val }}" {{ $exam->leukocyte == $val ? 'checked' : '' }}>
                  {{ $val === '' ? 'Reset' : $val }}
              @endforeach
            </td>
            <td align="left" valign="top" class="brdAll">&nbsp;</td>
            </tr>
            <tr>
            <td height="30" align="right" valign="top" class="brdAll">Blood Cell
            </td>
            <td>
              @foreach (['Negative', '+1', '+2', '+3', '+4', ''] as $index => $val)
                <input onchange="handleFindingChange(this, 'Blood Cells', 'Negative')" 
                  name="blood"
                  style="width: 20px; height: 20px;" 
                  type="radio" class="m-1"
                  value="{{ $val }}" {{ $exam->blood == $val ? 'checked' : '' }} />
                  {{ $val === '' ? 'Reset' : $val }}
              @endforeach
            </td>
            <td align="left" valign="top" class="brdAll">&nbsp;</td>
            </tr>
          </tbody>
          </table>
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table no-border">
          <tbody>
            <tr>
            <td width="24%"><b>MICROSCOPIC</b></td>
            <td><span class="brdLeftBtm"><b>RESULTS</b></span></td>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td align="right" valign="top" class="brdLeft">Pus Cells</td>
            <td>
              <input name="pus" type="text" class="form-control move" id="pus" value="{{ $exam->pus }}">
            </td>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td align="right" valign="top" class="brdLeft">RBC</td>
            <td width="49%">
              <input name="rbc" type="text" class="form-control move" id="rbc" value="{{ $exam->rbc }}">
            </td>
            <td width="27%">&nbsp;</td>
            </tr>
            <tr>
            <td height="30" align="right" valign="top" class="brdLeft">Epithelial
              Cells</td>
            <td>
              <input name="epithelial" {{ $exam->epithelial == 'Occassional' ? 'checked' : null }} type="radio"
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_0"
              value="Occassional">Occassional
              <input name="epithelial" {{ $exam->epithelial == 'Few' ? 'checked' : null }} type="radio"
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_1" value="Few">Few
              <input name="epithelial" {{ $exam->epithelial == 'Moderate' ? 'checked' : null }} type="radio"
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_2" value="Moderate">Moderate
              <input name="epithelial" {{ $exam->epithelial == 'Many' ? 'checked' : null }} type="radio"
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_3" value="Many">Many
              <input name="epithelial" {{ $exam->epithelial == '' ? 'checked' : null }} type="radio"
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_4" value="">Reset
            </td>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td height="30" align="right" valign="top" class="brdLeft">Amorphous
              Urates</td>
            <td>
              <input name="urates" type="radio" {{ $exam->urates == 'Occassional' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_0"
              value="Occassional">Occassional
              <input name="urates" type="radio" {{ $exam->urates == 'Few' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_1" value="Few">Few
              <input name="urates" type="radio" {{ $exam->urates == 'Moderate' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_2" value="Moderate">Moderate
              <input name="urates" type="radio" {{ $exam->urates == 'Many' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_3" value="Many">Many
              <input name="urates" type="radio" {{ $exam->urates == '' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_4" value="">Reset
            </td>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td height="30" align="right" valign="top" class="brdLeft">Amorphous
              Phosphates</td>
            <td>
              <input name="phosphates" type="radio" {{ $exam->phosphates == 'Occassional' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_0"
              value="Occassional">Occassional
              <input name="phosphates" type="radio" {{ $exam->phosphates == 'Few' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_1" value="Few">Few
              <input name="phosphates" type="radio" {{ $exam->phosphates == 'Moderate' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_2" value="Moderate">Moderate
              <input name="phosphates" type="radio" {{ $exam->phosphates == 'Many' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_3" value="Many">Many
              <input name="phosphates" type="radio" {{ $exam->phosphates == '' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_4" value="">Reset
            </td>

            <td>&nbsp;</td>
            </tr>
            <tr>
            <td height="30" align="right" valign="top" class="brdLeft">Mucus
              Threads</td>
            <td>
              <input name="mucus" type="radio" {{ $exam->mucus == 'Occassional' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_0"
              value="Occassional">Occassional
              <input name="mucus" type="radio" {{ $exam->mucus == 'Few' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_1" value="Few">Few
              <input name="mucus" type="radio" {{ $exam->mucus == 'Moderate' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_2" value="Moderate">Moderate
              <input name="mucus" type="radio" {{ $exam->mucus == 'Many' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_3" value="Many">Many
              <input name="mucus" type="radio" {{ $exam->mucus == '' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_4" value="">Reset
            </td>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td height="30" align="right" valign="top" class="brdLeft">Bacteria
            </td>
            <td>
              <input name="bacteria" type="radio" {{ $exam->bacteria == 'Occassional' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_0"
              value="Occassional">Occassional
              <input name="bacteria" type="radio" {{ $exam->bacteria == 'Few' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_1" value="Few">Few
              <input name="bacteria" type="radio" {{ $exam->bacteria == 'Moderate' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_2" value="Moderate">Moderate
              <input name="bacteria" type="radio" {{ $exam->bacteria == 'Many' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_3" value="Many">Many
              <input name="bacteria" type="radio" {{ $exam->bacteria == '' ? 'checked' : null }}
              style="width: 20px; height: 20px;" class="m-1 move" id="bacteria_4" value="">Reset
            </td>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td align="right" class="brdLeft">Others</td>
            <td colspan="2"><input name="others" type="text" class="form-control move" id="others"
              value="{{ $exam->others }}"></td>
            </tr>
          </tbody>
          </table>
          <table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tbody>
            <tr>
            <td colspan="4">
              <div class="form-group">
              <label for=""><b>Remarks</b></label>
              <input name="remarks_status" type="radio" style="width: 20px; height: 20px;" class="m-1"
                id="remarks_status_0" value="normal" {{ $exam->remarks_status == "normal" ? "checked" : null }}>Normal
              <input name="remarks_status" type="radio" style="width: 20px; height: 20px;" class="m-1"
                id="remarks_status_1" value="findings" {{ $exam->remarks_status == "findings" ? "checked" : null }}>With
              Findings
              </div>
              <div class="form-group">
              <label class="font-weight-bold">Findings</label>
              <textarea class="form-control" name="remarks" id="remarks" cols="30"
                rows="6">{{ $exam->remarks }}</textarea>
              </div>
              @if (
          !in_array(session()->get('position'), [
          'Cashier',
          'Releasing',
          'Human Resource / Documentation Officer',
          'Information Clerk',
          'Nurse',
          'Asst accounant',
          ])
          )
            <div class="form-group">
            <label class="font-weight-bold">Recommendation</label>
            <textarea class="form-control" name="recommendation" id="" cols="30"
              rows="6">{{ $exam->recommendation }}</textarea>
            </div>
        @endif
            </td>
            </tr>
          </tbody>
          </table>
          <table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tbody>
            <tr>
            <td align="left">
              <table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tbody>
                <tr>
                <td width="23%"><b>Medical Technologist: </b></td>
                <td width="77%">
                  <div class="col-md-8">
                  <select required name="technician_id" id="technician_id" class="form-control">
                    @foreach ($medical_techs as $med_tech)
                      <option value={{ $med_tech->id }} {{ $med_tech->id == $exam->technician_id ? 'selected' : null }}>
                        {{ $med_tech->firstname }}
                        {{ $med_tech->lastname }},
                        {{ $med_tech->title }}
                      </option>
                    @endforeach
                  </select>
                  </div>
                </td>
                </tr>
                <tr>
                <td><b>Pathologist: </b></td>
                <td>
                  <div class="col-md-8">
                  <select required name="technician2_id" id="technician2_id" class="form-control">
                    @foreach ($pathologists as $pathologist)
            <option value={{ $pathologist->id }} {{ $pathologist->id == $exam->technician2_id ? 'selected' : null }}>
            {{ $pathologist->firstname }}
            {{ $pathologist->lastname }},
            {{ $pathologist->title }}</option>
            @endforeach
                  </select>
                  </div>
                </td>
                </tr>
              </tbody>
              </table>
            </td>
            </tr>
          </tbody>
          </table>
          <div class="box-footer">
          <button name="action" id="btnSave" value="save" type="submit" class="btn btn-primary"
            onclick="return chkAdmission();">Save</button>
          </div>
        </form>
        </div>
      </div>
      </div>
    </div>
    </div>
    <script>
    document.addEventListener('keydown', handleInputFocusTransfer);

    function handleFindingChange(el, testLabel, defaultValue) {
      const remarks = document.querySelector('#remarks');
      const value = el.value;
      const testLine = `${testLabel}: ${value}`;

      // Split existing lines and remove blank lines
      const lines = remarks.value.split('\n').filter(line => line.trim() !== '');

      // Remove any existing line that starts with the same testLabel
      const filteredLines = lines.filter(line => !line.startsWith(`${testLabel}:`));

      // Add new line only if value is not the default or empty (reset)
      if (value !== defaultValue && value !== '') {
      filteredLines.push(testLine);
      }

      // Update textarea
      remarks.value = filteredLines.join('\n');
    }

    function handleInputFocusTransfer(e) {
      const focusableInputElements = document.querySelectorAll(`.move`);

      //Creating an array from the node list
      const focusable = [...focusableInputElements];

      //get the index of current item
      const index = focusable.indexOf(document.activeElement);

      // Create a variable to store the idex of next item to be focussed
      let nextIndex = 0;

      if (e.keyCode === 37) {
      // up arrow
      e.preventDefault();
      nextIndex = index > 0 ? index - 1 : 0;
      focusableInputElements[nextIndex].focus();
      } else if (e.keyCode === 39) {
      // down arrow
      e.preventDefault();
      nextIndex = index + 1 < focusable.length ? index + 1 : index;
      focusableInputElements[nextIndex].focus();
      }
    }
    </script>
  @endsection