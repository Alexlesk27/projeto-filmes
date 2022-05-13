<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ['Product 01','Product02','Product03'];

         return $products;

    }

    public function show($id)
    {

       return "Exibindo o produto de id: ($id)";

    }


    public function create()
    {

        return "Exibindo o Form de casdastro de um novo produto";

    }


}

