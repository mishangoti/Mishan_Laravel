@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ $product_detail['name'] }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <label><b>Product Id : </b>{{ $product_detail['id'] }}</label><br>
                            <label><b>Product Name : </b>{{ $product_detail['name'] }}</label><br>
                            <label><b>Product Category Id : </b>{{ $product_detail['category_id'] }}</label><br>
                            <label><b>Description : </b>{{ $product_detail['description'] }}</label><br>
                            <label><b>Price : </b>{{ $product_detail['price'] }}</label><br>
                            <label><b>Stock : </b>{{ $product_detail['stock'] }}</label><br>
                        </div>
                        <div class="col-md-4">
                            <?php 
                                $data = array(
                                    'id' => $product_detail['id'], 
                                    'name' => $product_detail['name'],
                                    'price' => $product_detail['price'],
                                );

                                // dd($data);

                                
                            ?>
                            {!! QrCode::size(200)->generate('product id : '.$product_detail['id'].', product name : '.$product_detail['name'].', product price : '.$product_detail['price']) !!}
                            {!! QrCode::size(500)->generate('product id : '.$product_detail['id'].', product name : '.$product_detail['name'].', product price : '.$product_detail['price'], 'storage/product_qrcode/'.date('Y-m-d').'/pro_id_'.$data['id'].'_qr.svg') !!} 

                            <p style="color:red;">NOTE: You can find "SVG" in public / product_qrcode directory</p>
                            <div class="row justify-content-center">
                                <a class="btn btn-sm btn-success" href="{{ route('qr_download', $data) }}">Download</a>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
