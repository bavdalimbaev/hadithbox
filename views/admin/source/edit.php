<?php
$navPage = 'source';
require_once ROOT . '/views/include/header-admin.php';
?>

	<div class="container">
		<?=$msg?>
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Редактировать Источник!</h1>
						</div>
						<form class="form-row" method="POST">
							<div class="col-lg-6">
								<label for="title">Название</label>
								<input name="title" id="title" required type="text" class="form-control" value="<?=$sourceInfo['title']?>">
							</div>

							<div class="col-lg-3">
                                <label for="lang">Выберите язык</label>
                                <select name="langId" id="lang" class="form-control" required>
                                  <?php foreach ($langList as $key => $row): ?>
                                      <option value="<?=$row['id']?>"><?=$row['title']?></option>
                                  <?php endforeach ?>
                                    <option style="background-color: #00A000; color:#fff;" value="<?=$sourceInfo['langId']?>" selected><?=$sourceInfo['langTitle']?></option>
                                </select>
                            </div>
							<div class="col-lg-3">
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