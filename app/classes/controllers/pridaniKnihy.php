<?php
/**
 * Created by PhpStorm.
 * User: Michaela
 */

namespace app\classes\controllers;


use app\classes\models\AdministraceKnih;
use libs\Controller;
use libs\View;

class pridaniKnihy extends Controller
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

		if (isset($_POST["jmeno"]) && isset($_POST["autor"])&& isset($_POST["popis"])&&
			isset($_POST["cena"]) && isset($_POST["kategorie"]))
		{
			$jmeno = $_POST['jmeno'];
			$autor = $_POST['autor'];
			$popis = $_POST['popis'];
			$cena = $_POST['cena'];
			$kategorie = $_POST['kategorie'];
			$knihy->pridatKnihu($jmeno, $autor, $popis, $cena, $kategorie);

			//$this->redirect("administrace/index");
		}
		else {
			$user = null;
			echo "nepodarilo se";
		}


		//poresit proc to bez toho nefunguje
		$content = new View('app/views/pridatKnihu');
		$this->template->content = $content->render();
		echo $this->template->render();

	}
}