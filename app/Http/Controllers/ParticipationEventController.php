<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipationRequest;
use App\Models\Cotisation;
use App\Models\Event;
use App\Models\Participation;
use App\View\Components\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ParticipationEventController extends Controller
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
        $checkParticipation = Participation::where('user_id', '=', Auth::user()->id)->first();
        $checkCotisation = Cotisation::where('user_id', '=', Auth::user()->id)->first();

        if($checkParticipation && !Session::has('status') || $checkCotisation && !Session::has('status')){
            abort(401);
        }
        else{

            $event = Event::findorfail($id);
    
            return view('evennements.participation', [
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
    public function store(ParticipationRequest $request, $id)
    {
        $participation = Participation::create([
            'event_id' => $id,
            'user_id' =>  Auth::user()->id,
        ]);

        
        if($request->has("montant") && $request->has("commentaire")){
            
            if($request->montant != NULL && $request->commentaire !=NULL){
                
                $request->validate([
                    'montant' => 'numeric|min:4',
                    'commentaire' => 'bail|max:255',
                ]);
                
                $cotisation = Cotisation::create([
                    'event_id' => $id,
                    'desc' => $request->commentaire,
                    'montant' => $request->montant,
                    'user_id' => Auth::user()->id,
                ]);
                
                $cotisation->save();
                
                return redirect()->back()->withStatus('Participation et cotisation envoyé par succés');
            }
        }
        
        $participation->save();
        
        return redirect()->back()->withStatus('Participation envoyé par succés !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function show(Participation $participation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function edit(Participation $participation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participation $participation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participation $participation)
    {
        //
    }
}
