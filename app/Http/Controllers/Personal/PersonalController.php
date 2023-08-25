<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        return view('personal.index');
    }

    public function liked(): View
    {
        return view('personal.liked');
    }

    public function comment(): View
    {
        return view('personal.comment');
    }
}
