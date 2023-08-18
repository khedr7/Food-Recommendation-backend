<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender');
            $table->float('height');
            $table->float('weight');
            $table->string('activity');
            $table->string('goal');
            $table->boolean('vegetarian')->default(0);
            $table->string('food_allergy')->nullable();

            $table->float('BMR')->nullable();

            $table->float('daily_calories')->nullable();
            $table->float('breakfast_calories')->nullable();
            $table->float('lunch_calories')->nullable();
            $table->float('dinner_calories')->nullable();

            $table->float('daily_protein')->nullable();
            $table->float('breakfast_protein')->nullable();
            $table->float('lunch_protein')->nullable();
            $table->float('dinner_protein')->nullable();

            $table->float('daily_carbohydrate')->nullable();
            $table->float('breakfast_carbohydrate')->nullable();
            $table->float('lunch_carbohydrate')->nullable();
            $table->float('dinner_carbohydrate')->nullable();

            $table->float('daily_fat')->nullable();
            $table->float('breakfast_fat')->nullable();
            $table->float('lunch_fat')->nullable();
            $table->float('dinner_fat')->nullable();

            $table->float('daily_saturatedFat')->nullable();
            $table->float('breakfast_saturatedFat')->nullable();
            $table->float('lunch_saturatedFat')->nullable();
            $table->float('dinner_saturatedFat')->nullable();

            $table->float('daily_sugar')->nullable();
            $table->float('breakfast_sugar')->nullable();
            $table->float('lunch_sugar')->nullable();
            $table->float('dinner_sugar')->nullable();

            $table->float('daily_fiber')->nullable();
            $table->float('breakfast_fiber')->nullable();
            $table->float('lunch_fiber')->nullable();
            $table->float('dinner_fiber')->nullable();

            $table->float('daily_sodium')->nullable();
            $table->float('breakfast_sodium')->nullable();
            $table->float('lunch_sodium')->nullable();
            $table->float('dinner_sodium')->nullable();

            $table->float('daily_cholesterol')->nullable();
            $table->float('breakfast_cholesterol')->nullable();
            $table->float('lunch_cholesterol')->nullable();
            $table->float('dinner_cholesterol')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
