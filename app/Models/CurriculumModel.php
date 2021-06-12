<?php

namespace App\Models;

use CodeIgniter\Model;

class CurriculumModel extends Model
{
    protected $table = 'semesters';

    public function getSemesters($slug = false): array
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
        $sql = "SELECT id FROM semesters WHERE slug=?";
        $query = $this->db->query($sql, $slug)->getResultArray();
        if (empty($query)) return false;
        return true;
    }

}
