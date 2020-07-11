<?php
namespace App\Models;

use App\Core\Model;

class UserModel extends Model{


    public function getUsers(){

        $sql = "select * from $this->table";

        $users = $this->db->getAll($sql);

        return $users;

    }

}