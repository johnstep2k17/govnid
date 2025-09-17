<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('audit_logs', function (Blueprint $t) {
            $t->id();
            $t->unsignedBigInteger('user_id')->nullable();
            $t->string('action');     // e.g., update_profile, create_user
            $t->text('details')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('audit_logs'); }
};
