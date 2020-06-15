@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card text-center">
                        <div class="card-header">Welcome</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <div class="links">
                        <a href="{{Route('event.index')}}"  class="btn btn-outline-primary btn-lg btn-block">Event</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

