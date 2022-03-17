<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CreateFC;
use App\Http\Controllers\ticketeController;
use App\Http\Controllers\CAddTarjeta;
use App\Http\Controllers\carritodecompraController;
use App\Http\Controllers\saldo_usuario_controller;
use App\Http\Controllers\controlador_comentario;
use App\Http\Controllers\controlador_respuesta_comentario;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

#variables globales:
$ticketes_reservados = 0;
$ticketes_menores = 0;


Route::get('/login', function () {
  return view('login');
});

Route::post('/login', function () {
});
Route::get('/home/profile', function () {
  /*
  $persona = App\Models\usuario::where('Login_Usuario', $nombre)->get();
  $Nombres = $persona[0]->Nombres;
  $Fecha_nacimiento = $persona[0]->Fecha_nacimiento;
  $Correo_electronico = $persona[0]->Correo_electrónico;
  $Contrasena = $persona[0]->Contrasena;
  return view('profile', ['usuarioLogueado' => $nombre, 'Nombres' => $Nombres, 'Fecha_nacimiento' => $Fecha_nacimiento, 'Correo_electronico' => $Correo_electronico, 'Contrasena' => $Contrasena]);
  */
});


Route::post('/home/profile', function () {
  $button = request('submit');
  if ($button == "perfil") {
    $nombre = request('usuarioLogueado');
    $persona = App\Models\usuario::where('Login_Usuario', $nombre)->get();
    $Nombres = $persona[0]->Nombres;
    $Fecha_nacimiento = $persona[0]->Fecha_nacimiento;
    $Correo_electronico = $persona[0]->Correo_electrónico;
    $Contrasena = $persona[0]->Contrasena;
    return view('profile', ['usuarioLogueado' => $nombre, 'Nombres' => $Nombres, 'Fecha_nacimiento' => $Fecha_nacimiento, 'Correo_electronico' => $Correo_electronico, 'Contrasena' => $Contrasena]);
  } else if ($button == "editar") {
    $name = request('name');
    $date = request('date');
    $mail = request('mail');
    $user = request('username');
    $password = request('pass');
    App\Models\usuario::where('Login_Usuario', $user)->update(['Nombres' => $name, 'Fecha_nacimiento' => $date, 'Correo_electrónico' => $mail, 'Contrasena' => $password]);
    return view('profile', ['usuarioLogueado' => $user, 'Nombres' => $name, 'Fecha_nacimiento' => $date, 'Correo_electronico' => $mail, 'Contrasena' => $password]);
  } else {
    $persona = App\Models\usuario::where('Login_Usuario', $nombre)->get();
    $Nombres = $persona[0]->Nombres;
    $Fecha_nacimiento = $persona[0]->Fecha_nacimiento;
    $Correo_electronico = $persona[0]->Correo_electrónico;
    $Contrasena = $persona[0]->Contrasena;
    return view('profile', ['usuarioLogueado' => $nombre, 'Nombres' => $Nombres, 'Fecha_nacimiento' => $Fecha_nacimiento, 'Correo_electronico' => $Correo_electronico, 'Contrasena' => $Contrasena]);
  }
});

Route::post('/home/chat', function () {
  $button = request('submit');
  $usuarioLogueado = request('nombre');
  if ($button == "crearChat") {
    $nuevoCometario = new controlador_comentario();
    $usuarioLogueado = request('usuarioLogueado');
    $titulo= request('titulo');
    $texto= request('texto');
    $nuevoCometario->crearComentario($usuarioLogueado,$titulo,$texto);
    $button='';
  }
  $comentarios = App\Models\comentario::all();
  $respuestas = App\Models\respuesta_comentario::all();
  return view('chatUser', ['usuarioLogueado' => $usuarioLogueado,'comentarios'=>$comentarios,'respuestas'=>$respuestas]);
});


Route::get('/registroAdmin', function () {
  return view('root');
});

Route::post('/registroAdmin', function () {
  $button = request('submit');
  if ($button == "registrar") {
    $usuarioRegistrado = new UsuarioController();
    $user = request('user');
    $id = request('id');
    $persona = App\Models\usuario::where('Login_Usuario', $user)->get();
    $idRegistrado = App\Models\usuario::where('Documento', $id)->get();
    if (count($persona) == 0 && count($idRegistrado) == 0) {
      $nombre = request('name');
      $lastnombre = request('lastname');
      $date = request('date');
      $mail = request('mail');
      $password = request('password');
      $genero = 'none';
      $rol=2;
      if ($_REQUEST['genero'] == "1") {
        $genero = 'Hombre';
      } else {
        $genero = 'Mujer';
      }
      $usuarioRegistrado->Registrar($nombre, $lastnombre, $date, $id, $mail, $user, $password, $genero,$rol);
      return redirect('/login');
    }else{
      echo 'el nombre de usuario o la cedula ya ha sido registrado';
    }

  } else {
    return redirect('/');
  }
});

Route::get('/registro', function () {
  return view('register');
});

Route::post('/registro', function () {
  $button = request('submit');
  if ($button == "registrar") {
    $usuarioRegistrado = new UsuarioController();
    $user = request('user');
    $id = request('id');
    $persona = App\Models\usuario::where('Login_Usuario', $user)->get();
    $idRegistrado = App\Models\usuario::where('Documento', $id)->get();
    if (count($persona) == 0 && count($idRegistrado) == 0) {
      $nombre = request('name');
      $lastnombre = request('lastname');
      $date = request('date');
      $mail = request('mail');
      $password = request('password');
      $genero = 'none';
      $rol=1;
      if ($_REQUEST['genero'] == "1") {
        $genero = 'Hombre';
      } else {
        $genero = 'Mujer';
      }
      $usuarioRegistrado->Registrar($nombre, $lastnombre, $date, $id, $mail, $user, $password, $genero,$rol);
      return redirect('/login');
    }else{
      echo 'el nombre de usuario o la cedula ya ha sido registrado';
    }

  } else {
    return redirect('/login');
  }
});

Route::get('/añadirCarrito/{usuario}/{id_vuelo}/{num_pasajeros}/{num_ticketes}', function ($usuario, $id_vuelo, $num_pasajeros,$num_ticketes) {
  $vuelos = App\Models\CreateF::all();
  if ($usuario != 'visitante') {
    foreach ($vuelos as $vuelo) {
      $id = $vuelo->id;
      $id_admin = $vuelo->id_admin;
      $lugar_de_salida = $vuelo->lugar_de_salida;
      $lugar_de_llegada = $vuelo->lugar_de_llegada;
      $fecha_de_salida = $vuelo->fecha_de_salida;
      $fecha_de_llegada = $vuelo->fecha_de_llegada;
      $hora_de_salida = $vuelo->hora_de_salida;
      $hora_de_llegada = $vuelo->hora_de_llegada;
      $tipo = $vuelo->tipo;
      $precio = $vuelo->precio;
      $precioP = $vuelo->precioP;
      $promocion = $vuelo->promocion;
      $num_pasajeros_turista = $vuelo->num_pasajeros_turista;
      $num_pasajeros_pre = $vuelo->num_pasajeros_pre;
      if ($id == $id_vuelo) {
        return view('addCarritoComprasA', [
          'usuarioLogueado' => $usuario, 'id_vuelo' => $id, 'id_admin' => $id_admin, 'lugar_de_salida' => $lugar_de_salida,
          'lugar_de_llegada' => $lugar_de_llegada, 'fecha_de_salida' => $fecha_de_salida, 'fecha_de_llegada' => $fecha_de_llegada, 'hora_de_salida' => $hora_de_salida,
          'hora_de_llegada' => $hora_de_llegada, 'tipo' => $tipo, 'precio' => $precio, 'precioP' => $precioP, 'num_pasajeros_turista' => $num_pasajeros_turista,
          'promocion' => $promocion
        ]);
      }
    }
  } else {
    return redirect('/login');
  }
});

Route::post('/añadirCarrito/{usuario}/{id_vuelo}/{num_pasajeros}/{num_ticketes}', function ($usuario, $id_vuelo, $num_pasajeros,$num_ticketes) {
  $button = request('botonaceptar');

  #todo esta parte se hace para saber a que carrito agregar el tickete
  #---------------------------------------------------------------------
  if ($button == "aceptar") {
    $carritosdecompra = App\Models\carritodecompra::where('Login_Usuario', $usuario)->get();
    if (count($carritosdecompra) == 0) {
      $nuevoCarrito = new carritodecompraController();
      $estado_carrito = 'no pago';
      $fechaActual = date('Y-m-d');
      $nuevoCarrito->crearCarrito($usuario, $estado_carrito, $fechaActual);
      $carritosdecompra = App\Models\carritodecompra::where('Login_Usuario', $usuario)->get();
    } else {
      $carritosdecompra = App\Models\carritodecompra::where('Login_Usuario', $usuario)->where('estado', 'no pago')->get();
      if (count($carritosdecompra) == 0) {
        $nuevoCarrito = new carritodecompraController();
        $estado_carrito = 'no pago';
        $fechaActual = date('Y-m-d');
        $nuevoCarrito->crearCarrito($usuario, $estado_carrito, $fechaActual);
        $carritosdecompra = App\Models\carritodecompra::where('Login_Usuario', $usuario)->where('estado', 'no pago')->get();
      }
    }
    #---------------------------------------------------------------------

    $num_ticketes_cargados = $num_pasajeros;
    $nuevaCompra = new ticketeController();
    $id_carrito = $carritosdecompra[0]->id;
    $creador = $usuario;
    if ($_REQUEST['tipo_id'] == "1") {
      $tipo_id = 'TI';
    } elseif ($_REQUEST['tipo_id'] == "2") {
      $tipo_id = 'CC';
    } else {
      $tipo_id = 'CE';
    }
    $id = request('document');
    $nombre = request('name');
    $apellido = request('lastname');
    $fecha_de_nacimiento = request('date');
    #---------------------------------------------------------------------------
    #esta parte se usa para determinar la edad de la persona que va a comprar el tickete
    $fecha_nacimiento = new DateTime($fecha_de_nacimiento);
    $hoy = new DateTime();
    $edad = $hoy->diff($fecha_nacimiento);
    #---------------------------------------------------------------------------
    if ($_REQUEST['genero'] == "1") {
      $genero = 'Hombre';
    } elseif ($_REQUEST['genero'] == "2") {
      $genero = 'Mujer';
    } else {
      $genero = 'Otro';
    }
    $telefono = request('tel');
    $correo_electronico = request('correo');
    $nombre_contacto = request('name_contacto');
    $telefono_contacto = request('tel_contacto');
    if (isset($_REQUEST['Clase'])) {
      if ($_REQUEST['Clase'] == "option1") {
        $clase = 'primeraClase';
      } else {
        $clase = 'Claseeconomica';
      }
    } else {
      $clase = 'Claseeconomica';
    }

    #---------------------------------------------------------------------------
    $datosVuelo = App\Models\CreateF::where('id', $id_vuelo)->get();
    $num_asiento_turista = $datosVuelo[0]->num_pasajeros_turista;
    $num_asiento_pre = $datosVuelo[0]->num_pasajeros_pre;
    if ($clase == 'primeraClase') {
      $numero_silla = mt_rand(1, $num_asiento_turista);
    } else {
      $numero_silla = mt_rand($num_asiento_turista + 1, $num_asiento_pre + $num_asiento_turista);
    }
    #-----------------------------------------------------------------------------
    $fechaActual = date('Y-m-d');
    global $ticketes_reservados; #esta variable se usa para saber cuantos ticketes se van a comprar

    if (ctype_alpha(str_replace(' ', '', $_REQUEST['name'])) && ctype_alpha(str_replace(' ', '', $_REQUEST['lastname']))
    && ctype_alpha(str_replace(' ', '', $_REQUEST['name_contacto']))){
      try{
        $carritosdecompra=App\Models\carritodecompra::where('Login_Usuario',$usuario)->where('estado','no pago' )->get();
        if (count($carritosdecompra)!=0){
          $id_carrito=$carritosdecompra[0]->id;
          $pasajeros=App\Models\tickete::where('documento',$id)->where('id_vuelo',$id_vuelo)->where('id_carrito',$id_carrito)->get();
            if (count($pasajeros)==0){
                if ($clase=='Claseeconomica'){
                  $precioVueloTur=($datosVuelo[0]->precio-($datosVuelo[0]->precio*($datosVuelo[0]->promocion/100)));
                  $nuevaCompra->reservarTickete($id_carrito,$id_vuelo,$creador,$tipo_id,$id,$nombre,$apellido,$fecha_de_nacimiento,$genero,$telefono,$correo_electronico,$nombre_contacto,$telefono_contacto,0,$precioVueloTur,$clase,$numero_silla,$fechaActual);
                }else{
                  $precioVueloPre=($datosVuelo[0]->precioP-($datosVuelo[0]->precioP*($datosVuelo[0]->promocion/100)));
                  $nuevaCompra->reservarTickete($id_carrito,$id_vuelo,$creador,$tipo_id,$id,$nombre,$apellido,$fecha_de_nacimiento,$genero,$telefono,$correo_electronico,$nombre_contacto,$telefono_contacto,0,$precioVueloPre,$clase,$numero_silla,$fechaActual);
                }
                if($edad->y<18 ){
                  if($num_pasajeros==$num_ticketes){
                    echo 'no puede viajar un menor de edad solo';
                    return redirect("/añadirCarrito/$usuario/$id_vuelo/$num_pasajeros/$num_ticketes");
                  }else{
                    $num_ticketes_cargados=$num_ticketes_cargados-1;
                  }
                }else{
                  $num_ticketes_cargados=$num_ticketes_cargados-1;
                }
                if ($num_ticketes_cargados>0){
                  return redirect("/añadirCarrito/$usuario/$id_vuelo/$num_ticketes_cargados/$num_ticketes");
                }else{
                  $vuelos=App\Models\CreateF::all();
                  return view('homeUser',['usuarioLogueado'=>$usuario,'vuelos'=>$vuelos]);
                }
              }else{
              echo 'el pasajero ya compro un tickete para ese vuelo';
              }
        }
      }catch (Exception $e){
        echo 'ha metido mal un dato';
      }
    } else {
      echo 'el nombre, apellido o el nombre de contacto tienen numeros';
    }
  }


});

Route::get('/cancelarTicket/{usuario}/{id_tickete}', function ($usuario, $id_tickete) {
  App\Models\tickete::where('creador', $usuario)->where('id', $id_tickete)->delete();
  #----------------------------------------------------------------------------------------------------------------------------------------------
  #vuelve a buscar el carrito no pago
  $vuelos = App\Models\CreateF::all();
  $carritosdecompra = App\Models\carritodecompra::where('Login_Usuario', $usuario)->where('estado', 'no pago')->get();
  if (count($carritosdecompra) != 0) {
    $id_carrito = $carritosdecompra[0]->id;
    $vuelos_usuario = array();
    foreach ($vuelos as $v) {
      $tickete = App\Models\tickete::where('id_vuelo', $v->id)->where('id_carrito', $id_carrito)->get();
      if (count($tickete) != 0) {
        $vuelos_usuario['lugar de salida: ' . $v->lugar_de_salida . "\n" . ' lugar de llegada: ' . $v->lugar_de_llegada . ' fecha de salida: ' . $v->fecha_de_salida . ' fecha de llegada: ' . $v->fecha_de_llegada] = $tickete;
      }
    }
    return view('pagarCarrito', ['vuelos' => $vuelos_usuario, 'usuario' => $usuario]);
  } else {
    $vuelos_usuario = array();
    return view('pagarCarrito', ['vuelos' => $vuelos_usuario, 'usuario' => $usuario]);
  }
  #----------------------------------------------------------------------------------------------------------------------------------------------
});

Route::get('/editarTicket/{usuario}/{id_tickete}', function ($usuario, $id_tickete) {
  $tickete = App\Models\tickete::where('id',$id_tickete)->get();
  $vuelo = App\Models\CreateF::where('id',$tickete[0]->id_vuelo)->get();
  $id = $vuelo[0]->id;
  $id_admin = $vuelo[0]->id_admin;
  $lugar_de_salida = $vuelo[0]->lugar_de_salida;
  $lugar_de_llegada = $vuelo[0]->lugar_de_llegada;
  $fecha_de_salida = $vuelo[0]->fecha_de_salida;
  $fecha_de_llegada = $vuelo[0]->fecha_de_llegada;
  $hora_de_salida = $vuelo[0]->hora_de_salida;
  $hora_de_llegada = $vuelo[0]->hora_de_llegada;
  $tipo = $vuelo[0]->tipo;
  $precio = $vuelo[0]->precio;
  $precioP = $vuelo[0]->precioP;
  $promocion = $vuelo[0]->promocion;
  $num_pasajeros_turista = $vuelo[0]->num_pasajeros_turista;
  $num_pasajeros_pre = $vuelo[0]->num_pasajeros_pre;
  return view('editarTicketCarritoCompra', [
    'usuarioLogueado' => $usuario, 'id_vuelo' => $id, 'id_admin' => $id_admin, 'lugar_de_salida' => $lugar_de_salida,
    'lugar_de_llegada' => $lugar_de_llegada, 'fecha_de_salida' => $fecha_de_salida, 'fecha_de_llegada' => $fecha_de_llegada, 'hora_de_salida' => $hora_de_salida,
    'hora_de_llegada' => $hora_de_llegada, 'tipo' => $tipo, 'precio' => $precio, 'precioP' => $precioP, 'num_pasajeros_turista' => $num_pasajeros_turista,
    'promocion' => $promocion,'tickete'=>$tickete
  ]);

});

Route::post('/editarTicket/{usuario}/{id_tickete}', function ($usuario, $id_tickete) {
  $button = request('submit');
  if ($_REQUEST['tipo_id'] == "1") {
    $tipo_id = 'TI';
  } elseif ($_REQUEST['tipo_id'] == "2") {
    $tipo_id = 'CC';
  } elseif ($_REQUEST['tipo_id'] == "3") {
    $tipo_id = 'CE';
  }else{
    $tipo_id=$_REQUEST['tipo_id'];
  }
  $document=$_REQUEST['document'];
  $name=$_REQUEST['name'];
  $lastname=$_REQUEST['lastname'];
  $date=$_REQUEST['date'];
  if ($_REQUEST['genero'] == "1") {
    $genero = 'Hombre';
  } elseif ($_REQUEST['genero'] == "2") {
    $genero = 'Mujer';
  } elseif ($_REQUEST['genero'] == "3") {
    $genero = 'Otro';
  }else{
    $genero=$_REQUEST['genero'];
  }
  $tel=$_REQUEST['tel'];
  $correo=$_REQUEST['correo'];
  $name_contacto=$_REQUEST['name_contacto'];
  $tel_contacto=$_REQUEST['tel_contacto'];
  App\Models\tickete::where('id',$id_tickete)->update(['tipo_id'=>$tipo_id,'documento'=>$document,'nombre'=>$name,
  'apellido'=>$lastname,'fecha_de_nacimiento'=>$date,'genero'=>$genero,'telefono'=>$tel,'correo_electronico'=>$correo,
  'nombre_de_contacto'=>$name_contacto,'telefono_de_contacto'=>$tel_contacto]);

  #----------------------------------------------------------------------------------------------------------------------------------------------
  #vuelve a buscar el carrito no pago
  $vuelos = App\Models\CreateF::all();
  $carritosdecompra = App\Models\carritodecompra::where('Login_Usuario', $usuario)->where('estado', 'no pago')->get();
  if (count($carritosdecompra) != 0) {
    $id_carrito = $carritosdecompra[0]->id;
    $vuelos_usuario = array();
    foreach ($vuelos as $v) {
      $tickete = App\Models\tickete::where('id_vuelo', $v->id)->where('id_carrito', $id_carrito)->get();
      if (count($tickete) != 0) {
        $vuelos_usuario['lugar de salida: ' . $v->lugar_de_salida . "\n" . ' lugar de llegada: ' . $v->lugar_de_llegada . ' fecha de salida: ' . $v->fecha_de_salida . ' fecha de llegada: ' . $v->fecha_de_llegada] = $tickete;
      }
    }
    return view('pagarCarrito', ['vuelos' => $vuelos_usuario, 'usuario' => $usuario]);
  } else {
    $vuelos_usuario = array();
    return view('pagarCarrito', ['vuelos' => $vuelos_usuario, 'usuario' => $usuario]);
  }
  #----------------------------------------------------------------------------------------------------------------------------------------------

});

Route::get('/pagarCarrito', function () {
});

Route::post('/pagarCarrito', function () {
  $button = request('submit');
  if ($button == "pagar") {
    $usuarioLogueado = request('usuarioLogueado');
    $carritosdecompra=App\Models\carritodecompra::where('Login_Usuario',$usuarioLogueado)->where('estado','no pago' )->get();
    $valor_carrito=0;
    if (count($carritosdecompra)!=0){
      $id_carrito=$carritosdecompra[0]->id;
      $ticketes=App\Models\tickete::where('creador',$usuarioLogueado)->where('id_carrito',$id_carrito)->get();
      foreach($ticketes as $t){
        $valor_carrito=$valor_carrito+$t->precio;
      }
    }
    $tarjetasUsuario = App\Models\saldo_usuario::where('login',$usuarioLogueado)->get();
    $tarjetas=array();
    foreach($tarjetasUsuario as $t){
      $tarjeta=App\Models\MAddTarjeta::where('id',$t->id_tarjeta)->get();
      if (count($tarjeta) !=0){
        $tarjetas[] =$tarjeta;
      }
    }
    return view('addTarjetaAdministrarSaldo', ['usuarioLogueado' => $usuarioLogueado, 'tarjetas' => $tarjetas, 'valor_carrito' => $valor_carrito]);
  } else if ($button == "carritoDeCompra") {
    $usuario = request('usuarioLogueado');
    $vuelos = App\Models\CreateF::all();
    $carritosdecompra = App\Models\carritodecompra::where('Login_Usuario', $usuario)->where('estado', 'no pago')->get();
    if (count($carritosdecompra) != 0) {
      $id_carrito = $carritosdecompra[0]->id;
      $vuelos_usuario = array();
      foreach ($vuelos as $v) {
        $tickete = App\Models\tickete::where('id_vuelo', $v->id)->where('id_carrito', $id_carrito)->get();
        if (count($tickete) != 0) {
          foreach ($tickete as $t) {
            $dia_siguiente = date('Y-m-d', strtotime($t->fecha_creacion .' +1 day'));
            $fechaActual = date('Y-m-d');
            if($dia_siguiente==$fechaActual){
              $t->delete();
            }
          }
          $vuelos_usuario['lugar de salida: ' . $v->lugar_de_salida . "\n" . ' lugar de llegada: ' . $v->lugar_de_llegada . ' fecha de salida: ' . $v->fecha_de_salida . ' fecha de llegada: ' . $v->fecha_de_llegada] = $tickete;
        }
      }
      return view('pagarCarrito', ['vuelos' => $vuelos_usuario, 'usuario' => $usuario]);
    } else {
      $vuelos_usuario = array();
      return view('pagarCarrito', ['vuelos' => $vuelos_usuario, 'usuario' => $usuario]);
    }
  }
});

Route::post('/checkIn', function () {
  $usuarioLogueado = request('nombre');
  $button = request('submit');
  $buttonCheckIN = request('checkIn');
  $buttonCancelar = request('cancelar');
  if($button=='Check_In'){
    $usuarioLogueado = request('nombre');
    $vuelos = App\Models\CreateF::all();
    $carritosdecompra = App\Models\carritodecompra::where('Login_Usuario', $usuarioLogueado)->where('estado', 'pago')->get();
    $vuelos_usuario = array();
    if (count($carritosdecompra) != 0) {
      foreach ($carritosdecompra as $c) {
        $id_carrito = $c->id;
        foreach ($vuelos as $v) {
          $tickete = App\Models\tickete::where('id_vuelo', $v->id)->where('id_carrito', $id_carrito)->get();
          if (count($tickete) != 0) {
            foreach ($tickete as $t) {
              $vuelos_usuario['id tickete: '.$t->id.' lugar de salida: ' . $v->lugar_de_salida . "\n" . ' lugar de llegada: ' . $v->lugar_de_llegada . ' fecha de salida: ' . $v->fecha_de_salida . ' fecha de llegada: ' . $v->fecha_de_llegada] = $t;
            }
          }
        }
      }
      return view('menuCheckIn', ['vuelos' => $vuelos_usuario, 'usuarioLogueado' => $usuarioLogueado]);
    } else {
      $vuelos_usuario = array();
      return view('menuCheckIn', ['vuelos' => $vuelos_usuario, 'usuarioLogueado' => $usuarioLogueado]);
    }
  }
  if($buttonCheckIN!=''){
    $ticketes = App\Models\tickete::all();
    $tickete = App\Models\tickete::where('id', $buttonCheckIN)->get();
    if (count($tickete) != 0) {
      $sillasReservadas=array();
      foreach ($ticketes as $t) {
        $sillasReservadas[]=$t->numero_silla;
      }
      $usuarioLogueado = request('usuarioLogueado');
      $vuelo=App\Models\CreateF::where('id', $tickete[0]->id_vuelo)->get();
      return view('checkin', ['usuarioLogueado' => $usuarioLogueado,'vuelo'=>$vuelo,'tickete'=>$tickete,'sillasReservadas'=>$sillasReservadas]);
    }
  }
  if($buttonCancelar!=''){

    App\Models\tickete::where('id', $buttonCancelar)->delete();

    $usuarioLogueado = request('usuarioLogueado');
    $vuelos = App\Models\CreateF::all();
    $carritosdecompra = App\Models\carritodecompra::where('Login_Usuario', $usuarioLogueado)->where('estado', 'pago')->get();
    $vuelos_usuario = array();
    if (count($carritosdecompra) != 0) {
      foreach ($carritosdecompra as $c) {
        $id_carrito = $c->id;
        foreach ($vuelos as $v) {
          $tickete = App\Models\tickete::where('id_vuelo', $v->id)->where('id_carrito', $id_carrito)->get();
          if (count($tickete) != 0) {
            foreach ($tickete as $t) {
              $vuelos_usuario['id tickete: '.$t->id.' lugar de salida: ' . $v->lugar_de_salida . "\n" . ' lugar de llegada: ' . $v->lugar_de_llegada . ' fecha de salida: ' . $v->fecha_de_salida . ' fecha de llegada: ' . $v->fecha_de_llegada] = $t;
            }
          }
        }
      }
      return view('menuCheckIn', ['vuelos' => $vuelos_usuario, 'usuarioLogueado' => $usuarioLogueado]);
    } else {
      $vuelos_usuario = array();
      return view('menuCheckIn', ['vuelos' => $vuelos_usuario, 'usuarioLogueado' => $usuarioLogueado]);
    }

    }
});

Route::post('/misViajes', function () {
  $usuarioLogueado = request('nombre');
  $button = request('submit');
  $buttonCancelar = request('cancelar');
  if($button=='Mis_Viajes'){
    $usuarioLogueado = request('nombre');
    $vuelos = App\Models\CreateF::all();
    $carritosdecompra = App\Models\carritodecompra::where('Login_Usuario', $usuarioLogueado)->where('estado', 'pago')->get();
    $vuelos_usuario = array();
    if (count($carritosdecompra) != 0) {
      foreach ($carritosdecompra as $c) {
        $id_carrito = $c->id;
        foreach ($vuelos as $v) {
          $tickete = App\Models\tickete::where('id_vuelo', $v->id)->where('id_carrito', $id_carrito)->get();
          if (count($tickete) != 0) {
            foreach ($tickete as $t) {
              $vuelos_usuario['id tickete: '.$t->id.' lugar de salida: ' . $v->lugar_de_salida . "\n" . ' lugar de llegada: ' . $v->lugar_de_llegada . ' fecha de salida: ' . $v->fecha_de_salida . ' fecha de llegada: ' . $v->fecha_de_llegada] = $t;
            }
          }
        }
      }
      return view('misViajes', ['vuelos' => $vuelos_usuario, 'usuarioLogueado' => $usuarioLogueado]);
    } else {
      $vuelos_usuario = array();
      return view('misViajes', ['vuelos' => $vuelos_usuario, 'usuarioLogueado' => $usuarioLogueado]);
    }
  }
  if($buttonCancelar!=''){
    App\Models\tickete::where('id', $buttonCancelar)->delete();

    $usuarioLogueado = request('usuarioLogueado');
    $vuelos = App\Models\CreateF::all();
    $carritosdecompra = App\Models\carritodecompra::where('Login_Usuario', $usuarioLogueado)->where('estado', 'pago')->get();
    $vuelos_usuario = array();
    if (count($carritosdecompra) != 0) {
      foreach ($carritosdecompra as $c) {
        $id_carrito = $c->id;
        foreach ($vuelos as $v) {
          $tickete = App\Models\tickete::where('id_vuelo', $v->id)->where('id_carrito', $id_carrito)->get();
          if (count($tickete) != 0) {
            foreach ($tickete as $t) {
              $vuelos_usuario['id tickete: '.$t->id.' lugar de salida: ' . $v->lugar_de_salida . "\n" . ' lugar de llegada: ' . $v->lugar_de_llegada . ' fecha de salida: ' . $v->fecha_de_salida . ' fecha de llegada: ' . $v->fecha_de_llegada] = $t;
            }
          }
        }
      }
      return view('misViajes', ['vuelos' => $vuelos_usuario, 'usuarioLogueado' => $usuarioLogueado]);
    } else {
      $vuelos_usuario = array();
      return view('misViajes', ['vuelos' => $vuelos_usuario, 'usuarioLogueado' => $usuarioLogueado]);
    }
  }
  });

Route::post('/cambiarSilla', function () {
  $usuarioLogueado = request('nombre');
  $button = request('submit');
  if($button=='aceptar'){
    try{
      $cambioSilla=$_REQUEST['asiento'];
      $PrimerNombre = request('PrimerNombre');
      $apellido = request('apellido');
      $correo = request('correo');
      $reserva = request('reserva');
      if ($cambioSilla!=-1){
        App\Models\tickete::where('id',$reserva)->update(['confirmacion'=>1]);
        App\Models\tickete::where('id',$reserva)->update(['numero_silla'=>$cambioSilla]);
      }else{
        App\Models\tickete::where('id',$reserva)->update(['confirmacion'=>1]);
      }

        $usuarioLogueado = request('nombre');
        $vuelos = App\Models\CreateF::all();
        $carritosdecompra = App\Models\carritodecompra::where('Login_Usuario', $usuarioLogueado)->where('estado', 'pago')->get();
        $vuelos_usuario = array();
        if (count($carritosdecompra) != 0) {
          foreach ($carritosdecompra as $c) {
            $id_carrito = $c->id;
            foreach ($vuelos as $v) {
              $tickete = App\Models\tickete::where('id_vuelo', $v->id)->where('id_carrito', $id_carrito)->get();
              if (count($tickete) != 0) {
                foreach ($tickete as $t) {
                  $vuelos_usuario['id tickete: '.$t->id.' lugar de salida: ' . $v->lugar_de_salida . "\n" . ' lugar de llegada: ' . $v->lugar_de_llegada . ' fecha de salida: ' . $v->fecha_de_salida . ' fecha de llegada: ' . $v->fecha_de_llegada] = $t;
                }
              }
            }
          }
          return view('menuCheckIn', ['vuelos' => $vuelos_usuario, 'usuarioLogueado' => $usuarioLogueado]);
        } else {
          $vuelos_usuario = array();
          return view('menuCheckIn', ['vuelos' => $vuelos_usuario, 'usuarioLogueado' => $usuarioLogueado]);
        }
      }catch (Exception $e){
        echo 'no señalo un asiento o no señalo la opcion de mantener asiento';
      }
  }else if($button=='cancelar'){
      $usuarioLogueado = request('nombre');
      $vuelos = App\Models\CreateF::all();
      $carritosdecompra = App\Models\carritodecompra::where('Login_Usuario', $usuarioLogueado)->where('estado', 'pago')->get();
      $vuelos_usuario = array();
      if (count($carritosdecompra) != 0) {
        foreach ($carritosdecompra as $c) {
          $id_carrito = $c->id;
          foreach ($vuelos as $v) {
            $tickete = App\Models\tickete::where('id_vuelo', $v->id)->where('id_carrito', $id_carrito)->get();
            if (count($tickete) != 0) {
              foreach ($tickete as $t) {
                $vuelos_usuario['id tickete: '.$t->id.' lugar de salida: ' . $v->lugar_de_salida . "\n" . ' lugar de llegada: ' . $v->lugar_de_llegada . ' fecha de salida: ' . $v->fecha_de_salida . ' fecha de llegada: ' . $v->fecha_de_llegada] = $t;
              }
            }
          }
        }
        return view('menuCheckIn', ['vuelos' => $vuelos_usuario, 'usuarioLogueado' => $usuarioLogueado]);
    }
  }
});



Route::post('/pagoRealizado', function () {
  $usuarioLogueado=request('nombre');
  $button=request('submit');
  if($button=="tarjeta"){
    $numTarjeta=request('numtarjeta');
    if ($numTarjeta!=0){
      $tarjetas = App\Models\MAddTarjeta::where('numero',$numTarjeta)->get();
        if (count($tarjetas)!=0){
          $carritosdecompra=App\Models\carritodecompra::where('Login_Usuario',$usuarioLogueado)->where('estado','no pago' )->get();
          if (count($carritosdecompra)!=0){
            $id_carrito=$carritosdecompra[0]->id;
            $ticketes=App\Models\tickete::where('creador',$usuarioLogueado)->where('id_carrito',$id_carrito)->get();
            $valor_carrito=0;
            foreach($ticketes as $t){
              $valor_carrito=$valor_carrito+$t->precio;
            }
            $nuevoSaldo=($tarjetas[0]->saldo)-$valor_carrito;
            if($nuevoSaldo>=0){
              App\Models\MAddTarjeta::where('numero',$numTarjeta)->update(['saldo'=>$nuevoSaldo]);
              $carritosdecompra=App\Models\carritodecompra::where('Login_Usuario',$usuarioLogueado)->where('estado','no pago' )->update(['estado'=>'pago']);
              #----------------------------------------------------------------------------------------------------------------------------------------------
              #vuelve a buscar el carrito no pago
              $vuelos=App\Models\CreateF::all();
              $carritosdecompra=App\Models\carritodecompra::where('Login_Usuario',$usuarioLogueado)->where('estado','no pago' )->get();
              if (count($carritosdecompra)!=0){
                $id_carrito=$carritosdecompra[0]->id;
                $vuelos_usuario=array();
                foreach($vuelos as $v){
                  $tickete=App\Models\tickete::where('id_vuelo',$v->id)->where('id_carrito',$id_carrito)->get();
                  if (count($tickete) !=0){
                    $vuelos_usuario['lugar de salida: '.$v->lugar_de_salida."\n".' lugar de llegada: '.$v->lugar_de_llegada.' fecha de salida: '.$v->fecha_de_salida.' fecha de llegada: '.$v->fecha_de_llegada] =$tickete;
                  }
                }
                return view('pagarCarrito',['vuelos'=> $vuelos_usuario,'usuario'=>$usuarioLogueado]);
              }else{
                $vuelos_usuario=array();
                return view('pagarCarrito',['vuelos'=> $vuelos_usuario,'usuario'=>$usuarioLogueado]);
              }

              #----------------------------------------------------------------------------------------------------------------------------------------------
            }else{
              echo 'fondos insuficientes';
            }
          }else{
            echo 'carrito de compras vacio';
          }
        }else{
          echo 'tarjeta no encontrada';
          echo $button;
        }
    }else{
      echo 'la tarjeta no puede tener numero 0';
    }
  }else{
    $tarjetas = App\Models\MAddTarjeta::where('numero',$button)->get();
    $carritosdecompra=App\Models\carritodecompra::where('Login_Usuario',$usuarioLogueado)->where('estado','no pago' )->get();
    if (count($carritosdecompra)!=0){
      $id_carrito=$carritosdecompra[0]->id;
      $ticketes=App\Models\tickete::where('creador',$usuarioLogueado)->where('id_carrito',$id_carrito)->get();
      $valor_carrito=0;
      foreach($ticketes as $t){
        $valor_carrito=$valor_carrito+$t->precio;
      }
      $nuevoSaldo=($tarjetas[0]->saldo)-$valor_carrito;
      if($nuevoSaldo>=0){
        App\Models\MAddTarjeta::where('numero',$button)->update(['saldo'=>$nuevoSaldo]);
        $carritosdecompra=App\Models\carritodecompra::where('Login_Usuario',$usuarioLogueado)->where('estado','no pago' )->update(['estado'=>'pago']);
        #----------------------------------------------------------------------------------------------------------------------------------------------
        #vuelve a buscar el carrito no pago
        $vuelos=App\Models\CreateF::all();
        $carritosdecompra=App\Models\carritodecompra::where('Login_Usuario',$usuarioLogueado)->where('estado','no pago' )->get();
        if (count($carritosdecompra)!=0){
          $id_carrito=$carritosdecompra[0]->id;
          $vuelos_usuario=array();
          foreach($vuelos as $v){
            $tickete=App\Models\tickete::where('id_vuelo',$v->id)->where('id_carrito',$id_carrito)->get();
            if (count($tickete) !=0){
              $vuelos_usuario['lugar de salida: '.$v->lugar_de_salida."\n".' lugar de llegada: '.$v->lugar_de_llegada.' fecha de salida: '.$v->fecha_de_salida.' fecha de llegada: '.$v->fecha_de_llegada] =$tickete;
            }
          }
          return view('pagarCarrito',['vuelos'=> $vuelos_usuario,'usuario'=>$usuarioLogueado]);
        }else{
          $vuelos_usuario=array();
          return view('pagarCarrito',['vuelos'=> $vuelos_usuario,'usuario'=>$usuarioLogueado]);
        }

        #----------------------------------------------------------------------------------------------------------------------------------------------
      }else{
        echo 'fondos insuficientes';
      }
    }else{
      echo 'carrito de compras vacio';
    }
  }
});


Route::post('/tarjetas', function () {
  $usuarioLogueado=request('nombre');
  $carritosdecompra=App\Models\carritodecompra::where('Login_Usuario',$usuarioLogueado)->where('estado','no pago' )->get();
  $valor_carrito=0;
  if (count($carritosdecompra)!=0){
    $id_carrito=$carritosdecompra[0]->id;
    $ticketes=App\Models\tickete::where('creador',$usuarioLogueado)->where('id_carrito',$id_carrito)->get();
    foreach($ticketes as $t){
      $valor_carrito=$valor_carrito+$t->precio;
    }
  }
  $tarjetasUsuario = App\Models\saldo_usuario::where('login',$usuarioLogueado)->get();
  $tarjetas=array();
  foreach($tarjetasUsuario as $t){
    $tarjeta=App\Models\MAddTarjeta::where('id',$t->id_tarjeta)->get();
    if (count($tarjeta) !=0){
      $tarjetas[] =$tarjeta;
    }
  }
  return view('addTarjetaAdministrarSaldo',['usuarioLogueado'=>$usuarioLogueado,'tarjetas'=>$tarjetas,'valor_carrito'=>$valor_carrito]);
});


Route::post('/eliminarTarjeta', function () {
  $usuarioLogueado=request('usuarioLogueado');
  $valor_carrito=0;
  $carritosdecompra=App\Models\carritodecompra::where('Login_Usuario',$usuarioLogueado)->where('estado','no pago' )->get();
  if (count($carritosdecompra)!=0){
    $id_carrito=$carritosdecompra[0]->id;
    $ticketes=App\Models\tickete::where('creador',$usuarioLogueado)->where('id_carrito',$id_carrito)->get();
    foreach($ticketes as $t){
      $valor_carrito=$valor_carrito+$t->precio;
    }
  }
  $tarjeta=request('submit');
  App\Models\MAddTarjeta::where('id',$tarjeta)->delete();
  $tarjetas = App\Models\MAddTarjeta::all();
  $vuelos = App\Models\CreateF::all();
  return view('homeUser',['usuarioLogueado'=>$usuarioLogueado,'vuelos'=>$vuelos]);
});

Route::post('/tarjetas/addtarjeta', function () {
  $button=request('submit');
  if ($button=="create"){
    $usuarioLogueado=request('nombre');
    $tarjetaRegistrada=new CAddTarjeta();
    $tipoTarjeta='none';
    if ($_REQUEST['cardType']=="1"){
      $tipoTarjeta='Debito';
    }else if($_REQUEST['cardType']=="2"){
      $tipoTarjeta='Credito';
    }
    $saldo=request('amount');
    $numero_tarjeta=request('numberCard');
    $tarjetaExistente = App\Models\MAddTarjeta::where('numero',$numero_tarjeta)->get();
    if (count($tarjetaExistente)==0){
      $banco=request('bank');
      $tarjetaRegistrada->Registrar($tipoTarjeta, $saldo,$numero_tarjeta,$banco);
      $tarjetas = App\Models\MAddTarjeta::all();
      $valor_carrito=0;
      $carritosdecompra=App\Models\carritodecompra::where('Login_Usuario',$usuarioLogueado)->where('estado','no pago' )->get();
      if (count($carritosdecompra)!=0){
        $id_carrito=$carritosdecompra[0]->id;
        $ticketes=App\Models\tickete::where('creador',$usuarioLogueado)->where('id_carrito',$id_carrito)->get();
        foreach($ticketes as $t){
          $valor_carrito=$valor_carrito+$t->precio;
        }
      }
      $idTarjeta = App\Models\MAddTarjeta::where('tipo',$tipoTarjeta)->where('banco',$banco)->where('numero',$numero_tarjeta)->where('saldo',$saldo)->get();
      $idTarjetaRegistrada=$idTarjeta[0]->id;
      $tarjetaUsuario=new saldo_usuario_controller();
      $tarjetaUsuario->guardarTarjeta($usuarioLogueado, $idTarjetaRegistrada);
      $vuelos = App\Models\CreateF::all();
      return view('homeUser',['usuarioLogueado'=>$usuarioLogueado,'vuelos'=>$vuelos]);
    }else{
      echo 'la tarjeta ya esta registrada...ingrese otro numero';
    }

  }
});

Route::post('/anadirSaldo', function () {
  $button=request('submit');
  $usuarioLogueado=request('nombre');
  if ($button=="anadir"){
    $tarjetaUsuario=App\Models\saldo_usuario::where('login',$usuarioLogueado)->get();
    if (count($tarjetaUsuario)!=0){
      foreach($tarjetaUsuario as $t){
        $saldoUsuario=App\Models\MAddTarjeta::where('numero','0')->where('id',$t->id_tarjeta)->get();
      }
      if (count($saldoUsuario)!=0){
        $nuevoSaldo=request('amount');
        $aumento=$saldoUsuario[0]->saldo+$nuevoSaldo;
        $saldoUsuario[0]->update(['saldo' =>$aumento]);
      }else{
        $tarjetaRegistrada=new CAddTarjeta();
        $tipoTarjeta='none';
        $saldo=request('amount');
        $numero_tarjeta=0;
        $banco='none';
        $tarjetaRegistrada->Registrar($tipoTarjeta, $saldo,$numero_tarjeta,$banco);
        $nuevaTarjetaUsuario=new saldo_usuario_controller();
        $idTarjeta = App\Models\MAddTarjeta::where('tipo',$tipoTarjeta)->where('banco',$banco)->where('numero',$numero_tarjeta)->where('saldo',$saldo)->get();
        $idTarjetaRegistrada=$idTarjeta[0]->id;
        $nuevaTarjetaUsuario->guardarTarjeta($usuarioLogueado, $idTarjetaRegistrada);
      }
    }else{
      $tarjetaRegistrada=new CAddTarjeta();
      $tipoTarjeta='none';
      $saldo=request('amount');
      $numero_tarjeta=0;
      $banco='none';
      $tarjetaRegistrada->Registrar($tipoTarjeta, $saldo,$numero_tarjeta,$banco);
      $nuevaTarjetaUsuario=new saldo_usuario_controller();
      $idTarjeta = App\Models\MAddTarjeta::where('tipo',$tipoTarjeta)->where('banco',$banco)->where('numero',$numero_tarjeta)->where('saldo',$saldo)->get();
      $idTarjetaRegistrada=$idTarjeta[0]->id;
      $nuevaTarjetaUsuario->guardarTarjeta($usuarioLogueado, $idTarjetaRegistrada);
    }
  }

    $tarjetasUsuario = App\Models\saldo_usuario::where('login',$usuarioLogueado)->get();
    $tarjetas=array();
    foreach($tarjetasUsuario as $t){
      $tarjeta=App\Models\MAddTarjeta::where('id',$t->id_tarjeta)->get();
      if (count($tarjeta) !=0){
        $tarjetas[] =$tarjeta;
      }
    }
    $carritosdecompra=App\Models\carritodecompra::where('Login_Usuario',$usuarioLogueado)->where('estado','no pago' )->get();
    $valor_carrito=0;
    if (count($carritosdecompra)!=0){
      $id_carrito=$carritosdecompra[0]->id;
      $ticketes=App\Models\tickete::where('creador',$usuarioLogueado)->where('id_carrito',$id_carrito)->get();
      foreach($ticketes as $t){
        $valor_carrito=$valor_carrito+$t->precio;
      }
    }
    return view('addTarjetaAdministrarSaldo',['usuarioLogueado'=>$usuarioLogueado,'tarjetas'=>$tarjetas,'valor_carrito'=>$valor_carrito]);
});

Route::post('/noticias', function () {
  $usuarioLogueado=request('nombre');
  $button=request('submit');
  if ($button=="Noticias"){
    $vuelos = App\Models\CreateF::all();
    return view('noticias', ['usuarioLogueado' => $usuarioLogueado, 'vuelos' => $vuelos]);
  }
});


Route::get('/', function () {
  return view('homeVisitor');
});

Route::post('/', function () {
  $button = request('submit');
  if ($button == "Buscar") {
    $vuelos = App\Models\CreateF::all();
    if ($_REQUEST['Origen'] == "1") {
      $Origen = 'pereira';
    } else if ($_REQUEST['Origen'] == "2") {
      $Origen = 'bogota';
    } else if ($_REQUEST['Origen'] == "3") {
      $Origen = 'cali';
    } else if ($_REQUEST['Origen'] == "4") {
      $Origen = 'medellin';
    } else if ($_REQUEST['Origen'] == "5") {
      $Origen = 'cartagena';
    }
    $date = request('date');
    if ($_REQUEST['Destino'] == "1") {
      $Destino = 'pereira';
    } else if ($_REQUEST['Destino'] == "2") {
      $Destino = 'bogota';
    } else if ($_REQUEST['Destino'] == "3") {
      $Destino = 'cali';
    } else if ($_REQUEST['Destino'] == "4") {
      $Destino = 'medellin';
    } else if ($_REQUEST['Destino'] == "5") {
      $Destino = 'cartagena';
    }
    $numer = request('numer');
    if (is_null($numer)) {
      echo 'no coloco la cantidad de ticketes';
    } else {
      global $ticketes_reservados;
      $ticketes_reservados = $numer;
      return view('fligthsVisit', [
        'vuelos' => $vuelos, 'Origen' => $Origen,
        'date' => $date, 'Destino' => $Destino, 'numer' => $numer
      ]); #falta
    }
  } else if ($button == "salir") {
    return view('homeVisitor');
  }
});



/*Route::get('/home', function () {

});
*/
Route::post('/vuelosAdmin', function () {
  $button = request('submit');
  $nombre = request('nombre');
  if ($button == "eliminar") {
    $idVuelo = request('idVuelo');
    App\Models\CreateF::where('id', $idVuelo)->delete();
    $vuelos = App\Models\CreateF::all();
    $ticketes=App\Models\tickete::all();
    return view('homeAdmin', ['usuarioLogueado' => $nombre,'vuelos' => $vuelos,'ticketes'=>$ticketes]);
  }
});
Route::get('/vuelosAdmin', function () {
  $nombre = request('nombre');
  $vuelos = App\Models\CreateF::all();
  $ticketes=App\Models\tickete::all();
  return view('homeAdmin', ['usuarioLogueado' => $nombre,'vuelos' => $vuelos,'ticketes'=>$ticketes]);
});
Route::post('/home', function () {
  $button = request('submit');
  $nombre = request('nom');
  $con = request('con');

  if ($button == "ingresar") {
    #-----------------------------------------------------------------------------------------------
    #se hace la validacion de los datos, para saber si esta registrado o no y si es usuario normal o admin
    $persona = App\Models\usuario::where('Login_Usuario', $nombre)->where('Contrasena', $con)->get();
    if (count($persona) != 0) {
      $rol = $persona[0]->rol;
      if ($rol == 1) {
        $vuelos = App\Models\CreateF::all();
        return view('homeUser', ['usuarioLogueado' => $nombre, 'vuelos' => $vuelos]);
      } if ($rol == 2) {
        $vuelos = App\Models\CreateF::all();
        $ticketes=App\Models\tickete::all();
        return view('homeAdmin', ['usuarioLogueado' => $nombre,'vuelos' => $vuelos,'ticketes'=>$ticketes]);
      } if ($rol == 3){
        return redirect('/registroAdmin');
      }
    } else {
      return redirect('/registro');
    }
    #---------------------------------------------------------------------------------------------
  } else if ($button == "Buscar") {
    $vuelos = App\Models\CreateF::all();
    if ($_REQUEST['Origen'] == "1") {
      $Origen = 'pereira';
    } else if ($_REQUEST['Origen'] == "2") {
      $Origen = 'bogota';
    } else if ($_REQUEST['Origen'] == "3") {
      $Origen = 'cali';
    } else if ($_REQUEST['Origen'] == "4") {
      $Origen = 'medellin';
    } else if ($_REQUEST['Origen'] == "5") {
      $Origen = 'cartagena';
    }
    $date = request('date');
    if ($_REQUEST['Destino'] == "1") {
      $Destino = 'pereira';
    } else if ($_REQUEST['Destino'] == "2") {
      $Destino = 'bogota';
    } else if ($_REQUEST['Destino'] == "3") {
      $Destino = 'cali';
    } else if ($_REQUEST['Destino'] == "4") {
      $Destino = 'medellin';
    } else if ($_REQUEST['Destino'] == "5") {
      $Destino = 'cartagena';
    }
    $numer = request('numer');
    if (is_null($numer)) {
      echo 'no coloco la cantidad de ticketes';
    } else {
      global $ticketes_reservados;
      $ticketes_reservados = $numer;
      return view('fligths', [
        'usuarioLogueado' => $nombre, 'vuelos' => $vuelos, 'Origen' => $Origen,
        'date' => $date, 'Destino' => $Destino, 'numer' => $numer
      ]); #falta
    }
  } else if ($button == "registrar") {
    return redirect('/registro');
  }
  else if ($button == "eliminar") {
    $nombre = request('nombre');
    $idVuelo = request('idVuelo');
    App\Models\CreateF::where('id', $idVuelo)->delete();
    $vuelos = App\Models\CreateF::all();
    $ticketes=App\Models\tickete::all();
    return view('homeAdmin', ['usuarioLogueado' => $nombre,'vuelos' => $vuelos,'ticketes'=>$ticketes]);
  }
});



Route::get('/home/buscar', function () {
  #return view('search');
});

Route::post('/home/buscar', function () {
  $button = request('submit');
  if ($button == "Buscar") {
    $vuelos = App\Models\CreateF::all();
    $usuarioLogueado = request('usuarioLogueado');
    if ($_REQUEST['Origen'] == "1") {
      $Origen = 'pereira';
    } else if ($_REQUEST['Origen'] == "2") {
      $Origen = 'bogota';
    } else if ($_REQUEST['Origen'] == "3") {
      $Origen = 'cali';
    } else if ($_REQUEST['Origen'] == "4") {
      $Origen = 'medellin';
    } else if ($_REQUEST['Origen'] == "5") {
      $Origen = 'cartagena';
    } else if ($_REQUEST['Origen'] == "6") {
      $Origen = 'madrid';
    } else if ($_REQUEST['Origen'] == "7") {
      $Origen = 'londres';
    } else if ($_REQUEST['Origen'] == "8") {
      $Origen = 'new york';
    } else if ($_REQUEST['Origen'] == "9") {
      $Origen = 'buenos aires';
    }
    $date = request('date');
    if ($_REQUEST['Destino'] == "1") {
      $Destino = 'pereira';
    } else if ($_REQUEST['Destino'] == "2") {
      $Destino = 'bogota';
    } else if ($_REQUEST['Destino'] == "3") {
      $Destino = 'cali';
    } else if ($_REQUEST['Destino'] == "4") {
      $Destino = 'medellin';
    } else if ($_REQUEST['Destino'] == "5") {
      $Destino = 'cartagena';
    } else if ($_REQUEST['Destino'] == "6") {
      $Destino = 'madrid';
    } else if ($_REQUEST['Destino'] == "7") {
      $Destino = 'londres';
    } else if ($_REQUEST['Destino'] == "8") {
      $Destino = 'new york';
    } else if ($_REQUEST['Destino'] == "9") {
      $Destino = 'buenos aires';
    }
    $numer = request('numer');
    if (is_null($numer)) {
      echo 'no coloco la cantidad de ticketes';
    } else {
      if($Origen!=$Destino){
        global $ticketes_reservados;
        $ticketes_reservados = $numer;
        return view('fligths', [
          'usuarioLogueado' => $usuarioLogueado, 'vuelos' => $vuelos, 'Origen' => $Origen,
          'date' => $date, 'Destino' => $Destino, 'numer' => $numer
        ]);
      }else{
        echo 'no puede buscar un vuelo que salga y llegue al mismo lugar';
      }
    }
  } else if ($button == "Buscar_Vuelos") {
    $usuario = request('nombre');
    return view('search', ['usuarioLogueado' => $usuario]);
  }
});

Route::post('/homeUsuarioLogueado', function () {
  $button = request('submit');
  $nombre = request('nombre');
  if ($button == "Aerolinea") {

    $vuelos = App\Models\CreateF::all();
    return view('homeUser', ['usuarioLogueado' => $nombre, 'vuelos' => $vuelos]);
  }
});
/*
Route::get('/home/{usuario}/vuelos', function ($usuario) {
  return view('fligths',['usuarioLogueado' => $usuario]);#falta
});
*/

Route::post('/homeAdminLogueado', function () {
  $button = request('submit');
  if ($button == "Aerolinea") {
    $nombre = request('nombre');
    $vuelos = App\Models\CreateF::all();
    $ticketes=App\Models\tickete::all();
    return view('homeAdmin', ['usuarioLogueado' => $nombre,'vuelos' => $vuelos,'ticketes'=>$ticketes]);
  }
});

Route::get('/admin/crear', function () {
  #return view('createFligth');
});
Route::get('/admin/editar/{nombre}/{idVuelo}', function ($nombre,$idVuelo){
  $vueloChoose = App\Models\CreateF::where('id', $idVuelo)->get();

  return view('editarVuelo', ['usuarioLogueado' => $nombre,'vuelo' => $vueloChoose]);
});
Route::post('/admin/editar/{nombre}/{idVuelo}', function ($nombre,$idVuelo){
  $button = request('submit');
  if ($button == "create") {
    $usuarioLogueado = request('nombre');
    $sale = 'none';
    if ($_REQUEST['Partida'] == "1") {
      $sale = 'pereira';
    } else if ($_REQUEST['Partida'] == "2") {
      $sale = 'bogota';
    } else if ($_REQUEST['Partida'] == "3") {
      $sale = 'medellin';
    } else if ($_REQUEST['Partida'] == "4") {
      $sale = 'cali';
    } else if ($_REQUEST['Partida'] == "5") {
      $sale = 'cartagena';
    } else if ($_REQUEST['Partida'] == "6") {
      $sale = 'madrid';
    } else if ($_REQUEST['Partida'] == "7") {
      $sale = 'londres';
    } else if ($_REQUEST['Partida'] == "8") {
      $sale = 'new york';
    } else if ($_REQUEST['Partida'] == "9") {
      $sale = 'buenos aires';
    }else{
      $sale=$_REQUEST['Partida'];
    }
    $date = request('date');
    $precio = request('precio');
    $precioP = request('precioP');
    $horasalida = request('departureH');
    $horallegada = request('arrivalH');
    $fechallegada = request('arrivalDate');
    $llega = 'none';
    if ($_REQUEST['Llegada'] == "1") {
      $llega = 'pereira';
    } else if ($_REQUEST['Llegada'] == "2") {
      $llega = 'bogota';
    } else if ($_REQUEST['Llegada'] == "3") {
      $llega = 'medellin';
    } else if ($_REQUEST['Llegada'] == "4") {
      $llega = 'cali';
    } else if ($_REQUEST['Llegada'] == "5") {
      $llega = 'cartagena';
    } else if ($_REQUEST['Llegada'] == "6") {
      $llega = 'madrid';
    } else if ($_REQUEST['Llegada'] == "7") {
      $llega = 'londres';
    } else if ($_REQUEST['Llegada'] == "8") {
      $llega = 'new york';
    } else if ($_REQUEST['Llegada'] == "9") {
      $llega = 'buenos aires';
    }else{
      $llega=$_REQUEST['Llegada'];
    }
    $Tipo = 'none';
    if ($_REQUEST['Tipo'] == "1") {
      $Tipo = 'Nacional';
    } else if ($_REQUEST['Tipo'] == "2") {
      $Tipo = 'Internacional';
    }else{
      $Tipo=$_REQUEST['Tipo'];
    }
    $pasajeros = request('pasajeros');
    $pasajerosPremium = request('pasajerosPremium');
    $promotion = request('promotion');
    if(is_null($promotion)){
      $promotion=0;
    }
    App\Models\CreateF::where('id', $idVuelo)->update(['lugar_de_salida' =>$sale,
    'fecha_de_salida' => $date,'precio' => $precio,'precioP' => $precioP,'promocion'=>$promotion,
    'lugar_de_llegada' => $llega,'num_pasajeros_turista' => $pasajeros,'num_pasajeros_pre' => $pasajerosPremium,
    'hora_de_salida' => $horasalida,'hora_de_llegada' => $horallegada,'fecha_de_llegada' => $fechallegada,
    'tipo' => $Tipo]);
    $vuelos = App\Models\CreateF::all();
    return redirect("/admin/editar/$nombre/$idVuelo");
  } else if ($button == "Crear_Vuelo") {
    $usuarioLogueado = request('nombre');
    return view('createFligth', ['usuarioLogueado' => $usuarioLogueado]);
  }
});

Route::post('/admin/crear', function () {
  $button = request('submit');
  if ($button == "create") {
    $vueloRegistrado = new CreateFC();
    $usuarioLogueado = request('nombre');
    $sale = 'none';
    if ($_REQUEST['Partida'] == "1") {
      $sale = 'pereira';
    } else if ($_REQUEST['Partida'] == "2") {
      $sale = 'bogota';
    } else if ($_REQUEST['Partida'] == "3") {
      $sale = 'medellin';
    } else if ($_REQUEST['Partida'] == "4") {
      $sale = 'cali';
    } else if ($_REQUEST['Partida'] == "5") {
      $sale = 'cartagena';
    } else if ($_REQUEST['Partida'] == "6") {
      $sale = 'madrid';
    } else if ($_REQUEST['Partida'] == "7") {
      $sale = 'londres';
    } else if ($_REQUEST['Partida'] == "8") {
      $sale = 'new york';
    } else if ($_REQUEST['Partida'] == "9") {
      $sale = 'buenos aires';
    }
    $date = request('date');
    $precio = request('precio');
    $precioP = request('precioP');
    $horasalida = request('departureH');
    $horallegada = request('arrivalH');
    $fechallegada = request('arrivalDate');
    $llega = 'none';
    if ($_REQUEST['Llegada'] == "1") {
      $llega = 'pereira';
    } else if ($_REQUEST['Llegada'] == "2") {
      $llega = 'bogota';
    } else if ($_REQUEST['Llegada'] == "3") {
      $llega = 'medellin';
    } else if ($_REQUEST['Llegada'] == "4") {
      $llega = 'cali';
    } else if ($_REQUEST['Llegada'] == "5") {
      $llega = 'cartagena';
    } else if ($_REQUEST['Llegada'] == "6") {
      $llega = 'madrid';
    } else if ($_REQUEST['Llegada'] == "7") {
      $llega = 'londres';
    } else if ($_REQUEST['Llegada'] == "8") {
      $llega = 'new york';
    } else if ($_REQUEST['Llegada'] == "9") {
      $llega = 'buenos aires';
    }
    $Tipo = 'none';
    if ($_REQUEST['Tipo'] == "1") {
      $Tipo = 'Nacional';
    } else if ($_REQUEST['Tipo'] == "2") {
      $Tipo = 'Internacional';
    }
    $pasajeros = request('pasajeros');
    $pasajerosPremium = request('pasajerosPremium');
    $promotion = request('promotion');
    $vueloRegistrado->Registrar($sale, $date, $precio, $precioP, $llega, $pasajeros, $pasajerosPremium, $promotion, $horasalida, $horallegada, $fechallegada, $Tipo);
    $vuelos = App\Models\CreateF::all();
    $usuarioLogueado = request('nombre');
    $ticketes=App\Models\tickete::all();
    return view('homeAdmin', ['usuarioLogueado' => $usuarioLogueado,'vuelos' => $vuelos,'ticketes'=>$ticketes]);
  } else if ($button == "Crear_Vuelo") {
    $usuarioLogueado = request('nombre');
    return view('createFligth', ['usuarioLogueado' => $usuarioLogueado]);
  }
  else if ($button == "eliminar") {
    $nombre = request('nombre');
    $idVuelo = request('idVuelo');
    App\Models\CreateF::where('id', $idVuelo)->delete();
    $vuelos = App\Models\CreateF::all();
    $ticketes=App\Models\tickete::all();
    return view('homeAdmin', ['usuarioLogueado' => $nombre,'vuelos' => $vuelos,'ticketes'=>$ticketes]);
  }
  else if ($button == "editarVuelo") {
    $nombre = request('nombre');
    $idVuelo = request('idVuelo');
    return redirect("/admin/editar/$nombre/$idVuelo");
  }
});

Route::post('/admin/chat', function () {
  $button = request('submit');
  $usuarioLogueado = request('nombre');
  if ($button == 'Chat') {
    $comentarios = App\Models\comentario::all();
    $respuestas = App\Models\respuesta_comentario::all();
    return view('chatAdmin', ['usuarioLogueado' => $usuarioLogueado,'comentarios'=>$comentarios,'respuestas'=>$respuestas]);
  }else if ($button != 'Chat') {
    $nuevoCometario = new controlador_respuesta_comentario();
    $usuarioLogueado = request('usuarioLogueado');
    $id_comentario= request("id_comentario_$button");
    $respuesta= request("respuesta_$button");
    $nuevoCometario->crearRespuesta($usuarioLogueado,$id_comentario,$respuesta);
    $comentarios = App\Models\comentario::all();
    $respuestas = App\Models\respuesta_comentario::all();
    return view('chatAdmin', ['usuarioLogueado' => $usuarioLogueado,'comentarios'=>$comentarios,'respuestas'=>$respuestas]);
  }

});
