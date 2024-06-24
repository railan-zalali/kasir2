<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Aplikasi Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
        }

        .sidebar {
            height: 100%;
            background-color: #343a40;
            color: #fff;
            position: fixed;
            width: 250px;
            top: 0;
            bottom: 0;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .sidebar .nav-link {
            color: #adb5bd;
        }

        .sidebar .nav-link:hover {
            color: #fff;
        }

        .navbar-custom {
            background-color: #343a40;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link,
        .navbar-custom .navbar-toggler-icon {
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Kasir</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h2 class="text-center">Menu</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Penjualan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pengaturan</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>

                <!-- Sales Table -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>Penjualan Terbaru</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Produk A</td>
                                    <td>3</td>
                                    <td>Rp 150,000</td>
                                    <td>2023-01-01</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Produk B</td>
                                    <td>1</td>
                                    <td>Rp 50,000</td>
                                    <td>2023-01-02</td>
                                </tr>
                                <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Product Form -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>Tambah Produk</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="productName" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="productName"
                                    placeholder="Masukkan nama produk">
                            </div>
                            <div class="mb-3">
                                <label for="productPrice" class="form-label">Harga Produk</label>
                                <input type="number" class="form-control" id="productPrice"
                                    placeholder="Masukkan harga produk">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Produk</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
