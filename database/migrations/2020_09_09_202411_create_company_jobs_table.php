<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_jobs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_company_id')->unsigned();
            $table->string('available_positions');
            $table->string('jobs_description');
            $table->string('jobs_requirements');
            $table->string('minimum_portofolio')->nullable();
            $table->string('vendor_accepted_total');
            $table->string('jobs_expired');
            $table->string('other')->nullable();
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
        Schema::dropIfExists('company_jobs');
    }
}
