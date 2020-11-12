<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateEmployeeTrackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_tracking', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_name');
            $table->double('money');
            $table->string('reason')->nullable();
            $table->date('date')->nullable();
            $table->string('user_name');
            $table->boolean('valid')->default(1);
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
        Schema::dropIfExists('employee_tracking');
    }
}
