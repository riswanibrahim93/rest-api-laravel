<?php

namespace App\Http\Controllers\Artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Artikel\Artikel;
use App\Http\Resources\ArtikelResource;
use App\Http\Requests\ArtikelRequest;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::paginate(2);
        return ArtikelResource::collection($artikel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtikelRequest $request)
    {
        $artikels = auth()->user()->artikel()->create($this->artikelStore());

        return $artikels;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        return new ArtikelResource($artikel); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtikelRequest $request, Artikel $artikel)
    {
        $artikel->update($this->artikelStore());

        return new ArtikelResource($artikel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return response()->json('Artikel berhasil dihapus', 200);
    }

    public function artikelStore(){
        return [
            'title' => request('title'),
            'slug' => \Str::slug(request('title')),
            'body' => request('body'),
            'subjek_id' => request('subjek'),
        ];
    }
}
