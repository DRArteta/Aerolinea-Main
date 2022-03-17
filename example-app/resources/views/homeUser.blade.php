<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/statics/css/homeUser.css">
    <script src="https://kit.fontawesome.com/4a8e5f3b5a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

    @include('navbarUser',['usuarioLogueado' => $usuarioLogueado ?? ''])
    <div class="tab-content">
        <div id="background">

        </div>
    </div>
    @include('searchFligth',['usuarioLogueado' => $usuarioLogueado ?? ''])
    @include('viewPromotions',['usuarioLogueado' => $usuarioLogueado ?? '','vuelos'=>$vuelos])

</body>

</html>