<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
</head>
<body>
    <p>{{ $post->id }} {{ $post->author }} {{ $post->comment }} {{ $category }}</p>
    <a href="{{ route('posts.edit', $post->id) }}">Изменить</a>
    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Удалить</button>
    </form>
    <a href="{{ route('posts.index') }}">На главную</a>
</body>
</html>
