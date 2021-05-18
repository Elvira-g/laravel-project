@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список Пользователей</h1> &nbsp;
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif

        <div class="row">
            <table class="table table-bordered">
                <header>
                    <tr>
                        <th>#ID</th>
                        <th>Имя пользователя</th>
                        <th>E-Mail</th>
                        <th>Дата регистрации</th>
                        <th>Роль</th>
                        <th>Управление</th>
                    </tr>
                </header>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <th>{{$user->id}}</th>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>
                        <th>{{$user->created_at}}</th>
                        <th>{{$user->is_admin}}</th>
                        <th><a href="{{route('admin.users.edit',['user'=>$user])}}">edit</a> &nbsp; <a
                                href="">delete</a></th>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Записей нет</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>


    </div>
@endsection
