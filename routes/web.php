<?php

use Illuminate\Support\Facades\Route; // Menggunakan facade Route untuk mendefinisikan rute
use App\Http\Controllers\ItemController; // Mengimpor ItemController agar bisa digunakan tanpa menuliskan namespacenya
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { // Rute untuk halaman utama ('/') yang menampilkan tampilan 'welcome'
    return view('welcome'); // Mengembalikan view 'welcome.blade.php'
});

Route::resource('items', ItemController::class); // Rute resource untuk 'items' yang secara otomatis mengatur rute CRUD 

Route::get('hello', [WelcomeController::class,'hello']);

Route::get('/world', function () { 
    return 'World'; 
    }); 

Route::get('/', function () { 
    return 'Selamat Datang'; 
    }); 
    
Route::get('/about', function () { 
    return 
    'Nim:2341720029 <br> Nama:Sesy Tana Lina Rahmatin'; 
    });
    // Route parameters
Route::get('/user/{Sesy}', function ($name) { 
    return 'Nama saya '.$name; 
    }); 

Route::get('/posts/{post}/comments/{comment}', function 
    ($postId, $commentId) { 
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId; 
    });

Route::get('/articles/{id}', function 
    ($Id) { 
    return 'Halaman Artikel dengan ID'.$Id; 
    });

    //optional parameters
Route::get('/user/{name?}', function ($name=null) { 
    return 'Nama saya '.$name; 
    });

Route::get('/user/{name?}', function ($name='John') { 
    return 'Nama saya '.$name; 
    });

// Route::get('/user/profile', function () { 
//     })->name('profile'); 
//     Route::get( 
//     '/user/profile', 
//     [UserProfileController::class, 'show'] 
//     )->name('profile'); 
//     // Generating URLs... 
//     $url = route('profile'); 
//     // Generating Redirects... 
//     return redirect()->route('profile'); 

//     // Route Group dan Route Prefixes 
//     Route::middleware(['first', 'second'])->group(function () { 
//         Route::get('/', function () { 
//             // Uses first & second middleware... 
//         }); 
     
//     Route::get('/user/profile', function () { 
//             // Uses first & second middleware... 
//         }); 
//     }); 
     
//     Route::domain('{account}.example.com')->group(function () { 
//         Route::get('user/{id}', function ($account, $id) { 
//             // 
//         }); 
//     }); 
     
//     Route::middleware('auth')->group(function () { 
//      Route::get('/user', [UserController::class, 'index']); 
//      Route::get('/post', [PostController::class, 'index']); 
//      Route::get('/event', [EventController::class, 'index']); 
      
//     });

//     // Route Prefixes
//     Route::prefix('admin')->group(function () { 
//         Route::get('/user', [UserController::class, 'index']); 
//         Route::get('/post', [PostController::class, 'index']); 
//         Route::get('/event', [EventController::class, 'index']); 
        
//        }); 

//     // Redirect Routes 
//     Route::redirect('/here', '/there'); 

//     // View Routes 
//     Route::view('/welcome', 'welcome'); 
//     Route::view('/welcome', 'welcome', ['name' => 'Taylor']); 

    Route::get('/', [HomeController::class, 'index']);
    Route::get('/about', [AboutController::class, 'about']);
    Route::get('/articles/{id}', [ArticleController::class, 'articles']);
    Route::resource('photos', PhotoController::class);

    Route::resource('photos', PhotoController::class)->only([ 
        'index', 'show' 
        ]); 
        Route::resource('photos', PhotoController::class)->except([ 
        'create', 'store', 'update', 'destroy' 
        ]); 

    Route::get('/greeting', [WelcomeController::class, 
    'greeting']);
