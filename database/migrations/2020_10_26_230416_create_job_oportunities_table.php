<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_oportunities', function (Blueprint $table) {
            $table->id();
            $table->string('title', 256)->nullable(false);
            $table->text('description')->nullable(false);
            $table->enum('status', ['active', 'inactive'])->nullable(false);
            $table->string('workplace')->nullable(true);
            $table->float('salary')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_oportunities');
    }
}
