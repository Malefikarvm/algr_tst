<?php

class SiteController extends Controller
{


	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$url = "https://invoice.zoho.com/api/v3/creditnotes?authtoken=53f4f67bd3c42ffff2919d0b551045ed&organization_id=486669454";
		$data = file_get_contents($url);

		$data = json_decode(($data));
		echo '<pre>';
		print_r($data);
		$pack = array('greetings' => 'Hola mundo!');
		$this->render('index', compact('pack'));
	}

}