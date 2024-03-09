<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('nic_no')->nullable();
            $table->char('collage_province_id')->nullable();
            $table->char('collage_id')->nullable();
            $table->char('department_id')->nullable();
            $table->char('identity_scan_id')->nullable();
            $table->string('entery_year')->nullable();
            $table->string('graduation_year')->nullable();
            $table->char('current_province_id')->nullable();
            $table->char('current_district_id')->nullable();
            $table->string('current_village')->nullable();
            $table->char('real_province_id')->nullable();
            $table->char('real_district_id')->nullable();
            $table->string('real_village')->nullable();
            $table->string('high_school')->nullable();
            $table->string('high_school_graduation_year')->nullable();
            $table->tinyinteger('type')->nullable();
            $table->tinyinteger('service')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->unsignedBigInteger('edited_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
