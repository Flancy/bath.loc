<?php

namespace App\Http\Controllers\Cash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Auth;

use App\Models\Cash;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cash_date = Carbon::now()->format('d-m-yy');

        if($request->cash_date) {
            $cash_date = $request->cash_date;
        }

        $cashes = Cash::whereDate('created_at', new Carbon($cash_date))->paginate(15);

        $rank = $cashes->firstItem();

        return view('cash.index')->with([
            'cashes' => $cashes,
            'cash_date' => $cash_date,
            'total' => 0,
            'coming' => 0,
            'expend' => 0,
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
        return view('cash.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cash = Cash::create($request->all());

        if(!$cash) {
            return redirect()->route('cash.index')
                ->withErrors('Невозможно добавить платежку!');
        }

        activity()->log('<div class="alert alert-info mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> добавил платежку №' . $cash->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('cash.index')
            ->withSuccess('Платежка успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cash = Cash::where('id', $id)->firstOrFail();

        return view('cash.show')->with([
            'cash' => $cash
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
        $cash = Cash::where('id', $id)->firstOrFail();

        return view('cash.edit')->with([
            'cash' => $cash,
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
        $cash = Cash::where('id', $id)->firstOrFail();
        $cash->update($request->all());

        if(!$cash) {
            return redirect()->route('cash.index')
                ->withErrors('Невозможно обновить платежку!');
        }

        activity()->log('<div class="alert alert-warning mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> изменил платежку №' . $cash->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('cash.index')
            ->withSuccess('Платежка успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cash = Cash::where('id', $id)->firstOrFail();
        $cash->delete();

        if(!$cash) {
            return redirect()->route('cash.index')
                ->withErrors('Невозможно удалить платежку!');
        }

        activity()->log('<div class="alert alert-danger mb-1">Пользователь <span class="badge badge-dark">' . Auth::user()->name . '</span> удалил платежку №' . $cash->id . '<span class="badge badge-secondary float-right">' . now(). '</span></div>');

        return redirect()->route('cash.index')
            ->withSuccess('Платежка успешно удалена!');
    }
}
