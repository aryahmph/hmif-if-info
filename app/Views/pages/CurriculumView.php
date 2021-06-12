<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>
    <div class="container mt-5 px-4 px-lg-0">
        <!--  Mata Kuliah  -->
        <div class="row matkul">
            <div class="col-12 text-center mb-3 mb-lg-5">
                <h3 class="fw-bold">Tentang Kuliah</h3>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card text-dark bg-light mb-3">
                    <div class="card-header">Mata Kuliah</div>
                    <div class="card-body">
                        <h5 class="card-title">Semester 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="matkul.html" class="btn btn-outline-secondary btn-sm">Lihat Matkul</a>
                    </div>
                </div>
            </div>
        </div>
        <!--  End of Mata Kuliah  -->
    </div>
<?php $this->endSection(); ?>