<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmDatabaseSyncsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adm_database_syncs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('child_table');
            $table->string('parent_table');
            $table->string('database');
            $table->integer('active');
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
        Schema::dropIfExists('adm_database_syncs');
    }
}
