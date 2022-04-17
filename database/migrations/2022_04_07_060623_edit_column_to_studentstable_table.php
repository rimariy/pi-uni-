<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

class EditColumnToStudentstableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('studentstable', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('studentID')->index();
            $table->foreign('studentID')->references('Id')
                  ->on('students')
                  ->onDelete('cascade');


            $table->unsignedInteger('studentID')->index();
            $table->foreign('coursID')->references('id')
                ->on('courses')
                ->onDelete('cascade');
            
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
        Schema::table('studentstable', function (Blueprint $table) {
            
        });
    }
}
