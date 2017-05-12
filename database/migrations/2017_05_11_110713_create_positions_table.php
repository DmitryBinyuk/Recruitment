<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_name');
            $table->text('job_description');
            $table->date('job_created');
	    $table->enum('status', ['open', 'closed']);;

	    $table->integer('recruiter_id')->unsigned()->index();
	    $table->foreign('recruiter_id')->references('id')->on('recruiters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('positions');
    }
}
