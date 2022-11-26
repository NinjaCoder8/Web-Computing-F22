<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->integer("category_id");
            $table->string("name");
            $table->string("branch");
            $table->string("phone_number");
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('restaurants_categories', function (Blueprint $table) {
            $table->id();
            $table->string("cuisine");
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
        Schema::dropIfExists('restaurants');
        Schema::dropIfExists('restaurants_categories');
    }
}
