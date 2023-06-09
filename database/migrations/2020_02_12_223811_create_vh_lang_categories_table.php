<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVhLangCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('vh_lang_categories')) {
            Schema::create('vh_lang_categories', function (Blueprint $table) {
                $table->bigIncrements('id')->unsigned();

                $table->string('name',150)->nullable();
                $table->string('slug',150)->nullable()->index();
                $table->integer('count_strings')->nullable()->default(0);
                $table->integer('count_strings_filled')->nullable()->default(0);

                $table->bigInteger('created_by')->unsigned()->nullable()->index();
                $table->foreign('created_by')->references('id')->on('vh_users');
                $table->bigInteger('updated_by')->unsigned()->nullable()->index();
                $table->foreign('updated_by')->references('id')->on('vh_users');
                $table->bigInteger('deleted_by')->unsigned()->nullable()->index();
                $table->foreign('deleted_by')->references('id')->on('vh_users');

                $table->timestamps();
                $table->softDeletes();
                $table->index(['created_at', 'updated_at', 'deleted_at']);

            });
        }
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('vh_lang_categories');
    }
}
