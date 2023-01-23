@extends('master')

@section('title', 'listado de usuarios')

@section('content')
<a href="/user/create" class="btn btn-primary">Crear Usuario</a>
    <h2>algo</h2>
    <table class="table">
        <thead>
            <th>
                #
            </th>
            <th>
                Nombre
            </th>
            <th>
                Password
            </th>
            <th>
                Acciones
            </th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->password}}</td>
                    <td>
                        <a href="/user/{{$user->id}}" class="btn btn-primary">show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</table>
@endsection