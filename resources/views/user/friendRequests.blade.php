@extends('layouts/app')
@section('title')
    friendrequests
@endsection
@section('content')
    <form method="post" action="">
        @component('components/nav');
        @endcomponent
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
        @foreach($requests as $request)
            <div class="col-sm">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$request->name}}</h5>
                        <form method="POST" action="">
                            {{csrf_field()}}
                            <input type="hidden" name="friendshiprequest" value={{$request->id}} />
                            <input type="submit" value="Voeg toe" />
                        </form>
                    </div>
                </a>
            </div>
        @endforeach
@endsection