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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('place_id')->constrained('places');
          
            $table->foreignId('company_id')->constrained('companies');
           
            $table->string('title');
            $table->text('description');
          
            $table->json('cached_profession_ids');
            $table->json('cached_ability_ids');

            $table->tinyInteger('experience_type_id')->nullable(); //Guardados en Model

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->tinyInteger('start_type_id')->nullable(); //Guardados en Model

            $table->tinyInteger('job_type_id')->nullable();
            $table->integer('salary_min')->nullable();
            $table->integer('salary_max')->nullable();
            $table->tinyInteger('payment_periodicity_id')->nullable(); //Guardados en Model

            $table->string('url')->unique();
            $table->tinyInteger('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
