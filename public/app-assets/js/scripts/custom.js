function openCamera() {
    Webcam.set({
        width: 250,
        height: 200,
        image_format: 'jpeg',
        jpeg_quality: 100
    });
    Webcam.attach('.camera');
}

function snapShot() {
    document.querySelector('.close').click();
    Webcam.snap(function(data_uri) {
        document.querySelector('.image-taken').src = data_uri;
        document.querySelector('.patient-image').value = data_uri;
    });
}

const canvas = document.querySelector(".signature");

const signaturePad = new SignaturePad(canvas, {
    penWidth: 2,
});


document.querySelector('.clear-signature').addEventListener('click', () => {
    signaturePad.clear();
})

var tmr;

function onSign() {
    if (IsSigWebInstalled()) {
        var ctx = document.querySelector('.signature').getContext('2d');
        SetDisplayXSize(500);
        SetDisplayYSize(100);
        SetTabletState(0, tmr);
        SetJustifyMode(0);
        ClearTablet();
        if (tmr == null) {
            tmr = SetTabletState(1, ctx, 50);
        } else {
            SetTabletState(0, tmr);
            tmr = null;
            tmr = SetTabletState(1, ctx, 50);
        }
    } else {
        // alert("Unable to communicate with SigWeb. Please confirm that SigWeb is installed and running on this PC.");
    }
}

function onClear() {
    ClearTablet();
    document.querySelector('#signature_data').value = '';
}

function onDone() {
    if (NumberOfTabletPoints() != 0) {
        SetJustifyMode(5);
        SetImageXSize(300);
        SetImageYSize(100);
        SetImagePenWidth(10);
        GetSigImageB64(SigImageCallback);

    } else if(!signaturePad._isEmpty) {
        submit_patient_signature(signaturePad.toDataURL())
    } else {
        Swal.fire(
            'Failed!',
            'Please sign before continuing!',
            'warning'
        )
    }
}

function SigImageCallback(str) {
    submit_patient_signature(str);
}
window.onbeforeunload = function(evt) {
    close();
    clearInterval(tmr);
    evt.preventDefault(); //For Firefox, needed for browser closure
};

onSign();

function submit_patient_signature(str) {
    let old_signature_value = document.querySelector('#old_signature').value;
    let patient_id = $('#patient_id').val();
    let csrf = $('#patient-signature-form input[name="_token"]').val();

    let data = {
        "_token": csrf,
        "id": patient_id,
        "old_signature": old_signature_value,
        "signature": str,
    }

    $.ajax({
        url: "/update_patient_signature",
        method: 'POST',
        data: data,
        success: function(response) {
            if (response.status) {
                Swal.fire(
                    'Update!',
                    'Update Successfully!',
                    'success'
                ).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload(true);
                    }
                })
            } else {
                Swal.fire(
                    'Not Send!',
                    'Update Failed!',
                    'warning'
                )
            }
        }
    });
}

function isTravelAbroadRecently(e) {
    if (e.value == 1) {
        let isTravelElement = document.querySelectorAll('.travel');
        for (let index = 0; index < isTravelElement.length; index++) {
            const element = isTravelElement[index];
            element.style.display = 'block';
        }
    } else {
        let isTravelElement = document.querySelectorAll('.travel');
        for (let index = 0; index < isTravelElement.length; index++) {
            const element = isTravelElement[index];
            element.style.display = 'none';
        }
    }
}

function hasContactWithPeopleInfected(e) {
    let element = document.querySelector('.show-if-contact');
    console.log(element)
    if (e.value == 1) {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}


$("#update_employee").submit(function(e) {
    e.preventDefault();
    if (signaturePad._isEmpty) {
        let oldSignature = $("#old_signature").val();
        let signatureInput = document.querySelector('#signature_data');
        signatureInput.value = oldSignature;

        const fd = new FormData(this);
        submitForm(fd, "/update_employees");

    } else {
        let signatureData = signaturePad.toDataURL();
        let signatureInput = document.querySelector('#signature_data');
        signatureInput.value = signatureData;

        const fd = new FormData(this);
        submitForm(fd, "/update_employees");
    }
});

$("#update_profile").submit(function(e) {
    e.preventDefault();
    if (signaturePad._isEmpty) {
        let oldSignature = $("#old_signature").val();
        let signatureInput = document.querySelector('#signature_data');
        signatureInput.value = oldSignature;

        const fd = new FormData(this);
        $.ajax({
            url: '/update_profile',
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                location.reload();
            }
        });

    } else {
        let signatureData = signaturePad.toDataURL();
        let signatureInput = document.querySelector('#signature_data');
        signatureInput.value = signatureData;

        const fd = new FormData(this);
        $.ajax({
            url: '/update_profile',
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                location.reload();
            }
        });
    }
});

$("#update_patient_basic").submit(function(e) {
    e.preventDefault();
    if (signaturePad._isEmpty) {
        let oldSignature = $("#old_signature").val();
        let signatureInput = document.querySelector('#signature_data');
        signatureInput.value = oldSignature;

        const fd = new FormData(this);
        submitForm(fd, "/update_patient_basic");
    } else {
        let signatureData = signaturePad.toDataURL();
        let signatureInput = document.querySelector('#signature_data');
        signatureInput.value = signatureData;

        const fd = new FormData(this);
        submitForm(fd, "/update_patient_basic");
    }
});

$("#update_patient_agency").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    submitForm(fd, "/update_patient_agency");
});

$("#update_patient_medical_history").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    submitForm(fd, "/update_patient_medical_history");
});

$("#update_patient_declaration_form").submit(function(e) {
    e.preventDefault();
    const fd = new FormData(this);
    submitForm(fd, "/update_patient_declaration_form");
});

$(document).ready(function() {
    dispExam($('#exam_type').val());
});

$('#exam_type').change(function() {
    dispExam($('#exam_type').val());
});

function dispExam(exam) {
    uid = $('#uid').val();
    $('#divKUB').hide();
    $('#divHBT').hide();
    $('#divTHYROID').hide();
    $('#divBREAST').hide();
    $('#divABDOMEN').hide();
    $('#divGENITALS').hide();

    if (exam == "KUB") {
        $('#divKUB').show();
    }
    if (exam == "HBT") {
        $('#divHBT').show();
    }
    if (exam == "GALLBLADDER") {
        $('#divHBT').show();
    }

    $('#impression').val("");
    if (exam == "THYROID") $('#divTHYROID').show();
    if (exam == "BREAST") $('#divBREAST').show();
    if (exam == "WHOLE ABDOMEN") $('#divABDOMEN').show();
    if (exam == "GENITALS") $('#divGENITALS').show();
}

$(function() {
    $(document).on('click', '.btn-add', function(e) {
        e.preventDefault();
        var controlForm = $('#myRepeatingFields:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);
        newEntry.find('input').val('package');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<i class="fa fa-trash"></i>');
    }).on('click', '.btn-remove', function(e) {
        e.preventDefault();
        $(this).parents('.entry:first').remove();
        return false;
    });
});

function submitForm(fd, url) {
    $.ajax({
        url: url,
        method: 'POST',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(response);
            if (response.status == 200) {
                Swal.fire(
                    'Update!',
                    'Update Successfully!',
                    'success'
                ).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload(true);
                    }
                })
            } else {
                Swal.fire(
                    'Not Send!',
                    'Update Failed!',
                    'warning'
                )
            }
        }
    });
}

$(".pending-textarea").hide();
$(".done-textarea").hide();

$(document).on('click', '#pending-btn', function(e) {
    $('#lab_status').val(1);
    $(".pending-textarea").show();
    $(".done-textarea").hide();
})

$(document).on('click', '#done-btn', function(e) {
    $('#lab_status').val(2);
    $(".done-textarea").show();
    $(".pending-textarea").hide();
})
