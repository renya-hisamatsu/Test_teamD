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
        <p>Todoアプリ</p>
    </header>
    <main>
        <div class="form-container">
            <p class="todo-title">今日は何する</p>
            <form action="/tasks" method="post">
                @csrf
                <label>
                    <input type="text" name="task_name" placeholder="洗濯物をする...">
                    @error('task_name')
                        <p>
                            {{$message}}
                        </p>
                    @enderror
                </label>
                <button type="submit">追加する</button>
            </form>
        </div>
        <div class="task-container">
            @if ($tasks->isNotEmpty())
                <table>
                    <thead>
                        <tr>
                            <th>タスク</th>
                            <th>アクション</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $item)
                            <tr>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    <div class="action-container">
                                        <form action="/tasks/{{$item->id}}"
                                            method="post"
                                            role="menuitem" tabindex="-1">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="{{$item->status}}">
                                            <button type="submit">完了</button>
                                        </form>
                                    </div>
                                    <div class="action-container">
                                        <a href="/tasks/{{$item->id}}/edit/">編集</a>
                                    </div>
                                    <div class="action-container">
                                        <form onsubmit="return deleteTask();"
                                            action="/tasks/{{$item->id}}"
                                            method="post"
                                            role="menuitem" tabindex="-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">削除</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </main>
    <footer>
        <p>Todoアプリ</p>
    </footer>
    <script>
        function deleteTask() {
            if (confirm('本当に削除しますか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>
</html>