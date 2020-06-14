<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\Trainer;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = Trainer::paginate(15);

        $rank = $trainers->firstItem();

        return view('trainer.index')->with([
            'trainers' => $trainers,
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
        return view('trainer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trainer = Trainer::create($request->all());

        if(!$trainer) {
            return redirect()->route('trainer.index')
                ->withErrors('Невозможно добавить тренера!');
        }

        activity()->log('<div class="alert alert-info mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> добавил анкету тренера №' . $trainer->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('trainer.index')
            ->withSuccess('Тренер успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trainer = Trainer::where('id', $id)->firstOrFail();

        return view('trainer.show')->with([
            'trainer' => $trainer
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
        $trainer = Trainer::where('id', $id)->firstOrFail();

        return view('trainer.edit')->with([
            'trainer' => $trainer
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
        $trainer = Trainer::where('id', $id)->firstOrFail();
        $trainer->update($request->all());

        if(!$trainer) {
            return redirect()->route('trainer.index')
                ->withErrors('Невозможно обновить анкету тренера!');
        }

        activity()->log('<div class="alert alert-warning mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> изменил анкету тренера №' . $trainer->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('trainer.index')
            ->withSuccess('Анкета тренера успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer = Trainer::where('id', $id)->firstOrFail();
        $trainer->delete();

      	Shedule::where('trainer_id', $id)->delete();

        if(!$trainer) {
            return redirect()->route('trainer.index')
                ->withErrors('Невозможно удалить тренера!');
        }

        activity()->log('<div class="alert alert-danger mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> удалил анкету тренера №' . $trainer->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('trainer.index')
            ->withSuccess('Тренер успешно удален!');
    }
}
