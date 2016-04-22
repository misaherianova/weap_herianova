<?php  if(!defined('BASE_DIR')) die('no direct script access'); ?>

    <h1>Články pro dnešní den</h1>
<?php foreach ($data as $row):?>
    <article>
        <h2>
            <a href="<?php echo BASE_DIR . 'knihy/show/' . $row->id; ?>">
                <?php echo $row->nazev;?>
            </a>
        </h2>
        <section>
            <?php echo $row->popis;?>
        </section>
    </article>
<?php endforeach;?>