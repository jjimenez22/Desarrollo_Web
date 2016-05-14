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
            document.getElementById("facturacion").innerHTML = xhttp.responseText;
         }
      };
      xhttp.open("GET", "cargar.php", true);
      xhttp.send();
   }
}

function validarEntrada(input)
{
   var result=true;
   var span = limpiarSpans();

   if(input[0].value === '')
   {
      span[0].style = 'color:red';
      span[0].innerHTML = ' <= Debes llenar el campo con numeros!!';
      result = false;
   }
   if(input[1].value === '')
   {
      span[1].style = 'color:red';
      span[1].innerHTML = ' <= '+(result?'Debes llenar el campo con numeros!!':'Este tambien!!');
      result = false;
   }
   return result;
}

function limpiarSpans()
{
      spans = document.getElementsByTagName('span');
      spans[0].innerHTML='';
      spans[1].innerHTML='';
      return spans;
}
