<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
    <div>
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div>
                <label>
                    Author
                    <input type="text" name="author" placeholder="author" value="{{ old('author') }}">
                </label>
                @error('author')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div style="margin-top: 20px">
                <textarea name="comment" cols="30" rows="5">{{ old('comment') }}</textarea>
                @error('comment')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" style="width: 100px; margin-bottom: 16px">
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' :  '' }}
                        >
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tags">Tags</label>
                <br />
                <select name="tags[]" multiple style="width: 120px">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
                @error('tags')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <button type="submin">Добавить</button>
        </form>
        <a href="{{ route('posts.index') }}">На главную</a>
    </div>
</body>
</html>
