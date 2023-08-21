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
            $table->string('password')->nullable();
            $table->string('gender')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->string('activity')->nullable();
            $table->string('goal')->nullable();
            $table->boolean('vegetarian')->default(0);
            $table->string('food_allergy')->nullable();
            $table->string('device_token')->nullable();

            $table->float('BMR')->nullable();

            $table->json('daily_calories')->nullable();
            $table->json('breakfast_calories')->nullable();
            $table->json('lunch_calories')->nullable();
            $table->json('dinner_calories')->nullable();

            $table->json('daily_protein')->nullable();
            $table->json('breakfast_protein')->nullable();
            $table->json('lunch_protein')->nullable();
            $table->json('dinner_protein')->nullable();

            $table->json('daily_carbohydrate')->nullable();
            $table->json('breakfast_carbohydrate')->nullable();
            $table->json('lunch_carbohydrate')->nullable();
            $table->json('dinner_carbohydrate')->nullable();

            $table->json('daily_fat')->nullable();
            $table->json('breakfast_fat')->nullable();
            $table->json('lunch_fat')->nullable();
            $table->json('dinner_fat')->nullable();

            $table->json('daily_saturatedFat')->nullable();
            $table->json('breakfast_saturatedFat')->nullable();
            $table->json('lunch_saturatedFat')->nullable();
            $table->json('dinner_saturatedFat')->nullable();

            $table->json('daily_sugar')->nullable();
            $table->json('breakfast_sugar')->nullable();
            $table->json('lunch_sugar')->nullable();
            $table->json('dinner_sugar')->nullable();

            $table->json('daily_fiber')->nullable();
            $table->json('breakfast_fiber')->nullable();
            $table->json('lunch_fiber')->nullable();
            $table->json('dinner_fiber')->nullable();

            $table->json('daily_sodium')->nullable();
            $table->json('breakfast_sodium')->nullable();
            $table->json('lunch_sodium')->nullable();
            $table->json('dinner_sodium')->nullable();

            $table->json('daily_cholesterol')->nullable();
            $table->json('breakfast_cholesterol')->nullable();
            $table->json('lunch_cholesterol')->nullable();
            $table->json('dinner_cholesterol')->nullable();

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
