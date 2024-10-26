<?php

use App\Models\Company;
use App\Models\Enums\Program\ProgramStatus;
use App\Models\User;
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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Company::class)->nullable()->constrained()->nullOnDelete();

            $table->string('title');

            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->text('exclusion')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->string('status')->default(ProgramStatus::Review);
            $table->json('payments')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
