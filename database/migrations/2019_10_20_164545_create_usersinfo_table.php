<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersinfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->date('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->integer('pay_rate')->nullable();
            $table->string('currency')->nullable();
            $table->string('per')->nullable();
            $table->string('pay_type')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('primary_email')->nullable();
            $table->date('hire_date')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('job_title')->nullable();
            $table->string('reports_to')->nullable();
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
        Schema::dropIfExists('usersinfo');
    }
}
