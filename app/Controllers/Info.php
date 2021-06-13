<?php


namespace App\Controllers;


use App\Models\InfoModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Info extends BaseController
{
    private InfoModel $infoModel;

    public function __construct()
    {
        $this->infoModel = new InfoModel();
    }

    public function index()
    {

        $data = array(
            'title' => 'Daftar Informasi',
            'infos' => $this->infoModel->paginate(7, 'infos'),
            'pager' => $this->infoModel->pager
        );

//        dd($data);
        return view('pages/InfoView', $data);
    }

    public function detail($slug)
    {
        if (!$this->infoModel->existSlug($slug)) {
            throw new PageNotFoundException();
        }
        $query = $this->infoModel->getInfos($slug);


        if (empty($query)) {
            throw new PageNotFoundException("Empty data, please insert more data in database");
        }
        $date = date_create($query['created_at']);

        $data = array(
            'title' => $query['title'],
            'query' => $query,
            'date' => date_format($date, 'l, d F Y')
        );

        return view('pages/InfoDetailView', $data);
    }
}