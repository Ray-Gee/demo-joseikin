<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('index') }}">登録済みページ</a>

    <h1>取得項目一覧</h1>

    <table border="1">
        <thead>
            <tr>
                <th>scraping_id</th>
                <th>件名</th>
                {{-- <th>URL</th> --}}
            </tr>
        </thead>
        <tbody>
        @if ($scrapings ?? '')
            @foreach($scrapings as $scraping)
                @foreach ($scraping->infos as $info)
                    <tr>
                        <td>{{ $scraping->id }}</td>
                        <td>{{ $info->content }}</td>
                    </tr>
                @endforeach
            @endforeach
        @endif
    </tbody>

    </table>


</body>
</html>
