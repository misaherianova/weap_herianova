<?php  if(!defined('BASE_DIR')) die('no direct script access');

?>



<div class="mozna">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?url=pridaniKnihy" method="post">
		Nazev knihy: <input type="text" name="jmeno"><br>
		Autor: <input type="text" name="autor"><br>
		Popis: <input type="text" name="popis"><br>
		Cena: <input type="text" name="cena"><br>
		Kategorie: <input type="text" name="kategorie""><br>
			<input type="submit">
    </form>
</div>