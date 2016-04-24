<?php  if(!defined('BASE_DIR')) die('no direct script access'); ?>


  
      <form class="form-signin" role="form" method="post" action="/login/">
        <h2 class="form-signin-heading">Přihlašte se prosím</h2>
        <input name="email" type="email" class="form-control" placeholder="Email" required autofocus>
        <input name="passwd" type="password" class="form-control" placeholder="Heslo" required>
        <label class="checkbox">
          <input name="permlogin" type="checkbox" value="true"> Zapamatovat?
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Přihlásit</button>
      </form>

    </div> <!-- /container -->
