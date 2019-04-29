<section id="admin">
	<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php if(!empty($_SESSION['admin'])) { ?>
                    <nav class="menu">
                        <ul>
                            <li><a href="/admin/">Продукты</a></li>
                            <li><a href="/admin/category">Категории</a></li>
                            <li><a href="/admin/direction">Специализации</a></li>
                        </ul>
                    </nav>
                <?php } ?>
            </div>
        </div>
        <?php require_once __DIR__."/$action.php"; ?>
	</div>
</section>