<!DOCTYPE html>
<html lang="en">
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
            <label for="name">Nama</label>
            <label>
                <input type="text" name="name" placeholder="Nama Produk">
            </label>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <label>
                <input type="text" name="description" placeholder="Deskripsi">
            </label>
        </div>
        <div class="form-group">
            <label for="size">Size</label>
            <label>
                <input type="text" name="size" placeholder="Ukuran">
            </label>
        </div>
        <div class="form-group">
            <label for="material">Material</label>
            <label>
                <input type="text" name="material" placeholder="Material">
            </label>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <label>
                <input type="text" name="color" placeholder="Warna">
            </label>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <label>
                <input type="number" name="price" placeholder="Harga">
            </label>
        </div>
        <div class="form-group">
            <label for="imgPath.1">Img 1</label>
            <input type="file" name="img1" placeholder="Gambar 1">
        </div>
        <div class="form-group">
            <label for="imgPath.2">Img 2</label>
            <input type="file" name="img2" placeholder="Gambar 2">
        </div>
        <div class="form-group">
            <label for="imgPath.3">Img 3</label>
            <input type="file" name="img3" placeholder="Gambar 3">
        </div>
        <div class="form-group">
            <label for="imgPath.4">Img 4</label>
            <input type="file" name="img4" placeholder="Gambar 4">
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <label>
                <input type="number" name="stock" placeholder="Stok">
            </label>
        </div>
        <div class="form-group">
            <label for="seriesId">seriesId</label>
            <label>
                <input type="number" name="seriesId" placeholder="ID Series">
            </label>
        </div>
        <div class="form-group">
            <label for="genderId">genderId</label>
            <label>
                <input type="number" name="genderId" placeholder="ID Gender">
            </label>
        </div>
        <div class="form-group">
            <label for="subCategoryId">subCategoryId</label>
            <label>
                <input type="number" name="subCategoryId" placeholder="ID Sub Category">
            </label>
        </div>
        <div class="form-group">
            <label for="subCategoryId">CategoryId</label>
            <label>
                <input type="number" name="categoryId" placeholder="ID Sub Category">
            </label>
        </div>
        <button type="submit">INPUT</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

