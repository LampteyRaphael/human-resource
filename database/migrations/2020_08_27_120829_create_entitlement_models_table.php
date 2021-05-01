<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitlementModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entitlement_models', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->string('entitlementYear');
            $table->integer('entitlementId');
            $table->string('yearCarriedOver');
            $table->integer('totalLeaveEntitlement');
            $table->integer('currentDaysTaken');
            $table->integer('remainingLeaveDays');
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
        Schema::dropIfExists('entitlement_models');
    }
}
