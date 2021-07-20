<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('list') }}">取得項目一覧</a>
    <form method="POST" action="{{url('/')}}">
        {{ csrf_field() }}
        <label for="name">Name</label>
        <input type="text" size="15" name="name" id="name">

        <label for="hostname">Hostname</label>
        <input type="text" size="40" name="hostname" id="hostname">

        <label for="pathname">Pathname</label>
        <input type="text" size="40" name="pathname" id="pathname">

        <label for="selector">Selector</label>
        <input type="text" size="40" name="selector" id="selector">

        <input type="submit" value="登録">
    </form>
    <h1>登録済みページ</h1>

    <table border="1">
        <thead>
            <tr>
                <th width="10%">名前</th>
                <th width="5%">scraping_id</th>
                <th width="45%">URL</th>
                <th width="45%">セレクター</th>
            </tr>
        </thead>
        <tbody>
        @if ($scrapings ?? '')
            @foreach($scrapings as $scraping)
                <tr>
                    <td>{{ $scraping->code }}</td>
                    <td>{{ $scraping->id }}</td>
                    <td>{{ $scraping->url }}</td>
                    <td>{{ $scraping->selector }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>

    </table>

</body>
</html>
