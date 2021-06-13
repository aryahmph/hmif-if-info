<?php


namespace App\Models;


use CodeIgniter\Model;

class InfoModel extends Model
{
    protected $table = 'infos';

    public function getInfos($slug = false): array
    {
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->asArray()
            ->where(['slug' => $slug])
            ->first();
    }

    public function existSlug($slug): bool
    {
        $sql = "SELECT id FROM infos WHERE slug=?";
        $query = $this->db->query($sql, $slug)->getResultArray();
        if (empty($query)) return false;
        return true;
    }
}