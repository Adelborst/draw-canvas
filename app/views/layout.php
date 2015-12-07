<? if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Canvas Draw Test</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<style>
			
			body {
				padding-bottom: 30px;
			}

			.center-canvas {
				width: 500px;
				margin-left: auto;
				margin-right: auto;
			}

			canvas {
				border: 1px dashed #bbb;
			}

			.tools-row {
				width: 500px;
			}

			.form-group {
				margin-top: 35px;
			}
			
			.img-thumbnail {
				margin-bottom: 20px;
			}
			
		</style>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="./">
						Canvas Draw Test
					</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="?action=list" class="nav-link">Список рисунков</a></li>
					<li><a href="?action=create" class="nav-link">Создать рисунок</a></li>
				</ul>            
			</div>
		</nav>
		<?= $content?>
	</body>
</html>