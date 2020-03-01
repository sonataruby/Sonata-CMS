<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-02-16 20:49:31 --> Invalid argument supplied for foreach()
#0 /Volumes/DATA/github/ci4/admin/templates/settings/modules.php(19): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Invalid argumen...', '/Volumes/DATA/g...', 19, Array)
#1 /Volumes/DATA/github/ci4/system/View/View.php(236): include('/Volumes/DATA/g...')
#2 /Volumes/DATA/github/ci4/system/Common.php(176): CodeIgniter\View\View->render('settings/module...', Array, NULL)
#3 /Volumes/DATA/github/ci4/app/Controllers/AdminController.php(78): view('settings/module...', Array, Array)
#4 /Volumes/DATA/github/ci4/modules/Settings/Modules.php(23): App\Controllers\AdminController->layout('settings/module...')
#5 /Volumes/DATA/github/ci4/system/CodeIgniter.php(847): Modules\Settings\Modules->manager()
#6 /Volumes/DATA/github/ci4/system/CodeIgniter.php(338): CodeIgniter\CodeIgniter->runController(Object(Modules\Settings\Modules))
#7 /Volumes/DATA/github/ci4/system/CodeIgniter.php(246): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /Volumes/DATA/github/ci4/admin/index.php(57): CodeIgniter\CodeIgniter->run()
#9 {main}
