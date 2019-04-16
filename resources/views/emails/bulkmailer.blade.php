@extends('shop.layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Bulk Mailer</h2>
            <form action="{{ url('bulkmailer') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="email" name="target_email" class="form-control" placeholder="Targeted Email">
                </div>
                <div class="form-group">
                        <textarea class="form-control" name="message" placeholder="Message"></textarea>
                    </div>
                <div class="form-group">
                    <input type="number" name="count" class="form-control" placeholder="Enter Count">
                </div>
{{--                 
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <br> --}}

                <div>
                    <input type="submit" value="Submit" name="submit" class="btn"> 
                </div>
            <form>
            
        </div>
        
    </div>
</div>
@endsection
