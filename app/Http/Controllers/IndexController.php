<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class IndexController extends Controller
{
    public function index()
    {
        $livros = Livro::paginate(4);
        
        return view('index', compact('livros'));
    }

    public function livro(Livro $livro)
    {
        return view('detalhes', compact('livro'));
    }
}
