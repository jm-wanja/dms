<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function all()
    {
        $users = User::all();
        if (empty($users)) {
            return $this->error("Seems like there are no userd yet!", 404);
        }
        // return $this->success($users, 200);
        return $this->respond(Response::HTTP_OK, $users);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users', 
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name'=> $request->get('name'),
            'email' => $request->get('email'),
            'password'=> Hash::make($request->get('password')),
        ]);
        return $this->success("The user with with id {$user->id} has been created", 201);
    }

    public function read($user_id)
    {
        $user = User::find($user_id);
        if(!$user){
            return $this->error("The user with id {$user_id} doesn't exist", 404);
        }
        return $this->success($user, 200);
    }

    public function update($user_id)
    {
        $user = User::find($user_id);
        
        if(!$user){
            return $this->error("The user with {$id} doesn't exist", 404);
        }
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users', 
            'password' => 'required|min:6'
        ]);
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return $this->success("The user with with id {$user->id} has been updated", 200);
    }

    public function destroy($user_id)
    {
        $user = User::find($user_id);
        if(!$user){
            return $this->error("The user with {$user_id} doesn't exist", 404);
        }
        $user->delete();
        return $this->success("The user with with id {$user_id} has been deleted", 200);
    }
}