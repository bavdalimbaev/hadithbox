<?php
$navPage = 'book';
require_once ROOT . '/views/include/header-admin.php';
?>

	<div class="container">
<?=$msg?>
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Редактировать Книгу!</h1>
						</div>
						<form class="form-row" method="POST">
							<div class="col-6">
                                <label for="title">Название</label>
								<input name="title" id="title" required type="text" class="form-control" value="<?=$bookInfo['title']?>">
                                <hr>
                                <label for="author">Автор</label>
                                <input name="author" required id="author" type="text" class="form-control" value="<?=$bookInfo['author']?>">
                                <hr>
                                <label for="lang">Выберите язык</label>
                                <select name="langId" id="lang" class="form-control" required>
                                  <?php foreach ($langList as $key => $row): ?>
                                      <option value="<?=$row['id']?>"><?=$row['title']?></option>
                                  <?php endforeach ?>
                                    <option style="background-color: #00A000; color:#fff;" value="<?=$bookInfo['langId']?>" selected><?=$bookInfo['langTitle']?></option>
                                </select>
							</div>

                            <div class="col-6">
                                <label for="description">Описание</label>
                                <textarea name="description" rows="5" required id="description" class="form-control" placeholder="Введите описание"><?=$bookInfo['description']?></textarea>
								<br><br><input name="btnEdit" value="SAVE" type="submit" class="btn btn-primary btn-user btn-block">
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