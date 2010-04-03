<?
include 'admin/func.php';
$lsds = ls_datosec();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>

		<title>C&aacute;mara de Comercio Italiana del Per&uacute;</title>

		<meta name="description" content="..."/>

		<meta name="keywords" content="..."/>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<meta name="Robots" content="NOINDEX" />

   		<link rel="stylesheet" type="text/css" href="cci_style.css" /> 

		<link rel="shortcut icon" href="img/fav.ico" />

        
<link rel="stylesheet" type="text/css" href="css/dd.css" />
<script language="javascript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.dd.js"></script>             



		

		<!--[if IE 6]>

			<script src="js/DD_belatedPNG_0.0.7a-min.js"></script>

			<script>

  				DD_belatedPNG.fix('img, div, h1 a, p, li');

			</script>

		<![endif]--></head>	

	<body onload="
    $('#websites3').msDropDown();
$(this).hide();
">

<script language="javascript"  type="text/javascript">
<!-- 
-->
</script> 
    	<div id="pre_container">
    	  <div id="container">
            <div id="left"> <br />
                <a href="index_it.html">
                <div id="logo">
                  <div id="logo_h1">
                    <h1>camara comercio</h1>
                  </div>
                </div>
              </a>
                <div id="menu_sx">
            	<ul>
<li class="first"><a href="bussinesop_es.html">Oportunidades de negocios</a></li>
<li><a href="nuestrossocios.php">Nuestros socios</a> </li>
<li><a href="datoseconomicos.php">Datos económicos</a></li>
<li><a href="servicios.html">Servicios</a></li>
<li><a href="ferias.html">Ferias</a></li>
<li><a href="#">Red de cámaras</a></li>
<li><a href="publicaciones.html">Publicaciones</a></li>
<li><a href="eventos.html">Eventos</a></li>
<li><a href="#">Links</a></li>
				</ul>
			</div>
            </div>
    	    <!-- left column end-->
    	    <div id="header">
              <div id="menu_up">
                <ul>
                  <li class="menu2"><a href="index.html">¿Quiénes somos?</a></li>
                  <li class="menu2 "><a href="come_asso_es.html">¿Por qué Asociarse?</a></li>
              <li class="menu3 "><a href="contattaci_es.html">Contactos</a></li>
                                 
                </ul>
              </div>
  	      </div>
    	    <!-- header end -->
            <div id="content_centro2">              
              <div class="infocont2">    
              <h1 class="titular">Datos Económicos</h1>           
              <p style="display:block; clear:both;"><br />

  <select name="websites3" id="websites3" style="width:350px; cursor: pointer;" onchange="location.href='datoseconomicos.php?websites3='+this.value">
		<?php
			foreach ($lsds as $r1)  			
			{
				if ($_REQUEST["websites3"] == $r1["id"])
					echo '<option value="'.$r1["id"].'" selected="selected">'.utf8_encode($r1["v_pais"]).'</option>';
				else
					echo '<option value="'.$r1["id"].'">'.utf8_encode($r1["v_pais"]).'</option>';
			}		
		?>  
  </select><br /><br />

</p>  

<?
if (isset ($_REQUEST["websites3"]) && $_REQUEST["websites3"] != "0")
	$lsds = ls_datosec2($_REQUEST["websites3"]);

foreach ($lsds as $r)                
{
?>
    <h1><?=utf8_encode($r["v_pais"]); ?></h1>
<?
	echo utf8_encode($r["v_detalle"]);
	echo "<br /><p style='float:right'><a href='#'>subir ▲</a></p>";
}
?>
                    
              </div>
            </div>
    	    <!-- content_centro end -->
    	    <!-- right column end -->
          </div>
    	  <!-- container end -->
<div class="clear"></div>

	

		<div id="footer">

			Av. 28 de Julio 1365 Miraflores - Lima 18 - Per&uacute; 

            Telefax: (00511) 445-4278 / 447-1785 - 

            <a href="mailto:camerit@cameritpe.com">camerit@cameritpe.com</a>

			             

			<p id="copy">

				&copy; 2009 C&aacute;mara de Comercio Italiana del Per&uacute;. &nbsp; 

                All rights reserved<br />

 				

				<a href="http://www.involucra.com" target="_blank">

					Web Design Involucra				</a><br />
    		</p>
		</div> <!-- footer end -->
	</div> 
   	<!-- pre_container end -->



	</body>

</html>

