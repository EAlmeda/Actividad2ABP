<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kitchen_orders', function (Blueprint $table) {
            $table->id();

            $table->dateTime('beginDate');
            $table->dateTime('endDate');
            $table->enum('status', ['ordered', 'cooking','finished']);
            $table->integer('board_id')->unsigned();
            $table->integer('employee_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('board_id')->references('id')->on('boards')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kitchen_orders');
    }
};
