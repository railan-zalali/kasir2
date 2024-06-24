@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="productForm" action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Barcode:</strong>
                    <input type="text" id="barcode" name="barcode" class="form-control" placeholder="Barcode"
                        autofocus>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" class="form-control" placeholder="Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantity:</strong>
                    <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let barcodeInput = document.getElementById('barcode');

            barcodeInput.addEventListener('keydown', function(event) {
                // Mencegah form submit jika Enter ditekan di input barcode
                if (event.key === 'Enter') {
                    event.preventDefault();
                    // Fokus ke field berikutnya jika perlu, misalnya:
                    // document.getElementById('name').focus();
                }
            });

            barcodeInput.addEventListener('keypress', function(event) {
                // Menangkap input dari barcode scanner dan mencegah page refresh
                if (event.keyCode === 13) {
                    event.preventDefault();
                }
            });

            document.getElementById('productForm').addEventListener('submit', function(event) {
                // Logika tambahan untuk form submit jika diperlukan
            });
        });
    </script>

@endsection
