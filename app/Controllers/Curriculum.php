<?php


namespace App\Controllers;


use App\Models\CurriculumDetailModel;
use App\Models\CurriculumModel;
use App\Models\KurikulumModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Curriculum extends BaseController
{
    private CurriculumModel $curriculumModel;
    private CurriculumDetailModel $curriculumDetailModel;

    /**
     * Curriculum constructor.
     */
    public function __construct()
    {
        $this->curriculumModel = new CurriculumModel();
        $this->curriculumDetailModel = new CurriculumDetailModel();
    }

    public function index()
    {
        $data = array(
            'title' => 'Daftar Kurikulum',
            'semesters' => $this->curriculumModel->getSemesters()
        );

//        dd($data);
        return view('pages/CurriculumView', $data);
    }

    public function detail($slug)
    {
        if (!$this->curriculumModel->existSlug($slug)) {
            throw new PageNotFoundException();
        }
        $query = $this->curriculumDetailModel->getDetails($slug);

        if (empty($query)) {
            throw new PageNotFoundException("Empty data, please insert more data in database");
        }
        $data = array(
            'title' => $query[0]['semesterName'],
            'semesterDesc' => $query[0]['semesterDesc'],
            'query' => $query
        );

        return view('pages/CurriculumDetailView', $data);
    }
}