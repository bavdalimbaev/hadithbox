<?php
return array(
	'admin/book/edit/([0-9]+)' => 'adminBook/edit/$1',
	'admin/book' => 'adminBook/index',

	'admin/category/edit/([0-9]+)' => 'adminCategory/edit/$1',
	'admin/category' => 'adminCategory/index',

	'admin/hadith/view/([0-9]+)' => 'adminHadith/view/$1',
	'admin/hadith/edit/([0-9]+)' => 'adminHadith/edit/$1',
	'admin/hadith/add' => 'adminHadith/add',
	'admin/hadith' => 'adminHadith/index',

	'admin/lang/edit/([0-9]+)' => 'adminLang/edit/$1',
	'admin/lang' => 'adminLang/index',

	'admin/message/view/([0-9]+)' => 'adminMessage/view/$1',
	'admin/message' => 'adminMessage/index',

	'admin/source/edit/([0-9]+)' => 'adminSource/edit/$1',
	'admin/source' => 'adminSource/index',

	'admin/dashboard' => 'admin/index',

	'admin' => 'sign/index',
	'logout' => 'sign/logout',

	'index.php' => 'site/index',
	'' 					=> 'site/index',
);
