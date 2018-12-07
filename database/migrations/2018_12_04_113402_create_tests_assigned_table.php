<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsAssignedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_assigned', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_id')->unsigned()->nullable();
            $table->integer('test_bank_id')->unsigned()->nullable();
            $table->string('difficulty');
            $table->string('count');
            $table->enum('type',['entry','module','null'])->default('null');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->foreign('test_bank_id')->references('id')->on('tests_banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests_assigned');
    }
}
