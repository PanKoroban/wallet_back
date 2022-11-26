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
<h1>База данных - Backend(Laravel)</h1>
<hr>
<h2>Категории</h2>
<table>
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Категория</th>
        <th scope="col">img_name</th>
        <th scope="col">Дата_Добавления</th>
        <th scope="col">Дата_Обновления</th>
    </tr>
    </thead>
    <tbody>

    @forelse($categories as $category)

        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->img_name }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
        </tr>

    @empty
        <tr>
            <td colspan="3">
                <h1>Надо заполнить БД Данными!</h1>
                <p>
                    * Сначала создай БД, у себя на локальном сервере. <br><br>
                    * Если новая БД без данных. Сделай миграцию таблицы <br> --- php artisan migrate <br><br>
                    * Если БД уже существует. Сделай обновления, МиграциюFresh <br> --- php artisan migrate:fresh <br>
                </p>
                <h4>Посл этих команд должны отобразиться данные с БД</h4>
            </td>
        </tr>
    @endforelse

    </tbody>
</table>
<hr>
<h2>Траты</h2>
<table>
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Название_траты</th>
        <th scope="col">ID_Категорий</th>
        <th scope="col">Сумма_Траты</th>
        <th scope="col">Дата_Добавления</th>
        <th scope="col">Дата_Обновления</th>
        <th scope="col">Категория</th>
    </tr>
    </thead>
    <tbody>

    @foreach($spending as $spend)

        <tr>
            <td>{{ $spend->id }}</td>
            <td>{{ $spend->name }}</td>
            <td>{{ $spend->category_id}}</td>
            <td>{{ $spend->sum }}</td>
            <td>{{ $spend->created_at }}</td>
            <td>{{ $spend->updated_at }}</td>
            <td>{{ $spend->category->name }}</td>
        </tr>

    @endforeach

    </tbody>
</table>
<hr>
</body>
</html>
