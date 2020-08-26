@extends('layouts/app')
@section('title')
    friendrequests
@endsection
@component('components/navbar');
        @endcomponent
@section('content')
    <form method="post" action="">
        
        {{csrf_field()}}
        @if( $errors->any())
            @component('components/alert')
                @slot('type', 'danger')
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endcomponent
        @endif
        @if(count($requests) > 0)
            @foreach($requests as $request)
                <div class="col-sm">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{$request->name}}</h5>
                            <h5 class="mb-1">{{$request->course}}</h5>
                            <h5 class="mb-1">{{$request->bio}}</h5>
                            <a href="/user/profile/{{$request->uid}}" class="card-link">profiel</a>

                            <form method="POST" action="">
                                {{csrf_field()}}
                                <input type="hidden" name="friendshiprequest" value={{$request->id}} />
                                <input type="submit" value="Voeg toe" />
                            </form>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
        <div class="header">
                    <h1>You have no requests :(</h1>
                </div>
        @endif 
@endsection