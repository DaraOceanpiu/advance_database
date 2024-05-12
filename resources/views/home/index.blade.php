@extends('master.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BlockChain</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-dark">Home</h2>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body bg-gray-100" >
                        <div class="row mb-2">
                            <div class="col-md-9">
                                <button type="button" class="btn btn-dark">Verify Blockchain</button>
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
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th >Timestamp</th>
                                            <th >Hash</th>
                                            <th >Nounce</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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


