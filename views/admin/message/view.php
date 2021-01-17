<?php
$navPage = 'message';
require_once ROOT . '/views/include/header-admin.php';
?>

	<div class="container">
		<?=$msg?>

		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Информация о сообщении!</h1>
						</div>
						<div class="info p-2">
							<h5>Ссылка -> <a href="/admin/hadith/edit/<?=$msgInfo['hadith_id']?>">Хадис</a></h5>
							<h5>Статус: <?=$msgInfo['status']?></h5>
							<h5>Дата: <?=$msgInfo['dateadd']?></h5>
							<p class="h4"><?=$msgInfo['comment']?></p>
						</div>
						<hr>
						<form class="form-row" method="POST">
							<div class="col-4">
								<select name="status" class="form-control" required>
									<option value="CHECKED">CHECKED</option>
									<option value="WAITING">WAITING</option>
									<option value="NO CHANGE">NO CHANGE</option>
									<option style="background-color: #00A000; color:#fff;" value="<?=$msgInfo['status']?>" selected><?=$msgInfo['status']?></option>
								</select>
							</div>
							<div class="col-8">
								<input name="messageId" value="<?=$msgId?>" type="text" hidden>
								<input name="btnEdit" value="SAVE" type="submit" class="btn btn-primary btn-user btn-block">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>

<?php
require_once ROOT . '/views/include/footer-admin.php';
?>