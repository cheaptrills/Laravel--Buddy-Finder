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
                <div class="col-sm-20">
                @if ($user->id == Auth::id())
                    <a href="/user/edit">edit</a>
                @endif
                    <div class="col-xs-12 col-sm-6">
                        <h2>{{$user->name}}</h2>
                        <p><strong>Keuzerichting: </strong>{{$user->course}} </p>
                        <p><strong>Hobbies: </strong> {{$user->hobby}} </p>
                        <p><strong>Fav filmgenre: </strong> {{$user->moviegenre}} </p>
                        <p><strong>Fav muziekgenre: </strong> {{$user->musicgenre}} </p>
                        <p><strong>Fav sport: </strong> {{$user->sport}} </p>
                    </div>      
                    <div class="col-xs-10 col-sm-5 text-center">
                        <figure>
                            <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; width:150px" alt="" class="img-circle img-responsive">
                        </figure>
                        <div class="col-xs-12 emphasis">
                        <h2><strong> </strong></h2>                    
                        <form method="POST" action="/addfriend">
                                        {{csrf_field()}}
                                        <input type="hidden" name="friendId" value={{$user->id}} />
                                        <input type="submit" value="Voeg toe" />
                                    </form>                    </div>
                </div>            
                <div class="col-sm-12  text-center">
                    <br><br>                    
                </div>
                <div class="col-sm-12  text-center">
                        <p><strong>bio: </strong> {{$user->bio}} </p>
                </div>
    	    </div>                 
		</div>
	</div>
    @endsection
@else
 no authorataaaah
@endif