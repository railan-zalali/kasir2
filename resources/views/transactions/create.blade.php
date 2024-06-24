@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Transaction</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('transactions.index') }}"> Back</a>
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

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Scan Barcode:</strong>
                    <input type="text" id="barcode_input" class="form-control" placeholder="Scan barcode here" autofocus>
                </div>
                <div class="form-group">
                    <strong>Products:</strong>
                    <table class="table table-bordered" id="products_table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <strong>Total Price:</strong> <span id="total_price">0</span>
                <br><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

    <script>
        document.getElementById('barcode_input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                var barcode = e.target.value;

                fetch(`/api/products/${barcode}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.product) {
                            addProductToTable(data.product);
                            e.target.value = '';
                        } else {
                            alert('Product not found');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });

        function addProductToTable(product) {
            var tableBody = document.querySelector('#products_table tbody');
            var existingRow = document.querySelector(`tr[data-product-id="${product.id}"]`);

            if (existingRow) {
                var quantityInput = existingRow.querySelector('.quantity');
                quantityInput.value = parseInt(quantityInput.value) + 1;
                updateProductTotal(existingRow, product.price);
            } else {
                var row = tableBody.insertRow();
                row.setAttribute('data-product-id', product.id);

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);

                cell1.innerText = product.name;
                cell2.innerText = product.price;
                cell3.innerHTML =
                    `<input type="hidden" name="products[${product.id}][id]" value="${product.id}" />
                               <input type="number" name="products[${product.id}][quantity]" class="form-control quantity" value="1" min="1" onchange="updateProductTotal(this.closest('tr'), ${product.price})" />`;
                cell4.innerText = product.price;
                cell5.innerHTML = `
                <button type="button" class="btn btn-success" onclick="incrementQuantity(this, ${product.price})">+</button>
                <button type="button" class="btn btn-danger" onclick="decrementQuantity(this, ${product.price})">-</button>
            `;

                updateTotalPrice();
            }
        }

        function incrementQuantity(button, price) {
            var row = button.closest('tr');
            var quantityInput = row.querySelector('.quantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updateProductTotal(row, price);
        }

        function decrementQuantity(button, price) {
            var row = button.closest('tr');
            var quantityInput = row.querySelector('.quantity');
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
                updateProductTotal(row, price);
            }
        }

        function updateProductTotal(row, price) {
            var quantity = row.querySelector('.quantity').value;
            var totalCell = row.cells[3];
            totalCell.innerText = (quantity * price).toFixed(2);
            updateTotalPrice();
        }

        function updateTotalPrice() {
            var total = 0;
            var rows = document.querySelectorAll('#products_table tbody tr');
            rows.forEach(row => {
                var totalCell = row.cells[3];
                total += parseFloat(totalCell.innerText);
            });
            document.getElementById('total_price').innerText = total.toFixed(2);
        }
    </script>
@endsection
