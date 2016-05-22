function enviarDatos()
{
   var input = document.getElementsByTagName("input");

   if (validarEntrada(input))
   {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function()
      {
         if (xhttp.readyState == 4 && xhttp.status == 200)
         {
            var responseDoc = xhttp.responseText;
            if (/\S/.test(responseDoc))
            {
               document.getElementById("facturacion").innerHTML = responseDoc;
            } else
            {
               codigoInvalido();
            }
         }
      };
      xhttp.open("GET", "cargar.php?code="+input[0].value+"&amount="+input[1].value, true);
      xhttp.send();
   }
}

function validarEntrada(input)
{
   var result=true;
   var span = limpiarSpans();

   if(input[0].value === '' || input[0].value <= 0)
   {
      span[0].style = 'color:blue';
      span[0].innerHTML = 'Debes llenar el campo con numeros positivos!!';
      result = false;
   } else
   {
      if(input[1].value === '' || input[1].value <= 0)
      {
         input[1].value=1;
      } else
      {
         if(input[1].value > 9)
         {
            span[1].style = 'color:green';
            span[1].innerHTML = ' Vaya! Cuántos articulos!';
         }
      }
   }
   return result;
}

function limpiarSpans()
{
      var spans = document.getElementsByTagName('span');
      spans[0].innerHTML='';
      spans[1].innerHTML='';
      return spans;
}

function codigoInvalido()
{
   var span = limpiarSpans();

   span[0].style = 'color:blue';
   span[0].innerHTML = ' Código inválido - pulsa ayuda para ver los productos y sus códigos';
}
