<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $validation = $request->validate([
            'name'         => 'required',
            'email'        => 'required|email',
            'password'     => 'required',
            'gender'       => 'required',
            'height'       => 'required',
            'weight'       => 'required|string',
            'activity'     => 'required|string',
            'goal'         => 'required|string',
            'vegetarian'   => 'required',
            'food_allergy' => 'array',
        ]);

        $validation['password'] = bcrypt($validation['password']);
        $user  = User::create($validation);
        $token = $user->createToken('auth');
        $user_data = User::where('id', '=', $user->id)->first();
        if ($user) {
            return response()->json([
                'message' => 'User successfully registered!',
                'user'    => $user_data,
                'token'   => $token->plainTextToken,
            ], 200);
        }
        return response()->json([
            'message' => "Error",
        ], 400);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->tokens()->delete();
            $token = $user->createToken('auth');
            if ($user) {
                return response()->json([
                    'message' => 'login was successful',
                    'user'  => $user,
                    'token' => $token->plainTextToken,
                ], 200);
            }
        }
        return response()->json([
            'message' => 'email or password is wrong',
        ], 400);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ], 200);
    }

    public function show(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            return response()->json([
                'user'  => $user,
            ], 200);
        }
        return response()->json([
            'message' => 'error',
        ], 400);
    }

    public function update(Request $request)
    {
        $validation = $request->validate([
            'name'         => 'required',
            'email'        => 'required|email',
            'gender'       => 'required',
            'height'       => 'required',
            'weight'       => 'required|string',
            'activity'     => 'required|string',
            'goal'         => 'required|string',
            'vegetarian'   => 'required',
            'food_allergy' => 'array',

            'BMR'                    => 'required',
            'daily_calories'         => 'required',
            'breakfast_calories'     => 'required',
            'lunch_calories'         => 'required',
            'dinner_calories'        => 'required',
            'daily_protein'          => 'required|array',
            'breakfast_protein'      => 'required|array',
            'lunch_protein'          => 'required|array',
            'dinner_protein'         => 'required|array',
            'daily_carbohydrate'     => 'required|array',
            'breakfast_carbohydrate' => 'required|array',
            'lunch_carbohydrate'     => 'required|array',
            'dinner_carbohydrate'    => 'required|array',
            'daily_fat'              => 'required|array',
            'breakfast_fat'          => 'required|array',
            'lunch_fat'              => 'required|array',
            'dinner_fat'             => 'required|array',
            'daily_saturatedFat'     => 'required|array',
            'breakfast_saturatedFat' => 'required|array',
            'lunch_saturatedFat'     => 'required|array',
            'dinner_saturatedFat'    => 'required|array',
            'daily_sugar'            => 'required|array',
            'breakfast_sugar'        => 'required|array',
            'lunch_sugar'            => 'required|array',
            'dinner_sugar'           => 'required|array',
            'daily_fiber'            => 'required|array',
            'breakfast_fiber'        => 'required|array',
            'lunch_fiber'            => 'required|array',
            'dinner_fiber'           => 'required|array',
            'daily_sodium'           => 'required|array',
            'breakfast_sodium'       => 'required|array',
            'lunch_sodium'           => 'required|array',
            'dinner_sodium'          => 'required|array',
            'daily_cholesterol'      => 'required|array',
            'breakfast_cholesterol'  => 'required|array',
            'lunch_cholesterol'      => 'required|array',
            'dinner_cholesterol'     => 'required|array',
        ]);

        $user = User::where('id', Auth::id())->first();
        $input = $request->all();
        if ($user) {
            $user->update($input);

            return response()->json([
                'user'  => $user,
            ], 200);
        }
        return response()->json([
            'message' => 'error',
        ], 400);
    }

    public function addToFavorite(Request $request)
    {
        $recipe = UserRecipe::where("user_id", Auth::id())->where("recipe_id", $request->recipe_id)->first();
        if ($recipe) {
            return response()->json([
                'message' => 'recipe is already in favorite list.',
            ], 400);
        }
        $id = UserRecipe::create([
            "user_id"   => Auth::id(),
            "recipe_id" => $request->recipe_id,
            "type"      => "favorite",
        ]);

        if ($id) {
            return response()->json([
                'message'  => "recipe added to favorite successfully.",
            ], 200);
        }
        return response()->json([
            'message' => 'error',
        ], 400);
    }

    public function removeToFavorite(Request $request)
    {
        $recipe = UserRecipe::where("user_id", Auth::id())->where("recipe_id", $request->recipe_id)->first();

        if ($recipe) {
            $recipe->delete();
            return response()->json([
                'message'  => "recipe deleted to favorite successfully.",
            ], 200);
        } else {
            return response()->json([
                'message'  => "Not found",
            ], 404);
        }
    }

    public function getFavoriteRecipe(Request $request)
    {
        $recipes = UserRecipe::where("user_id", Auth::id())->pluck('recipe_id');

        return response()->json([
            'favorite' => $recipes,
        ], 200);
    }
}
