<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function create()
    {
        $user = [];
        $roles = Role::get();
        return view('users.create', compact('user', 'roles'));
    }

    public function store(UserRequest $request)
    {
        $atributos = $request->validated();
        $atributos['password'] = Hash::make($atributos['password']);

        $user = User::create($atributos);
        $user->syncRoles(Role::findById($atributos['role_id']));
        return redirect()->route('user.index');
    }


}
