<?php

namespace App\Http\Controllers;

use App\Models\{Season, Series, Episode};
use App\Http\Requests\SeriesFormRequest;

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
        
        $seasons = [];
        $episodes = [];

        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i,
            ];
        }
        Season::insert($seasons);

        foreach ($serie->season() as $season) {
            dd($season);
            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j,
                ];
            }
        }

        Episode::insert($episodes);

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
