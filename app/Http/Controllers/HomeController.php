<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('main');
    }

    public function blog($id, $welcome=1)
    {
        $pages = [
            1 => [
                'title' => ' page1'
            ],
            2 => [
                'title' => ' page2'
            ]
        ];
        $welcomes = [1 => 'hello from', 2 => 'welcome to'];
    
        return view('blog-post', ['data' => $pages[$id], 'greeting' => $welcomes[$welcome] ]);
    }
    public function aaa()
    {
        return view('about');
    } 

    public function contact()
    {
        return view('contact');
    }

    public function services()
    {
        return view('services');
    }
}
