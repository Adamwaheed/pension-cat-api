<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string('bread_name',250);
            $table->text('temperament')->nullable();
            $table->string('lifespan');
            $table->float('avg_weight_female');
            $table->float('avg_weight_male');
            $table->enum('coat_type',['none','short','medium','long'])->default('medium');
            $table->enum('coat_density',['low','medium','high'])->default('medium');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cats');
    }
};
