<?php
$navPage = 'hadith';
require_once ROOT . '/views/include/header-admin.php';

?>

<div class="container">
	<?=$msg?>
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-12">

            <div class="card o-hidden border-0 shadow-lg my-5">

                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Редактировать Хадис!</h1>
                    </div>
                    <form class="form-row" method="POST" enctype="multipart/form-data">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="transcript">Транскрипт</label>
                                <textarea name="transcript" id="transcript" rows="4" class="form-control" placeholder="Введите транскрипцию если имеется картинка"><?=$hadithInfo['transcript']?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <img id="photo" src="#" width="100" alt="Личное фото" />
                            </div>
                            <label for="img">Картинки</label>
                            <div class="custom-file" id="img">
                                <input type="file" src="<?=$hadithInfo['imageUrl']?>" name="imageUrl" class="custom-file-input" id="image" accept="image/jpeg,image/png">
                                <label class="custom-file-label" for="image" data-browse="Просмотр">смотреть</label>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <?php foreach ($langList as $key => $row): ?>
                                  <li class="nav-item" role="<?=$key?>">
                                      <a class="nav-link <?php echo ($key !== 0) ?: 'active';?>" id="lang<?=$key?>-tab" data-toggle="tab" href="#lang<?=$key?>" role="tab" aria-controls="lang<?=$key?>" aria-selected="<?php echo ($key !== 0) ? 'false' : 'true';?>"><?=$row['title']?></a>
                                  </li>
					                    <?php endforeach ?>
                                <li class="nav-item dropdown ml-auto" role="status">
                                    <select name="status" class="form-control" required>
                                        <option value="ENABLED" selected>ENABLED</option>
                                        <option value="DELETED">DELETED</option>
                                        <option value="DISABLED">DISABLED</option>
                                        <option style="background-color: #00A000; color:#fff;" value="<?=$hadithInfo['status']?>" selected><?=$hadithInfo['status']?></option>
                                    </select>
                                </li>
                            </ul>
                            <div class="tab-content pt-2" id="myTabContent">
	                            <?php foreach ($langList as $key => $langrow):
		                            foreach ($hadithLangInfo as $kei => $rows) {
			                            if ($rows['langId'] == $langrow['id']) {
				                            $translateId = $rows['id'];
				                            $translateTitle = $rows['title'];
				                            $translateDescription = $rows['description'];
				                            $translateStatus = $rows['status'];
			                            }
		                            }
		                            ?>

                                  <div class="tab-pane fade <?php echo ($key !== 0) ?: 'show active';?>" id="lang<?=$key?>" role="tabpanel" aria-labelledby="<?=$langrow['title']?>-tab">
                                      <input type="text" hidden name="langId-<?=$key?>" value="<?=$langrow['id']?>">
                                      <input type="number" hidden name="translate-<?=$key?>" value="<?=$translateId?>">
                                      <div class="form-group">
                                          <label for="title-<?=$langrow['id']?>">Название <?=$langrow['title']?></label>
                                          <input type="text" value="<?=$translateTitle?>" name="title-<?=$key?>" id="title-<?=$langrow['id']?>" placeholder="Введите название" class="form-control">
                                      </div>
                                      <div class="row">
                                          <div class="col-6">
                                              <label for="book-<?=$key?>">Выберите Книгу</label>
                                              <select name="bookId-<?=$key?>" id="book-<?=$key?>" class="form-control" required>
                                                <?php foreach ($bookList as $keys => $bookrow): ?>
                                                    <option value="<?=$bookrow['id']?>"><?=$bookrow['title']?></option>
                                                <?php endforeach ?>
                                                  <option style="background-color: #00A000; color:#fff;" value="<?=$hadithInfo['bookId']?>" selected><?=$hadithInfo['bookTitle']?></option>
                                              </select>
                                          </div>
                                          <div class="col-6">
                                              <label for="checkbox-category-<?=$key?>">Выберите Категорию</label>
                                              <select name="categoryId<?=$key?>" id="checkbox-category-<?=$key?>" class="form-control" required multiple="multiple" style="height:70px">
	                                              <?php foreach ($categoryList as $keys => $catrow):
		                                              foreach ($hadithInfo['categories'] as $keis => $hadithrow) {
			                                              if ($hadithrow['id'] == $catrow['id']) {
				                                              $categoryId = $hadithrow['id'];
				                                              $categoryTitle = $hadithrow['title'];
			                                              }
		                                              }
		                                              if(!empty($categoryId)) { ?>
                                                      <option value="<?=$categoryId?>" selected><?=$categoryTitle?></option>
		                                              <?php } else { ?>
                                                      <option value="<?=$catrow['id']?>"><?=$catrow['title']?></option>
		                                              <?php }
		                                              unset($categoryId); unset($categoryTitle);
	                                              endforeach ?>

                                              </select>
                                          </div>

                                      </div>

                                      <div class="form-group">
                                          <label for="status-<?=$langrow['id']?>">Статус</label>
                                          <select name="stts-<?=$key?>" id="status-<?=$langrow['id']?>" class="form-control">
                                              <option selected value="">Выберите статус</option>
                                              <option value="ENABLED">ENABLED</option>
                                              <option value="DELETED">DELETED</option>
                                              <option value="DISABLED">DISABLED</option>
	                                          <?php echo empty($translateStatus) ?: '<option style="background-color: #00A000; color:#fff;" selected value="'.$translateStatus.'">'.$translateStatus.'</option>' ?>

                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label for="description-<?=$langrow['id']?>">Описание</label>
                                          <textarea name="description-<?=$key?>" id="description-<?=$langrow['id']?>" class="form-control"><?=$translateDescription?></textarea>
                                      </div>
                                  </div>
	                        <?php unset($translateStatus); unset($translateDescription); unset($translateTitle); unset($translateId); endforeach ?>

                            </div>
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
