<? if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<? ob_start() ?>

<div class="container">
	<div class="row">
		<div class="center-canvas">
			<div class="alert"></div>
			<canvas id="canvasCreate" width="500" height="500"></canvas> 
			<div class="tools-row">
				<button id="clear_part" class="btn btn-default btn-xs">Ластик</button>
				<button id="black-color" class="btn btn-default btn-xs active">Черный цвет</button>
			</div>
			<div class="form-group">
				<label for="password">Укажите пароль для доступа к рисунку</label>
				<input type="password" name="password" id="password" class="form-control">
			</div>
			<button class="btn btn-success" id="save_canvas">Сохранить</button>   
			<? if ($data['img']) : ?>
				<div id="canvas-data" data-id="<?= $data['img']['id']?>" style="display:none">
					<?= $data['img']['data_uri']?>
				</div>   
			<? endif ?>             
		</div>
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/draw.js"></script>

<? $content = ob_get_clean() ?>

<? include 'layout.php' ?>