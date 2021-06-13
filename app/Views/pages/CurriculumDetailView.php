<?php $this->extend('layout/template'); ?>
<?php $this->section('content'); ?>
    <div class="container my-5 px-4 px-lg-0">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/curriculum">Kurikulum</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                </nav>
            </div>
            <div class="col-12 mt-4">
                <h1><?= $title ?></h1>
            </div>
            <div class="col-12 col-md-8 mt-2">
                <p><?= $semesterDesc ?></p>
            </div>
            <div class="col-12 col-lg-8 mt-3">
                <div class="accordion" id="accordionExample">
                    <?php
                    $lastCourseId = "-1";
                    $isSubjectFull = false;
                    foreach ($query

                    as $data) : ?>

                    <?php if ($data['courseId'] != $lastCourseId) :
                    $lastCourseId = $data['courseId'];
                    ?>

                    <?php if ($isSubjectFull) : ?>
                    </ol>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?= $data['courseId'] ?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse<?= $data['courseId'] ?>" aria-expanded="false"
                        aria-controls="collapse<?= $data['courseId'] ?>">
                    <?= $data['courseName'] ?>
                </button>
            </h2>
            <div id="collapse<?= $data['courseId'] ?>" class="accordion-collapse collapse"
                 aria-labelledby="heading<?= $data['courseId'] ?>"
                 data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item"><strong><?= $data['subjectName'] ?></strong><br>
                            <p style="margin-left: 1em; margin-top: .5em;"><?= $data['subjectDesc'] ?></p>
                        </li>
                        <?php $isSubjectFull = false;
                        else :
                            $isSubjectFull = true; ?>
                            <li class="list-group-item"><strong><?= $data['subjectName'] ?></strong><br>
                                <p style="margin-left: 1em; margin-top: .5em;"><?= $data['subjectDesc'] ?></p>
                            </li>
                        <?php endif; ?>

                        <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-12">
            <a href="<?= base_url(); ?>/curriculum" class="btn btn-primary mt-5">Kembali</a>
        </div>
    </div>
<?php $this->endSection(); ?>