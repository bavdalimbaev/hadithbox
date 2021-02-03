<?php
$navPage = 'hadith';
require_once ROOT . '/views/include/header-admin.php';
?>

	<div class="container">
	<?=$msg?>
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Добавить Хадис!</h1>
						</div>
						<form class="form-row" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="transcript">Транскрипт</label>
                                    <textarea name="transcript" id="transcript" rows="4" class="form-control" placeholder="Введите транскрипцию если имеется картинка"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <img id="photo" src="#" width="100" alt="Личное фото" />
                                </div>
                                <label for="img">Картинки</label>
                                <div class="custom-file" id="img">
                                    <input type="file" name="imageUrl" class="custom-file-input" id="image" accept="image/jpeg,image/png">
                                    <label class="custom-file-label" for="image" data-browse="Просмотр">смотреть</label>
                                </div>
                            </div>
							<div class="col-12 mt-2">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<?php foreach ($langList as $langkey => $row): ?>
										<li class="nav-item" role="<?=$langkey?>">
											<a class="nav-link <?=($langkey !== 0) ?: 'active';?>" id="lang<?=$langkey?>-tab" data-toggle="tab" href="#lang<?=$key?>" role="tab" aria-controls="lang<?=$langkey?>" aria-selected="<?=($langkey !== 0) ? 'false' : 'true';?>"><?=$row['title']?></a>
										</li>
									<?php endforeach ?>
                                    <li class="nav-item dropdown ml-auto" role="status">
                                        <select name="status" class="form-control" required>
                                            <option value="ENABLED" selected>ENABLED</option>
                                            <option value="DELETED">DELETED</option>
                                            <option value="DISABLED">DISABLED</option>
                                        </select>
                                    </li>
								</ul>
								<div class="tab-content pt-2" id="myTabContent">
									<?php foreach ($langList as $langkeys => $langrow): ?>
										<div class="tab-pane fade <?=($langkeys !== 0) ?: 'show active';?>" id="lang<?=$langkeys?>" role="tabpanel" aria-labelledby="<?=$langrow['title']?>-tab">
											<input type="text" hidden name="langId-<?=$langkeys?>" value="<?=$langrow['id']?>">
                                            <div class="form-group">
                                                <label for="title-<?=$langkeys?>">Название <?=$langrow['title']?></label>
                                                <input type="text" name="title-<?=$langkeys?>" id="title-<?=$langkeys?>" placeholder="Введите название" class="form-control">
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="book-<?=$langkeys?>">Выберите Книгу</label>
                                                    <select name="bookId-<?=$langkeys?>" id="book-<?=$langkeys?>" class="form-control" required>
                                                      <?php foreach ($bookList as $bookkey => $bookrow): ?>
                                                          <option value="<?=$bookrow['id']?>"><?=$bookrow['title']?></option>
                                                      <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="source-<?=$langkeys?>">Выберите Источник</label>
                                                    <select name="sourceId-<?=$langkeys?>" id="source-<?=$langkeys?>" class="form-control" required>
                                                      <?php foreach ($sourceList as $sourcekey => $sourcerow): ?>
                                                          <option value="<?=$sourcerow['id']?>"><?=$sourcerow['title']?></option>
                                                      <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="checkbox-category-<?=$langkeys?>">Выберите Категорию</label>
                                                    <select name="categoryId-<?=$langkeys?>[]" size="2" id="checkbox-category-<?=$langkeys?>" class="form-control" multiple>
                                                      <?php foreach ($categoryList as $catkey => $catrow): ?>
                                                          <option value="<?=$catrow['id']?>"><?=$catrow['title']?></option>
                                                      <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>

											<div class="form-group">
												<label for="status-<?=$langkeys?>">Статус</label>
												<select name="stts-<?=$langkeys?>" id="status-<?=$langkeys?>" class="form-control">
													<option selected value="">Выберите статус</option>
													<option value="ENABLED">ENABLED</option>
													<option value="DELETED">DELETED</option>
													<option value="DISABLED">DISABLED</option>
												</select>
											</div>
											<div class="form-group">
												<label for="description-<?=$langkeys?>">Описание</label>
												<textarea name="description-<?=$langkeys?>" id="description-<?=$langkeys?>" class="form-control"></textarea>
											</div>
										</div>
									<?php endforeach ?>
								</div>
							</div>
							<hr>
							<div class="col-4">
								<input name="btnAdd" value="SAVE" type="submit" class="btn btn-primary btn-user btn-block">
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

<script>

    $('#photo').hide();
    function readImgPh(input) {
        var reader = new FileReader();
        if (input.files && input.files[0]) {
            reader.onload = function(e) {
                $('#photo').show();
                $('#photo').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function() {
        readImgPh(this);
    });
</script>
