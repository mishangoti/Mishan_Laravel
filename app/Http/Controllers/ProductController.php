<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Productimage;
// use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;   
use QrCode;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product()
    { 
        if (Auth::check()) {
            $product_list = Product::Where('user_id', Auth::user()->id)->with('category')->get();
            return view('product.product', compact('product_list'));    
        }else{
            return redirect()->route('home');
        }
    }

    public function add_product()
    {
        if (Auth::check()) {
            $category_list = Category::all()->toArray();
            return view('product.product_add', compact('category_list'));
        }else{
            return redirect()->route('home');
        }
        
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        if (Auth::check()) {
            // dd($data->file());
            // dd($_FILES);
            $cover = $data->file('file');
            // dd($cover);   
            $extension = $cover->getClientOriginalExtension();
            $ext = ['png','jpeg','jpg'];
            $file_path = time().$cover->getFilename().'.'.$extension; 
            // dd($file_path);
            // echo $file_path;
            if(in_array($extension,$ext) === true){
                Storage::disk('public')->put($file_path,  File::get($cover));
            }

            $this->validate($data, [
                'pro_name' => ['required'],
                'pro_description' => ['required'],
                'pro_category' => ['required'],
                'pro_price' => ['required'],
                'pro_stock' => ['required'],
                'file' => ['required'],
            ]);  
            $product = new Product();
            $product->name=$data['pro_name'];
            $product->description=$data['pro_description'];
            $product->category_id=$data['pro_category'];
            $product->user_id=$data['userid'];
            $product->price=$data['pro_price'];
            $product->stock=$data['pro_stock'];
            $product->feth_image=$file_path;
            
            $product->save();


            return redirect()->route('product')->with('message','Product Added Successfully');
        }else{
            return redirect()->route('home');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            $product_detail = Product::find($id);
            return view('product.product_view', compact('product_detail'));
        }else{
            return redirect()->route('home');
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $product = Product::find($id);
            return view('product.product_edit', compact('product'));
        }else{
            return redirect()->route('home');
        }
      
    }   

    public function addimages($id){
        // dd($id);
        $product1 = Product::find($id);
        // dd($product1);
        return view('product.addimages', compact('product1'));
    }

    public function storeimages(Request $request){
        // dd($request['pro_id']);
        // dd($request['file']);
        if($request->file('file')){
            foreach ($request['file'] as $value) {
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
                    Storage::disk('public')->put($file_path,  File::get($value));
                }
                // dd($file_path);
                $productimage = new Productimage;
                $productimage->product_id = $request['pro_id'];
                $productimage->path = $file_path;
                $productimage->save(); 
                // echo '<pre>';        
                // dd($productimage);     
            }
            return redirect()->route('product')->with('message', 'Images Are Successfully Added');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            // dd($request);
            if($request->file('file')){
                $cover = $request->file('file');  
                // dd($cover); 

                $extension = $cover->getClientOriginalExtension();
                
                $ext = ['png','jpeg','jpg'];
                $file_path = time().$cover->getFilename().'.'.$extension;
                // dd($file_path);          
                if(in_array($extension,$ext) === true){
                    Storage::disk('public')->put($file_path,  File::get($cover));
                }
            }
            $product = Product::find($id);
            $product->name=$request->post('pro_name');
            $product->description=$request->post('pro_description');
            $product->category_id=$request->post('pro_category');
            $product->price=$request->post('pro_price');
            $product->stock=$request->post('pro_stock');
            $product->feth_image=$file_path;
            $product->save();
            return redirect()->route('product')->with('Success','Product Updated');
        }else{
            return redirect()->route('home');
        }
        
    }
    public function qr_download(Request $data)
    {
        // print_r($data['id']);
        // dd($data);
        $url = 'storage'.'/product_qrcode'.'/'.date('Y-m-d');
        //  dd($url);
         if(!File::exists($url)){
            File::makeDirectory($url, 0777, true);
            // echo 'created';
        }else{
            // echo 'file is exist';
        }

        // dd($data);
        $pngImage = QrCode::format('png')
                    ->size(500)->errorCorrection('H')
                    ->generate('product id : '.$data['id'].', product name : '.$data['name'].', product price : '.$data['price']);
        // dd();

        return response($pngImage)->header('Content-type','image/png');
        // $path = asset('storage').'/product_qrcode'.'/'.date('Y-m-d').'/pro_id-'.$data['id'].'.svg';
        // dd($path);
        // $path = asset('storage').'/product_qrcode'.'/'.date('Y-m-d').'/2.jpeg';
        // $file = Storage::disk('public')->get('');
        // dd($file);
        // $url = "https://cdn.psychologytoday.com/sites/default/files/blogs/38/2008/12/2598-75772.jpg";
        // return Response::download($url, 'qr.svg', ['content-type' => 'text/xml']);   
        // return response()->attachment($url);
        
        // dd($path);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $product = Product::find($id);
            $product->delete();
            return redirect()->route('product')->with('Success','Product Deleted');         
        }else{
            return redirect()->route('home');
        }
      
    }
}