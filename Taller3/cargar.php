$con = new mysqli('localhost', 'root', '', 'articulos');
if($con->connect_error)
   die('error conectando a bd: '.$con->connect_error);
