<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;

class LandingPageController extends Controller
{
     public function index()
    {
        $bukus = Buku::paginate(90);;
        return view('landingpage.home', compact('bukus'));
    }
}
