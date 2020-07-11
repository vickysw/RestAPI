<?php 

// use App\Core;
use App\Models\UserModel as user;

class test extends App\Core\Controller
{
    private $mydata;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->loader->helper('custom');
        
        $this->mydata = json_decode(file_get_contents("php://input"), true);
        if (empty($this->mydata)) {
            $this->mydata   = $_POST;
        }
    }

    public function getBasicProfile()
    {
        $keys = array("bp_tal_id", "bp_entity_id");
        $data =  check_api_keys($keys,$this->mydata);

        $userModel = new user("basic_profile");

        $users = $userModel->getUsers();

        respond_success_to_api("success", $users);
    }
}

?>
