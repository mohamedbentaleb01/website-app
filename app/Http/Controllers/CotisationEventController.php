<?php

namespace App\Http\Controllers;

use App\Models\Cotisation;
use App\Models\Event;
use App\Models\Participation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CotisationEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $checkCotisation = Cotisation::where('user_id', '=', Auth::user()->id)->first();

        if($checkCotisation && !Session::has('status')){
            abort(401, 'Vous avez déja cotisé !');
        }
        else{
                $event = Event::findorfail($id);

                return view('evennements.cotisation', [
                    'event' => $event
                ]);

        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
            'email' => 'required|email',
            'montant' => 'required|nullable',
            'commentaire' => 'required|nullable|bail|max:255',
        ]);

        $cotisation = Cotisation::create([
            'user_id' => Auth::user()->id,
            'event_id' => $id,
            'desc' => $request->commentaire,
            'montant' => $request->montant,

        ]);

        $cotisation->save();

        return redirect()->back()->withStatus('Cotisation envoyé avec succés !');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
