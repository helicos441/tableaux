<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Business\PictureBusiness;
use App\Models\Picture;

class PictureController extends Controller
{
    protected PictureBusiness $pictureBusiness;

    public function __construct(PictureBusiness $pictureBusiness)
    {
        $this->pictureBusiness = $pictureBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = Picture::all();
        return view('pictures/index', compact('pictures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pictures/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate(Picture::VALIDATORS);

        $this->pictureBusiness->createPicture($params);

        return redirect('/pictures')
            ->with('success', 'Tableau ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        return view('pictures/show', compact('picture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {
        return view('pictures/edit', compact('picture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {
        $params = $request->validate(Picture::VALIDATORS);

        $this->pictureBusiness->updatePicture($picture, $params);

        return redirect('/pictures')
            ->with('success', 'Tableau modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Picture $picture
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Picture $picture): RedirectResponse
    {
        $this->pictureBusiness->deletePicture($picture);

        return redirect('/pictures')
            ->with('success', 'Tableau supprimé avec succès');
    }
}
