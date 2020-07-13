<?php

use App\Models\CommonModel as common;
use App\Models\OrderModel as orderModel;

class Order extends App\Core\Controller
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

        if($this->action == "ConfirmOrder"){
            $where = "status = 0 AND entity_id ='".$this->mydata['tenant_id']."'";
            if(empty((new common('order_list'))->getData("company_detail",$where)))
                 respond_error_to_api("Tenant not exits.");
            // print_r($this->mydata);
        }
    }

    public function ConfirmOrder()
    {
        $keys = array("stock_ids", "type","tenant_id","entity_id","customer_id","customer_ax_id");
        $data =  check_api_keys($keys,$this->mydata);

        $userModel = new orderModel("order_list");

        $users = $userModel->getUsers();

        respond_success_to_api("success", $users);
    }



}
?>
