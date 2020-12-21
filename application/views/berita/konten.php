<div class="container">
    <div class="row">
        <div class="page-konten">
            <a href="<?= base_url(); ?>berita"> <i class="fa fa-arrow-left back mb-3" aria-hidden="true"></i></a>
        </div>
        <div class="border col-lg-8 offset-md-2 text-center mt-5">
            <article class="konten-berita">

                <h6 class="card-subtitle mb-2 text-muted"><?= $berita['publishedAt']; ?></h6>
                <h3 class="mb-4"> <?= $berita['judul']; ?></h3>
                <div class="image-fit mx-auto mt-5 mb-5">
                    <img class="gambar-konten-berita mx-auto object-fit_contain" src="<?= base_url('assets/img/berita/') . $berita['gambar']; ?>" alt="image">
                </div>
                <p class="text-justify"> <?= $berita['konten']; ?>. </p>
                <p class="text-muted mt-5 pt-5" style="font-size: 14px;">&#169; <i> Admin Portal PAM Jaya</i></p>

            </article>


        </div>
    </div>

</div>