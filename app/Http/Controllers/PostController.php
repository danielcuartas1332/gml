<?php

namespace App\Http\Controllers;

use App\Mail\MailRegister;
use App\Mail\MailReporte;
use App\Models\Administrator;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('post.index',compact('posts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = url('https://restcountries.com/v3.1/region/america');
        $dataPaises = file_get_contents( $paises );
        $jsonPaises = json_decode($dataPaises, true);

        return view('post.create',compact('jsonPaises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required|unique:posts,cedula',
            'email' => 'required|unique:posts,email',
            'pais' => 'required',
            'direccion' => 'required',
            'celular' => 'required',
        ]);


        $data = Post::create($request->all());

        self::getEmails($data);

        return redirect()->route('posts.index')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $paises = url('https://restcountries.com/v3.1/region/america');
        $dataPaises = file_get_contents( $paises );
        $jsonPaises = json_decode($dataPaises, true);

        return view('post.edit',compact('post','jsonPaises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'email' => 'required',
            'pais' => 'required',
            'direccion' => 'required',
            'celular' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success','Post deleted successfully');
    }
    public function getEmails($data){

        $post = Post::where('cedula',$data->cedula)->first();

        $datos_register = [
            'nombre_usuario'   =>  $post->nombre . ' ' . $post->apellido,
            'email_usuario'    =>  $post->email,
            'asunto_usuario'   =>  'Registro',
            'post' => $post
        ];

        Mail::to($datos_register['email_usuario'])->send(new MailRegister($datos_register));

        $allPosts = Post::allPosts();
        $administrator = Administrator::find(\Auth::user()->id);

        $datos_administrator = [
            'nombre_administrator' => $administrator->nombre,
            'email_administrador' => $administrator->email,
            'asunto' => 'Reporte Registros',
            'posts' => $allPosts
        ];
        Mail::to($datos_administrator['email_administrador'])->send(new MailReporte($datos_administrator));
    }
}
