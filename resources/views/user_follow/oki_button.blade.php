@if (Auth::user()->id != $user->id) 
    @if (Auth::user()->is_oki_following($micropost->id))
        {!! Form::open(['route' => ['user.oki_unfollow', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('お気に入り削除', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.oki_follow', $micropost->id]]) !!}
            {!! Form::submit('お気に入り登録', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif