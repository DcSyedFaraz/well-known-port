<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title');
            $table->string('slug', 60)->unique();
            $table->string('domain', 60)->unique();
            $table->string('api_token', 60)->unique()->nullable()->default(null);
            // $table->unsignedInteger('status_id')->default(1);
            // $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
