<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        // Normally, you'd fetch this data from a database.
        $products = [
            [
                'name' => 'Smartphone',
                'image' => 'images/smartphone.jpg',
                'cost' => '$699',
                'description' => 'A high-end smartphone with great features.'
            ],
            [
                'name' => 'Smartphone',
                'image' => 'images/smartphone.jpg',
                'cost' => '$699',
                'description' => 'A high-end smartphone with great features.'
            ],
            [
                'name' => 'Smartphone',
                'image' => 'images/smartphone.jpg',
                'cost' => '$699',
                'description' => 'A high-end smartphone with great features.'
            ],
            [
                'name' => 'Smartphone',
                'image' => 'images/smartphone.jpg',
                'cost' => '$699',
                'description' => 'A high-end smartphone with great features.'
            ],
            [
                'name' => 'Smartphone',
                'image' => 'images/smartphone.jpg',
                'cost' => '$699',
                'description' => 'A high-end smartphone with great features.'
            ],
            // Add more products as needed
        ];

        return view('index', ['products' => $products]);
    }
}
