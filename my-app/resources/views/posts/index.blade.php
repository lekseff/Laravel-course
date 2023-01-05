<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body style="font-size: 18px">
    <div>
        <ul style="list-style: none">
            @foreach($posts as $post)
                <li>
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->id }}.</a>
                    {{ $post->author }} - {{ $post->comment }}
                    <a href="{{ route('posts.edit', $post->id) }}">Изменить</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div>
        <a href="{{ route('posts.create') }}">Добавить пост</a>
    </div>
</body>
</html>
