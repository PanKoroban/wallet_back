<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GB Wallet</title>
</head>
<body>
<hr>
<h1>Категории</h1>
<table>
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Категория</th>
        <th scope="col">Дата добавления</th>
    </tr>
    </thead>
    <tbody>

    @forelse($categories as $category)

        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->created_at }}</td>
        </tr>

    @empty
        <tr>
            <td colspan="3">
                <h1>Надо заполнить БД Данными!</h1>
                <p>
                    * Сначала создай БД, у себя на локальном сервере. <br><br>
                    * Сделай миграцию таблицы <br> --- php artisan migrate <br><br>
                    * Сделай заполнение таблицы Faker | Seeder <br> --- php artisan db:seed <br>
                </p>
                <h4>Посл этих команд должны отобразиться данные с БД</h4>
            </td>
        </tr>
    @endforelse

    </tbody>
</table>
<hr>
<h1>Траты</h1>
<table>
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">ID Категорий</th>
        <th scope="col">Сумма Траты</th>
        <th scope="col">Дата добавления</th>
    </tr>
    </thead>
    <tbody>

    @foreach($spending as $spend)

        <tr>
            <td>{{ $spend->id }}</td>
            <td>{{ $spend->category_id }}</td>
            <td>{{ $spend->sum }}</td>
            <td>{{ $spend->created_at }}</td>
        </tr>

    @endforeach

    </tbody>
</table>
</body>
</html>
