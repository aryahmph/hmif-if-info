<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>
    <div class="container mt-5 px-4 px-lg-0">
        <!--  Mata Kuliah  -->
        <div class="row matkul">
            <div class="col-12 text-center mb-3 mb-lg-5">
                <h3 class="fw-bold">Tentang Kuliah</h3>
            </div>
            <?php foreach ($semesters as $semester) : ?>
                <div class="col-lg-3 mb-4">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header">Mata Kuliah</div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $semester['name'] ?></h5>
                            <p class="card-text"><?= $semester['description'] ?></p>
                            <a href="matkul.html" class="btn btn-outline-secondary btn-sm">Lihat Matkul</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!--  End of Mata Kuliah  -->
    </div>
<?php $this->endSection(); ?>