@if(Auth::check())
    @extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3>{{$user->name}}</h3>
                        test
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@else
 no authorataaaah
@endif