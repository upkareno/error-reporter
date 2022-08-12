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
        Schema::create('errors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('name')->nullable();
            $table->text('message')->nullable();
            $table->text('page')->nullable();
            $table->text('session')->nullable();
            $table->text('browser')->nullable();
            $table->text('ip')->nullable();
            $table->text('os')->nullable();
            $table->text('user_agent')->nullable();
            $table->text('user_id')->nullable();
            $table->text('error_type')->nullable();
            $table->text('line')->nullable();
            $table->text('file')->nullable();
            $table->text('trace')->nullable();
            $table->text('code')->nullable();
            $table->text('status')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('errors');
    }
};
