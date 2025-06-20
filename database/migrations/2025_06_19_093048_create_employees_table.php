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
        $table->string('employee_code')->unique(); // EMP01, EMP02...
        $table->string('name');
        $table->string('surname');
        $table->string('email')->unique();
        $table->string('home_address');
        $table->string('phone');

        // Next of Kin
        $table->string('kin_name');
        $table->string('kin_surname');
        $table->string('kin_relationship');

        // File paths
        $table->string('employee_id_path');
        $table->string('contract_path');

        $table->timestamps();
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
