<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
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

    // categories
    function manageCategories(){
        $categories = Category::all();
        // print_r($categories);
        return view('manageCategory')->with('categories', $categories);

      
    }

    function editCategory($id){
        $category = Category::find($id);
        return view('edit-category')->with(['category'=>$category, 'id'=>$id]);
    }

    function editCategoryPost($id, Request $request){
        // checking id
        $category = Category::find($id);
        if($category == ''){
            return redirect()->to('home');
        }

        // validation
        $request->validate([
            'cat_name'=>'required',
            'cat_details'=>'required'
        ]);

        $category_update = Category::find($id)->update([
            'category_name'=>$request->cat_name,
            'category_details'=>$request->cat_details
        ]);

        if($category_update){
            return redirect(route('managecat'))->with('success', 'category edited!!');

        }
        else{
                        return redirect(route('managecat'))->with('error', 'There was an error');

        }

    }

    // delete category
    function deleteCategory($id){
        $category = Category::find($id);

        $delete_category = Category::find($id)->delete();
        if($delete_category){
            return redirect(route('managecat'))->with('success', 'category deleted!!');

        }
        else{
            return redirect(route('managecat'))->with('error', 'There was an error');

        }    }


        //  product functionalities
        function addProduct(){
            $categories = Category::all();
            // print_r($categories);
            return view('product.addProduct')->with('categories', $categories);
            // return view('product.addProduct');
        }

        function addProductPost(Request $request){
            $request->validate([
                'product_name'=>'required',
                'product_category'=>'required',
                'product_cost'=>'required',
                'product_details'=>'required',
                'image'=>'required'

                
            ]);
            $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath(),['folder'=>'r-commerce'])->getSecurePath();

            
            $data['category_name'] = $request->cat_name;
            $data['category_details'] = $request->cat_details;
    
            $category = Category::create($data);
    
            if(!$category){
                return redirect(route('category'))->with('error', 'registration failed');
            }
            return redirect(route('category'))->with('success', 'category added!!');
        }
}
