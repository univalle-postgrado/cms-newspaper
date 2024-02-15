<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Devuelve el listado de categorías
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select('id', 'title', 'alias')->orderBy('position', 'ASC')->get();
        return response($categories, 200);
    }
}
