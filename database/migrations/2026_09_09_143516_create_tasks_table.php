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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId("project_id")->constrained()->cascadeOnDelete();
            $table->foreignId('assigned_user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade');
            $table->string("title");
            $table->text("description")->nullable();
            $table->enum("priority", ["High,Medium,Low"]);
            $table->enum("status", ["Pending", "In Progress", "Completed"]);
            $table->date("due_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
