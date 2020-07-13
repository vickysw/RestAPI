<?php 
/**
 *  13 July 2020
 *  For Common Model
 */

 namespace App\Models;

use App\Core\Model;

class CommonModel extends Model{


    /**
     * For get Data
     */
    public function getData($table,$where = ""){ 

        $sql = "select * from ".$table. $where;

        $users = $this->db->getAll($sql);
        // var_dump($users); die;
        return $users;

    }

}

?>
