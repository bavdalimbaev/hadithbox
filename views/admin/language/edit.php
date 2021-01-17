<?php
$navPage = 'lang';
require_once ROOT . '/views/include/header-admin.php';
?>

<div class="container">

	<div class="row justify-content-center">
		<div class="col-lg-12">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="p-5">
					<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4">Редактировать Язык!</h1>
					</div>
					<form class="form-row" method="POST">
						<div class="col-4">
							<input name="title" required type="text" class="form-control" value="<?=$langInfo['title']?>">
						</div>
						<div class="col-4">
                            <select name="status" class="form-control" required>
                                <option value="ENABLED">ENABLED</option>
                                <option value="DELETED">DELETED</option>
                                <option value="DISABLED">DISABLED</option>
                                <option style="background-color: #00A000; color:#fff;" value="<?=$langInfo['status']?>" selected><?=$langInfo['status']?></option>
                            </select>
						</div>
						<div class="col-4">
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