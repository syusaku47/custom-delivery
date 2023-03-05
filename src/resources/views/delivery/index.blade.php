<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Custom Delivery</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>
<div class="container">
    <h1>配送日指定システム</h1>
    <h2>下記から配送日希望日をご指定ください</h2>
    <div class="contents">
        <div class="left_item">
            <span>都道府県</span>
        </div>
        <div class="right_item">
            <select id="prefecture_list">
                @foreach($prefectures as $pref_id => $name)
                <option value="{{ $pref_id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="contents">
        <div class="left_item">
            <span>配送希望日</span>
        </div>
        <div class="right_item">
            <select>
                @foreach($prefectures as $pref_id => $name)
                <option value="{{ $pref_id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

    </div>
</div>

</body>
</html>
<script src="{{ mix('js/delivery_date.js') }}"></script>
