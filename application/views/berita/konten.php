<div class="container">
    <div class="row">
        <div class="page-konten">
            <a href="<?= base_url(); ?>berita"> <i class="fa fa-arrow-left back mb-3" aria-hidden="true"></i></a>
        </div>
        <div class="border col-lg-8 offset-md-2 text-center mt-5">
            <article class="konten-berita">

                <h6 class="card-subtitle mb-2 text-muted"><?= $berita['publishedAt']; ?> | Admin</h6>
                <h3 class="mb-4"> <?= $berita['judul']; ?></h3>
                <img class="mb-5" style="max-width: 400px;" src="<?= base_url('assets/img/berita/') . $berita['gambar']; ?>" alt="image">
                <p class="text-justify text-konten-berita"> <?= $berita['konten']; ?>. </p>
            </article>


        </div>
    </div>

</div>