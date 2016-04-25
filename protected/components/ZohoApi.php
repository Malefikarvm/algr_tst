<?php

/**
 * Created by PhpStorm.
 * User: malefikarvm
 * Date: 23/04/16
 * Time: 04:40 PM
 */
class ZohoApi
{
    //url base para consumir el servicio
    private static $INVOICES_URL = "https://invoice.zoho.com/api/v3/method/?";

    //El arreglo con los distintos parametros que enviaremos a la api
    private static $VAR_ARRAY = array(
        "authtoken" => "53f4f67bd3c42ffff2919d0b551045ed",
        "organization_id" => "486669454",
    );

    private $final_url;

    /**
     * ZohoApi constructor.
     */
    public function __construct()
    {
        $this->final_url = self::$INVOICES_URL;
        $this->createUrl();
    }


    private function createUrl()
    {
        foreach (self::$VAR_ARRAY as $key=>$value)
        {
            $this->final_url .=  $key.'='.$value.'&';
        }
    }

    public function getInvoices()
    {
        $invoice_url = str_replace("method", "invoices", $this->final_url); //"method", $this->final_url, "invoices"
        $data = file_get_contents($invoice_url);
        $data = json_decode($data);
        return $data->invoices;
    }

    public function getInvoicesFiltered()
    {
        $invoice_url = str_replace("method", "invoices", $this->final_url.'&total_greater_than=100000'); //"method", $this->final_url, "invoices"
        $data = file_get_contents($invoice_url);
        $data = json_decode($data);
        return $data->invoices;
    }

    public function getInvoiceById($id)
    {
        $invoice_url = str_replace("method", "invoices/$id", $this->final_url); //"method", $this->final_url, "invoices"
        $data = file_get_contents($invoice_url);
        $data = json_decode($data);
        return $data->invoice;
    }
}