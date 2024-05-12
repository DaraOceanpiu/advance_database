@extends('master.master')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallets</title>
    <script>
        function validateAmount() {
            const amountInput = document.getElementById('amount');
            const walletBalance = parseInt(document.getElementById('walletBalance').textContent);
            if (parseInt(amountInput.value) > walletBalance) {
                alert('Insufficient balance!');
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-dark">Wallets</h2>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body bg-gray-100">
                        <div class="row mb-2">
                            <div class="col-md-9">
                                <form action="{{ route('wallet.create') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-dark">Create a Wallet</button>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <h5 class="text-md">Wallet Details</h5>
                            </div>
                        </div>
                        <hr>
                        @if(isset($wallet))
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Wallet ID</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $wallet['id'] ?? 'N/A' }}</td>
                                        <td>{{ $wallet['hash'] ?? 'N/A' }}</td>
                                        <td id="walletBalance">{{ $wallet['balance'] ?? 200 }}</td>
                                        <td>
                                            <form action="{{ route('pending.create') }}" method="POST" onsubmit="return validateAmount();">
                                                @csrf
                                                <input type="hidden" name="walletId" value="{{ $wallet['id'] ?? '' }}">
                                                <input type="hidden" name="fromAddress" value="{{ $wallet['hash'] ?? '' }}">
                                                <input type="number" name="amount" placeholder="Amount" required>
                                                <button type="submit" class="btn btn-dark">Create Transaction</button>
                                            </form>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <h2 class="text-dark">Completed Blocks</h2>
                @if(session('completedBlocks'))
                <div class="card mb-4">
                    <div class="card-body bg-gray-100">
                        <ul>
                            @foreach(session('completedBlocks') as $block)
                            <li>{{ $block['timestamp'] }} from {{ $block['from'] }} to {{ $block['to'] }} - Amount: {{ $block['amount'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @stop
</body>

</html>