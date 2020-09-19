<div class="container">
    <div class="fluidy mt-3 p-5">
        <h2>Berita Internal</h2>
        <h2>Berita Internal</h2>
    </div>

    <div class="page mt-5">
        <div class="page-konten">
            <a href="<?= base_url(); ?>berita"><button type="button" class="btn btn-dark">kembali</button></a>
            <article class="berita">

                <img class="gambar-berita" src="<?= $berita['gambar']; ?>">
                <h6 class="card-subtitle mb-2 text-muted"><?= $berita['publishedAt']; ?> | Admin</h6>

                <h4> <?= $berita['judul']; ?></h4>

                <p> <?= $berita['deskripsi']; ?>. </p>
                <p> <?= $berita['konten']; ?>. </p>




            </article>

        </div>
    </div>
</div>