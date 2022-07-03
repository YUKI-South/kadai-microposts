@extends('layouts.app')

@section('content')
    <div class='center jumbotron'>
        <div class='text-center'>
            <h1>Welcome to the Microposts</h1>
            {{--ユーザー登録ページへのリンク--}}
            {!! link_to_route('signup.get', 'Sing up now!', [], ['class' => 'btn btn-primary'])!!}
        </div>
    </div>
@endsection