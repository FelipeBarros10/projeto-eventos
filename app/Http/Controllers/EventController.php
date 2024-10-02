<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();

        return view('welcome', [  'events' => $events ]); //Aqui nesse Array ele pega a variável e passa para o nome entre '' (aspas simples)
                                        //E esse nome que será colocado entre chaves lá no blade para aparecer o valor da variável
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        
        $event = new Event;

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;

        $event->save();

        return redirect('/');
    }

}
