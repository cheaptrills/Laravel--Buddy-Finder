@extends('layouts/app')

@section('title')
    register
@endsection

@section('content')
<div class="container">
    <form action="" method="post">
        {{csrf_field()}}
        @component('components/nav');
        @endcomponent

        <h2>Create a new account</h2>
        <form>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="geef je volledige naam">
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="geef je school-email">
                <small id="emailHelp" class="form-text text-muted">Je mail is enkel voor je in te loggen</small>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div>moviegenre</div>
                    <select name="moviegenre" id="moviegenre">
                        <option value="horror">horror</option>
                        <option value="romantic">romantic</option>
                    </select>
                    <div>musicgenre</div>
                    <select name="musicgenre" id="moviegenre">
                        <option value="house">House</option>
                        <option value="jazz">jazz</option>
                    </select>
                    <div>sport</div>
                    <select name="sport" id="moviegenre">
                        <option value="voetbal">voetbal</option>
                        <option value="rugby">rugby</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <div>hobby</div>
                    <select name="hobby" id="moviegenre">
                        <option value="djen">dj'en</option>
                        <option value="gamen">gamen</option>
                    </select>
                    <div>keuzerichting</div>
                    <select name="course" id="moviegenre">
                        <option value="design">design</option>
                        <option value="development">development</option>
                    </select>
                    <div>buddy zoeker of buddy</div>
                    <select name="buddy" id="moviegenre">
                        <option value=1>zoeker</option>
                        <option value=2>buddy</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            
            
            <button type="submit" class="btn btn-primary">Sign me up</button>
        </form>
</div>
@endsection