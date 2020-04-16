<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAditionalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aditional_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('note');
            $table->double('total_amount');
            $table->unsignedBigInteger('offer')->nullable();
            $table->foreign('offer')->references('id')->on('files');
            $table->unsignedBigInteger('purchase_order')->nullable();
            $table->foreign('purchase_order')->references('id')->on('files');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects');
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
        Schema::dropIfExists('aditional_details');
    }
}
