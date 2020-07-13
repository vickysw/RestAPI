<?php 
/**
 *  13 July 2020
 *  For Manage Orders 
 */

 namespace App\Models;

use App\Core\Model;

class OrderModel extends Model{


    public function getUsers(){

        $sql = "select * from $this->table";

        $users = $this->db->getAll($sql);

        return $users;

    }

}

?>
