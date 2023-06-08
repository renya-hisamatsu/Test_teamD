<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
</head>
<body>
    <header>
        <p class="header-title">Todoアプリ-編集画面</p>
    </header>
    <main>
        <form action="/tasks/{{$task->id}}" method="post">
            @csrf
            @method('PUT')

            <label>
                <input type="text" name="task_name" value="{{$task->name}}">
                @error('task_name')
                    <p>
                        {{$message}}
                    </p>
                @enderror
            </label>
            <div class="menu-btn">
                <a href="/tasks">戻る</a>
                <button type="submit">編集する</button>
            </div>
        </form>
    </main>
    <footer>
        <p>Todoアプリ</p>
    </footer>
</body>
</html>