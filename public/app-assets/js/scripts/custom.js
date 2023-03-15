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
        // display results in page
        console.log(data_uri);
        // document.querySelector('.image-taken').innerHTML =
        //     '<img src="' + data_uri + '" />';
        document.querySelector('.image-taken').src = data_uri;
        document.querySelector('.patient-image').value = data_uri;
    });
}

const canvas = document.querySelector(".signature");
const ctx = canvas.getContext('2d');

const signaturePad = new SignaturePad(canvas, {
    penWidth: 2,
});


document.querySelector('.clear-signature').addEventListener('click', () => {
    // console.log(signaturePad.removeBlanks());
    signaturePad.clear();
})





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