<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FrontController extends Controller
{
    public function index()
    {
        $title = 'Home Page';
        return view('frontend.index', ['title' => $title]);
    }

    public function about()
    {
        $title = 'About Page';
        $content = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia reprehenderit possimus blanditiis facilis repellendus? Consequuntur sequi, hic repellendus placeat similique exercitationem nihil ad cum quibusdam, sunt explicabo provident earum fuga.';
        return view('frontend.about', ['title' => $title, 'content' => $content]);
    }
    public function komentar()
    {
        $title = 'Komentar';

        return view('frontend.komentar', ['title' => $title]);
    }
}
