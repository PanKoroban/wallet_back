@extends('layouts.app')
@section('content')
    <div class="container">
        <h3 style="text-align: center">База данных - Backend(Laravel)</h3>
        {{-------------------------------------------------------------------------------------------------------------}}
        <hr>
        <h4>Пользователи - <span style="color: #00e2ff">users</span></h4>
        <table>
            <thead>
            <tr>
                <th style="padding-left: 10px">* id</th>
                <th style="padding-left: 10px">* name</th>
                <th style="padding-left: 10px">* email</th>
                <th style="padding-left: 10px">* created_at</th>
                <th style="padding-left: 10px; color: #dedede">* Hash(password)</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td style="padding-left: 25px">{{ $user->id }}</td>
                    <td style="padding-left: 25px">{{ $user->name }}</td>
                    <td style="padding-left: 25px">{{ $user->email }}</td>
                    <td style="padding-left: 25px">{{ $user->created_at }}</td>
                    <td style="padding-left: 25px; color: #dedede">{{ $user->password }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        <h1>Надо заполнить БД Данными!</h1>
                        <p>
                            * Сначала создай БД, у себя на локальном сервере. <br><br>
                            * Если новая БД без данных. Сделай миграцию таблицы <br> --- php artisan migrate <br><br>
                            * Если БД уже существует. Сделай обновления, МиграциюFresh <br> --- php artisan
                            migrate:fresh
                            <br>
                        </p>
                        <h4>Посл этих команд должны отобразиться данные с БД</h4>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{-------------------------------------------------------------------------------------------------------------}}
        <hr>
        <h4>Категории - <span style="color: red">categories</span></h4>
        <table>
            <thead>
            <tr>
                <th scope="col">* id</th>
                <th scope="col">* name</th>
                <th scope="col" style="color: blue">* img_id</th>
                <th scope="col">* created_at</th>
                <th scope="col">* updated_at</th>
                <th scope="col" style="color: blue; padding-left: 15px">* img_name</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td style="padding-left: 15px">{{ $category->name }}</td>
                    <td style="text-align: center">{{ $category->img_id }}</td>
                    <td style="text-align: center">{{ $category->created_at }}</td>
                    <td style="text-align: center">{{ $category->updated_at }}</td>
                    <td style="text-align: right">{{ $category->img->img_name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        <h1>Надо заполнить БД Данными!</h1>
                        <p>
                            * Сначала создай БД, у себя на локальном сервере. <br><br>
                            * Если новая БД без данных. Сделай миграцию таблицы <br> --- php artisan migrate <br><br>
                            * Если БД уже существует. Сделай обновления, МиграциюFresh <br> --- php artisan
                            migrate:fresh
                            <br>
                        </p>
                        <h4>Посл этих команд должны отобразиться данные с БД</h4>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{-------------------------------------------------------------------------------------------------------------}}
        <hr>
        <h4>Траты - spending </h4>
        <table>
            <thead>
            <tr>
                <th scope="col">* id</th>
                <th scope="col">* name</th>
                <th scope="col" style="color: red;">* category_id</th>
                <th scope="col" style="padding-left: 40px">* sum</th>
                <th scope="col">* created_at</th>
                <th scope="col" style="padding-left: 40px">* updated_at</th>
                <th scope="col" style="color: red; padding-left: 60px">* categories / name</th>
                <th scope="col" style="color: blue">* categories_img / img_name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($spending as $spend)
                <tr>
                    <td>{{ $spend->id }}</td>
                    <td style="padding-left: 15px">{{ $spend->name }}</td>
                    <td style="text-align: center">{{ $spend->category_id}}</td>
                    <td style="text-align: center; padding-left: 40px">{{ $spend->sum }}</td>
                    <td style="text-align: center; padding-left: 40px">{{ $spend->created_at }}</td>
                    <td style="text-align: center; padding-left: 40px">{{ $spend->updated_at }}</td>
                    <td style="padding-left: 90px">{{ $spend->categoryName}}</td>
                    <td style="padding-left: 25px">{{ $spend->categoryImg }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{-------------------------------------------------------------------------------------------------------------}}
        <hr>
        <h4>IMG Категории - <span style="color: blue">categories_img</span></h4>
        <table>
            <thead>
            <tr>
                <th scope="col"> * ID</th>
                <th scope="col"> * img_name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categoryImg as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td style="text-align: center">{{ $category->img_name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{-------------------------------------------------------------------------------------------------------------}}
        <hr>
        <br>
        <br>
        <hr>
    </div>
@endsection

