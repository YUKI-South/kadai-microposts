@extends('layouts.app')

@section('content')
    @if(Auth::check())
        {{ Auth::user()->name }}
    @else
        <div class='center jumbotron'>
            <div class='text-center'>
                <h1>Welcome to the Microposts</h1>
                {{--ユーザー登録ページへのリンク--}}
                {!! link_to_route('signup.get', 'Sing up now!', [], ['class' => 'btn btn-primary'])!!}
            </div>
        </div>
    @endif
@endsection