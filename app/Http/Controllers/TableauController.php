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
        return view('tableaux/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'comments' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tableau = Tableau::create($params);

        // Enregistrement de l'image dans le storage
        if (isset($params['image'])) {
            $imageName = time(). '.' .$params['image']->extension();
            $params['image']->move(public_path('images'), $imageName);
            $tableau->path = $imageName;
            $tableau->save();
        }

        return redirect('/tableaux')
            ->with('success', 'Tableau ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Tableau $tableaux
     * @return \Illuminate\Http\Response
     */
    public function show(Tableau $tableaux)
    {
        //return view('tableaux/show', ['tableau' => $tableaux]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tableau $tableaux
     * @return \Illuminate\Http\Response
     */
    public function edit(Tableau $tableaux)
    {
        return view('tableaux/edit', ['tableau' => $tableaux]);
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
        $params = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'comments' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tableaux->update($params);

        // Enregistrement de l'image dans le storage
        if (isset($params['image'])) {
            // Si une image existe déjà, on la supprime
            if ($tableaux->path) {
                unlink(public_path('images/' . $tableaux->path));
            }

            $imageName = time(). '.' .$params['image']->extension();
            $params['image']->move(public_path('images'), $imageName);
            $tableaux->path = $imageName;
            $tableaux->save();
        }

        return redirect('/tableaux')
            ->with('success', 'Tableau modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tableau $tableaux
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tableau $tableaux): RedirectResponse
    {
        // Si le tableau dispose d'une image, on la supprime
        if ($tableaux->path) {
            unlink(public_path('images/' . $tableaux->path));
        }

        $tableaux->delete();

        return redirect('/tableaux')
            ->with('success', 'Tableau supprimé avec succès');
    }
}
