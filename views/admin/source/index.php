<?php
$navPage = 'source';
require_once ROOT . '/views/include/header-admin.php';
?>
<link href="/use/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container-fluid">

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Source</h1>
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
	</div>
	<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

	<div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Source</h6>
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">
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
						<th>Название</th>
						<th>Язык</th>
						<th>Действие</th>
					</tr>
					</thead>
					<tfoot>
					<tr>
                        <th>№</th>
                        <th>Название</th>
                        <th>Язык</th>
                        <th>Действие</th>
					</tr>
					</tfoot>
					<tbody>
                    <?php foreach ($sourceList as $key => $row): ?>
                        <tr>
                            <td><?=++$key?></td>
                            <td><?=$row['title']?></td>
                            <td><?=$row['langTitle']?></td>
                            <td>
                                <a href="/admin/source/edit/<?=$row['id']?>" class="btn btn-secondary"><i class="fas fa-pen"></i></a>
                                <a href="/views/delete.php?id=<?=$row['id']?>&type=source" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>


<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Добавить новый SOURCE</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Название</label>
                    <textarea name="title" required id="title" class="form-control" placeholder="Введите текст"></textarea>
                </div>

                <div class="form-group">
                    <label for="lang">Выберите язык</label>
                    <select name="langId" id="lang" class="form-control" required>
                      <?php foreach ($langList as $key => $row): ?>
                          <option value="<?=$row['id']?>"><?=$row['title']?></option>
                      <?php endforeach ?>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
                <input name="btnAdd" value="SAVE" type="submit" class="btn btn-primary btn-user">
            </div>
        </form>
    </div>
</div>

<?php
require_once ROOT . '/views/include/footer-admin.php';
?>

<script src="/use/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/use/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/use/assets/js/demo/datatables-demo.js"></script>