<?php
namespace App\Models;

use CodeIgniter\Model;

class CurriculumModel extends Model
{
    protected $table = 'semesters';
    protected $allowedFields = ['name', 'description'];

    /**
     * @return array
     */
    public function getSemesters($slug = false): array
    {
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->asArray()
            ->where(['slug' => $slug])
            ->first();
    }

}
