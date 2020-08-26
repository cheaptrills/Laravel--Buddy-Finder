@if(Auth::check())
    @extends('layouts.app')
    @section('title')
    Homepage
    @endsection
    @component('components/navbar');
    @endcomponent
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                        @foreach($result as $user)
                        <div class="col-sm">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="/uploads/avatars/{{ $user->avatar }}" class="img-circle img-responsive" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$user->name}}</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{$user->course}}</li>
                                </ul>
                                <div class="card-body">
                                    <a href="/user/profile/{{$user->id}}" class="card-link">profiel</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@else
 no authorataaaah
@endif
