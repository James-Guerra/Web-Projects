<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TodoItem;
use Reflector;

class TodoItemController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);

        return view('todoitems.index', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('todoItems.create');
    }

    public function store()
    {
        $item = request('item');
        auth()->user()->todoItem()->create([
            'todoItem' => $item,
        ]);
        return redirect('/home');
    } 

    public function destroy(TodoItem $item)
    {   
        $item->destroy($item->id);
        return redirect('/home');
    }
}
