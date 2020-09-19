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
                        <button type="button" class="btn" data-toggle="modal" data-target="#item-modal" data-whatever="<?= $item['nama']; ?>" data-whatever2="<?= $item['deskripsi']; ?>">
                            <i class=" fas fa-info-circle"></i>
                        </button>
                    </div>
                </div>

            </div>



            <!-- Modal -->

            <div class="modal fade" id="item-modal" tabindex="-1" role="dialog" aria-labelledby="item-modalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><?= $item['nama']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?= $item['deskripsi']; ?>
                        </div>
                        <div class="modal-footer">


                        </div>
                    </div>
                </div>


            </div> <?php endforeach; ?>

    </section>
    <div class="row ml-4 mb-5">
        <div class="col text-left">
            <form action="<?= base_url(); ?>home/ubahpassword" method=" get" target="_blank">
                <button type=" submit" class="btn btn-outline-dark">ubah password</button>
            </form>
        </div>

    </div>