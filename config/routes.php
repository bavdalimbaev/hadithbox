<?php
return array(
	// example link with many string links
	// 'blog/([0-9]+)'	=> 'blog/detail/$1', 

	// AdminBookController
	'admin/book/edit/([0-9]+)' => 'adminBook/edit/$1', // actionEdit
	'admin/book' => 'adminBook/index', // actionIndex
	// AdminCategoryController
	'admin/category/edit/([0-9]+)' => 'adminCategory/edit/$1', // actionEdit
	'admin/category' => 'adminCategory/index', // actionIndex
	// AdminHadithController
	'admin/hadith/edit/([0-9]+)' => 'adminHadith/edit/$1', // actionEdit
	'admin/hadith/add' => 'adminHadith/add', // actionAdd
	'admin/hadith' => 'adminHadith/index', // actionIndex
	// AdminLangController
	'admin/lang/edit/([0-9]+)' => 'adminLang/edit/$1', // actionEdit
	'admin/lang' => 'adminLang/index', // actionIndex
	// AdminMessageController
	'admin/message/view/([0-9]+)' => 'adminMessage/view/$1', // actionView
	'admin/message' => 'adminMessage/index', // actionIndex
	// AdminMessageController
	'admin/source/edit/([0-9]+)' => 'adminSource/edit/$1', // actionEdit
	'admin/source' => 'adminSource/index', // actionIndex
	// AdminController
	'admin/dashboard' => 'admin/index', // actionIndex
	// SignController
	'admin' => 'sign/index', // actionIndex
	'logout' => 'sign/logout', // actionLogout
	// SiteController
	'index.php' => 'site/index', // actionIndex
	'' 					=> 'site/index', // actionIndex
);
