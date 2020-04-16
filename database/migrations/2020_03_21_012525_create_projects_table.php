<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('folio',12);
            $table->string('name',150);
            $table->string('substation',100);
            $table->string('status',50)->default("PENDIENTE");
            /* $table->string('type',50);/* Eliminar despues */ 
            $table->double('exchange_rate')->nullable();
            $table->double('total_amount');
            $table->text('description');

            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('users');
            $table->unsignedBigInteger('project_type_id')->nullable();
            $table->foreign('project_type_id')->references('id')->on('project_types');
            $table->unsignedBigInteger('coin_id')->nullable();
            $table->foreign('coin_id')->references('id')->on('coins');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
