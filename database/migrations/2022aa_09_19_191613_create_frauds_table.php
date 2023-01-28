<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFraudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frauds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ad_id');
            $table->string('reason');
            $table->string('email');
            $table->text('message');
            $table->timestamps();

            $table->foreign('ad_id')->references('id')->on('advertisements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frauds');
    }
}
