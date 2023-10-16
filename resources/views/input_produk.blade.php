<!DOCTYPE html>
<html>
<head>
    <title>Form Upload Gambar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Form Upload Gambar</h2>
    <form action="{{ route('insertProduk') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="nama" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Produk</label>
            <textarea class="form-control" id="description" name="deskripsi" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="text" class="form-control" id="price" name="harga" required>
        </div>

        <div class="form-group">
            <label for="stock">Stok</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>


        <div class="form-group">
            <label for="stock">kategori</label>
            <input type="number" class="form-control" id="stock" name="kategoriId" required>
        </div>

        <div class="form-group">
            <label for="stock">gender</label>
            <input type="number" class="form-control" id="stock" name="genderId" required>
        </div>

        <div class="form-group">
            <label for="file">Pilih Gambar</label>
            <input type="file" class="form-control-file" id="file" name="imgPath">
        </div>
        <button type="submit" class="btn btn-primary">Unggah</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

