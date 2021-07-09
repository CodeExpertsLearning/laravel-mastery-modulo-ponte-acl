<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $this->authorize('user-can-access');

        return 'Posts';
    }

    public function edit($id)
    {
        $post = \App\Models\Post::find($id);

        //Este método verifica o controle/ability/permissao e dispara uma exception
        //causando um 403 Unauthorized
        //$this->authorize('user-can-edit', $post);

        //true se o usuário não é permitido...
        //Gate::denies('user-can-edit', $post);

        //true se o usuário é permitido
        //Gate::allows('user-can-edit', $post)

        if(!Gate::allows('user-can-edit', $post)) {
            //abort(403, 'This action is unauthorized!');
            return redirect()->route('home');
        }

        return 'Post Edit...';
    }
}
