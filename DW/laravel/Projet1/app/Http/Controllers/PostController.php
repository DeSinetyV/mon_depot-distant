<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){


        $title= 'Mon super titre';
        $title2= 'Mon super 2e titre';

        $posts =[
            'Mon super 3e titre',
            'Mon super 4e titre'
        ];
        return view('articles', compact('posts') );

        return view('articles', compact('title','title2') );    //alternative 1

        return view('articles',[                                //alternative 2
                'title'=> $title,
                'title2'=> $title2
        ]);

        return view('articles')->with('title', $title);         //alternative 3

    }
    public function show($id){                                  // la variable id provient du fichier de route
            $posts =[
                1=> 'Mon super 5e titre',
                2=> 'Mon super 6e titre'
            ];
            $post= $posts[$id] ?? ' pas de titre';              // ?? = si pas de valeur (posts[3] par exemple)
            return view('article', [
                'post' => $post
            ]);
    }

    public function contact(){
        return view('contact');
    }

}
