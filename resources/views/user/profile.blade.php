@if(Auth::check())
    @extends('layouts.app')
    @section('title')
    Profile
    @endsection
    @component('components/navbar');
    @endcomponent
    @section('content')

   
    <div class="row">

		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    	    <div class=" profile">
                <div class="col-sm-12">
                    <div class="col-xs-12 col-sm-8">
                        <h2>{{$user->name}}</h2>
                        <p><strong>Keuzerichting: </strong>{{$user->course}} </p>
                        <p><strong>Hobbies: </strong> {{$user->hobby}} </p>
                        <p><strong>Fav filmgenre: </strong> {{$user->moviegenre}} </p>
                        <p><strong>Fav muziekgenre: </strong> {{$user->musicgenre}} </p>
                        <p><strong>Fav sport: </strong> {{$user->sport}} </p>
                    </div>             
                    <div class="col-xs-12 col-sm-4 text-center">
                        <figure>
                            <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; width:150px" alt="" class="img-circle img-responsive">
                        </figure>
                        <div class="col-xs-12 emphasis">
                        <h2><strong> 20,7K </strong></h2>                    
                        <p><small>vrienden</small></p>
                        <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Voeg toe </button>
                    </div>
                </div>            
    	    </div>                 
		</div>
	</div>
    @endsection
@else
 no authorataaaah
@endif