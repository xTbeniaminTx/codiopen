<h1>
    Test
</h1>

<p>
    <a href="<?php echo css_url('stylo'); ?>">accueil</a>
    <br />

    <a href="<?php echo site_url('test'); ?>">accueil</a> du test
    <br />

    <a href="<?php echo site_url('test/secret'); ?>">page secrète</a>
    <br />

    <a href="<?php echo site_url(array('test', 'secret')); ?>">page secrète</a>
</p>