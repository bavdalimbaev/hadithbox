<?php
$navPage = 'message';
require_once ROOT . '/views/include/header-admin.php';
?>
<link href="/use/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Сообщения</h1>
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
	</div>
	<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci commodi consequatur dolores dolorum est exercitationem hic in inventore ipsa numquam obcaecati praesentium provident quidem quos repellat repellendus, repudiandae, similique totam?</p>

    <div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Сообшение</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>№</th>
						<th>Хадис</th>
						<th>Коммент</th>
						<th>Статус</th>
						<th>Дата</th>
						<th>Действие</th>
					</tr>
					</thead>
					<tfoot>
					<tr>
                        <th>№</th>
                        <th>Хадис</th>
                        <th>Коммент</th>
                        <th>Статус</th>
                        <th>Дата</th>
                        <th>Действие</th>
					</tr>
					</tfoot>
					<tbody>
                    <?php foreach($messageList as $key => $row):?>
					<tr>
						<td><?=++$key?></td>
						<td><a href="/admin/hadith/edit/<?=$row['hadith_id']?>">ХАДИС</a></td>
						<td><?=$row['comment']?></td>
						<td><?=$row['status']?></td>
						<td><?=$row['dateadd']?></td>
						<td>
                            <a href="/admin/message/view/<?=$row['id']?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            <a href="/views/delete.php?id=<?=$row['id']?>&type=message" onclick="return confirm('Вы действительно хотите удалить?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
					</tr>
                    <?php endforeach; ?>
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