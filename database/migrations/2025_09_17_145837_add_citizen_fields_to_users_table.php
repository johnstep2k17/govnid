<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->string('national_id')->nullable()->index();
            $table->text('address')->nullable();
            $table->date('birthday')->nullable();
            $table->string('phone')->nullable();
            $table->string('blood_type', 3)->nullable(); // e.g. A+, O-
            $table->string('emergency_contact')->nullable();
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'national_id','address','birthday','phone','blood_type','emergency_contact'
            ]);
        });
    }
};
