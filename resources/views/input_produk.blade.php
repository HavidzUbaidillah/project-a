<!DOCTYPE html>
<html>
<head>
    <title>Form Upload Gambar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Form Upload Gambar</h2>
    <form action="{{route('product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" name="name" placeholder="Nama Produk">
        </div>
        <div class="form-group">
            <input type="text" name="description" placeholder="Deskripsi">
        </div>
        <div class="form-group">
            <input type="text" name="size" placeholder="Ukuran">
        </div>
        <div class="form-group">
            <input type="text" name="material" placeholder="Material">
        </div>
        <div class="form-group">
            <input type="text" name="color" placeholder="Warna">
        </div>
        <div class="form-group">
            <input type="number" name="price" placeholder="Harga">
        </div>
        <div class="form-group">
            <input type="file" name="1" placeholder="Gambar 1">
        </div>
        <div class="form-group">
            <input type="file" name="2" placeholder="Gambar 2">
        </div>
        <div class="form-group">
            <input type="file" name="3" placeholder="Gambar 3">
        </div>
        <div class="form-group">
            <input type="file" name="4" placeholder="Gambar 4">
        </div>
        <div class="form-group">
            <input type="number" name="stock" placeholder="Stok">
        </div>
        <div class="form-group">
            <input type="number" name="seriesId" placeholder="ID Series">
        </div>
        <div class="form-group">
            <input type="number" name="genderId" placeholder="ID Gender">
        </div>
        <div class="form-group">
            <input type="number" name="subCategoryId" placeholder="ID Sub Category">
        </div>
        <button type="submit">INPUT</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

