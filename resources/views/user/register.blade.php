@extends('layouts/app')

@section('content')

    <form action="" method="post">
        {{csrf_field()}}

        <h2>Create a new account</h2>
        <form>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter your name">
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">Je mail is enkel voor je in te loggen</small>
            </div>
            <select name="moviegenre" id="moviegenre">
                <option value=1>horror</option>
            </select>
            <select name="musicgenre" id="moviegenre">
                <option value=1>House</option>
            </select>
            <select name="sport" id="moviegenre">
                <option value=1>voetbal</option>
            </select>
            <select name="hobby" id="moviegenre">
                <option value=1>dj'en</option>
            </select>
            <select name="course" id="moviegenre">
                <option value=1>design</option>
                <option value=2>development</option>
            </select>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            
            <button type="submit" class="btn btn-primary">Sign me up</button>
        </form>

@endsection