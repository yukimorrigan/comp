<?php 

return array (
	// Товар
	'product/([0-9]+)' => 'product/view/$1', //actionView в ProductController
	// Каталог
	'catalog' => 'catalog/index', // actionIndex в CatalogController
	// Категория товаров
	'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //actionCategory в CatalogController
	'category/([0-9]+)' => 'catalog/category/$1', // actionIndex в CatalogController
	// Поиск   
    'search/page-([0-9]+)' => 'search/index/$1',
    'search' => 'search/index', // actionIndex в SearchController
	// Корзина
	'cart/checkout' => 'cart/checkout', // actionAdd в CartController   
	'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController
	'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController
	'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAdd в CartController
	'cart' => 'cart/index', // actionIndex в CartController
	// Пользователь
	'user/register' => 'user/register',
	'user/login' => 'user/login',
	'user/logout' => 'user/logout',
	'cabinet/edit' => 'cabinet/edit',
	'cabinet/history' => 'cabinet/history',
	'cabinet' => 'cabinet/index',
	// Управление товарами:    
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
    // Управление категориями:    
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    // Управление заказами:    
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    // Управление свойствами аттрибутов
    'admin/filter/attribute-value/create' => 'adminAttributeValue/create',
    'admin/filter/attribute-value/update/([0-9]+)' => 'adminAttributeValue/update/$1',
    'admin/filter/attribute-value/delete/([0-9]+)' => 'adminAttributeValue/delete/$1',
    'admin/filter/attribute-value' => 'adminAttributeValue/index',
    // Управление аттрибутами:
    'admin/filter/attribute/create' => 'adminAttribute/create',
    'admin/filter/attribute/update/([0-9]+)' => 'adminAttribute/update/$1',
    'admin/filter/attribute/delete/([0-9]+)' => 'adminAttribute/delete/$1',
    'admin/filter/attribute' => 'adminAttribute/index',
    // Управление фильтрами
    'admin/filter' => 'adminFilter/index',
	// Админпанель:
    'admin' => 'admin/index',
	// О магазине
	'contacts' => 'site/contact',
	'about' => 'site/about',
	// Главная
	'index.php' => 'site/index', // actionIndex в SiteController 
	'' => 'site/index', // actionIndex в SiteController
);

 ?>