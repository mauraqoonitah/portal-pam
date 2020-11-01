<div class="container">
    <div class="fluidy mt-3 p-5">
        <h2>Berita Internal</h2>
        <h2>Berita Internal</h2>
    </div>
</div>

<div class="container">
<div class="row">
<?php foreach ($berita as $berita) : ?>
<div class="col-xs-6 col-sm-6 col-md-3" marginbottom="20px">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?.../assets/img/alfresco.png ?>" alt="Card image cap">
  <div class="card-body">
      <div class="ilang">
        <i class="far fa-newspaper" style="font-size: 30px; margin-bottom: 15px;"></i>
        <h6 class="card-subtitle mb-2 text-muted ilang"><?= $berita['publishedAt']; ?></h6>
        <h5> <?= $berita['judul']; ?></h5>
      </div>
      <div class="hide">
        <h6> <?= $berita['judul']; ?></h6>
        <a href="<?= base_url(); ?>berita/konten/<?= $berita['id']; ?>"><button type="button" class="btn btn-outline-dark">read more</button></a>
      </div>
  </div>
</div>
</div>
<?php endforeach; ?>
</div>
</div>



<!-- file sebelumnya -->
<!-- 
<div class="content-wrapper ml-5 mr-5">
    <section class="mt-5">
        <div class="page-berita">
            <div class="sibling-fade">
                <?php foreach ($berita as $berita) : ?>
                    <article class="berita">
                        <div class="ilang">
                            <i class="far fa-newspaper" style="font-size: 30px; margin-bottom: 15px;"></i>
                            <h6 class="card-subtitle mb-2 text-muted ilang"><?= $berita['publishedAt']; ?></h6>
                            <h5> <?= $berita['judul']; ?></h5>
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
</div> -->