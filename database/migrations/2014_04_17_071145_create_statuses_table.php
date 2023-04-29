<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->json('title');
            $table->string('background', 7);
            $table->enum('color', array_keys(config('wame-statuses.color.text')));
            $table->unsignedInteger('sort')->default(0);
            $table->string('model')->nullable()->default(0);
            $table->text('icon')->nullable();
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
        Schema::dropIfExists('statuses');
    }

};
