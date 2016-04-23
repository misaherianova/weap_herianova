<?php
/**
 * Created by PhpStorm.
 * User: honke_000
 * Date: 21. 4. 2016
 * Time: 23:48
 */

namespace app\classes\controllers;

use app\classes\models\Books;
use libs\Controller;
use libs\View;

class OdebraniKnihy extends Controller
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

		if(isset($_POST['id']))
		{
			$id = $_POST['id'];
			remove($id);
		}

		$content = new View('app/views/odebratKnihu');
		$this->template->content = $content->render();
		echo $this->template->render();
	}

	public function remove($id)
	{
		$books = new Books($this->openDb());
		$books->removeBook($id[0]);

		$this->redirect("admin_home/select/1");
	}
}