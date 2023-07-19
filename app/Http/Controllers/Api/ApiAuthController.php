<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Parser\Tokens;
use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;

class ApiAuthController extends Controller
{
    use GeneralTrait;
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        
    }
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|between:2,100',
            'last_name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);
        if($validator->fails()){
            return $this->returnError('Validation Error', $validator->errors());
        }
        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
        ));

                //$token = $user->createToken('myapptoken')->plainTextToken;

                // $response = [
                //     'user' => $user,
                //     'token' => $token
                // ];

        // return response()->json([
        //       'token'=>$token,
        //     'message' => 'User successfully registered',
        //     'user' => $user
        // ], 201);
             return $this->sendResponse($user,'User successfully registered');
    }
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token);
    }
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
    public function refresh() {
        //جنيريت للتوكن طالما ضايل في الصفحة
        return $this->createNewToken(auth()->refresh());
    }
    public function userProfile() {
        //بترجع بيانات اليوزر للموبايل
        return response()->json(auth()->user());
    }
    public function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}

