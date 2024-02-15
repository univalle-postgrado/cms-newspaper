<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    /**
     * Guarda los datos de una Category
     * @return Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rules = [
            'title' => 'required|max:60|unique:categories',
            'position' => 'required|min:1|integer',
            'published' => 'required|boolean'
        ];

        $this->validate($request, $rules);
        $data = $request->all();
        $data['alias'] = Str::slug($data['title']);
        $data['created_by'] = 'system';

        $category = Category::create($data);

        return response($category, 201);
    }

}