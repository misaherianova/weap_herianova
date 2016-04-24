<?php
/**
 * Created by PhpStorm.
 * User: Michaela
 */

namespace app\classes\controllers;

use app\classes\models\AdministraceKnih;
use libs\Controller;
use libs\View;

class OdebraniKnihy extends Controller
{
	public function __construct()
	{
		$this->setTemplate('app\templates\administrace_temp');
		$this->openDatabaseConnection();
	}

	public function index()
	{

		$this->template->set('content', '<h1>Administrace</h1>');

		$knihy = new AdministraceKnih($this->db);
		
		if(isset($_POST['id']))
		{
			$id = $_POST['id'];
			$knihy->odstranitKnihu($id);
		}

		$content = new View('app/views/odebratKnihu');
		$this->template->content = $content->render();
		echo $this->template->render();
	}

}