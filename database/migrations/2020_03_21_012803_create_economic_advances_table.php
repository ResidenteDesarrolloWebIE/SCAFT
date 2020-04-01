<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEconomicAdvancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('economic_advances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('initial_advance_percentage')->default(0);  
            $table->double('initial_advance_mount', 15, 6)->default(0);
            $table->tinyInteger('initial_advance_completed')->default(0);

            $table->float('engineering_release_payment_percentage')->default(0);
            $table->double('engineering_release_payment_mount', 15, 6)->default(0);
            $table->tinyInteger('engineering_release_payment_completed')->default(0); /* 1 ->completado, 0->no completado */

            $table->float('final_payment_percentage')->default(0);
            $table->double('final_payment_mount', 15, 6)->default(0);
            $table->tinyInteger('final_payment_completed')->default(0);

            /* $table->double('total_amount', 15, 6); */
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->softDeletes();
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
        Schema::dropIfExists('economic_advances');
    }
}
