<?php

namespace App\Http\Controllers\Restrito;

use App\DataTables\LivroDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\LivroRequest;
use App\Models\Livro;
use App\Services\LivroService;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index(LivroDataTable $livroDataTable)
    {
        return $livroDataTable->render('restrito.livro.index');
    }

    public function create()
    {
        return view('restrito.livro.form');
    }
}
