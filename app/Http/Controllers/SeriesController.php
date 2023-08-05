<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        //$series = Serie::all(); //retorna uma coleção
        $series = Serie::query()->orderBy('nome')->get();

        //$series = DB::select('SELECT nome FROM series;');
        //dd($series);
       
        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nomeSerie = $request->input('nome'); //já filtra os caracteres especiais
        $serie = new Serie();
        $serie->nome = $nomeSerie;
        $serie->save();

        //DB::insert('INSERT INTO series(nome) VALUES (?)', [$nomeSerie]);
        return redirect('/series');
    
    }
}
