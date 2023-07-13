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
        Schema::create('online_orders', function (Blueprint $table) {
            $table->id();

            $table->string('name',200);
            $table->double('amount');
            $table->dateTime('date');
            $table->dateTime('expected_date');
            $table->string('address',200);
            $table->enum('status', ['ordered','cooking','delivering','delivered']);
            $table->enum('type', ['delivery', 'pick_up']);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('online_orders');
    }
};
