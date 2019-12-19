<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Http\Request;
use App\Users;
use App\Twits;

Route::get('/',function(){
    return view('login');
});

Route::get('/register',function(){
    return view('register');
});

Route::get('/login',function(){
    return view('login');
});

Route::get('/welcome', function () {
    return view('welcome');
});


//Register
Route::post('/register',function(Request $req){
    try {
        Users::create([
            'username'=>$req->input('username'),
            'password'=>$req->input('password'),
            'email'=>$req->input('email')
        ]);

        return response()->json(['status'=>'true'],200);
    } catch (\Throwable $th) {
        return response()->json(['status'=>'false'],201);
    }
});

//Login
Route::post('/login',function(Request $req){
    try {
        $user = Users::where('username','=',$req->input('username'))
        ->where('password','=',$req->input('password'))
        ->firstOrFail();
        
        if($user['id'] == null){
            return response()->json(['status'=>'false'],201);    
        }else{
            Session::put('oturum',true);
            Session::put('id',$user['id']);
            Session::put('username',$user['username']);
            return response()->json([$user]);
        }


    } catch (\Throwable $th) {
        return response()->json(['status'=>'false'],201);
    }
});

//Create Twit
Route::post('/createtwit',function(Request $req){
    try {
        if(session('id') != null){
            Twits::create([
                'body'=>$req->input('body'),
                'user_id'=>$req->input('user_id')
            ]);
            return response()->json(['status'=>'true'],200);
        }
    } catch (\Throwable $th) {
        return response()->json(['status'=>'false'],201);
    }
});

//List Twit
Route::post('/ListTwit',function(Request $req){
    if(session('id') != null){
        $twits = Twits::where('user_id',$req->input('id'))
        ->orderBy('created_at','desc')->get();

        return response()->json($twits);
    }
});

