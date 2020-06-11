<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        return view('trainer.index')->with([
            'trainers' => $trainers
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

        if(!$trainer) {
            return redirect()->route('trainer.index')
                ->withErrors('Невозможно удалить тренера!');
        }

        return redirect()->route('trainer.index')
            ->withSuccess('Тренер успешно удален!');
    }
}
