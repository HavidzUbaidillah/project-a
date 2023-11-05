<!DOCTYPE html>
<html>
<head>
    <title>Sub Categories</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Insert SubCategories</h2>
    <form action="{{ route('subcat') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="stock">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="stock">CategoryId</label>
            <input type="text" class="form-control" name="categoryId">
        </div>
        <div class="form-group">
            <label for="file">GenderId</label>
            <input type="text" class="form-control" name="genderId">
        </div>
        <button type="submit" class="btn btn-primary">Unggah</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

