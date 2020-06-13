<?php

namespace App\Http\Controllers\Children;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\Children;
use App\Models\Trainer;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childrens = Children::orderBy('recording_date', 'desc')->paginate(15);

        return view('children.index')->with([
            'childrens' => $childrens
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainers = Trainer::all();

        return view('children.create')->with([
            'trainers' => $trainers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $children = Children::create($request->all());

        if(!$children) {
            return redirect()->route('children.index')
                ->withErrors('Невозможно добавить анкету!');
        }

        activity()->log('<div class="alert alert-info mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> добавил анкету ребенка №' . $children->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('children.index')
            ->withSuccess('Анкета успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $children = Children::where('id', $id)->firstOrFail();

        return view('children.show')->with([
            'children' => $children
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
        $children = Children::where('id', $id)->firstOrFail();
        $trainers = Trainer::all();

        return view('children.edit')->with([
            'children' => $children,
            'trainers' => $trainers
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
        $children = Children::where('id', $id)->firstOrFail();
        $children->update($request->all());

        if(!$children) {
            return redirect()->route('children.index')
                ->withErrors('Невозможно обновить анкету!');
        }

        activity()->log('<div class="alert alert-warning mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> изменил анкету ребенка №' . $children->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('children.index')
            ->withSuccess('Анкета успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $children = Children::where('id', $id)->firstOrFail();
        $children->delete();

        if(!$children) {
            return redirect()->route('children.index')
                ->withErrors('Невозможно удалить анкету!');
        }

        activity()->log('<div class="alert alert-danger mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> удалил анкету ребенка №' . $children->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('children.index')
            ->withSuccess('Анкета успешно удалена!');
    }
}
