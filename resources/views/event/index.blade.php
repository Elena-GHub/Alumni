@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Event <a href="{{route('event.create')}}" class="btn btn-outline-secondary">Nuevo</a>
            </div>
            <div class="card-body">
                <ul>
                    @foreach($events as $event)
                        <li><a>{{$event->name}}</a></li>
                        <li><a>{{$event->group}}</a></li>
                        <li><a>{{$event->description}}</a></li>
                        <li><a>{{$event->language}}</a> </li>
                            <form action="{{route('event.update',$event->id)}}" method="POST">
                                @csrf
                                @method('update')
                                <a href="{{Route('event.edit',$event->id)}}" class="btn btn-xs btn-success">Edit</a>
                            </form>
                            <form action="{{route('event.destroy', $event->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Eliminar" class="btn btn-xs btn-outline-danger">
                            </form>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
