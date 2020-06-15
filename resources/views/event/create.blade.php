@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <form action="{{route('event.store')}}" method="POST">
                @csrf
                <div class="card-header">
                    Event <a href="{{route('event.create')}}" class="btn btn-secondary">Nuevo</a>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name">
                        <label>Grupo</label>
                        <input type="text" name="group">
                        <label>Lenguaje</label>
                        <input type="text" name="language">
                        <label>Descripcion</label>
                        <input type="text" name="description">
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Crear" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
