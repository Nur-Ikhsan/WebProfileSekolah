<h1>Upload Slideshow</h1>

<?php if (isset($model['error'])): ?>
    <p class="text-danger">Error: <?= $model['error'] ?></p>
<?php endif; ?>

<form action="/slideshow/upload" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="judul" class="form-label">Judul:</label>
        <input type="text" name="judul" id="judul" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">Foto:</label>
        <input type="file" name="foto" id="foto" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Upload</button>
</form>