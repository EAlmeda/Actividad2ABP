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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('name', 200);
            $table->string('email', 200)->unique();
            $table->string('surname_1', 200);
            $table->string('surname_2', 200);
            $table->string('password', 25);
            $table->string('bank_account', 200);
            $table->integer('phone');
            $table->string('work_shift', 200);
            $table->string('address', 200);
            $table->enum('team', ['waiter', 'cooker', 'chef', 'delivery', 'manager']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
