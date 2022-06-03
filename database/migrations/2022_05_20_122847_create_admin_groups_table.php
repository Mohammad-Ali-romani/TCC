<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->enum('admin_show',['enable','disable'])->default('disable');
            $table->enum('admin_add',['enable','disable'])->default('disable');
            $table->enum('admin_edit',['enable','disable'])->default('disable');
            $table->enum('admin_delete',['enable','disable'])->default('disable');

            $table->enum('lecture_show',['enable','disable'])->default('disable');
            $table->enum('lecture_add',['enable','disable'])->default('disable');
            $table->enum('lecture_edit',['enable','disable'])->default('disable');
            $table->enum('lecture_delete',['enable','disable'])->default('disable');

            $table->enum('ad_show',['enable','disable'])->default('disable');
            $table->enum('ad_add',['enable','disable'])->default('disable');
            $table->enum('ad_edit',['enable','disable'])->default('disable');
            $table->enum('ad_delete',['enable','disable'])->default('disable');

            $table->enum('program_show',['enable','disable'])->default('disable');
            $table->enum('program_add',['enable','disable'])->default('disable');
            $table->enum('program_edit',['enable','disable'])->default('disable');
            $table->enum('program_delete',['enable','disable'])->default('disable');

            $table->enum('mark_show',['enable','disable'])->default('disable');
            $table->enum('mark_add',['enable','disable'])->default('disable');
            $table->enum('mark_edit',['enable','disable'])->default('disable');
            $table->enum('mark_delete',['enable','disable'])->default('disable');

            $table->enum('subject_show',['enable','disable'])->default('disable');
            $table->enum('subject_add',['enable','disable'])->default('disable');
            $table->enum('subject_edit',['enable','disable'])->default('disable');
            $table->enum('subject_delete',['enable','disable'])->default('disable');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('admin_groups');
    }
}
