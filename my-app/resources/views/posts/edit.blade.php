<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
<div>
    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('patch')
        <div>
            <label>
                Author
                <input type="text" name="author" placeholder="author" value="{{ $post->author }}">
            </label>
        </div>
        <div style="margin-top: 20px">
            <textarea name="comment" cols="30" rows="5">{{ $post->comment }}</textarea>
        </div>
        <div>
            <select name="category_id">
                Category
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{$post->category_id === $category->id ? 'selected' : ''}}
                    >{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <select name="tags[]" multiple style="width: 130px">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                            {{ $postTag->id === $tag->id ? 'selected' : '' }}
                        @endforeach
                        value="{{ $tag->id }}"
                    >{{ $tag->title }}</option>
                @endforeach
                <option></option>
            </select>
        </div>
        <button type="submit">Сохранить</button>
    </form>
    <a href="{{ route('posts.index') }}">На главную</a>
</div>
</body>
</html>

