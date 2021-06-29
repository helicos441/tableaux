<?php

namespace App\Http\Controllers;

use App\Models\Tableau;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TableauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableaux = Tableau::all();
        return view('tableaux/index', compact('tableaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Tableau $tableaux
     * @return \Illuminate\Http\Response
     */
    public function show(Tableau $tableaux)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tableau $tableaux
     * @return \Illuminate\Http\Response
     */
    public function edit(Tableau $tableaux)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Tableau $tableaux
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tableau $tableaux)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tableau $tableaux
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tableau $tableaux): RedirectResponse
    {
        $tableaux->destroy();

        return redirect('/tableaux')
            ->with('success', 'Tableau supprimé avec succès');
    }
}
