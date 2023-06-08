<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    public function index(Request $request)
    {
        //データベースからtodo_listsにある全レコードを取得してくる.
        $todo_lists = TodoList::all();

        return view('todo_list.index', ['todo_lists' => $todo_lists]);
    }
}
