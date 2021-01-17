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
							<div class="col-4">
								<label for="book">Выберите Книгу</label>
								<select name="bookId" id="book" class="form-control" required>
									<?php foreach ($bookList as $key => $row): ?>
										<option value="<?=$row['id']?>"><?=$row['title']?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-4">
								<label for="category">Выберите Категорию</label>
								<select name="categoryId" id="category" class="form-control" required>
									<?php foreach ($categoryList as $key => $row): ?>
										<option value="<?=$row['id']?>"><?=$row['title']?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-4 mb-3">
								<div class="form-group">
									<img id="photo" src="#" width="100" alt="Личное фото" />
								</div>
								<label for="img">Картинки</label>
								<div class="custom-file" id="img">
									<input type="file" name="imageUrl" class="custom-file-input" id="image" accept="image/jpeg,image/png">
									<label class="custom-file-label" for="image" data-browse="Просмотр">смотреть</label>
								</div>
							</div>
							<div class="col-4">
								<label for="source">Выберите Source</label>
								<select name="sourceId" id="source" class="form-control">
									<option selected value="">Выберите SOURCE</option>
									<?php foreach ($sourceList as $key => $row): ?>
										<option value="<?=$row['id']?>"><?=$row['title']?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-4">
									<label for="status">Статус</label>
									<select name="status" id="status" class="form-control" required>
										<option value="ENABLED">ENABLED</option>
										<option value="DELETED">DELETED</option>
										<option value="DISABLED">DISABLED</option>
									</select>
							</div>
							<div class="col-4">
								<label for="transcript">Транскрипт</label>
								<input type="text" id="transcript" name="transcript" class="form-control">
							</div>
							<hr>
							<div class="col-12 mt-4">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<?php foreach ($langList as $key => $row): ?>
										<li class="nav-item" role="<?=$row['title']?>">
											<a class="nav-link <?php echo ($key !== 0) ?: 'active';?>" id="<?=$row['title']?>-tab" data-toggle="tab" href="#<?=$row['title']?>" role="tab" aria-controls="<?=$row['title']?>" aria-selected="<?php echo ($key !== 0) ? 'false' : 'true';?>"><?=$row['title']?></a>
										</li>
									<?php endforeach ?>
								</ul>
								<div class="tab-content pt-2" id="myTabContent">
									<?php foreach ($langList as $key => $row): ?>
										<div class="tab-pane fade <?php echo ($key !== 0) ?: 'show active';?>" id="<?=$row['title']?>" role="tabpanel" aria-labelledby="<?=$row['title']?>-tab">
											<input type="text" hidden name="langId-<?=++$key?>" value="<?=$row['id']?>">
											<div class="form-group">
												<label for="title-<?=$row['id']?>">Название <?=$row['title']?></label>
												<input type="text" name="title-<?=$key?>" id="title-<?=$row['id']?>" placeholder="Введите название" class="form-control">
											</div>
											<div class="form-group">
												<label for="status-<?=$row['id']?>">Статус</label>
												<select name="stts-<?=$key?>" id="status-<?=$row['id']?>" class="form-control">
													<option selected value="">Выберите статус</option>
													<option value="ENABLED">ENABLED</option>
													<option value="DELETED">DELETED</option>
													<option value="DISABLED">DISABLED</option>
												</select>
											</div>
											<div class="form-group">
												<label for="description-<?=$row['id']?>">Описание</label>
												<textarea name="description-<?=$key?>" id="description-<?=$row['id']?>" class="form-control"></textarea>
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
