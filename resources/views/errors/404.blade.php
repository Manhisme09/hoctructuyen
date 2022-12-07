<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="text-align: center;" class="page-404-content">
        <div class="ratio-1-1">
            <img class="img-fluid" src="{{ asset('images/404.png') }}">
        </div>
        <p>Thật tiếc trang của bạn yêu cầu không tồn tại.<br>Vui lòng thử một trang khác hoặc liên hệ trực tiếp với
            Manhh nhé!</p>
        <a style="font-weight: 700; color: black; font-size:25px" href="{{ route('home') }}">Trang chủ</a>
    </div>
</body>

</html>
