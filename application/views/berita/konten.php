<div class="container">


    <div class="page mt-5">
        <div class="page-konten">
            <a href="<?= base_url(); ?>berita"> <i class="fa fa-arrow-left back mb-3" aria-hidden="true"></i></a>
            <article class="konten-berita">
                <h6 class="card-subtitle mb-2 text-muted"><?= $berita['publishedAt']; ?> | Admin</h6>
                <h3 class="mb-3"> <?= $berita['judul']; ?></h3>
                <p class="text-justify"> <?= $berita['konten']; ?>. </p>
            </article>

        </div>
    </div>

</div>