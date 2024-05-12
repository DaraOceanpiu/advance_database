@extends('master.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wallets</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-dark">Wallets</h2>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body bg-gray-100" >
                        <div class="row mb-2">
                            <div class="col-md-9">
                                <button type="button" class="btn btn-dark">Create a Wallet</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <h5 class="text-md">Blocks</h5>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="table-responsive ">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="col-1" scope="col">No.</th>
                                            <th class="col-9" scope="col">Address</th>
                                            <th class="col-2" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, ab?</td>
                                            <td><button type="button" class="btn btn-dark">Copy Address</button></td>
                                        </tr>
                                    </tbody>
                                </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
</body>
</html>


