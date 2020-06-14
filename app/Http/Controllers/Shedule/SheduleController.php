<?php

namespace App\Http\Controllers\Shedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\Shedule;
use App\Models\Children;
use App\Models\Trainer;

class SheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shedulers = Shedule::paginate(15);

        $rank = $shedulers->firstItem();

        return view('shedule.index')->with([
            'shedulers' => $shedulers,
            'rank' => $rank
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
        $childrens = Children::all();

        return view('shedule.create')->with([
            'trainers' => $trainers,
            'childrens' => $childrens
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
        $shedule = Shedule::create($request->all());

        if(!$shedule) {
            return redirect()->route('shedule.index')
                ->withErrors('Невозможно добавить абонемент!');
        }

        activity()->log('<div class="alert alert-info mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> добавил абонемент №' . $shedule->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('shedule.index')
            ->withSuccess('Абонемент успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shedule = Shedule::where('id', $id)->firstOrFail();

        return view('shedule.show')->with([
            'shedule' => $shedule
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
        $shedule = Shedule::where('id', $id)->firstOrFail();
        $childrens = Children::all();
        $trainers = Trainer::all();

        return view('shedule.edit')->with([
            'shedule' => $shedule,
            'childrens' => $childrens,
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
        $shedule = Shedule::where('id', $id)->firstOrFail();
        $shedule->update($request->all());

        if(!$shedule) {
            return redirect()->route('shedule.index')
                ->withErrors('Невозможно обновить абонемент!');
        }

        activity()->log('<div class="alert alert-warning mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> изменил абонемент №' . $shedule->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('shedule.index')
            ->withSuccess('Абонемент успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shedule = Shedule::where('id', $id)->firstOrFail();
        $shedule->delete();

        if(!$shedule) {
            return redirect()->route('shedule.index')
                ->withErrors('Невозможно удалить абонемент!');
        }

        activity()->log('<div class="alert alert-danger mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> удалил абонемент №' . $shedule->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('shedule.index')
            ->withSuccess('Абонемент успешно удален!');
    }
}
