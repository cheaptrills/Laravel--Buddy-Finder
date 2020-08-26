@extends('layouts/app')
@section('title')
    Login
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
        <h2>Log in</h2>
        <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Log in</button>
    </form>
@endsection