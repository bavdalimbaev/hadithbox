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
	<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
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
                        <th>Категория</th>
                        <th>Хадис</th>
                        <th>Статус</th>
                        <th>Действие</th>
					</tr>
					</tfoot>
					<tbody>
                    <?php foreach ($hadithList as $key => $row): ?>
					<tr>
						<td><?=++$key?></td>
						<td><a href="/admin/book/edit/<?=$row['hadith']['bookId']?>"><?=$row['hadith']['bookTitle']?></a></td>
						<td><a href="/admin/category/edit/<?=$row['hadith']['categoryId']?>"><?=$row['hadith']['categoryName']?></a></td>
						<td><?=$row['translate'][0]['title']?></td>
						<td><?=$row['hadith']['status']?></td>
						<td>
                            <a href="/admin/hadith/edit/<?=$row['hadith']['id']?>" class="btn btn-secondary"><i class="fas fa-pen"></i></a>
                            <a href="/views/delete.php?id=<?=$row['hadith']['id']?>&type=hadith" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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