<?php

use App\Models\Administrator;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return redirect('posts');
})->middleware(['auth'])->name('dashboard');

Route::resource('posts','App\Http\Controllers\PostController');

Route::get('/email', function () {
    return \Auth::user()->id ;
    $allPosts = Post::allPosts();
    $administrator = Administrator::find(1);

    $datos_administrator = [
        'nombre_administrator' => $administrator->nombre,
        'email_administrador' => $administrator->email,
        'asunto' => 'Reporte Registros',
        'posts' => $allPosts
    ];

   return View::make('mails.reporte', $datos_administrator);
   //\Illuminate\Support\Facades\Mail::to($datos['email_usuario'])->send(new \App\Mail\MailRegister($datos));
});

require __DIR__.'/auth.php';
