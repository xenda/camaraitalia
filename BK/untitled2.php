<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script language="javascript"  type="text/javascript">
      $(document).ready(function() {
            //agregar una nueva columna con todo el texto
            //contenido en las columnas de la grilla
           // contains de Jquery es CaseSentive, por eso a minúscula

          $(".filtrar tr:has(td)").each(function() {
          var t = $(this).text().toLowerCase(); 
                    $("<td class='indexColumn'></td>")
                    .hide().text(t).appendTo(this);
                });

            //Agregar el comportamiento al texto (se selecciona por el ID)
            $("#texto").keyup(function() {
                var s = $(this).val().toLowerCase().split(" ");
                $(".filtrar tr:hidden").show();
                $.each(s, function() {
                     $(".filtrar tr:visible .indexColumn:not(:contains('"
                     + this + "'))").parent().hide();
                }); 
            });
			
			$("#texto2").bind("change", function()  {
			
				$("#tablas").css({'display':'block'});

 
                var s = $(this).val().toLowerCase().split(" ");
                $(".filtrar tr:hidden").show();
                $.each(s, function() {
                     $(".filtrar tr:visible .indexColumn:not(:contains('"
                     + this + "'))").parent().hide();
                }); 
            });			
			
			
			 
        });

</script> 



</head>

<body>
<input type="text" id="texto" name="texto"  />
<select name="texto2" id="texto2">
<option value="1111">1111</option>
<option value="44">44</option>
</select>
<table class="filtrar" style="display:none" id="tablas" >
<tr>
<td>col 1</td>
<td>col 2</td>
<td>col 3</td>
<td>col 4</td>
</tr>

<tr>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
</tr>

<tr>
<td>11</td>
<td>22</td>
<td>33</td>
<td>44</td>
</tr>

<tr>
<td>11</td>
<td>22</td>
<td>33</td>
<td>44</td>
</tr>

<tr>
<td>11</td>
<td>22</td>
<td>33</td>
<td>44</td>
</tr>

<tr>
<td>111</td>
<td>222</td>
<td>333</td>
<td>444</td>
</tr>

<tr>
<td>1111</td>
<td>2222</td>
<td>3333</td>
<td>4444</td>
</tr>
</table>

</body>
</html>
