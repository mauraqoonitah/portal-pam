<div class="container">
    <div class="fluidy mt-3 p-5">
        <h2>Berita Internal</h2>
        <h2>Berita Internal</h2>
    </div>

    <div class="page mt-5">
        <div class="page-berita">
            <?php foreach ($berita as $berita) : ?>

                <article class="berita">
                    <div class="ilang">
                        <img class="gambar-berita" src="<?= $berita['gambar']; ?>">
                        <h6 class="card-subtitle mb-2 text-muted ilang"><?= $berita['publishedAt']; ?> | Admin</h6>

                        <h4> <?= $berita['judul']; ?></h4>
                    </div>
                    <div class="hide">
                        <p> <?= $berita['deskripsi']; ?>. </p>
                        <a href="<?= base_url(); ?>berita/konten/<?= $berita['id']; ?>"><button type="button" class="btn btn-dark">read more</button></a>

                    </div>
                </article>
            <?php endforeach; ?>

        </div>
    </div>
</div>