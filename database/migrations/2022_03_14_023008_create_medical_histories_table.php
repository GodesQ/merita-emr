<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_history', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('main_id');
            $table->string('head_and_neck_injury', 255);
            $table->string('frequent_headache', 255);
            $table->string('frequent_dizziness', 255);
            $table->string('fainting_spells_fits', 255);
            $table->string('seizures', 255);
            $table->string('other_neurological_disorders', 255);
            $table->string('insomia_or_sleep_disorder', 255);
            $table->string('depression_other_mental_disorder', 255);
            $table->string('eye_problems_or_error_refraction', 255);
            $table->string('deafness_or_ear_disorder', 255);
            $table->string('nose_or_throat_disorder', 255);
            $table->string('tuberculosis', 255);
            $table->string('signed_off_as_sick', 255);
            $table->string('repatriation_form_ship', 255);
            $table->string('declared_unfit_for_sea_duty', 255);
            $table->string('previous_hospitalization', 255);
            $table->string('feel_healthy', 255);
            $table->string('other_lung_disorder', 255);
            $table->string('high_blood_pressure', 255);
            $table->string('heart_disease_or_vascular', 255);
            $table->string('chest_pain', 255);
            $table->string('rheumatic_fever', 255);
            $table->string('diabetes_mellitus', 255);
            $table->string('endocrine_disorders', 255);
            $table->string('cancer_or_tumor', 255);
            $table->string('blood_disorder', 255);
            $table->string('stomach_pain_or_gastritis', 255);
            $table->string('ulcer', 255);
            $table->string('other_abdominal_disorder', 255);
            $table->string('medical_certificate_restricted', 255);
            $table->string('head_and_nmedical_certificate_revoked', 255);
            $table->string('aware_of_any_medical_problems', 255);
            $table->string('aware_of_any_disease_or_illness', 255);
            $table->string('operations', 255);
            $table->string('gyneological_disorder', 255);
            $table->string('last_menstrual_period', 255);
            $table->string('pregnancy', 255);
            $table->string('kidney_or_bladder_disorder', 255);
            $table->string('back_injury_or_joint_pain', 255);
            $table->string('arthritis', 255);
            $table->string('genetic_heredity_or_familial_dis', 255);
            $table->string('sexually_transmitted_disease', 255);
            $table->string('tropical_disease_or_malaria', 255);
            $table->string('thypoid_fever', 255);
            $table->string('schistosomiasis', 255);
            $table->string('asthma', 255);
            $table->string('allergies', 255);
            $table->string('smoking', 255);
            $table->string('taking_medication_for_hypertension', 255);
            $table->string('taking_medication_for_diabetes', 255);
            $table->string('vaccination', 255);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_histories');
    }
}