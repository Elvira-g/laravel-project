@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        </div>
        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form action="{{route('admin.users.update',['user'=>$user])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-8">
                    <h1 class="text-gray-800">{{$user->name}}</h1>
                    <div class="form-group">
                        <label for="title">Изменить роль</label>
                        <select class="form-control" name="is_admin" id="user">
                            <option>0</option>
                            <option>1</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </div>
            </form>

        </div>


    </div>
@endsection

