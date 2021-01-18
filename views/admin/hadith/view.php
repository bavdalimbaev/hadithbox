<?php
$navPage = 'hadith';
require_once ROOT . '/views/include/header-admin.php';

?>
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Подробная информация Хадиса</h1>
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
		</div>

		<div class="row">
			<div class="col-lg-6 mb-4">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Хадис</h6>
					</div>
					<div class="card-body">
						<h6>Книга <span class="float-right font-weight-bold"><?=$hadithInfo['bookTitle']?></span></h6>
						<div class="d-flex justify-content-between align-items-center">
						<h6>Категория</h6>
							<ul class="float-right font-weight-bold">
								<?php foreach ($hadithInfo['categories'] as $key => $val) {
									echo '<li>'. $val['title'] .'</li>';
								} ?>
							</ul>
						</div>
						<h6>Статус <span class="float-right font-weight-bold"><?=$hadithInfo['status']?></span></h6>
					</div>
					<div class="card-footer">
						<a class="btn btn-block btn-secondary" href="/admin/hadith/edit/<?=$hadithInfo['id']?>">ИЗМЕНИТЬ ДАННЫЕ</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6 mb-4">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Фото и Транскрипт</h6>
					</div>
					<div class="card-body">
						<div class="text-center">
							<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?=($hadithInfo['imageUrl'])? $hadithInfo['imageUrl'] : '/use/assets/img/undraw_posting_photo.svg'?>" alt="">
						</div>
						<p>Чтение: <?=$hadithInfo['transcript']?></p>
					</div>
				</div>
			</div>

			<h1 class="h3 ml-3 text-gray-800">Переводы</h1>

			<div class="col-lg-12 mb-4">
				<div class="row">
					<?php
					$switchColor = ['bg-primary', 'bg-secondary', 'bg-dark'];
					foreach($hadithLangInfo as $key => $row) { ?>
					<div class="col-lg-6 mb-4">
						<div class="card <?php echo $switchColor[$key]; ?> text-white shadow">
							<div class="card-body">
								<?=$row['title']?>
								<div class="text-white-50 small">
									<?=$row['status']?> |
									<a href="/admin/translate/edit/<?=$row['id']?>" class="float-right text-warning">
										<i class="fa fa-edit"></i> ИЗМЕНИТЬ
									</a>
								</div>
								<p><?=$row['description']?></p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>

		</div>
	</div>

<?php
require_once ROOT . '/views/include/footer-admin.php';
?>