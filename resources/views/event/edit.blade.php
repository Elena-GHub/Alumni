@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <form action="{{route('event.update', $event->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="card-header">
                    Event <a href="{{route('event.create')}}" class="btn btn-secondary">Nuevo</a>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{$event->name}}">
                        <label>Grupo</label>
                        <input type="text" name="group" class="form-control" value="{{$event->group}}">
                        <label>Lenguaje</label>
                        <input type="text" name="language" class="form-control" value="{{$event->language}}">
                        <label>Descripcion</label>
                        <input type="text" name="language" class="form-control" value="{{$event->description}}">
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Actualizar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection

