<h1>View All Slideshow</h1>
<a href="/slideshow/upload" class="btn btn-primary mb-3">Upload Slideshow</a>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Foto</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($slideshows as $slideshow): ?>
        <tr>
            <td><?= $slideshow->getId() ?></td>
            <td><?= $slideshow->getJudul() ?></td>
            <td><img src="/images/upload/slideshow/<?= $slideshow->getFoto() ?>" width="100" height="100"></td>
            <td>
                <a href="/admin/slideshow/edit/<?= $slideshow->getId() ?>" class="btn btn-warning">Edit</a>
                <a href="/admin/slideshow/delete/<?= $slideshow->getId() ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
