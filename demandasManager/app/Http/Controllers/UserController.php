<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }
    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $user = User::create($request->all());
        $role = $request->input('role');
        if ($role) {
            $user->syncRoles([$role]);
        }
        return redirect()->route('user.index')
            ->with('success', 'User created successfully.');
    }
    
    public function edit(Request $request,$id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);
        $user->syncRoles([$request->input('role')]);
        $user->update($request->all());
        $user->save();
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user){
        if($user->id === auth()->user()->id){
            return redirect()->route('user.index')->with('message', 'No se puede borrar el propio usuario');;
        }
        $user->delete();
        return redirect()->route('user.index');
    }
}
