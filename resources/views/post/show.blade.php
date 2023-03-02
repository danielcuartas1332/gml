@extends('post.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Tarjeta de Usuario</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-right: 0;">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    {{ $post->nombre }} {{$post->apellido}}
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-right: 0;">
                <div class="form-group">
                    <strong>Cédula:</strong>
                    {{ $post->cedula }}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-right: 0;">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $post->email }}
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-right: 0;">
                <div class="form-group">
                    <strong>Celular:</strong>
                    {{ $post->celular }}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-right: 0;">
                <div class="form-group">
                    <strong>Pais:</strong>
                    {{ $post->pais }}
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-right: 0;">
                <div class="form-group">
                    <strong>Direccion:</strong>
                    {{ $post->direccion }}
                </div>
            </div>
        </div>
    </div>
@endsection
