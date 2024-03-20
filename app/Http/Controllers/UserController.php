<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\post;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        $users = User::all();
        return view('admin/users/index', compact('users'));
        */
        return view('admin/users/index');
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]
        );
        return redirect(route('admin.user.index'))->with('message', 'Usuario creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin/users/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('dashboard')->with('success', 'Usuario actualizado exitosamente');

        /*

            $user->update($request->all());
            return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado exitosamente');
             */
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        /*
        $user->delete();
        return back()->with('succes','Usuario eliminado correctamete');
        */
        Post::where('user_id', $user->id)->delete();
        $user->delete();
        return redirect()->route('dashboard')->with('message', 'Usuario eliminado');

    }

    public function crearUsuario(Request $request)
    {
        // Crea el usuario
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $users = User::all();
        return view('admin/users/index',compact('users'));

    }

    public function crearUser()
    {
        //return redirect()->route('admin.user.crear')->with('message', 'Direccion encontrada');
        return view('admin/users/agregar');
    }
}
