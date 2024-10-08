@extends('layouts.main')

@section('title', $events->title)

@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/events/{{ $events->image }}" class="img-fluid" alt="{{ $events->title }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $events->title }}</h1>
        <p class="event-city"><i class="bi bi-geo-alt-fill"></i> {{ $events->city }}</p>
        <p class="events-participants"><i class="bi bi-people-fill"></i> X Participantes</p>
        <p class="event-owner"><i class="bi bi-star"></i> {{ $eventOwner['name'] }}</p>
        <a href="#" class="btn btn-primary" id="event-submit">Confirmar Presença</a>

        <h3>O evento conta com:</h3>
        <ul id="items-list">
          @foreach($events->items as $item)
            <li><i class="bi bi-play"></i> <span>{{ $item }}</span></li>
          @endforeach
          </ul>
        </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre o evento:</h3>
        <p class="event-description">{{ $events->description }}</p>
      </div>
    </div>
  </div>

@endsection