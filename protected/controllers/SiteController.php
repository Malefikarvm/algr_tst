<?php

class SiteController extends Controller
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		
		/*$url = "https://invoice.zoho.com/api/v3/invoices/300211000000045015?authtoken=53f4f67bd3c42ffff2919d0b551045ed&organization_id=486669454";
		$data = file_get_contents($url);*/
		Yii::app()->clientScript->registerScriptFile(
			Yii::app()->request->baseUrl . '/js/site/index.js', CClientScript::POS_HEAD
		);
		
		$this->render('index', array());
	}
	
	public function actionGetInvoices()
	{
		$api = new ZohoApi();
		$invoices = $api->getInvoices();
		asort($invoices);
		echo $this->renderPartial('invoices', compact('invoices'), true);
	}

	public function actionGetInvoicesFiltered()
	{
		$api = new ZohoApi();
		$invoices = $api->getInvoicesFiltered();
		asort($invoices);
		echo $this->renderPartial('invoices', compact('invoices'), true);
	}
	
	public function actionGetInvoiceById()
	{
		$id = isset($_POST) ? $_POST['id'] : '';
		$api = new ZohoApi();
		$invoice_detail = $api->getInvoiceById($id);
		echo $this->renderPartial('invoice_details', compact('invoice_detail', 'id'), true);
	}
}