<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkillsToJobsTable extends Migration
{
    public function up()
    {
        Schema::create('job_skills', function (Blueprint $table) {
            $table->bigInteger('skill_id')->unsigned()->nullable();
            $table->foreign('skill_id')->references('id')->on('skills')
                ->onDelete('cascade');
            $table->bigInteger('job_id')->unsigned()->nullable();
            $table->foreign('job_id')->references('job_id')->on('jobs')
                ->onDelete('cascade');
            $table->unsignedSmallInteger('level')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
        });
    }
}
