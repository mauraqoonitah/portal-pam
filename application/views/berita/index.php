<div class="container">
    <div class="fluidy mt-3 p-5">
        <h2>Berita Internal</h2>
        <h2>Berita Internal</h2>
    </div>
    <div class="mb-5" style="margin-top: 60px">
        <div class="page-berita">
            <div class="sibling-fade">
                <?php foreach ($berita as $berita) : ?>
                    <article class="berita">
                        <div class="ilang">
                            <i class="far fa-newspaper" style="font-size: 30px; margin-bottom: 15px;"></i>
                            <h6 class="card-subtitle mb-2 text-muted ilang"><?= $berita['publishedAt']; ?> | Admin</h6>
                            <h5> <?= $berita['judul']; ?></h5>
                        </div>
                        <div class="hide">
                            <h5> <?= $berita['judul']; ?></h5>
                            <p> <?= $berita['deskripsi']; ?>.... </p>
                            <a href="<?= base_url(); ?>berita/konten/<?= $berita['id']; ?>"><button type="button" class="btn btn-outline-dark">read more</button></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>