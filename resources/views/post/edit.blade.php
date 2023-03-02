@extends('post.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-right: 0;">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="nombre" onkeypress="return soloLetras(event)" class="form-control" value="{{$post->nombre}}" maxlength="100" minlength="5" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-right: 0;">
                    <div class="form-group">
                        <strong>Apellido:</strong>
                        <input type="text" name="apellido" onkeypress="return soloLetras(event)" class="form-control" value="{{$post->apellido}}" maxlength="100" placeholder="Apellido">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-right: 0;">
                    <div class="form-group">
                        <strong>Cédula:</strong>
                        <input type="text" name="cedula" class="form-control" value="{{$post->cedula}}" placeholder="Cédula">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-right: 0;">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" class="form-control" value="{{$post->email}}" maxlength="150" placeholder="Email">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-right: 0;">
                    <div class="form-group">
                        <strong>Celular:</strong>
                        <input type="text" name="celular" class="form-control" onkeypress="return soloNumero(event)" maxlength="10" value="{{$post->celular}}" placeholder="Celular">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-right: 0;">
                    <div class="form-group">
                        <strong>Pais:</strong>
                        <select id="pais" name="pais" class="form-control select2 required" data-allow-clear="true" data-placeholder="Seleccione un Pais...">
                            <option></option>
                            @foreach( $jsonPaises as $pais )
                                <option <?php echo ($post->pais == $pais['name']['common']) ? 'selected' : '' ?> value="{{$pais['name']['common']}}">{{$pais['name']['common']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-right: 0;">
                    <div class="form-group">
                        <strong>Direccion:</strong>
                        <input type="text" name="direccion" class="form-control" value="{{$post->direccion}}" maxlength="180" placeholder="Direccion">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>

    </form>
@endsection
@include('post/index_js')
