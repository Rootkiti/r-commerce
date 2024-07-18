<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class ProductController extends Controller
{
    //
    public function index()
    {
        // Normally, you'd fetch this data from a database.
        $products = Product::all();
        $categories = Category::all();
        $cart = Cart::content();

        // dd($cart);
        return view('index', ['products' => $products,'categories'=>$categories,'cart'=>$cart]);
    }
   
    // product count
    function nCount(){
        $productcount = Product::count();
        $categorycount = Category::count();
        return view('home')->with(['n_product'=>$productcount,'n_category'=>$categorycount]);
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
                'price'=>'required',
                'description'=>'required',
                'image'=>'required'                
            ]);

            $uploadedFileUrl = cloudinary()->upload($request->file('image')->getRealPath(),['folder'=>'r-commerce'])->getSecurePath();
            if($uploadedFileUrl !=''){
                $data['product_name'] = $request->product_name;
                $data['category'] = $request->product_category;
                $data['price'] = $request->price;
                $data['description'] = $request->description;
                $data['imageUrl'] = $uploadedFileUrl;
        
                $product = Product::create($data);
        
                if(!$product){
                    return redirect(route('add product'))->with('error', 'something went wrong');
                }
                else{
                    return redirect(route('add product'))->with('success', 'Product added!!');
    
                }
            }
            else{
                return redirect(route('add product'))->with('error', 'something went wrong while uploading image');

            }
            
           
        }

        function viewProducts(){
            $products = Product::all();
            $categories = Category::all();
            return view('product.manageProducts')->with(['products'=>$products, 'categories'=>$categories]);
        }
        function editProduct($id){
            $product = Product::find($id);
            $category = Category::find($product->category);
            $categories = Category::all();
            return view('product.editProduct')->with(['product'=>$product, 'id'=>$id, 'category'=>$category, 'categories'=>$categories]);
        }
    // delete category
        function deleteProduct($id){
            $product = Product::find($id);
            $token = explode('/', $product->imageUrl);
            $token2 = explode('.', $token[sizeof($token)-1]);
            $publicId=$token2[0];
            $dest =Cloudinary::destroy('r-commerce/'.$publicId);
                        
            if($dest['result'] == 'ok'){
                $delete_product = Product::find($id)->delete();
                if($delete_product){
                    return redirect(route('manage products'))->with('success', 'product deleted!!');

                }
                else{
                    return redirect(route('manage products'))->with('error', 'Something went wrong');

                } 
            }
            else{
                return redirect(route('manage products'))->with('error', 'Something went wrong');

            }
           
        }

        function editProductPost($id, Request $request){
            // checking id
            $product = Product::find($id);
            if($product == ''){
                return redirect()->to('manage products');
            }
    
            // validation
            $request->validate([
                'product_name'=>'required',
                'product_category'=>'required',
                'price'=>'required',
                'description'=>'required',
                             
            ]);
                
            if($request->image == '')
            {
                $product_update = Product::find($id)->update([
                'product_name'=>$request->product_name,
                'category'=>$request->product_category,
                'price'=>$request->price,
                'description'=>$request->description

              ]);
        
                if($product_update){
                    return redirect(route('manage products'))->with('success', 'product Updated!!');
        
                }
                else{
                    return redirect(route('manage products'))->with('error', 'There was an error');
        
                }
            }
            else{


                $product = Product::find($id);
                $token = explode('/', $product->imageUrl);
                $token2 = explode('.', $token[sizeof($token)-1]);
                $publicId=$token2[0];
                $dest =Cloudinary::destroy('r-commerce/'.$publicId);
                            
                if($dest['result'] == 'ok'){

                    $uploadedFileUrl = cloudinary()->upload($request->file('image')->getRealPath(),['folder'=>'r-commerce'])->getSecurePath();
                    if($uploadedFileUrl !=''){
                        $product_update = Product::find($id)->update([
                            'product_name'=>$request->product_name,
                            'category'=>$request->product_category,
                            'price'=>$request->price,
                            'description'=>$request->description,
                            'imageUrl'=>$uploadedFileUrl
            
                        ]);
                
                        if($product_update){
                            return redirect(route('manage products'))->with('success', 'product Updated!!');
                
                        }
                        else{
                            return redirect(route('manage products'))->with('error', 'Something Went Wrong !');
                
                        }
                    }
                    else{
                         return redirect(route('add product'))->with('error', 'something went wrong while uploading image');

                    }

                
                }
                else{
                    return redirect(route('manage products'))->with('error', 'Something went wrong');

                }               

                }
        
            
    
        }
}
