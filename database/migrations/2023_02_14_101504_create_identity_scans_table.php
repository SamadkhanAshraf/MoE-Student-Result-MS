<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentityScansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identity_scans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('province_id')->nullable();
            $table->char('collage_id')->nullable();
            $table->char('department_id')->nullable();
            $table->string('scan_path')->nullable();
            $table->string('year')->nullable();
            $table->tinyinteger('status')->nullable();
            $table->tinyinteger('type')->nullable();
            $table->tinyinteger('service')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->unsignedBigInteger('edited_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('identity_scans');
    }
}
