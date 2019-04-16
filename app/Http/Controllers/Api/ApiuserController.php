<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Product;
use App\Http\Resources\User as UserResource;

class ApiuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
    
        $check = User::Where('access_token', $_SERVER['HTTP_ACCESS_TOKEN'])->exists();
        // dd($check);
            if($check == true){
                $users = User::all();
                // $users = User::Where('id', 41)->with(['product' => function($product){
                //     $product->Where('id', 85);
                // }])->get();
                return UserResource::collection($users);
            }else{
                return response()->json([
                    'message' => 'Access Denide',
                    'code' => '401'
                ]);
            }
           
          
        

                // if(isset($_SERVER['HTTP_ACCESS_TOKEN'])){
                //     $check = User::Where('access_token', $_SERVER['HTTP_ACCESS_TOKEN'])->get();
                //     dd($check);

                //     if($check[0] != null){
                    
                //     }else{
                //         return response()->json([
                //             'message' => 'Access Denide',
                //             'code' => '401'
                //         ]); exit();
                //     }
                // }else{
                //     return response()->json([
                //         'message' => 'Token Not Authorized. Access Denide',
                //         'code' => '401'
                //     ]); 
                // }       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('email', $request->input('email'))->exists();
        // dd($user);
        if($user == false){
            // $user = $request->isMethod('post') ? User::Find($request->input('email')) : new User;
            $access_token = str_random(42);

            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->phone_no = $request->input('phone_no');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zip_code = $request->input('zip_code');
            $user->admin = $request->input('admin');
            $user->access_token = $access_token;
        
            if($user->save()){
                return new UserResource($user);
            }
            
        }else{
            return response()->json([
                'message' => 'User Exist',
                'code' => '200'
            ]); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::Find($id);

        if($user == null){
            return response()->json([
                'message' => 'Us    er Not Exist',
                'code' => '200'
            ]); 
        }else{
            return new UserResource($user);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::Find($id);

        if($user == null){
            return response()->json([
                'message' => 'User Not Exist',
                'code' => '200'
            ]); 
        }else{
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone_no = $request->input('phone_no');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zip_code = $request->input('zip_code');
            $user->admin = $request->input('admin');
            
            if($user->save()){
                return new UserResource($user);
            }
        }
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $user = User::Find($id);
        
        if($user == null){
            return response()->json([
                'message' => 'User Not exist',
                'code'=> '200'
            ]);
        }else{
            if($user->delete()){
                return response()->json([
                    'message' => 'User Deleted',
                    'code' => '200'
                ]);
            }
        }
        
    }
}
