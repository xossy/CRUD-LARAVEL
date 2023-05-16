<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Series::create($request->all());

        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $season = $serie->season()->create([
                'number' => $i,
            ]);

            for ($j = 1; $i <= $request->episodesPerSeason; $j++) {
                $season->episodes()->create([
                    "number" => $j,
                ]);
            }
        }

        return to_route('series.index')->with('mensagem.sucesso', "Serie '{$serie->nome}' Criada Com Sucesso");
    }

    public function destroy(Series $series)
    {
        $series->delete();
        return to_route('series.index')->with('mensagem.sucesso', "Serie '{$series->nome}' Removida Com Sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();
        return to_route('series.index')->with('mensagem.sucesso', "Serie '{$series->nome}' Modificada Com Sucesso");
    }
}
