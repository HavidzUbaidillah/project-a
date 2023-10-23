<!DOCTYPE html>
<html>
<head>
    <title>Sub Categories</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Insert SubCategories</h2>
    <form action="{{ route('event') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="stock">discount</label>
            <input type="number" class="form-control" name="discount" required>
        </div>
        <div class="form-group">
            <label for="stock">event begin</label>
            <input type="date" class="form-control" name="eventBegin" required>
        </div>
        <div class="form-group">
            <label for="stock">event end</label>
            <input type="date" class="form-control" name="eventEnd" required>
        </div>
        <div class="form-group">
            <label for="stock">slug</label>
            <input type="text" class="form-control" name="slug" required>
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

