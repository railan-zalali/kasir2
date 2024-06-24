@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Transactions</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('transactions.create') }}"> Create New Transaction</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Total</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->total }}</td>
                <td>
                    @foreach ($transaction->details as $detail)
                        {{ $detail->product->name }} - {{ $detail->quantity }} x {{ $detail->price }}
                    @endforeach

                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('transactions.show', $transaction->id) }}">Show</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
