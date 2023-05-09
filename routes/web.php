<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Auth\PatientAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AgencyAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\ChartAccountController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\AudiometryController;
use App\Http\Controllers\CardioRiskFactorController;
use App\Http\Controllers\CardioVascularController;
use App\Http\Controllers\ECGController;
use App\Http\Controllers\EchoDopplerController;
use App\Http\Controllers\EchoPlainController;
use App\Http\Controllers\IshiharaController;
use App\Http\Controllers\PhysicalController;
use App\Http\Controllers\PsychologicalController;
use App\Http\Controllers\PsychoBPIController;
use App\Http\Controllers\StressEchoController;
use App\Http\Controllers\UltrasoundController;
use App\Http\Controllers\VisacuityController;
use App\Http\Controllers\XRayController;
use App\Http\Controllers\DentalController;
use App\Http\Controllers\BloodSerologyController;
use App\Http\Controllers\HIVController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\FecalysisController;
use App\Http\Controllers\HematologyController;
use App\Http\Controllers\HepatitisController;
use App\Http\Controllers\PregnancyController;
use App\Http\Controllers\UrinalysisController;
use App\Http\Controllers\PPDController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\StressTestController;
use App\Http\Controllers\PrintPanelController;
use App\Http\Controllers\SOAController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\DocumentationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PatientAuthController::class, 'login']);
Route::get('/login', [PatientAuthController::class, 'login']);
Route::post('/save-login', [PatientAuthController::class, 'save_login']);
Route::get('/register', [PatientAuthController::class, 'register']);
Route::post('/save-register', [PatientAuthController::class, 'save_register']);
Route::view('/verify-message', 'verification-message');
Route::get('/verify-email', [PatientAuthController::class, 'verify']);

Route::get('/employee-login', [AdminAuthController::class, 'login']);
Route::post('/save-employee-login', [AdminAuthController::class, 'save_login']);

Route::get('/agency-login', [AgencyAuthController::class, 'login']);
Route::post('/save-agency-login', [AgencyAuthController::class, 'save_login']);

Route::get('/change_agency_password', [AgencyAuthController::class, 'change_agency_password']);
Route::post('/update_agency_password', [AgencyAuthController::class, 'update_agency_password']);

Route::get('/password_forget_form', [ForgetPasswordController::class, 'view_password_forget_form']);
Route::get('/agency_password_forget_form', [ForgetPasswordController::class, 'view_agency_password_forget_form']);
Route::post('/submit_forget_form', [ForgetPasswordController::class, 'submit_forget_form']);
Route::get('/password_reset_form', [ForgetPasswordController::class, 'view_password_reset_form']);
Route::post('/submit_reset_form', [ForgetPasswordController::class, 'submit_reset_form']);

Route::view('/new_skuld', 'PrintPanel.new-skuld');

// ----------------------------------------------- AUTHENTICATION -------------------------------------------- //

Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/migrate-patients', [AdminController::class, 'migrate_patients']);

    Route::get('/followup_results', [AdminController::class, 'followup_results']);
    // ----------------------------------------- START PATIENT ACCESS --------------------------------------- //
    Route::get('/see_record', [PatientController::class, 'see_record']);

    Route::get('/documentation', [DocumentationController::class, 'patient_documentation']);

    Route::get('/patient_info', [PatientController::class, 'patient_info']);

    Route::get('/progress-patient-info', [PatientController::class, 'progress_info']);

    Route::post('/save-info', [PatientController::class, 'save_progress_info']);

    Route::get('/edit-patient-info', [PatientController::class, 'edit_patient_info']);

    Route::post('/update-patient-info', [PatientController::class, 'update_patient_info']);

    Route::get('/schedule_appointment', [PatientController::class, 'schedule_appointment']);

    Route::post('/store_schedule', [PatientController::class, 'store_schedule']);

    Route::get('/edit_schedule', [PatientController::class, 'edit_schedule']);

    Route::post('/update_schedule', [PatientController::class, 'update_schedule']);

    Route::get('/laboratory_result', [PatientController::class, 'view_laboratory']);

    Route::get('/remedical', [PatientController::class, 'remedical']);

    Route::post('/store_remedical', [PatientController::class, 'store_remedical']);

    // ----------------------------------------- END PATIENT ACCESS --------------------------------------- //

    // ----------------------------------------- START AGENCY ACCESS --------------------------------------- //

    Route::get('/change_password', [AgencyAuthController::class, 'change_password']);

    Route::post('/store_password', [AgencyAuthController::class, 'store_password']);

    Route::get('agency_dashboard', [AgencyController::class, 'view_dashboard']);

    Route::get('/agency_patient_table', [AgencyController::class, 'agency_patient_table'])->name('agency_patient_table');

    Route::get('/filter_agency_employee', [AgencyController::class, 'filter_agency_employee']);

    Route::get('/agency_documentation', [DocumentationController::class, 'agency_documentation']);

    Route::get('/agency_emp', [AgencyController::class, 'view_agency_emp']);

    Route::post('/get_agencies', [AgencyController::class, 'select_agencies'])->name('agencies.select');

    Route::get('/refferal_slips', [ReferralController::class, 'referrals']);

    Route::get('/referral_slips_list', [ReferralController::class, 'referral_list']);

    Route::get('/referral_pdf', [PrintController::class, 'referral_pdf']);

    Route::get('/hold_employee', [ReferralController::class, 'hold_employee'])->name('hold_employee');

    Route::get('/activate_employee', [ReferralController::class, 'activate_employee'])->name('activate_employee');

    Route::get('/add_refferal_slip', [ReferralController::class, 'add_refferal_slip']);

    Route::post('/store_refferal', [ReferralController::class, 'store_refferal']);

    Route::get('/edit_referral', [ReferralController::class, 'edit_referral']);

    Route::post('/update_referral', [ReferralController::class, 'update_referral']);

    Route::get('/referral', [ReferralController::class, 'view_referral']);

    // ----------------------------------------- END AGENCY ACCESS --------------------------------------- //

    // ----------------------------------------- START ADMIN ACCESS --------------------------------------- //

    Route::get('/search', [PatientController::class, 'search'])->name('patient.search');

    Route::get('/dashboard', [AdminController::class, 'view_dashboard']);

    Route::get('/employee_documentation', [DocumentationController::class, 'employee_documentation']);

    Route::get('/patients', [PatientController::class, 'view_patients'])->name('patients.index');

    Route::get('/today_patients', [AdminController::class, 'today_patients']);

    Route::get('/today_medical_packages', [AdminController::class, 'today_medical_packages']);

    Route::get('/today_fit_patients', [AdminController::class, 'today_fit_patients']);

    Route::get('/today_unfit_patients', [AdminController::class, 'today_unfit_patients']);

    Route::get('/today_pending_patients', [AdminController::class, 'today_pending_patients']);

    Route::post('/submit_agency_password_form', [AgencyController::class, 'submit_agency_password_form']);

    //------------------------------- CRUD OF PATIENT IN ADMIN ACCESS ---------------------------------------- //

    Route::get('/get_patients', [PatientController::class, 'get_patients'])->name('patients.get');

    Route::get('/patient_edit', [PatientController::class, 'edit_patient'])->name('patient_edit');

    Route::get('/patient_edit/crop_signature', [PatientController::class, 'crop_signature'])->name('patient.crop');

    Route::post('/patient_edit/return_default_signature', [PatientController::class, 'return_default_signature'])->name('patient.return_default_signature');

    Route::post('/patient_edit/crop_signature', [PatientController::class, 'save_crop_signature'])->name('patient.crop.save');

    Route::group(['middleware' => ['Patient']], function () {
        Route::get('/add_patient', [PatientController::class, 'add_patient'])->name('patients.add');

        Route::post('/store_patient', [PatientController::class, 'store_patient'])->name('patients.store');

        Route::post('/update_patient_signature', [PatientController::class, 'update_patient_signature'])->name('update_patient_signature');

        Route::post('/update_patient_basic', [PatientController::class, 'update_patient_basic'])->name('update_patient_basic');

        Route::post('/update_patient_agency', [PatientController::class, 'update_patient_agency'])->name('update_patient_agency');

        Route::post('/update_patient_medical_history', [PatientController::class, 'update_patient_medical_history'])->name('update_patient_medical_history');

        Route::post('/update_patient_declaration_form', [PatientController::class, 'update_patient_declaration_form'])->name('update_patient_declaration_form');

        Route::post('/store_patient_files', [PatientController::class, 'store_patient_files'])->name('store_patient_files');

        Route::delete('/patient_delete', [PatientController::class, 'delete_patient'])->name('patientsDelete');
    });

    // ------------------------------- END OF CRUD PATIENT IN ADMIN ACCESS ---------------------------------------- //

    // -------------------------------- CRUD OF ALL RELATED IN ADMISSION -------------------------------------------//
    Route::get('/admission_print', [PrintController::class, 'admission_print']);

    Route::get('/select_admission', [AdmissionController::class, 'select_admission'])
        ->name('admission.index')
        ->middleware([Transaction::class]);

    Route::get('/admissions', [AdmissionController::class, 'view_admissions'])
        ->name('admission.index')
        ->middleware([Transaction::class]);

    Route::get('/get_admission', [AdmissionController::class, 'get_admission'])
        ->name('admission.get')
        ->middleware([Transaction::class]);

    Route::get('/admission_selects', [AdmissionController::class, 'admission_selects'])->name('admission_selects');

    Route::get('/create_admission', [AdmissionController::class, 'create_admission'])
        ->name('create_admission')
        ->middleware([Transaction::class]);

    Route::post('/store_admission', [AdmissionController::class, 'store_admission'])
        ->name('store_admission')
        ->middleware([Transaction::class]);

    Route::get('/edit_admission', [AdmissionController::class, 'edit_admission'])
        ->name('edit_admission')
        ->middleware([Transaction::class]);

    Route::post('/update_admission', [AdmissionController::class, 'update_admission'])
        ->name('update_admission')
        ->middleware([Transaction::class]);

    Route::delete('/admission_delete', [AdmissionController::class, 'delete_admission'])
        ->name('admission.delete')
        ->middleware([Transaction::class]);

    Route::post('/update_lab_result', [AdmissionController::class, 'update_lab_result'])->name('update_lab_result')->middleware([Transaction::class]);
    Route::post('/reset_lab_result', [AdmissionController::class, 'reset_lab_result'])->name('reset_lab_result')->middleware([Transaction::class]);

    Route::post('create_followup', [AdmissionController::class, 'create_followup']);

    Route::post('destroy_followup', [AdmissionController::class, 'destroy_followup']);

    // -------------------------------- END CRUD OF ALL RELATED IN ADMISSION -------------------------------------------//

    // -------------------------------- START CRUD OF ALL AGENCY -------------------------------------------//
    Route::get('/agencies', [AgencyController::class, 'view_agencies'])
        ->name('agencies.index')
        ->middleware([Agency::class]);

    Route::get('/get_agencies', [AgencyController::class, 'get_agencies'])
        ->name('agencies.get')
        ->middleware([Agency::class]);

    Route::get('/add_agency', [AgencyController::class, 'add_agency'])
        ->name('agency.add')
        ->middleware([Agency::class]);

    Route::post('/store_agency', [AgencyController::class, 'store_agency'])
        ->name('agency.store')
        ->middleware([Agency::class]);

    Route::get('/edit_agency', [AgencyController::class, 'edit_agency'])
        ->name('agency.edit')
        ->middleware([Agency::class]);

    Route::post('/update_agency', [AgencyController::class, 'update_agency'])
        ->name('agency.update')
        ->middleware([Agency::class]);

    Route::delete('/agency_delete', [AgencyController::class, 'delete_agency'])
        ->name('agency.delete')
        ->middleware([Agency::class]);
    // -------------------------------- END CRUD OF ALL AGENCY -------------------------------------------//

    // -------------------------------- START CRUD OF ALL RECEPTION ADMIN---------------------------//
    Route::group(['middleware' => ['ReceptionAdmin']], function () {
        Route::get('/list_package', [PackageController::class, 'view_list_package'])->name('package.index');

        Route::get('/get_list_package', [PackageController::class, 'get_list_package'])->name('package.get');

        Route::get('/add_package', [PackageController::class, 'add_package'])->name('package.add');

        Route::post('/store_package', [PackageController::class, 'store_package'])->name('package.store');

        Route::get('/edit_package', [PackageController::class, 'edit_package'])->name('package.edit');

        Route::post('/update_package', [PackageController::class, 'update_package'])->name('package.update');

        Route::delete('/list_package_delete', [PackageController::class, 'delete_list_package'])->name('package.delete');
    });

    Route::get('/list_exam', [ExamController::class, 'view_list_exam'])->name('exam.index');

    Route::get('/get_list_exam', [ExamController::class, 'get_list_exam'])->name('exam.get');

    Route::get('/add_exam', [ExamController::class, 'add_exam'])->name('exam.add');

    Route::post('/store_exam', [ExamController::class, 'store_exam'])->name('exam.store');

    Route::get('/edit_exam', [ExamController::class, 'edit_exam'])->name('exam.edit');

    Route::post('/update_exam', [ExamController::class, 'update_exam'])->name('exam.update');

    Route::delete('/list_exam_delete', [ExamController::class, 'delete_list_exam'])->name('exam.delete');

    // ------------------------------- ONLY ADMIN CAN ACCESS THIS ROUTES ------------------------------------ //
    Route::group(['middleware' => ['AdminAccess']], function () {
        Route::get('/month_scheduled_patients', [AdminController::class, 'month_scheduled_patients']);

        Route::get('/scheduled_patients', [AdminController::class, 'scheduled_patients']);

        // Route::get('/admission_statistics', [AdminController::class, 'admission_statistics']);

        Route::get('/logs', [AdminController::class, 'logs']);

        Route::get('/logs_table', [AdminController::class, 'logs_table']);

        Route::get('/actgmast_coa', [ChartAccountController::class, 'view_chart_accounts'])->name('coa.index');

        Route::get('/actgmast_coa_get', [ChartAccountController::class, 'view_chart_accounts'])->name('coa.get');

        Route::get('/create_coa', [ChartAccountController::class, 'create_coa'])->name('coa.create');

        Route::post('/store_coa', [ChartAccountController::class, 'store_coa'])->name('coa.store');

        Route::get('/edit_coa', [ChartAccountController::class, 'edit_coa'])->name('coa.edit');

        Route::post('/update_coa', [ChartAccountController::class, 'update_coa'])->name('coa.update');

        Route::get('/get_coa', [ChartAccountController::class, 'get_coa'])->name('coa.get');

        Route::delete('/chart_account_delete', [ChartAccountController::class, 'delete_chart_account'])->name('coa.delete');

        Route::get('/employees', [AdminController::class, 'view_employees'])->name('employee.index');

        Route::get('/get_employees', [AdminController::class, 'get_employees'])->name('employee.get');

        Route::get('/add_employees', [AdminController::class, 'add_employees'])->name('employee.add');

        Route::post('/store_employees', [AdminController::class, 'store_employees'])->name('employee.store');

        Route::get('/edit_employees', [AdminController::class, 'edit_employees'])->name('employee.edit');

        Route::post('/update_employees', [AdminController::class, 'update_employees'])->name('employee.update');

        Route::delete('/employee_delete', [AdminController::class, 'delete_employee'])->name('employee.delete');

        Route::post('/employee_update_status', [AdminController::class, 'update_status'])->name('employee.update_status');

        Route::get('/list_section', [SectionController::class, 'view_list_section'])->name('section.index');

        Route::get('/get_list_section', [SectionController::class, 'get_list_section'])->name('section.get');

        Route::get('/add_section', [SectionController::class, 'add_section'])->name('section.add');

        Route::post('/store_section', [SectionController::class, 'store_section'])->name('section.store');

        Route::get('edit_section', [SectionController::class, 'edit_section'])->name('section.edit');

        Route::post('update_section', [SectionController::class, 'update_section'])->name('section.update');

        Route::delete('/list_section_delete', [SectionController::class, 'delete_list_section'])->name('section.delete');

        Route::get('/list_department', [AdminController::class, 'view_departments'])->name('department.index');

        Route::get('/department_tables', [AdminController::class, 'department_tables'])->name('department_tables');

        Route::get('/add_department', [AdminController::class, 'add_department'])->name('department.add');

        Route::post('/store_department', [AdminController::class, 'store_department'])->name('department.add');

        Route::get('/edit_department', [AdminController::class, 'edit_department'])->name('department.edit');

        Route::post('/update_department', [AdminController::class, 'update_department'])->name('department.update');

        Route::delete('/delete_department', [AdminController::class, 'delete_department'])->name('department.delete');

        Route::get('/list_request', [RequestController::class, 'view_requests'])->name('request.index');

        Route::get('/request_tables', [RequestController::class, 'request_tables'])->name('request_tables');

        Route::get('/print_panel', [PrintPanelController::class, 'print_panel']);

        Route::post('/store_yellow_card', [PrintPanelController::class, 'store_yellow_card']);
        Route::get('/yellow_card_print', [PrintController::class, 'yellow_card_print']);
    });

    // ----------------------------------------- END ACCESS OF ADMIN ONLY ------------------------------------- //

    Route::get('/add_request', [RequestController::class, 'add_request'])->name('request.add');

    Route::post('/store_request', [RequestController::class, 'store_request'])->name('request.store');

    Route::get('/edit_request', [RequestController::class, 'edit_request'])->name('request.edit');

    Route::post('/update_request', [RequestController::class, 'update_request'])->name('request.update');

    Route::delete('/delete_request', [RequestController::class, 'delete_request'])->name('request.delete');

    Route::get('/skuld_print', [PrintPanelController::class, 'skuld_print']);

    Route::get('/west_england_print', [PrintPanelController::class, 'west_england_print']);

    Route::get('/north_england_print', [PrintPanelController::class, 'north_england_print']);

    Route::get('/standard_club_print', [PrintPanelController::class, 'standard_club_print']);
    Route::get('/standard_club_north_print', [PrintPanelController::class, 'standard_club_north_print']);


    Route::get('/bermuda_print', [PrintPanelController::class, 'bermuda_print']);
    Route::get('/cayman_print', [PrintPanelController::class, 'cayman_print']);
    Route::get('/croatian_print', [PrintPanelController::class, 'croatian_print']);
    Route::get('/danish_print', [PrintPanelController::class, 'danish_print']);
    Route::get('/bahamas_print', [PrintPanelController::class, 'bahamas_print']);
    Route::get('/liberian_print', [PrintPanelController::class, 'liberian_print']);

    Route::get('/singapore_flag_print', [PrintPanelController::class, 'singapore_flag_print']);

    Route::get('/land_based_print', [PrintPanelController::class, 'land_based_print']);

    Route::get('/diamlemos_print', [PrintPanelController::class, 'diamlemos_print']);

    Route::get('/marshall_print', [PrintPanelController::class, 'marshall_print']);

    Route::get('/lab_result', [PrintPanelController::class, 'lab_result']);

    Route::get('/medical_record', [PrintPanelController::class, 'medical_record']);

    Route::get('/dominican_print', [PrintPanelController::class, 'dominican_print']);

    Route::get('/malta_print', [PrintPanelController::class, 'malta_print']);

    Route::get('/mer_print', [PrintPanelController::class, 'mer_print']);

    Route::get('/mlc_print', [PrintPanelController::class, 'mlc_print']);

    Route::get('/peme_bahia_print', [PrintPanelController::class, 'peme_bahia_print']);

    Route::get('/transmittal_print', [PrintController::class, 'transmittal_print']);

    Route::get('/requests_print', [PrintController::class, 'requests_print']);

    Route::get('/cashier_or_print', [PrintController::class, 'cashier_or_print'])->name('cashier_or.print');

    Route::get('/cashier_or', [AdminController::class, 'view_cashier_or'])
        ->name('cashier_or.index')
        ->middleware(Transaction::class);

    Route::get('/get_cashier_or', [AdminController::class, 'get_cashier_or'])
        ->name('cashier_or.get')
        ->middleware(Transaction::class);

    Route::get('/get_payment_item', [AdminController::class, 'get_payment_item']);

    Route::get('/add_cashier_or', [AdminController::class, 'add_cashier_or'])
        ->name('cashier_or.add')
        ->middleware(Transaction::class);

    Route::post('/store_cashier_or', [AdminController::class, 'store_cashier_or'])
        ->name('cashier_or.store')
        ->middleware(Transaction::class);

    Route::post('/update_cashier_or', [AdminController::class, 'update_cashier_or'])
        ->name('cashier_or.update')
        ->middleware(Transaction::class);

    Route::delete('/cashier_or_delete', [AdminController::class, 'delete_cashier_or'])
        ->name('cashier_or.delete')
        ->middleware(Transaction::class);

    // START OF CRUD AUDIOMETRY

    // Route::get('/view_audiometry', [
    //     AudiometryController::class,
    //     'view_audiometry',
    // ])->middleware(Audiometry::class);

    Route::get('/add_audiometry', [AudiometryController::class, 'add_audiometry']);

    Route::post('/store_audiometry', [AudiometryController::class, 'store_audiometry']);

    Route::get('/edit_audiometry', [AudiometryController::class, 'edit_audiometry']);

    Route::post('/update_audiometry', [AudiometryController::class, 'update_audiometry']);

    Route::get('/exam_audiometry_print', [PrintController::class, 'exam_audiometry']);

    Route::get('/exam_audio_graphright', [PrintController::class, 'exam_audio_graphright']);

    Route::get('/exam_audio_graphleft', [PrintController::class, 'exam_audio_graphleft']);

    // END OF CRUD AUDIOMETRY

    // START OF CRUD CRF
    Route::get('/exam_crf_print', [PrintController::class, 'exam_crf']);

    Route::get('/edit_crf', [CardioRiskFactorController::class, 'edit_crf']);

    Route::post('/update_crf', [CardioRiskFactorController::class, 'update_crf']);

    Route::get('/add_crf', [CardioRiskFactorController::class, 'add_crf']);

    Route::post('/store_crf', [CardioRiskFactorController::class, 'store_crf']);
    // END OF CRUD CRF

    // START OF CRUD CARDIOVASCULAR
    Route::get('/exam_cardiovascular_print', [PrintController::class, 'exam_cardiovascular']);

    Route::get('/edit_cardiovascular', [CardioVascularController::class, 'edit_cardiovascular']);

    Route::post('/update_cardiovascular', [CardioVascularController::class, 'update_cardiovascular']);

    Route::get('/add_cardiovascular', [CardioVascularController::class, 'add_cardiovascular']);
    Route::post('/store_cardiovascular', [CardioVascularController::class, 'store_cardiovascular']);
    // END OF CRUD CARDIOVASCULAR

    // START OF CRUD ECG
    Route::get('/exam_ecg_print', [PrintController::class, 'exam_ecg']);

    Route::get('/edit_ecg', [ECGController::class, 'edit_ecg']);

    Route::post('/update_ecg', [ECGController::class, 'update_ecg']);

    Route::get('/add_ecg', [ECGController::class, 'add_ecg']);

    Route::post('/store_ecg', [ECGController::class, 'store_ecg']);
    // END OF CRUD ECG

    // START OF CRUD PPD
    Route::get('/exam_ppd_print', [PrintController::class, 'exam_ppd']);

    Route::get('/edit_ppd', [PPDController::class, 'edit_ppd']);

    Route::post('/update_ppd', [PPDController::class, 'update_ppd']);

    Route::get('/add_ppd', [PPDController::class, 'add_ppd']);

    Route::post('/store_ppd', [PPDController::class, 'store_ppd']);
    // END OF CRUD PPD

    // START OF CRUD 2D ECHO DOPPLER
    Route::get('/exam_echodoppler_print', [PrintController::class, 'exam_echodoppler']);

    Route::get('/edit_echodoppler', [EchoDopplerController::class, 'edit_echodoppler']);

    Route::post('/update_echodoppler', [EchoDopplerController::class, 'update_echodoppler']);

    Route::get('/add_echodoppler', [EchoDopplerController::class, 'add_echodoppler']);

    Route::post('/store_echodoppler', [EchoDopplerController::class, 'store_echodoppler']);
    // END OF CRUD 2D ECHO DOPPLER

    // START OF CRUD 2D ECHO PLAIN
    Route::get('/exam_echoplain_print', [PrintController::class, 'exam_echoplain']);

    Route::get('/edit_echoplain', [EchoPlainController::class, 'edit_echoplain']);

    Route::post('/update_echoplain', [EchoPlainController::class, 'update_echoplain']);

    Route::get('/add_echoplain', [EchoPlainController::class, 'add_echoplain']);

    Route::post('/store_echoplain', [EchoPlainController::class, 'store_echoplain']);
    // END OF CRUD 2D ECHO PLAIN

    // START OF CRUD ISHIHARA
    Route::get('/exam_ishihara_print', [PrintController::class, 'exam_ishihara'])->middleware(Ophthalmology::class);

    Route::get('/edit_ishihara', [IshiharaController::class, 'edit_ishihara'])->middleware(Ophthalmology::class);

    Route::post('/update_ishihara', [IshiharaController::class, 'update_ishihara'])->middleware(Ophthalmology::class);

    Route::get('/add_ishihara', [IshiharaController::class, 'add_ishihara'])->middleware(Ophthalmology::class);

    Route::post('/store_ishihara', [IshiharaController::class, 'store_ishihara'])->middleware(Ophthalmology::class);
    // END OF CRUD ISHIHARA

    // START OF CRUD PHYSICAL
    Route::get('/exam_physical_print', [PrintController::class, 'exam_physical'])->middleware(Physicians::class);

    Route::get('/edit_physical', [PhysicalController::class, 'edit_physical'])->middleware(Physicians::class);

    Route::post('/update_physical', [PhysicalController::class, 'update_physical'])->middleware(Physicians::class);

    Route::get('/add_physical', [PhysicalController::class, 'add_physical'])->middleware(Physicians::class);

    Route::post('/store_physical', [PhysicalController::class, 'store_physical'])->middleware(Physicians::class);
    // END OF CRUD PHYSICAL

    // START OF CRUD PSYCHOLOGICAL
    Route::get('/exam_psycho_print', [PrintController::class, 'exam_psycho'])->middleware(Psychology::class);

    Route::get('/edit_psycho', [PsychologicalController::class, 'edit_psycho'])->middleware(Psychology::class);

    Route::post('/update_psycho', [PsychologicalController::class, 'update_psycho'])->middleware(Psychology::class);

    Route::get('/add_psycho', [PsychologicalController::class, 'add_psycho'])->middleware(Psychology::class);

    Route::post('/store_psycho', [PsychologicalController::class, 'store_psycho'])->middleware(Psychology::class);
    // END OF CRUD PSYCHOLOGICAL

    // START OF CRUD PSYCHO BPI
    Route::get('/exam_psychobpi_print', [PrintController::class, 'exam_psychobpi'])->middleware(Psychology::class);

    Route::get('/edit_psychobpi', [PsychoBPIController::class, 'edit_psychobpi'])->middleware(Psychology::class);

    Route::post('/update_psychobpi', [PsychoBPIController::class, 'update_psychobpi'])->middleware(Psychology::class);

    Route::get('/add_psychobpi', [PsychoBPIController::class, 'add_psychobpi'])->middleware(Psychology::class);

    Route::post('/store_psychobpi', [PsychoBPIController::class, 'store_psychobpi'])->middleware(Psychology::class);
    // END OF CRUD PSYCHO BPI

    // START OF CRUD STRESS ECHO
    Route::get('/exam_stress_echo_print', [PrintController::class, 'exam_stress_echo']);

    Route::get('/edit_stressecho', [StressEchoController::class, 'edit_stressecho']);

    Route::post('/update_stressecho', [StressEchoController::class, 'update_stressecho']);

    Route::get('/add_stressecho', [StressEchoController::class, 'add_stressecho']);

    Route::post('/store_stressecho', [StressEchoController::class, 'store_stressecho']);
    // END OF CRUD STRESS ECHO

    // START OF CRUD STRESS TEST
    Route::get('/exam_stresstest_print', [PrintController::class, 'exam_stresstest']);

    Route::get('/edit_stresstest', [StressTestController::class, 'edit_stresstest']);

    Route::post('/update_stresstest', [StressTestController::class, 'update_stresstest']);
    Route::get('/add_stresstest', [StressTestController::class, 'add_stresstest']);

    Route::post('/store_stresstest', [StressTestController::class, 'store_stresstest']);
    // END OF CRUD STRESS TEST

    // START OF CRUD ULTRASOUND
    Route::get('/exam_ultrasound_print', [PrintController::class, 'exam_ultrasound'])->middleware(Radiology::class);

    Route::get('/add_ultrasound', [UltrasoundController::class, 'add_ultrasound'])->middleware(Radiology::class);

    Route::post('/store_ultrasound', [UltrasoundController::class, 'store_ultrasound'])->middleware(Radiology::class);

    Route::get('/edit_ultrasound', [UltrasoundController::class, 'edit_ultrasound'])->middleware(Radiology::class);

    Route::post('/update_ultrasound', [UltrasoundController::class, 'update_ultrasound'])->middleware(Radiology::class);
    // END OF CRUD ULTRASOUND

    // START OF CRUD VISUAL ACUITY
    Route::get('/exam_visacuity_print', [PrintController::class, 'exam_visacuity'])->middleware(Ophthalmology::class);

    Route::get('/edit_visacuity', [VisacuityController::class, 'edit_visacuity'])->middleware(Ophthalmology::class);

    Route::post('/update_visacuity', [VisacuityController::class, 'update_visacuity'])->middleware(Ophthalmology::class);

    Route::get('/add_visacuity', [VisacuityController::class, 'add_visacuity']);

    Route::post('/store_visacuity', [VisacuityController::class, 'store_visacuity'])->middleware(Ophthalmology::class);
    // END OF CRUD VISUAL ACUITY

    // START OF CRUD XRAY
    Route::get('/exam_xray_print', [PrintController::class, 'exam_xray'])->middleware(Radiology::class);

    Route::get('/edit_xray', [XRayController::class, 'edit_xray'])->middleware(Radiology::class);
    Route::post('/update_xray', [XRayController::class, 'update_xray'])->middleware(Radiology::class);

    Route::get('/add_xray', [XRayController::class, 'add_xray'])->middleware(Radiology::class);
    Route::post('/store_xray', [XRayController::class, 'store_xray'])->middleware(Radiology::class);
    // END OF CRUD XRAY

    // START OF CRUD DENTAL
    Route::get('/exam_dental_print', [PrintController::class, 'exam_dental'])->middleware(Dental::class);

    Route::get('/edit_dental', [DentalController::class, 'edit_dental'])->middleware(Dental::class);

    Route::post('/update_dental', [DentalController::class, 'update_dental'])->middleware(Dental::class);

    Route::get('/add_dental', [DentalController::class, 'add_dental'])->middleware(Dental::class);

    Route::post('/store_dental', [DentalController::class, 'store_dental'])->middleware(Dental::class);

    Route::post('/upload_dental', [DentalController::class, 'upload_dental'])->middleware(Dental::class);
    // END OF CRUD DENTAL

    // START OF CRUD BLOOD SEROLOGY
    Route::get('/examlab_bloodsero_print', [PrintController::class, 'exam_bloodsero'])->middleware(Laboratory::class);

    Route::get('/add_bloodsero', [BloodSerologyController::class, 'add_bloodsero'])->middleware(Laboratory::class);

    Route::post('/store_bloodsero', [BloodSerologyController::class, 'store_bloodsero'])->middleware(Laboratory::class);

    Route::get('/edit_bloodsero', [BloodSerologyController::class, 'edit_bloodsero'])->middleware(Laboratory::class);

    Route::post('/update_bloodsero', [BloodSerologyController::class, 'update_bloodsero'])->middleware(Laboratory::class);
    // END OF CRUD BLOOD SEROLOGY

    // START OF CRUD HIV
    Route::get('/examlab_hiv_print', [PrintController::class, 'exam_hiv']);

    Route::get('/edit_hiv', [HIVController::class, 'edit_hiv']);

    Route::post('/update_hiv', [HIVController::class, 'update_hiv']);

    Route::get('/add_hiv', [HIVController::class, 'add_hiv']);

    Route::post('/store_hiv', [HIVController::class, 'store_hiv']);
    // END OF CRUD HIV

    // START OF CRUD DRUG
    Route::get('/examlab_drug_print', [PrintController::class, 'exam_drug'])->middleware(Laboratory::class);
    Route::get('/edit_drug', [DrugController::class, 'edit_drug'])->middleware(Laboratory::class);
    Route::post('/update_drug', [DrugController::class, 'update_drug'])->middleware(Laboratory::class);
    Route::get('/add_drug', [DrugController::class, 'add_drug'])->middleware(Laboratory::class);
    Route::post('/store_drug', [DrugController::class, 'store_drug'])->middleware(Laboratory::class);
    // END OF CRUD DRUG

    // START OF CRUD FECALYSIS
    Route::get('/examlab_fecalysis_print', [PrintController::class, 'exam_fecalysis'])->middleware(Laboratory::class);
    Route::get('/edit_fecalysis', [FecalysisController::class, 'edit_fecalysis'])->middleware(Laboratory::class);

    Route::post('/update_fecalysis', [FecalysisController::class, 'update_fecalysis'])->middleware(Laboratory::class);

    Route::get('/add_fecalysis', [FecalysisController::class, 'add_fecalysis']);

    Route::post('/store_fecalysis', [FecalysisController::class, 'store_fecalysis'])->middleware(Laboratory::class);
    // END OF CRUD FECALYSIS

    // START OF CRUD HEMATOLOGY
    Route::get('/examlab_hematology_print', [PrintController::class, 'exam_hematology'])->middleware(Laboratory::class);

    Route::get('/edit_hematology', [HematologyController::class, 'edit_hematology'])->middleware(Laboratory::class);

    Route::post('/update_hematology', [HematologyController::class, 'update_hematology'])->middleware(Laboratory::class);

    Route::get('/add_hematology', [HematologyController::class, 'add_hematology'])->middleware(Laboratory::class);

    Route::post('/store_hematology', [HematologyController::class, 'store_hematology'])->middleware(Laboratory::class);
    // END OF CRUD HEMATOLOGY

    // START OF CRUD HEPATITIS
    Route::get('/examlab_hepatitis_print', [PrintController::class, 'exam_hepatitis']);

    Route::get('/edit_hepatitis', [HepatitisController::class, 'edit_hepatitis']);

    Route::post('/update_hepatitis', [HepatitisController::class, 'update_hepatitis']);

    Route::get('/add_hepatitis', [HepatitisController::class, 'add_hepatitis']);

    Route::post('/store_hepatitis', [HepatitisController::class, 'store_hepatitis']);
    // END OF CRUD HEPATITIS

    // START OF CRUD PREGNANCY
    Route::get('/examlab_pregnancy_print', [PrintController::class, 'exam_pregnancy']);
    Route::get('/edit_pregnancy', [PregnancyController::class, 'edit_pregnancy']);
    Route::post('/update_pregnancy', [PregnancyController::class, 'update_pregnancy']);
    Route::get('/add_pregnancy', [PregnancyController::class, 'add_pregnancy']);

    Route::post('/store_pregnancy', [PregnancyController::class, 'store_pregnancy']);
    // END OF CRUD PREGNANCY

    // START OF CRUD URINALYSIS
    Route::get('/examlab_urinalysis_print', [PrintController::class, 'exam_urinalysis'])->middleware(Laboratory::class);

    Route::get('/edit_urinalysis', [UrinalysisController::class, 'edit_urinalysis'])->middleware(Laboratory::class);

    Route::post('/update_urinalysis', [UrinalysisController::class, 'update_urinalysis'])->middleware(Laboratory::class);

    Route::get('/add_urinalysis', [UrinalysisController::class, 'add_urinalysis'])->middleware(Laboratory::class);

    Route::post('/store_urinalysis', [UrinalysisController::class, 'store_urinalysis'])->middleware(Laboratory::class);
    // END OF CRUD URINALYSIS

    // START OF CRUD MISC
    Route::get('/examlab_misc_print', [PrintController::class, 'exam_misc'])->middleware(Laboratory::class);

    Route::get('/edit_misc', [MiscellaneousController::class, 'edit_misc'])->middleware(Laboratory::class);

    Route::post('/update_misc', [MiscellaneousController::class, 'update_misc'])->middleware(Laboratory::class);
    Route::get('/add_misc', [MiscellaneousController::class, 'add_misc'])->middleware(Laboratory::class);

    Route::post('/store_misc', [MiscellaneousController::class, 'store_misc'])->middleware(Laboratory::class);
    // END OF CRUD MISC

    Route::get('/transmittal', [PrintPanelController::class, 'transmittal']);

    Route::get('/followup_transmittal', [PrintPanelController::class, 'followup_transmittal']);

    Route::get('/daily_patient', [PrintPanelController::class, 'daily_patient']);

    Route::get('/data_privacy_print', [PrintController::class, 'data_privacy_print']);

    Route::get('/follow_up_print', [PrintPanelController::class, 'follow_up_print']);

    Route::get('/daily_patient_form', [PrintPanelController::class, 'daily_patient_form']);

    Route::get('/soa', [SOAController::class, 'index']);
    Route::get('/soa_print', [SOAController::class, 'soa_print']);

    Route::get('/panama', [SOAController::class, 'panama']);
    Route::get('/panama_print', [SOAController::class, 'panama_print']);

    Route::get('/liberian_billing', [SOAController::class, 'liberian_billing']);
    Route::get('/liberian_billing_print', [SOAController::class, 'liberian_billing_print']);

    Route::get('/support', [AdminController::class, 'support']);
    Route::post('/store_support', [AdminController::class, 'store_support']);

    Route::get('/user_profile', [UserController::class, 'user_profile']);
    Route::post('/update_profile', [UserController::class, 'update_profile']);

    Route::post('/employee_change_password', [UserController::class, 'employee_change_password']);

    Route::get('/logout', [PatientAuthController::class, 'logout']);
    Route::get('/employee_logout', [AdminAuthController::class, 'logout']);
    Route::get('/agency_logout', [UserController::class, 'agency_logout']);
});
