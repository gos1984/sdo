<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<base href="/">
	<link rel="stylesheet" href="/app/template/style.css"/>
	<script src='/app/template/js/ckeditor/ckeditor.js'></script>
	<title>404</title>
	<style>
	body{
		background: #ffffff;
	}
	#page404{
		width: 100%;
	}
	h1 {
		font-size: 8rem;
		margin: 0;
		text-align: center;
	}
	.image{
		margin: 0 auto;
		text-align: center;
		max-width: 480px;
	}
	.image img{
		width: 100%;
	}

	p{
		margin-bottom: 20px;
	}

</style>
</head>
<body>
	<section id="page404">
		<h2>Ошибка 404</h2>
		<div class="image">
			<img src="<?php echo PATH_TPL ?>img/404.jpg" alt="">
		</div>
		<div class="center">
			<p>Такой страницы не существует, через несколько секунд вы будете перенаправлены на главную страницу!</p>
			<a href="/" class="button">Не ждать</a>
		</div>
		
	</section>
	<footer>

	</footer>
	<style>
	
</style>
</body>