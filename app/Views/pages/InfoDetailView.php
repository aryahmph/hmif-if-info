<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8 mt-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/info">Informasi</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $query['title'] ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-10 title">
                <h2>
                    <?= $query['title'] ?>
                </h2>
                <p><?= $date ?></p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12 img-hero">
                <img src="<?= base_url("img/{$query['image']}") ?>" alt="<?= $query['image'] ?>"/>
            </div>
        </div>
        <div class="row body-text d-flex justify-content-center">
            <div class="col-10 col-md-8">
                <?= $query['body'] ?>
            </div>
        </div>
    </div>

<?php $this->endSection(); ?>