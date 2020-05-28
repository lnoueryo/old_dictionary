<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MemoApp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"
        integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous">
    </script>
</head>

<style>
    header {
        background-color: #000;
        background-position: 0px 50px;
        padding-left: 20px;
        font-size: large;
        width: 100%;
        height: 50px;
        clear: both;
        position: fixed;
        top: 0;
        margin-top: 0px;
        z-index: 1;
    }

    .title {
        position: absolute;
        top: 10px;
        color: #fff;
    }

    .container {
        margin-top: 70px;
    }
</style>

@yield('css')

<body>
    <header>
        <span class="title">MemoApp</span>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <script>
        jQuery(function($) {
                $('tbody tr[data-href]').addClass('clickable').click(function() {
                    window.location = $(this).attr('data-href');
                }).find('a').hover(function() {
                    $(this).parents('tr').unbind('click');
                }, function() {
                    $(this).parents('tr').click( function() {
                        window.location = $(this).attr('data-href');
                    });
                });
            });
    </script>
</body>

</html>
