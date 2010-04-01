<html>
<head>
   <title>Ajax Simple</title>
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>  
<script>
$(document).ready(function(){
   $("#enlaceajax").click(function(evento){
      evento.preventDefault();
      $("#cargando").css("display", "inline");
      $("#destino").load("http://www.gccmarketing.info/pagina-lenta.php", function(){
         $("#cargando").css("display", "none");
      });
   });
})
</script>
</head>

<body>
Esto es un Ajax con un mensaje de cargando...
<br>
<br>

<a href="#" id="enlaceajax">Haz clic!</a>
<div id="cargando" style="display:none; color: green;">Cargando...</div>
<br>
<div id="destino"></div>

</body>
</html> 