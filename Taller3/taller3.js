function enviarDatos()
{
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function()
   {
      if (xhttp.readyState == 4 && xhttp.status == 200)
      {
         document.getElementById("facturacion").innerHTML = xhttp.responseText;
      }
   };
   xhttp.open("GET", "document.txt", true);
   xhttp.send();
}
