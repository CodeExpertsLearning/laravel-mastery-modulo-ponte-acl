<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        return 'Posts';
    }

    public function edit($id)
    {
        $post = \App\Models\Post::find($id);

        //Este método verifica o controle/ability/permissao e dispara uma exception
        //causando um 403 Unauthorized
        //$this->authorize('user-can-edit', $post);
        //$this->authorize('update', $post);
        //true se o usuário não é permitido...
        //Gate::denies('user-can-edit', $post);

        //true se o usuário é permitido
        //Gate::allows('user-can-edit', $post)
//dd(Gate::allows('update', $post));
//        if(!Gate::allows('update', $post)) {
//            abort(403, 'This action is unauthorized!');
//            //return redirect()->route('home');
//        }

        //$user = auth()->user();
        //dd($user->can('update', $post));
        //dd($user->cannot('update', $post));

        //dd(Gate::any(['update', 'delete'], $post));
        //dd(Gate::check(['update', 'delete'], $post));

        if(!Gate::allows('update', $post)) {
            abort(403, 'This action is unauthorized!');
            //return redirect()->route('home');
        }

        return 'Post Edit...';
    }
}
