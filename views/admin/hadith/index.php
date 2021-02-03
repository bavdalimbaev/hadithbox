<?php
$navPage = 'hadith';
require_once ROOT . '/views/include/header-admin.php';
?>
<link href="/use/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container-fluid">

	<div class="d-sm-flex align-items-center justify-content-between mb-д4">
		<h1 class="h3 mb-0 text-gray-800">Хадисы</h1>
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
	</div>
	<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque culpa, debitis dolores expedita, magnam minus modi natus nobis recusandae rem repellendus sint, ullam veritatis! Iusto libero magnam minus quia vero.</p>
	<div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Хадисы</h6>
            <a href="/admin/hadith/add" class="btn btn-primary">
                <i class="fas fa-plus-square fa-sm fa-fw mr-2 text-gray-400"></i>
                Добавить
            </a>
        </div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>№</th>
                        <th>Книга</th>
                        <th>Источник</th>
                        <th>Категория</th>
                        <th>Хадис</th>
                        <th>Статус</th>
                        <th>Действие</th>
					</tr>
					</thead>
					<tfoot>
					<tr>
                        <th>№</th>
                        <th>Книга</th>
                        <th>Источник</th>
                        <th>Категория</th>
                        <th>Хадис</th>
                        <th>Статус</th>
                        <th>Действие</th>
					</tr>
					</tfoot>
					<tbody>
                    <?php foreach ($hadith as $key => $row):
	                    $hadithList         = $row['hadith'];
	                    $hadithId           = $hadithList['id'];
	                    $hadithStatus       = $hadithList['status'];
	                    $hadithTranscript   = $hadithList['transcript'];

	                    $hadithTranslate    = $row['translate'];

	                    $hadithBookId       = $hadithTranslate[0]['bookId'];
	                    $hadithBookTitle    = $hadithTranslate[0]['bookTitle'];
	                    $hadithSourceId     = $hadithTranslate[0]['sourceId'];
	                    $hadithSourceTitle  = $hadithTranslate[0]['sourceTitle'];
	                    $hadithCategory     = $hadithTranslate[0]['categories'];
	                    $hadithLangTitle    = $hadithTranslate[0]['title'];
	                    $hadithLangStatus   = $hadithTranslate[0]['status'];
	                    $hadithLangId       = $hadithTranslate[0]['id'];
                      ?>
					<tr>
						<td><?=++$key?></td>
						<td><a href="/admin/book/edit/<?=$hadithBookId?>"><?=$hadithBookTitle?></a></td>
						<td><a href="/admin/source/edit/<?=$hadithSourceId?>"><?=$hadithSourceTitle?></a></td>
						<td>
                            <?php foreach ($hadithCategory as $kei => $val ) { ?>
                                <a href="/admin/category/edit/<?=$val['id']?>">
                                    <?=$val['title']?>
                                </a>
                            <?php } ?>
                        </td>
						<td><?=($hadithLangTitle) ? $hadithLangTitle : $hadithTranscript;?></td>
						<td><?=$hadithLangStatus?></td>
						<td>
                            <a href="/admin/hadith/view/<?=$hadithId?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            <a href="/admin/hadith/edit/<?=$hadithId?>" class="btn btn-secondary"><i class="fas fa-pen"></i></a>
                            <a href="/views/delete.php?id=<?=$hadithId?>&type=hadith" onclick="return confirm('Вы действительно хотите удалить?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
					</tr>
                    <?php endforeach ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

<?php
require_once ROOT . '/views/include/footer-admin.php';
?>

<script src="/use/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/use/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/use/assets/js/demo/datatables-demo.js"></script>