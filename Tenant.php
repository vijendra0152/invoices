<?php

namespace App\Models;

class Tenant{
    public $accountingService;

    function __construct(){
        $this->accountingService = new \App\Services\AccountingService();
    }

    public function get_invoices($invoice_type) /* pass parameter to this function for awaiting payment and paid invoices. */
    {
        if(invoice_type=='awaiting-payment')  //if invoice type is awaiting-payment
        $params = array('tenant_id' => $this->id,'status'=>'awaiting-payment');
        else if(invoice_type=='paid') //if invoice type is paid
        $params = array('tenant_id' => $this->id,'status'=>'paid');
        else
        $params = array();

        $invoices = $this->accountingService->getAllInvoices($params);
        //$ap_invoices = array();
        if (!empty($invoices))
        {
            return $invoices;
        }

        return null;
    }

}
?>
