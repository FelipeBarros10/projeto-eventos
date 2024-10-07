<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){

            $events = Event::where([
                [ 'title', 'like', '%'.$search.'%' ]
            ])->get();


        } else {
            $events = Event::all();
        }

        
        return view('welcome', [  'events' => $events, 'search'=> $search ]); //Aqui nesse Array ele pega a variável e passa para o nome entre '' (aspas simples)
                                        //E esse nome que será colocado entre chaves lá no blade para aparecer o valor da variável
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        
        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        //image Upload

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id) {
        $events = Event::findOrFail($id); //Pega as informações do model(dados do bando de dados) e usao uma função
                                          // Que se achar o id ele dpa certo, se não a dá erro 404

        return view('events.show', [ 'events' => $events ]); //Aqui, por fim, vai direcionar para o diretório 'events.show'
                                                             // No qual vai estar toda a estrutura da página que o usuário quer acessar
    }

}
