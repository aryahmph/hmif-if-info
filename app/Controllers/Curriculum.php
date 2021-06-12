<?php


namespace App\Controllers;


use App\Models\CurriculumModel;
use App\Models\KurikulumModel;

class Curriculum extends BaseController
{
    private CurriculumModel $curriculumModel;

    /**
     * Curriculum constructor.
     */
    public function __construct()
    {
        $this->curriculumModel = new CurriculumModel();
    }

    public function index()
    {

        $data = array(
            'title' => 'Daftar Kurikulum',
            'semester' => $this->curriculumModel->getSemesters()
        );

        return view('pages/CurriculumView', $data);
    }
}