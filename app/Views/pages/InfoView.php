<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>
    <div class="container mt-5 px-4 px-lg-0">
<?php $isFirstInfo = true;
foreach ($infos

         as $info) :
if ($isFirstInfo) :
    $isFirstInfo = false;
    ?>
    <!--  Newest Info  -->
    <div class="newest-info row d-lg-flex justify-content-lg-center align-items-lg-center">
        <div class="newest-info-img col-lg-6">
            <img class="img-fluid" src="<?= base_url('img/' . $info['image']) ?>" alt="template">
        </div>
        <div class="col-lg-6">

            <h2 class="mt-4"><?= $info['title'] ?></h2>
            <p class="mt-4">
            <p class="card-text mt-4"><?= $info['description'] ?></p></p>
            <a href="<?= base_url() . '/info/' . $info['slug'] ?>" class="btn btn-primary mt-4">Baca Sekarang</a>
        </div>
    </div>
    <!--  End of Newest Info  -->
    <div class="row mt-5">
    <div class="col-12 text-center mb-3 mb-lg-5">
        <h3 class="fw-bold">Informasi Terbaru</h3>
    </div>
    <?php else : ?>
        <!--  Info  -->
        <div class="col-lg-4 my-4">
            <div class="card">
                <img src="<?= base_url('img/' . $info['image']) ?>" class="card-img-top" alt="template">
                <div class="card-body">
                    <h4 class="card-title"><?= $info['title'] ?></h4>
                    <p class="card-text mt-4 elipsis"><?= $info['description'] ?></p>
                    <a href="<?= base_url() . '/info/' . $info['slug'] ?>" class="btn btn-primary my-3">Lihat
                        Selengkapnya</a>
                </div>
            </div>
        </div>
        <!--  End of Info  -->
    <?php endif; ?>
<?php endforeach; ?>
    </div>

<?= $pager->links('infos', 'info_pagination') ?>


<?php $this->endSection(); ?>