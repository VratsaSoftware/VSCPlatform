<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntryFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->enum('course', ['php','java','other'])->default('other');
            $table->string('suitable_candidate')->nullabe();
            $table->string('suitable_training')->nullabe();
            $table->string('accompliments')->nullabe();
            $table->string('expecatitions')->nullabe();
            $table->string('use')->nullabe();
            $table->string('source')->nullabe();
            $table->string('cv')->nullabe();
            $table->enum('is_remote', [1,0])->default(0);
            $table->dateTime('submited_before')->nullabe();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entry_forms');
    }
}
