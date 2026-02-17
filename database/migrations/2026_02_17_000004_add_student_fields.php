<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            if (!Schema::hasColumn('students', 'firstname')) {
                $table->string('firstname')->nullable()->after('student_id');
            }
            if (!Schema::hasColumn('students', 'lastname')) {
                $table->string('lastname')->nullable()->after('firstname');
            }
            if (!Schema::hasColumn('students', 'faculty')) {
                $table->string('faculty')->nullable()->after('lastname');
            }
            if (!Schema::hasColumn('students', 'field_of_study')) {
                $table->string('field_of_study')->nullable()->after('faculty');
            }
            if (!Schema::hasColumn('students', 'active')) {
                $table->boolean('active')->default(true)->after('field_of_study');
            }
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['firstname', 'lastname', 'faculty', 'field_of_study', 'active']);
        });
    }
};
