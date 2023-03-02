<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="/posts/create"> Create New User</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row" style="margin-right: 0rem;margin-left: 5rem">
        <div class="row col-md-12 table-responsive">
            <table  class="table table-striped table-colored-bordered table-bordered-gray table-hover" id="list-users">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nombre</th>
                        <th>Cedula</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Pais</th>
                        <th>Direccion</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <thead>
                    <tr class="filter-column-tr">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $post->nombre }} {{$post->apellido}}</td>
                        <td>{{ $post->cedula }}</td>
                        <td>{{ $post->email }}</td>
                        <td>{{ $post->celular }}</td>
                        <td>{{ $post->pais }}</td>
                        <td>{{ $post->direccion }}</td>
                        <td>
                            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" style="color:#000">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {!! $posts->links() !!}


</x-app-layout>
