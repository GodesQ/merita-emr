<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('mast_patient')) {
            // The "mast_patient" table exists...
            echo "mast_patient exist";
        }

        if (Schema::hasTable('mast_employee')) {
            // The "mast_employee" table exists...
            echo "mast_employee exist";
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
