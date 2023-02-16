<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Init extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->mediumText('description');
            $table->dateTime('datetime');
            $table->string('author')->nullable();
        });

        Schema::create('log_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_method');
            $table->string('url');
            $table->integer('http_code');
            $table->longText('body');
            $table->float('execution_time');
            $table->dateTime('datetime');
        });

        Schema::create('parse_links', function (Blueprint $table) {
            $table->id();
            $table->string('link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
        Schema::dropIfExists('parse_links');
        Schema::dropIfExists('log_requests');
    }
}
