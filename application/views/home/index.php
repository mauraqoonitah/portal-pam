<!-- <?php var_dump($item); ?> -->
<div class="container">

    <section class="services">
        <?php foreach ($item as $item) : ?>
            <div class="hovereffect">
                <div class="item">
                    <a href="<?= $item['link']; ?>" target="_blank">
                        <img class="item-logo" src="<?= base_url('assets/img/') . $item['icon']; ?>" alt="<?= $item['nama']; ?>">
                    </a>
                    <h3 class="item-title"><?= $item['nama']; ?></h3>
                    <div class="overlay">
                        <button type="button" class="btn" data-toggle="modal" data-target="#item-modal" ">
                            <i class=" fas fa-info-circle"></i>
                        </button>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>


    </section>
    <section class="settings">
        <h3 class="title"> Pengaturan</h3>

        <div class="services">
            <div class="item">
                <a href="http://portal.pamjaya.co.id/ganti-pass.php" target="_blank">
                    <img class="item-logo " src="<?= base_url('assets/img/change password.png'); ?>" alt="ubah password">
                </a>
                <h2 class="item-title">Ubah password</h2>
            </div>
            <div class="item">
                <a href="http://portal.pamjaya.co.id/ganti-pass.php" target="_blank">
                    <img class="item-logo " src="<?= base_url('assets/img/change password.png'); ?>" alt="ubah password">
                </a>
                <h2 class="item-title">Ubah password</h2>
            </div>
            <div class="item">
                <a href="http://portal.pamjaya.co.id/ganti-pass.php" target="_blank">
                    <img class="item-logo " src="<?= base_url('assets/img/change password.png'); ?>" alt="ubah password">
                </a>
                <h2 class="item-title">Ubah password</h2>
            </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="item-modal" tabindex="-1" role="dialog" aria-labelledby="item-modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Deskripsi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam repellendus asperiores consequatur blanditiis ex, incidunt natus necessitatibus eum pariatur accusamus. Soluta voluptate quos incidunt atque accusamus error commodi excepturi qui illum non ducimus, culpa odio, facere perferendis quibusdam quod corporis fugit veritatis iusto deserunt. Veritatis, rerum! Modi pariatur at ea!
                </div>
                <div class="modal-footer">


                </div>
            </div>
        </div>
    </div>


</div>