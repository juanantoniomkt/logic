<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {

        return view('user.index')->with('users', User::all());
    }

    public function create()
    {
        return view('user.create');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', ['user' => $user]);
    }

    public function update (Request $request, $id)
    {
        $user = User::find($id);

        $user-> name = $request->name;
        $user-> password = bcrypt($request->password);

        $user -> save();

        return redirect()->route('users.index');
        
    }

    public function destroy($id)
    {

        $user = User::find($id);

        $user->delete();

        return redirect()->route('users.index');
    }

    public function store()
    {
        $data = request()->all();

        User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])

            ]);

        return redirect('/users');
    }
}
