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

            //Check Tenant is exists or not
            $where = "status = 0 AND entity_id ='".$this->mydata['tenant_id']."'";
            if(empty((new common('order_list'))->getData("company_detail",$where)))
                 respond_error_to_api("Tenant not exits.");
           
            //Check Entity is exists or not
            $where = "scd_status = 0 AND sub_entity_id ='".$this->mydata['entity_id']."' AND tenent_id ='".$this->mydata['tenant_id']."' ";
            if(empty((new common('order_list'))->getData("  ",$where)))
                respond_error_to_api("Entity not exits.");     

            //Check customer is exists or not 
            $where = "bp_action = 0 AND bp_tal_id ='".$this->mydata['customer_id']."' AND bp_user_type = 13";
            if(empty((new common('order_list'))->getData("basic_profile",$where)))
                respond_error_to_api("Customer not exits.");     
        }
    }

    public function ConfirmOrder()
    {
        $keys = array("stock_ids", "type","tenant_id","entity_id","customer_id","customer_ax_id");
        $data =  check_api_keys($keys,$this->mydata);

        $orderModel = new orderModel("order_list");

        $orders = $orderModel->insert_order();

        respond_success_to_api("success", $order);
    }



}
?>
