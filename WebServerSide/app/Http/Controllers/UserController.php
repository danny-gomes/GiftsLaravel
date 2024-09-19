<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAddUserView() {

        return view('userViews.add_user');
    }

    public function getAllUsersView() {
        $users = User::all();

        $search = request()->search;

        if($search){
            $users = User::where('name','LIKE', "%$search%")->get();
        } else {
            $users = User::all();
        }

        return view('userViews.show_users', compact('users'));
    }

    public function displayUser($id){
        $user = User::where('id', $id)->first();

        return view('userViews.display_user', compact('user'));
    }

    public function createUser(Request $request){

        if(isset($request->id)){
            $request->validate([
                'name' => 'required|string|max:50'
            ]);

            $user = User::where('id',$request->id)->update([
                'name' => $request->name
            ]);

            return redirect()->route('user.showAllUsers')->with('message', 'User atualizado com sucesso');
        } else {
            $request->validate([
                'name' => 'string|max:50',
                'password' => 'min:6'
            ]);

            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->route('user.showAllUsers')->with('message', 'User adicionado com sucesso');
    }

    public function deleteUser($id) {
        Gift::where('user_id', $id)->delete();
        User::where('id', $id)->delete();

        return back()->with('message', 'User deleted successfuly');
    }
}
