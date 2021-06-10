<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name', 50);
            $table->string('slug', 60)->unique();
            $table->text('ingredients');
            $table->float('price', 6, 2);
            $table->text('description')->nullable();
            $table->string('image', 255)->default('https://via.placeholder.com/150');
            $table->boolean('visible')->default(1);
            $table->string('scope', 30)->nullable();
            $table->boolean('vegan')->default(0);
            $table->boolean('gluten_free')->default(0);
            $table->boolean('vegetarian')->default(0);
            $table->boolean('hot')->default(0);
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
        Schema::dropIfExists('plates');
    }
}
