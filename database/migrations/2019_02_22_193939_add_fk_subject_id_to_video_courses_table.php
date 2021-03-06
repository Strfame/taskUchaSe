<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkSubjectIdToVideoCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {               
        Schema::table('video_courses', function (Blueprint $table) {            
            $table->foreign('subject_id')
                ->references('id')->on('subjects')
                ->onDelete('cascade');            
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_courses', function (Blueprint $table) {
            $table->dropForeign('video_courses_subject_id_foreign');
        });
    }
}
