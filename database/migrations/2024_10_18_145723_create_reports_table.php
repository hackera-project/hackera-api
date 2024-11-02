<?php

use App\Models\Asset;
use App\Models\Program;
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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Program::class)->constrained();
            $table->foreignIdFor(Asset::class)->constrained();
            $table->foreignIdFor(User::class, 'hacker_id')->constrained('users', 'id');

            $table->string('status')->default('pending');
            $table->string('title');
            $table->longText('description');
            $table->longText('reproduce_steps');

            $table->string('severity');
            $table->string('cve');
            $table->string('cwe');
            $table->integer('payment')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
