<?php

namespace Modules\Wordpress\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Wordpress\Models\Wordpress;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use Validator;

class WordpressController extends Controller
{  
    public $token = true;
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]); // truyền các hàm ở dưới vào nếu không sử dụng token

    }
    public function index(){
        
        return [
            'status' => 200
        ];
    }

    public function register(Request $request)
    {

         $validator = Validator::make($request->all(), 
                      [ 
                      'name' => 'required',
                      'email' => 'required|email',
                      'password' => 'required',  
                      'c_password' => 'required|same:password', 
                     ]);  

         if ($validator->fails()) {  

               return response()->json(['error'=>$validator->errors()], 401); 

         }   

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->group_id = $request->group_id ?? 3;
        $user->password = bcrypt($request->password);
        $user->save();

        // if ($this->token) {
        //     return $this->login($request);
        // }


        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    public function login(Request $request)    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
 
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
 
        if (! $token = auth('api')->attempt($validator->validated())) {
            return response()->json(['error' => 'Invalid Email or Password'], 401);
        }
 
        return $this->createNewToken($token);
    }

    public function getUser(Request $request)
    {        
      
        try {
            $user = auth('api')->user();
        } catch (JWTException $exception) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        

        return response()->json(['user' => $user]);
    }

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',  
            'success'    => true   
        ]);
    }


}