<?php 
 
namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
 
class PageController extends Controller 
{ 
 public function hello() { 
         return 'Selamat Datang'; 
 } 

 public function about () {
    return 'Nama: Sesy Tana Lina Rahmatin <br> NIM 2341720029';
 }

 public function articles($id){
    return 'Halaman Artikel dengan ID' . $id;

 }
}
