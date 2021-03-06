<div class="container">
    <div class="fluidy mt-3 p-5">
        <h2>Berita Internal</h2>
        <h2>Berita Internal</h2>
    </div>
</div>


<div class="content-wrapper">
    <section class="mt-5">
        <div class="page-berita">
            <div class="sibling-fade">
                <?php foreach ($berita as $berita) : ?>
                    <article class="berita">
                        <div class="gone">
                            <img class="img-berita" src="<?= base_url('assets/img/berita/') . $berita['gambar']; ?>" alt="image">
                            <div class="content">
                                <i class="far fa-newspaper" style="font-size: 30px; margin-bottom: 15px;"></i>
                                <h6 class="card-subtitle mb-2 text-muted gone"><?= $berita['publishedAt']; ?></h6>
                                <h5 class="judul-berita"> <?= $berita['judul']; ?></h5>
                            </div>
                        </div>
                        <div class="hide">
                            <h5> <?= $berita['judul']; ?></h5>
                            <a href="<?= base_url(); ?>berita/konten/<?= $berita['id']; ?>"><button type="button" class="btn btn-outline-dark">read more</button></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>