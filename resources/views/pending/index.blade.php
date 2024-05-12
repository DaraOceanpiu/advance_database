@extends('master.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pending Transactions</title>
    <style>
        .table-responsive {
            background-color: #f8f9fa; /* Light grey background for the table */
            border-radius: 0.25rem;
            overflow-x: auto;
        }
        table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }
        th, td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .container-fluid {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-dark">Pending Transactions</h2>
        <div class="card mb-4">
            <div class="card-body bg-gray-100">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>Timestamp</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Amount</th>
                                <th>Signature</th>
                                <th>Mining</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingTransactions as $transaction)
                                <tr>
                                    <td>{{ $transaction['timestamp'] }}</td>
                                    <td>{{ $transaction['from'] }}</td>
                                    <td>{{ $transaction['to'] }}</td>
                                    <td>{{ $transaction['amount'] }}</td>
                                    <td>{{ $transaction['signature'] }}</td>
                                    <td>
                                        <form action="{{ route('pending.mine') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="transactionId" value="{{ $transaction['id'] }}">
                                            <button type="submit" class="btn btn-primary">Mine Transaction</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
</html>
