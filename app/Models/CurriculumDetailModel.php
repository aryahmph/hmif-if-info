<?php


namespace App\Models;


use CodeIgniter\Model;

class CurriculumDetailModel extends Model
{
    public function getDetails($slug)
    {
        $sql = <<<SQL
            SELECT semesters.name        AS semesterName,
                   semesters.description AS semesterDesc,
                   courses.id            AS courseId,
                   courses.name          AS courseName,
                   subjects.name         AS subjectName,
                   subjects.description  AS subjectDesc
            FROM semesters
                     JOIN courses ON (semesters.id = courses.id_semester)
                     JOIN subjects ON (courses.id = subjects.id_course)
            WHERE slug = ?;
            SQL;


        return $this->db->query($sql, [$slug])->getResultArray();
    }

}