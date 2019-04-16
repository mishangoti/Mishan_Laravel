<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Category;
use App\Productimage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResource;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
// use Nexmo\Network\Number\Request;
// use GuzzleHttp\Psr7\Request;


class ApiproductController extends Controller
{
    public function index()
    {
        $product = Product::select()->with('category')->with('user')->get();
        return ProductResource::collection($product); 
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->with('category')->with('user')->get();
        if($product == null){
            return response()->json([
                'message' => 'Product Not Exist',
                'code' => '200'
            ]); 
        }else{
            return new ProductResource($product);
        }   
    }

    public function addimages(Request $request)
    {
        // dd
        $url = 'storage'.'/product_images'.'/'.date('Y-m-d');
        // Storage::$url;  
        // dd($url);
        // dd(Storage::exists($url));
        if(!File::exists($url)){
            File::makeDirectory($url, 0777, true);
            echo 'created';
        }else{
            echo 'file is exist';
        }
        // dd();   
        // dd($id);
        // dd($request);
        // dd($request['pro_id']);
        if($request->file('images')){
            foreach ($request['images'] as $value) {
                // dd($request['pro_id']); 
                // dd($value->getFilename());
                $file_name = $value->getFilename();
                $extension = $value->getClientOriginalExtension();
                // dd($extension);
                $ext = ['png','jpeg','jpg'];
                $file_path = time().$value->getFilename().'.'.$extension;
                // dd($file_path);
                // echo $file_path; exit();          
                if(in_array($extension,$ext) === true){
                    Storage::disk('public')->put('product_images/'.date('Y-m-d').'/'.$file_path,  File::get($value));
                }
                // dd($file_path);
                $path = asset('storage').'/'.'product_images/'.date('Y-m-d').'/'.$file_path;
                // echo $path; exit();
                $productimage = new Productimage;
                $productimage->product_id = $request['pro_id'];
                $productimage->path = $path;
                $productimage->save();          
            }
            $images = Productimage::where('product_id', $request['pro_id'])->get();
            return ProductResource::collection($images); 
            // return response()->json([
            //     'data' => $images,
            //     'message' => 'Product Images Added Successfully',
            //     'code' => '200'
            // ]);
        }else{
            return response()->json([
                'message' => 'Something Wrong',
                'code' => '401'
            ]);
        }
    }

    public function storecategoryusingcsv(Request $request)
    {
        // dd($request->file('images'));
        // dd($request['file']);
        $cover = $request->file('file');  
        // dd($cover);
        // get data of file
        
        if($cover != NULL){
            $extension = $cover->getClientOriginalExtension();
            // dd($extension);
            $originalname = $cover->getClientOriginalName();
            // dd($originalname);

            $url = 'storage'.'/category_csv'.'/'.date('Y-m-d');
            // dd($url);
            if(!File::exists($url)){
                File::makeDirectory($url, 0777, true);
                echo 'created';
            }else{
                echo 'file is exist';
            }

            $csvarray = array();
            $ext = ['csv'];
            if(in_array($extension,$ext) === true){
                
                Storage::disk('public')->put('category_csv/'.date('Y-m-d').'/'.$originalname,  File::get($cover));
                // dd($url.'/'.$originalname);
                $file = fopen($url.'/'.$originalname, 'r');
                // dd($file);
                $csvheader = fgetcsv($file);
                // dd($csvheader);
                while (($result = fgetcsv($file)) !== false)
                {
                    $csvarray[] = $result;
                }
                fclose($file);

                // check data here  
                // dd($csvheader);
                // dd($csvarray);

                foreach ($csvarray as $value) {
                    $flag = Category::where('name', $value[0])->exists();

                    if($flag === true){
                        $exist[] = [$value[0],$value[1]];
                    }else{
                        $category = new Category();
                        $category->name=$value[0];
                        $category->description=$value[1];
                        $category->save();
                    }
                }
                return response()->json([
                    'data_exist' => $exist,
                    'message' => 'Categorys Successfully Added',
                    'code' => '200',
                ]);
            }
        }else{
            return response()->json([
                'message' => 'Something Wrong',
                'code' => '401'
            ]);
        }     
    }

    public function store(Request $data)
    {
        // dd($data);
        // dd($data->file());
        // dd($_FILES);
        // echo '<pre>';
        // print_r($data);
        // print_r($_FILES);
        // print_r($_FILES);        
        $cover = $data->file('feth_image');  
        // dd($cover);   
        $extension = $cover->getClientOriginalExtension();
        // dd($extension);
        $ext = ['png','jpeg','jpg'];
        $file_path = time().$cover->getFilename().'.'.$extension; 
        // dd($file_path);
        // echo $file_path;
        if(in_array($extension,$ext) === true){
            Storage::disk('public')->put($file_path,  File::get($cover));
        }
        // dd($data['name']);
        $product = new Product();
        $product->name=$data['name'];
        $product->category_id=$data['category_id'];
        $product->user_id=$data['user_id'];
        $product->description=$data['description'];
        $product->price=$data['price'];
        $product->stock=$data['stock'];
        $product->feth_image=$file_path;
        
        if($product->save()){
            return response()->json([
                'message' => 'Product Added Successfully    ',
                'code' => '200'
            ]);
        }   
    }
    public function destroy($id){

        $product = Product::Find($id);
        if($product == null){
            return response()->json([
                'message' => 'Product Not exist',
                'code'=> '200'
            ]);
        }else{
            if($product->delete()){
                return response()->json([
                    'message' => 'Product Deleted',
                    'code' => '200'
                ]);
            }
        }   
    }
}
