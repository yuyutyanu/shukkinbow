<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTAttendanceRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_AttendanceRecord', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->datetime('working_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_AttendanceRecord');
    }
}
