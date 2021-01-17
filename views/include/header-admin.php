<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Dashboard</title>
	<link href="/use/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="/use/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<div id="wrapper">

	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
			<div class="sidebar-brand-icon rotate-n-15">
				<i class="fas fa-laugh-wink"></i>
			</div>
			<div class="sidebar-brand-text mx-3">Hadith <sup>box</sup></div>
		</a>

		<hr class="sidebar-divider my-0">
		<li class="nav-item <?php echo ($navPage == 'dashboard') ? 'active' : ''; ?>">
			<a class="nav-link" href="/admin/dashboard">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span>
            </a>
		</li>
		<hr class="sidebar-divider">
		<div class="sidebar-heading">
			Хадисы
		</div>
		<li class="nav-item <?php echo ($navPage == 'hadith') ? 'active' : ''; ?>">
			<a class="nav-link" href="/admin/hadith">
				<i class="fas fa-fw fa-list"></i>
				<span>Hadith</span>
			</a>
		</li>

		<li class="nav-item <?php echo ($navPage == 'book') ? 'active' : ''; ?>">
			<a class="nav-link" href="/admin/book">
				<i class="fas fa-fw fa-book"></i>
				<span>Book</span>
			</a>
		</li>

        <li class="nav-item <?php echo ($navPage == 'message') ? 'active' : ''; ?>">
            <a class="nav-link" href="/admin/message">
                <i class="fas fa-fw fa-comment-alt"></i>
                <span>Message</span>
            </a>
        </li>
		<hr class="sidebar-divider">
		<div class="sidebar-heading">
			Levels
		</div>

		<li class="nav-item <?php echo ($navPage == 'category') ? 'active' : ''; ?>">
			<a class="nav-link" href="/admin/category">
				<i class="fas fa-fw fa-tags"></i>
				<span>Category</span>
			</a>
		</li>

		<li class="nav-item <?php echo ($navPage == 'lang') ? 'active' : ''; ?>">
			<a class="nav-link" href="/admin/lang">
				<i class="fas fa-fw fa-language"></i>
				<span>Language</span>
			</a>
		</li>

		<li class="nav-item <?php echo ($navPage == 'source') ? 'active' : ''; ?>">
			<a class="nav-link" href="/admin/source">
				<i class="fas fa-fw fa-folder"></i>
				<span>Source</span>
			</a>
		</li>
		<hr class="sidebar-divider d-none d-md-block">
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>

	</ul>
	<div id="content-wrapper" class="d-flex flex-column">
		<div id="content">
			<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
				<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
					<i class="fa fa-bars"></i>
				</button>
				<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
					<div class="input-group">
						<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="btn btn-primary" type="button">
								<i class="fas fa-search fa-sm"></i>
							</button>
						</div>
					</div>
				</form>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown no-arrow d-sm-none">
						<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-search fa-fw"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
							<form class="form-inline mr-auto w-100 navbar-search">
								<div class="input-group">
									<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
									<div class="input-group-append">
										<button class="btn btn-primary" type="button">
											<i class="fas fa-search fa-sm"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
					</li>

					<li class="nav-item dropdown no-arrow mx-1">
						<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-envelope fa-fw"></i>
							<span class="badge badge-danger badge-counter"><?=$messageNotifyCount?></span>
						</a>
						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
							<h6 class="dropdown-header">
								Центр сообщений
							</h6>
                            <?php foreach($messageNotify as $key => $comment) :?>
							<a class="dropdown-item d-flex align-items-center" href="/admin/message/view/<?=$comment['id']?>">
								<div class="dropdown-list-image mr-3">
									<img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
									<div class="status-indicator bg-success"></div>
								</div>
								<div class="font-weight-bold">
									<div class="text-truncate"><?=$comment['comment']?></div>
									<div class="small text-gray-500"><?=$comment['dateadd']?></div>
								</div>
							</a>
                            <?php endforeach ?>
							<a class="dropdown-item text-center small text-gray-500" href="/admin/message">Посмотреть все сообщения</a>
						</div>
					</li>

					<div class="topbar-divider d-none d-sm-block"></div>
					<li class="nav-item dropdown no-arrow">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="mr-2 d-none d-lg-inline text-gray-600 small">Администраторы</span>
							<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
						</a>
						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="#">
								<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
								Profile
							</a>
							<a class="dropdown-item" href="#">
								<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
								Settings
							</a>
							<a class="dropdown-item" href="#">
								<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
								Activity Log
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
								<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
								Выйти
							</a>
						</div>
					</li>

				</ul>

			</nav>