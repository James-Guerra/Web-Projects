<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Data;

class ItemsController extends Controller
{
    public function index(User $user)
    {
        $user = Auth::user();
        // dd($user);
        return view('items.index', compact('user'));
    }

    public function store()
    {
        $item = request()->all();
        auth()->user()->todoItem()->create($item);
        return redirect('/items');
    }

    public function destroy(TodoItem $todoItem)
    {
        $todoItem->delete($todoItem);
        return redirect("/items");
    }
}
