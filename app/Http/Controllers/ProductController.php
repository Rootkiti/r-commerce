<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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

    // product category view
    function productCategory(){
        return view('category');
    }

    function productCategoryPost(Request $request){
        $request->validate([
            'cat_name'=>'required',
            'cat_details'=>'required'
        ]);
        
        $data['category_name'] = $request->cat_name;
        $data['category_details'] = $request->cat_details;

        $category = Category::create($data);

        if(!$category){
            return redirect(route('category'))->with('error', 'registration failed');
        }
        return redirect(route('category'))->with('success', 'category added!!');
    }
}
