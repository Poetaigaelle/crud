<?php

namespace App\Http\Controllers;

use App\Brief;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BriefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Brief $brief)
    {
        $brief->all();
        return view('home',compact('brief'));
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
    public function store(Request $request, Brief $brief)
    {
        $input = $request->all();

        //Input de la table Brief

        $name = $input['name'];
        $lastname = $input['lastname'];
        $date = $input['date'];

        // Enregistrer en base de donnée

        $brief->name = $name;
        $brief->lastname = $lastname;
        $brief->date = $date;

        $brief->save();

        return redirect()->route('briefs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brief  $brief
     * @return \Illuminate\Http\Response
     */
    public function show(Brief $brief, id $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brief  $brief
     * @return \Illuminate\Http\Response
     */
    public function edit(Brief $brief)
    {
        return view('edit',compact('brief'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brief  $brief
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brief $brief)
    {
        $brief->update($request->all());
        
        return redirect()->route('briefs.store');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brief  $brief
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brief $brief, Request $request)
    {
        $brief->delete();

        return redirect()->route('briefs.store');
    }
//METHODE POUR SUPPRIMER TOUT LES CHAMPS DANS UNE TABLE

    public function delete_all(Brief $brief, Request $request)
    {
        DB::table('briefs')->delete(); 

        return redirect()->route('briefs.store');
    }
}
