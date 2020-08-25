@extends('layouts/app')

@section('title')
    edit
@endsection
@component('components/navbar');
@endcomponent

@section('content')
<div class="container">
    <form  method="post" enctype="multipart/form-data" action="/user/edit">
        {{csrf_field()}}
        <h2>edit profile</h2>
            <div class="form-group">
                <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; width:150px" alt="" class="img-circle img-responsive">
                    <input type="file" name="avatar">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{$user->name}}">
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{$user->email}}">
                <small id="emailHelp" class="form-text text-muted">Je mail is enkel voor je in te loggen</small>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div>moviegenre</div>
                    <select name="moviegenre" id="moviegenre" >
                        <option value="{{$user->moviegenre}}">{{$user->moviegenre}}</option>
                        <option value="horror">horror</option>
                        <option value="romantic">romantic</option>
                    </select>
                    <div>musicgenre</div>
                    <select name="musicgenre" id="moviegenre">
                        <option value="{{$user->musicgenre}}">{{$user->musicgenre}}</option>
                        <option value="house">House</option>
                        <option value="jazz">jazz</option>
                    </select>
                    <div>sport</div>
                    <select name="sport" id="moviegenre">
                        <option value="{{$user->sport}}">{{$user->sport}}</option>
                        <option value="voetbal">voetbal</option>
                        <option value="rugby">rugby</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <div>hobby</div>
                    <select name="hobby" id="moviegenre">
                        <option value="{{$user->hobby}}">{{$user->hobby}}</option>
                        <option value="djen">dj'en</option>
                        <option value="gamen">gamen</option>
                    </select>
                    <div>keuzerichting</div>
                    <select name="course" id="moviegenre">
                        <option value="{{$user->course}}">{{$user->course}}</option>
                        <option value="design">design</option>
                        <option value="development">development</option>
                    </select>
                    <div>buddy zoeker of buddy</div>
                    <select name="buddy" id="moviegenre">
                        <option value="{{$user->buddy}}">{{$user->buddy}}</option>
                        <option value=1>zoeker</option>
                        <option value=2>buddy</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="password">new Password</label>
                <input type="password" name="password2" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="password">re-enter new Password</label>
                <input type="password" name="password3" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group">
            Enter current password to edit
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            
            
            <button type="submit" class="btn btn-primary">edit profile</button>
        </form>
</div>
@endsection