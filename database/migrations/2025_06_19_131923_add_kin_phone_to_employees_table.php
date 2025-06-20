<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('employees', function (Blueprint $table) {
        $table->string('kin_phone')->nullable()->after('kin_surname'); // add after kin_surname if you want it grouped
    });
}

public function down(): void
{
    Schema::table('employees', function (Blueprint $table) {
        $table->dropColumn('kin_phone');
    });
}

};
