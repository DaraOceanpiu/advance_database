<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('staff_code'); // Removed unique constraint
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('status');
            $table->date('employment_date');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('department_id');
            $table->decimal('salary_amt', 15, 2);
            $table->decimal('bonus', 15, 2);
            $table->string('status_staff');
            $table->integer('version');
            $table->string('previousHash')->nullable();
            $table->string('currentHash')->nullable();
            $table->unsignedBigInteger('previous_record_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->foreign('department_id')->references('department_id')->on('departments');
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
