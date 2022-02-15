var Tipo = '';
function searchKeyPress(e)
{
    // look for window.event in case event isn't passed in
    e = e || window.event;
    document.getElementById("costoEnvioPorTipo").value = '';
    document.getElementById("nuevoCostoPorTipo").value = '';
    document.getElementById("TipoArticulo").selectedIndex = "0";
    if (e.keyCode == 13)
    {
      consultarCostoUPC(document.getElementById("upc").value);

        return false;
    }
    return true;
}
function validarFoco(){
  consultarCostoUPC(document.getElementById("upc").value);
}
function consultarCostoUPC(upc){
  InformaciondeEnvio={
    id : upc,
  };
  $.ajax({
    data:  InformaciondeEnvio, //datos que se envian a traves de ajax
    url:   'consultarcostoenvioporupc.php', //archivo que recibe la peticion
    type:  'post', //método de envio
    beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
    },
    success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
      var Respuesta = JSON.parse(response);
      if(Respuesta[0].tipo != null){
        Tipo = Respuesta[0].tipo;
        var Nombre =Respuesta[0].nombre;
        var Marca =Respuesta[0].marca;
        if(Respuesta[0].costo == null){
         
            InformaciondeEnvio={
              id : Respuesta[0].tipo,
            };
            $.ajax({
              data:  InformaciondeEnvio, //datos que se envian a traves de ajax
              url:   'consultacostoenvioportipo.php', //archivo que recibe la peticion
              type:  'post', //método de envio
              beforeSend: function () {
                      $("#resultado").html("Procesando, espere por favor...");
              },
              success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                var Respuesta = JSON.parse(response);
                document.getElementById("CostoUpc").value = Respuesta;
                document.getElementById("descripcionupc").value = Nombre + Marca;
              },
              error: function (xhr, status, error) {
                alert(error.responseTextss);
              }
            });
        }else{
          if(Respuesta[0].activo == '1'){
            document.getElementById("CostoUpc").value = Respuesta[0].costo;
            document.getElementById("descripcionupc").value = Nombre + Marca ;
          }else{
            InformaciondeEnvio={
              id : Respuesta[0].tipo,
            };
            $.ajax({
              data:  InformaciondeEnvio, //datos que se envian a traves de ajax
              url:   'consultacostoenvioportipo.php', //archivo que recibe la peticion
              type:  'post', //método de envio
              beforeSend: function () {
                      $("#resultado").html("Procesando, espere por favor...");
              },
              success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                var Respuesta = JSON.parse(response);
                document.getElementById("CostoUpc").value = Respuesta;
                document.getElementById("descripcionupc").value = Nombre + Marca;
              },
              error: function (xhr, status, error) {
                alert(error.responseTextss);
              }
            });
          }

        }
  
      }else{
        document.getElementById("descripcionupc").value = '*ARTÍCULO NO ENCONTRADO*';
      }

    },
    error: function (xhr, status, error) {
      alert(error.responseTextss);
    }
  });
}
function CargarPantalla(){
    InformaciondeEnvio={
      id : '01',
    };
    $.ajax({
      data:  InformaciondeEnvio, //datos que se envian a traves de ajax
      url:   'consultarcostoenvio.php', //archivo que recibe la peticion
      type:  'post', //método de envio
      beforeSend: function () {
              $("#resultado").html("Procesando, espere por favor...");
      },
      success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        var Respuesta = JSON.parse(response);
        var content = '<table id="customers">';
        content = content+'<tr><th>Id</th><th>Descripción</th><th>Costo</th></tr>';
        for(var i = 0; i < Respuesta.length ;i++){
          content = content + '<tr><th>'+Respuesta[i].id+'<th>'+Respuesta[i].tipo+'</th><th>'+Respuesta[i].costo+'</th></tr>';
        }
        content = content +'</table>';
        document.getElementById("tabla").innerHTML = content;
      },
      error: function (xhr, status, error) {
        alert(error.responseTextss);
      }
    });
}
function grabarInformacion(){
 var CostoEnvio = document.getElementById("nuevoCosto").value;
 document.getElementById("cargando").style.visibility ='visible';
if(CostoEnvio != ''){
        InformaciondeEnvio={
          id : '2',
          costo: CostoEnvio.toString()
        };
        $.ajax({
          data:  InformaciondeEnvio, //datos que se envian a traves de ajax
          url:   'grabarcostoenvio.php', //archivo que recibe la peticion
          type:  'post', //método de envio
          beforeSend: function () {
                  $("#resultado").html("Procesando, espere por favor...");
          },
          success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var Respuesta = JSON.parse(response);
            document.getElementById("nuevoCosto").value = '';
            CargarPantalla();
            document.getElementById("cargando").style.visibility ='hidden';
          },
          error: function (xhr, status, error) {
            alert(error.responseTextss);
          }
        });
}else{
  document.getElementById("cargando").style.visibility ='hidden';
  document.getElementById("nuevoCosto").value = '';
}
}
function grabarInformacionJoyeria(){
  var CostoEnvio = document.getElementById("nuevoCostoJoyeria").value;
  document.getElementById("cargando").style.visibility ='visible';
 if(CostoEnvio != ''){
         InformaciondeEnvio={
           id : '1',
           costo: CostoEnvio.toString()
         };
         $.ajax({
           data:  InformaciondeEnvio, //datos que se envian a traves de ajax
           url:   'grabarcostoenvio.php', //archivo que recibe la peticion
           type:  'post', //método de envio
           beforeSend: function () {
                   $("#resultado").html("Procesando, espere por favor...");
           },
           success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
             var Respuesta = JSON.parse(response);
             document.getElementById("nuevoCostoJoyeria").value = '';
             CargarPantalla();
             document.getElementById("cargando").style.visibility ='hidden';
           },
           error: function (xhr, status, error) {
             alert(error.responseTextss);
           }
         });
     
  }else{
    document.getElementById("cargando").style.visibility ='hidden';
    document.getElementById("nuevoCosto").value = '';
  }
 }
function ConsultarPorTipo(event){
  document.getElementById("nuevoCostoUpc").value= '';
  document.getElementById("CostoUpc").value= '';
  document.getElementById("descripcionupc").value= '';
  document.getElementById("upc").value= '';

  document.getElementById("nuevoCostoPorTipo").value= '';
  document.getElementById("costoEnvioPorTipo").value= '';
  var e = event;
  var Tipo = e.value;
  InformaciondeEnvio={
    id : Tipo,
  };
  $.ajax({
    data:  InformaciondeEnvio, //datos que se envian a traves de ajax
    url:   'consultacostoenvioportipo.php', //archivo que recibe la peticion
    type:  'post', //método de envio
    beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
    },
    success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
      var Respuesta = JSON.parse(response);
      document.getElementById("costoEnvioPorTipo").value = Respuesta;
    },
    error: function (xhr, status, error) {
      alert(error.responseTextss);
    }
  });
 }
 function grabarInfoPorTipo(){
  document.getElementById("cargando").style.visibility ='visible';
  var Tipo = document.getElementById("TipoArticulo").value;
  var Costo = document.getElementById("costoEnvioPorTipo").value;
  var NuevoCosto = document.getElementById("nuevoCostoPorTipo").value;
  
  if(NuevoCosto != ''){
    if(parseFloat(Costo) != parseFloat(NuevoCosto)){
      InformaciondeEnvio={
        id : Tipo,
        costoanterior : Costo,
        costonuevo : NuevoCosto
      };
      $.ajax({
        data:  InformaciondeEnvio, //datos que se envian a traves de ajax
        url:   'grabarcostoportipo.php', //archivo que recibe la peticion
        type:  'post', //método de envio
        beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          var Respuesta = JSON.parse(response);
          document.getElementById("costoEnvioPorTipo").value = Respuesta;
          CargarPantalla();
          document.getElementById("nuevoCostoPorTipo").value = '';
          document.getElementById("cargando").style.visibility ='hidden';
          document.getElementById("nuevoCosto").value = '';
        },
        error: function (xhr, status, error) {
          alert(error.responseTextss);
        }
      });
    }
  }else{
    document.getElementById("cargando").style.visibility ='hidden';
    document.getElementById("nuevoCosto").value = '';
  }
 }
 function grabarInformacionUPC(){
  var upc = document.getElementById("upc").value;
  var Costo = document.getElementById("CostoUpc").value;
  var NuevoCosto = document.getElementById("nuevoCostoUpc").value;

  if(NuevoCosto != '' && upc != '' && Costo != ""){
    if(parseFloat(NuevoCosto) != parseFloat(Costo)){
      InformaciondeEnvio={
        id : upc,
        costo : NuevoCosto,
        activo : 1,
        tipo : Tipo
      };
      $.ajax({
        data:  InformaciondeEnvio, //datos que se envian a traves de ajax
        url:   'consultarcostoenvioporupc.php', //archivo que recibe la peticion
        type:  'post', //método de envio
        beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          var Respuesta = JSON.parse(response);
          if(Respuesta.activo == '1'){
            $.ajax({
              data:  InformaciondeEnvio, //datos que se envian a traves de ajax
              url:   'actualizarcostoporupc.php', //archivo que recibe la peticion
              type:  'post', //método de envio
              beforeSend: function () {
                      $("#resultado").html("Procesando, espere por favor...");
              },
              success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                var Respuesta = JSON.parse(response);
                document.getElementById("CostoUpc").value = Respuesta;
                document.getElementById("nuevoCostoUpc").value = '';
                document.getElementById("cargando").style.visibility ='hidden';
              },
              error: function (xhr, status, error) {
                alert(error.responseTextss);
              }
            });
          }else{
            $.ajax({
              data:  InformaciondeEnvio, //datos que se envian a traves de ajax
              url:   'grabarcostoporarticulo.php', //archivo que recibe la peticion
              type:  'post', //método de envio
              beforeSend: function () {
                      $("#resultado").html("Procesando, espere por favor...");
              },
              success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                var Respuesta = JSON.parse(response);
                document.getElementById("CostoUpc").value = Respuesta;
                document.getElementById("nuevoCostoUpc").value = '';
                document.getElementById("cargando").style.visibility ='hidden';
                document.getElementById("nuevoCosto").value = '';
              },
              error: function (xhr, status, error) {
                alert(error.responseTextss);
              }
            });
          }
 
        },
        error: function (xhr, status, error) {
          alert(error.responseTextss);
        }
      });
    }
  }

 }
