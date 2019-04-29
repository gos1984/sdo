<header id="header" class="block">
    <div class="container">
        <div class="row align-items-center">
            <?php if(empty($_SESSION['admin'])) { ?>
                <div class="col-12">
                    <div class="logo" style="margin: 0 auto;"><a href="/admin/"><img src="<?=PATH_TPL?>/img/logo.png" alt=""/></a></div>
                </div>
            <?php } else { ?>
                <div class="col-6">
                    <div class="logo"><a href="/admin/"><img src="<?=PATH_TPL?>/img/logo.png" alt=""/></a></div>
                </div>
                <div class="col-6">
                    <div class="right"><a class="button" href="/admin/exit">Выход</a></div>
                </div>
            <?php } ?>
        </div>
    </div>
</header>