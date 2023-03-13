<?php
namespace App\Models;

use CodeIgniter\Model;

class CommentsModel extends Model
{
    protected $table = 'comments';

    public function getComments()
    {
         return $this->findAll();
    }

    public function addComment($email,$text,$date)
    {
         $sql = sprintf("INSERT INTO $this->table (name, text, date) VALUES ('%s', '%s', '%s')", $email, $text, $date);
         return $this->db->query($sql);
    } 
}
