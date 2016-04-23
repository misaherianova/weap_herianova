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
		
	}

	public function index()
	{
		$this->template->set('title', 'semestralni_prace');
		$this->template->set('content', '<h1>Administrace</h1>');
		$this->template->set('zahlavi', '<div class="zahlavi"><p>ADMINISTRACE</p></div>');
		$this->template->set('topmenu', ' 
        <a href="index.php?url=home">ESHOP</a> |
        <a href="index.php?url=pridaniKnihy">Pridat knihu</a> |
        <a href="index.php?page=book_edit">Upavit knihu</a> |
        <a href="index.php?page=orders">Ostatni</a> |
        <a href="index.php?page=logout">Odhlasit se</a>');

		$knihy = new AdministraceKnih($this->openDatabaseConnection());

		if (isset($_POST["jmeno"]) && isset($_POST["autor"])&& isset($_POST["popis"])&&
			isset($_POST["cena"]) && isset($_POST["kategorie"]))
		{
			$jmeno = $_POST['jmeno'];
			$autor = $_POST['autor'];
			$popis = $_POST['popis'];
			$cena = $_POST['cena'];
			$kategorie = $_POST['kategorie'];
			$knihy->pridatKnihu($jmeno, $autor, $popis, $cena, $kategorie);

			echo $jmeno;
			echo " tohle mi to naslo";
			$this->redirect("administrace/index");
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