<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']        = "backEnd/BackEndController";
$route['dashboard']                 = "backEnd/BackEndController/dashboard";

$route['dosen']                     = "backEnd/DosenController";
$route['mahasiswa']                 = "backEnd/MahasiswaController";

$route['kuesioner']                	   = "backEnd/RefKuesionerController";
$route['kuesionerAdd']                 = "backEnd/RefKuesionerController/add";
$route['kuesionerUpdate/(:any)']       = "backEnd/RefKuesionerController/update/$1";
$route['kuesionerDelete/(:any)']       = "backEnd/RefKuesionerController/delete/$1";

$route['hasilkuesioner']                	= "backEnd/RefHasilKuesionerController";
$route['hasilkuesionerAdd']                 = "backEnd/RefHasilKuesionerController/add";
$route['hasilkuesionerUpdate/(:any)']       = "backEnd/RefHasilKuesionerController/update/$1";
$route['hasilkuesionerDelete/(:any)']       = "backEnd/RefHasilKuesionerController/delete/$1";

$route['mahasiswakuesioner']                	= "backEnd/RefMahasiswaKuesionerController";
$route['mahasiswakuesionerView/(:any)']       	= "backEnd/RefMahasiswaKuesionerController/View/$1";

$route['barang']                    = "backEnd/RefBarangController";
$route['barangAdd']                 = "backEnd/RefBarangController/add";
$route['barangtest']                = "backEnd/RefBarangController/test";
$route['barangUpdate/(:any)']       = "backEnd/RefBarangController/update/$1";
$route['barangDelete/(:any)']       = "backEnd/RefBarangController/delete/$1";
$route['barangView/(:any)']         = "backEnd/RefBarangController/view/$1";

$route['crud']                      = "backEnd/BackEndController/crud";
$route['add']                       = "backEnd/BackEndController/add";
$route['update/(:any)']             = "backEnd/BackEndController/update/$1";
$route['delete/(:any)']             = "backEnd/BackEndController/delete/$1";

$route['login']                     = "backEnd/BackEndController/login";
$route['logout']                    = "backEnd/BackEndController/logout";

$route['nilai']                     = "backEnd/NilaiController/nilai";
$route['add']                       = "backEnd/NilaiController/add";
$route['update/(:any)']             = "backEnd/NilaiController/update/$1";
$route['delete/(:any)']             = "backEnd/NilaiController/delete/$1";

$route['laporan']                   = "backEnd/LaporanController";

$route['laporan/(:any)']            = "backEnd/BackEndController/laporan/$1";


$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
