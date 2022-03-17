<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Foro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4a8e5f3b5a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/statics/css/promotionsList.css" />
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
var vuelos=<?php echo $vuelos ?? ''; ?>;
var ticketes=<?php echo $ticketes ?? ''; ?>;
var usuario="<?php echo $usuarioLogueado ?? ''; ?>";
</script>
<script src="/statics/javascript/vuelosAdmin.js"></script>
<body>
    <hr />
    <div class="container" id="fligths">
        <h3>Vuelos <i class="fas fa-plane-departure"></i></h3>

    </div>
    <!--JS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
