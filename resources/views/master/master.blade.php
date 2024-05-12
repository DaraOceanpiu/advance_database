<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BlockChain</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mainStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/boot.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css"
        integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
</head>
<style>
    body
    {
        background-color: aliceblue;
    }
    h1 {
        font-family: "Noto Sans Khmer", sans-serif;
    }

    p {
        font-family: "Noto Sans Khmer", sans-serif;
    }

    /* CSS for adjusting modal position on small screens */
    @media (max-width: 900px) {
        .modal {
            width: 100%;
            height: 90% !important;
        }
    }

    .con {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        height: 100%;
        float: left;

    }

    .child {
        margin-top: 100px !important;
        height: 711px;
        margin-left: 20%;
        float: left;
        width: 80%;
    }

    .side {
        flex-basis: 28%;
        height: 100%;
        float: left;
        position: fixed;
        top: 0;
        z-index: 4;
    }

    @media (max-width: 1410px) {
        .child {
            margin-left: 25%;
        }
    }

    @media (max-width: 1100px) {
        .side {

            display: none;
        }

        .child {
            margin-left: 0%;
            width: 100%;
        }
    }

    .blank {
        height: 10px;
    }

    button {
        min-width: 70px;
    }

    table tr {
        max-height: 175px;
    }

    table tr td {
        max-width: 200px;
    }

    #item-link {
        display: flex;
        justify-content: center;
        margin-top: 10px;
        /* Adjust the margin as needed */
    }

    #item-link a {
        display: inline-block;
        /* padding: 1px 2px;
    margin: 0 1px; */
        /* text-decoration: none;
    color: #555;
    border: 1px solid #ddd;
    border-radius: 4px; */
    }

    @media (max-width: 600px) {
        #item-link {
            flex-direction: column;
            align-items: center;
        }
    }

    #item-link svg {
        display: none;
        height: 0px;
        width: 0px;
    }

    #item-link p {
        padding-top: 10px;
    }
</style>

<body>
    <!-- navbar -->

    @include('master.header')
    <div class="con">
        <div class="side">@include('master.sidebar') </div>
        <div class="child"> @yield('content')</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
