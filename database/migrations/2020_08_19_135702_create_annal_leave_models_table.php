<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnalLeaveModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annal_leave_models', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->string('title_id')->index();
            $table->integer('department_id')->index();
            $table->integer('applyfor');
            $table->year('year');
            $table->date('effectiveDate')->nullable();
            $table->integer('signatureID')->index()->default(0);
            $table->integer('recommendedBy')->index()->default(0);
            $table->integer('approvedBy')->index()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annal_leave_models');
    }
}
