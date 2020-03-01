<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-02-15 13:36:39 --> Call to undefined function Wingets()
#0 /Volumes/DATA/github/ci4/system/View/View.php(236): include()
#1 /Volumes/DATA/github/ci4/system/Common.php(176): CodeIgniter\View\View->render('layout', Array, NULL)
#2 /Volumes/DATA/github/ci4/app/Controllers/AdminController.php(81): view('layout', Array, Array)
#3 /Volumes/DATA/github/ci4/modules/Pages/Manager.php(103): App\Controllers\AdminController->layout('pages/create', Array)
#4 /Volumes/DATA/github/ci4/system/CodeIgniter.php(847): Modules\Pages\Manager->create('1')
#5 /Volumes/DATA/github/ci4/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(Modules\Pages\Manager))
#6 /Volumes/DATA/github/ci4/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /Volumes/DATA/github/ci4/admin/index.php(57): CodeIgniter\CodeIgniter->run()
#8 {main}
