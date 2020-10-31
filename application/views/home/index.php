<div class="container">
    <div class="container">
        <div class="row">
            <?php foreach ($item as $item) : ?>
                <div class="services">
                    <div class="hovereffect">
                        <div class="item">
                            <a href="<?= $item['link']; ?>" target="_blank">
                                <img class="item-logo" src="<?= base_url('assets/img/') . $item['icon']; ?>" alt="<?= $item['nama']; ?>">
                            </a>
                            <div class="overlay">
                                <button type="button" class="btn" data-toggle="modal" data-target="#item-modal" data-modalnama="<?= $item['nama']; ?>" data-modaldesc="<?= $item['deskripsi']; ?>">
                                    <i class=" fas fa-info-circle"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                        <h5 class="item-title"><?= $item['nama']; ?></h5>
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
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row ml-2 mb-5 mt-5">
            <div class="col text-center">
                <form action="<?= base_url(); ?>home/ubahpassword" method=" get" target="_blank">
                    <button type=" submit" class="btn btn-outline-dark">ubah password</button>
                </form>
            </div>
        </div>
    </div>