<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('dept_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('team_id');
            $table->string('image')->nullable()->default(null);

            $table->foreign('dept_id')->references('id')->on('depts')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('store_id')->references('id')->on('stores')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('level_id')->references('id')->on('levels')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('team_id')->references('id')->on('teams')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
