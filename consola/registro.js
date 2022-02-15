$(document).ready(function(){
    
    var Totalparapagar=0;
    var Restando = 0;
    $( ".btn-info" ).click(function() {
      var idcliente = $(this).data('data');

        infodata={
              cte : idcliente,
              };
              $.ajax({    
              data:  infodata,      
              type: 'POST',                     
              url: 'asignarpiso.php',           
              success: function(result) {  
                    var resultado = JSON.parse(result);
                    if(resultado.result !="error"){
                      Swal.fire(
                        'Asignar Paleta: '+ resultado.paddle_number,
                        '',
                        'success'
                      ).then((result) => {
                        if (result.isConfirmed) {
                          document.location.reload();
                        }
                      })
                  
                }else{
                  alert(resultado.message)
                }
              }
              });

    });
    $(".btn-secondary").click(function(){
      setTimeout(function(){      document.location.reload(); }, 1000);
 
    })

    $(".btn-primary").click(function(){

      var display = document.getElementById("contain").style.display;

      if(display == "none"){
        document.getElementById("contain").style.display="initial";
      }else{
        document.getElementById("contain").style.display="none";
      }

      firstName = $('#firstName').val("");
      lastName = $('#lastName').val("");
      email = $('#email').val("");
      phoneNumber = $('#phoneNumber').val("");
      address1 = $('#address1').val("");
      address2 = $('#address2').val("");
      city = $('#city').val("");
      state = $('#state').val("");
      postalCode = $('#postalCode').val("");
      country = $('#country').val("");
      instituciones = $('#instituciones').val("");
      invito = $('#invito').val("");
 
    })
    


$(".btn-outline-success").click(function(){
    paletas = $('#paletaspiso').val();

    if(paletas == "" || paletas =='0'){
      paletas =0;
    }

    if(parseFloat(paletas) != 0){
      infodata={
            cantidadpaletas : paletas
              };
          $.ajax({    
          data:  infodata,      
          type: 'POST',                     
          url: 'modificarcantidadpaletas.php',           
          success: function(result) {  
          location.reload();
          }
          });
    }
})

$("#Limpiar").click(function(){
  $("#Search").val("");
  busqueda();
})
    $(".btn-script-register").click(function(){

        firstName = $('#firstName').val();
        lastName = $('#lastName').val();
        email = $('#email').val();
        phoneNumber = $('#phoneNumber').val();
        address1 = $('#address1').val();
        address2 = $('#address2').val();
        city = $('#city').val();
        state = $('#state').val();
        postalCode = $('#postalCode').val();
        country = $('#country').val();
        instituciones = $('#instituciones').val();
        invito = $('#invito').val();

        infodata={
              cuenta : email,
              Nombres : firstName,
              Apellidos:lastName,
              Correo :email,
              Celular:phoneNumber,
              Direccion:address1,
              Colonia:address2,
              Ciudad:city,
              Estado:state,
              Cp:postalCode,
              Pais:country,
              Apoyo:instituciones,
              Invito:invito
              };
              $.ajax({    
              data:  infodata,      
              type: 'POST',                     
              url: 'registrar.php', 
              timeout: 1000,          
              success: function(result) {  
                    var resultado = JSON.parse(result);
                    if(resultado.result !="error"){
                        $(".btn-warning").click();
                        var formdata = new FormData();
                        formdata.append("celular", resultado.f_telephone);
                        formdata.append("mensaje", "Bienvenido a subastas lovetohelp,  su usuario: ["+resultado.f_username+"]  contrasena: ["+resultado.f_real+"]  , puede consultar su informacion en subastas.maxilana.com, ¡Suerte!");

                        var requestOptions = {
                        method: 'POST',
                        body: formdata,
                        redirect: 'follow'
                        };
                        fetch("https://consola.maxilana.com/api/maxilanasms", requestOptions)
                        .then(response => response.text())
                        .then(result => mostrarmsj(resultado.paddle_number))
                        .catch(error => console.log('error', error));
                    }else{
                        alert(resultado.message)
                    }
              }
              });

    })

  });

    function mostrarmsj(paleta){
      Swal.fire(
        'Asignar Paleta: '+ paleta,
        '',
        'success'
      ).then((result) => {
        if (result.isConfirmed) {
          document.location.reload();
        }
      })
    }
            function formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }
    function ponerdecimales(numero)
      {
      if(numero.indexOf(".")==-1)  { numero += ".00" } else {
         if(numero.indexOf(".") == numero.length - 2) { numero += "0" }
      }
    return numero;
    } 
    
    function busqueda() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("Search");
      filter = input.value.toUpperCase();
      table = document.getElementById("tableUsuarios");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }

    function showUI(elem){

        $.blockUI({ 
          message: "Porfavor espere..",
          css: { 
          border: 'none', 
          padding: '15px', 
          backgroundColor: '#000', 
          '-webkit-border-radius': '10px', 
          '-moz-border-radius': '10px', 
          opacity: .5, 
          color: '#fff' 
      } }); 
      setTimeout(function(){    
         cargarInfo();
      }, 800);
          
  }
  function cargarInfo(){
    $.unblockUI(); 
    document.getElementById("livesearch").style.display="initial";
  }
  function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }