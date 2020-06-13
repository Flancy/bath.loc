<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Hash;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(15);

        return view('user.index')->with([
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_all = $request->all();
        $request_all['password'] = Hash::make($request_all['password']);

        $user = User::create($request_all);

        if(!$user) {
            return redirect()->route('user.index')
                ->withErrors('Невозможно добавить пользователя!');
        }

        activity()->log('<div class="alert alert-info mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> создал пользователя №' . $user->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('user.index')
            ->withSuccess('Пользователь успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        return view('user.show')->with([
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        return view('user.edit')->with([
            'user' => $user,
        ]);
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
        $request_all = $request->all();
        $request_all['password'] = Hash::make($request_all['password']);

        $user = User::where('id', $id)->firstOrFail();
        $user->update($request_all);

        if(!$user) {
            return redirect()->route('user.index')
                ->withErrors('Невозможно обновить пользователя!');
        }

        activity()->log('<div class="alert alert-warning mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> изменил пользователя №' . $user->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('user.index')
            ->withSuccess('Пользователь успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();

        if(!$user) {
            return redirect()->route('user.index')
                ->withErrors('Невозможно удалить платежку!');
        }

        activity()->log('<div class="alert alert-danger mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> удалил пользователя №' . $user->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('user.index')
            ->withSuccess('Пользователь успешно удалена!');
    }
}
