<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'height',
        'weight',
        'activity',
        'goal',
        'vegetarian',
        'food_allergy',
        'BMR',
        'daily_calories', 'breakfast_calories', 'lunch_calories', 'dinner_calories',
        'daily_protein', 'breakfast_protein', 'lunch_protein', 'dinner_protein',
        'daily_carbohydrate', 'breakfast_carbohydrate', 'lunch_carbohydrate', 'dinner_carbohydrate',
        'daily_fat', 'breakfast_fat', 'lunch_fat', 'dinner_fat',
        'daily_saturatedFat', 'breakfast_saturatedFat', 'lunch_saturatedFat', 'dinner_saturatedFat',
        'daily_sugar', 'breakfast_sugar', 'lunch_sugar', 'dinner_sugar',
        'daily_fiber', 'breakfast_fiber', 'lunch_fiber', 'dinner_fiber',
        'daily_sodium', 'breakfast_sodium', 'lunch_sodium', 'dinner_sodium',
        'daily_cholesterol', 'breakfast_cholesterol', 'lunch_cholesterol', 'dinner_cholesterol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at'      => 'datetime',
        'food_allergy'           => 'array',
        'daily_protein'          => 'array',
        'breakfast_protein'      => 'array',
        'lunch_protein'          => 'array',
        'dinner_protein'         => 'array',
        'daily_carbohydrate'     => 'array',
        'breakfast_carbohydrate' => 'array',
        'lunch_carbohydrate'     => 'array',
        'dinner_carbohydrate'    => 'array',
        'daily_fat'              => 'array',
        'breakfast_fat'          => 'array',
        'lunch_fat'              => 'array',
        'dinner_fat'             => 'array',
        'daily_saturatedFat'     => 'array',
        'breakfast_saturatedFat' => 'array',
        'lunch_saturatedFat'     => 'array',
        'dinner_saturatedFat'    => 'array',
        'daily_sugar'            => 'array',
        'breakfast_sugar'        => 'array',
        'lunch_sugar'            => 'array',
        'dinner_sugar'           => 'array',
        'daily_fiber'            => 'array',
        'breakfast_fiber'        => 'array',
        'lunch_fiber'            => 'array',
        'dinner_fiber'           => 'array',
        'daily_sodium'           => 'array',
        'breakfast_sodium'       => 'array',
        'lunch_sodium'           => 'array',
        'dinner_sodium'          => 'array',
        'daily_cholesterol'      => 'array',
        'breakfast_cholesterol'  => 'array',
        'lunch_cholesterol'      => 'array',
        'dinner_cholesterol'     => 'array',
    ];

    public function favoriteRecipes()
    {
        return $this->hasMany(UserRecipe::class)->where('type', 'favorite');
    }
}
