<?php
	/*$conexion=mysql_connect("localhost","root","123456");
	mysql_select_db("camara",$conexion);*/
	
	$conexion=mysql_connect("ext-db-1.shservers.com","envios_ucamara","ucamara");
	mysql_select_db("envios_camara",$conexion);
	//
	$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>C&aacute;mara de Comercio Italiana del Per&uacute;</title>
<meta name="description" content="..."/>
<meta name="keywords" content="..."/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<![endif]-->
<script language="javascript">
function filtro_cat(){
	document.frm_cat.submit();
}
function filtro_mes(){
	document.frm_mes.submit();
}
</script>
</head>
<body onload="
    $('#websites2').msDropDown();
	$('#websites2').hide();
    $('#websites3').msDropDown();
	$('#websites3').hide();
">
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
					<li><a href="datoseconomicos.html">Datos económicos</a></li>
					<li><a href="servicios.html">Servicios</a></li>
					<li><a href="ferias.php">Ferias</a></li>
					<li><a href="reddecamarasi_es.html">Red de cámaras</a></li>
					<li><a href="publicaciones.html">Publicaciones</a></li>
					<li><a href="eventos.html">Eventos</a></li>
					<li><a href="links_es.html">Links</a></li>
				</ul>
			</div>
		</div>
		<!-- left column end-->
		<div id="header">
			<div id="menu_up">
				<ul>
					<li class="menu2"><a href="quinessomos.html">¿Quiénes somos?</a></li>
					<li class="menu2 "><a href="come_asso_es.html">¿Por qué Asociarse?</a></li>
					<li class="menu3 "><a href="contattaci_es.html">Contactos</a></li>
               
				</ul>
			</div>
		</div>
		<!-- header end -->
		<div id="content_centro">
			<div class="infocont">
				<h1>Ferias</h1>
				<div style="float:left; width:auto; margin:0">
					<p>Por área:</p>
					<form id="frm_cat" name="frm_cat" method="post" action="ferias.php">
					<select name="websites2" id="websites2" onchange="filtro_cat()" style="width:380px;">
						<option value="00">[seleccionar]</option>
						<?php
						$sql_cat="select * from com_ferias_cat order by orden";
						$rs_cat=mysql_query($sql_cat);
						while($rw_cat=mysql_fetch_array($rs_cat)){
							if($rw_cat['id']==$_POST['websites2']){
								$select_cat="selected";
							}else{
								$select_cat="";
							}
							echo "<option value=\"".$rw_cat['id']."\" ".$select_cat.">".utf8_encode($rw_cat['nombre'])."</option>";
						}
						?>
					</select>
					</form>
				</div>
				<div style="float:left; width:auto; ">
					<p>Por mes:</p>
					<form id="frm_mes" name="frm_mes" method="post" action="ferias.php">
					<select name="websites3" id="websites3" onchange="filtro_mes()" style="margin-right:10px;">
						<option value="00">[seleccionar]</option>
						<?php
						foreach ($meses as $id => $mes){
							if($id==$_POST['websites3']){
								$select_mes="selected";
							}else{
								$select_mes="";
							}
							echo "<option value=\"".$id."\" ".$select_mes.">".$mes."</option>";
						} 
						?>
					</select>
					</form>
				</div>
			<!-- codigo -->
			<br /><br /><br /><br />
			<?php
			if($_POST){
				if($_POST['websites2']){
					$sql_feria="select * from com_ferias where categoria='".$_POST['websites2']."'";
				}elseif($_POST['websites3']){
					$sql_feria="select * from com_ferias where f_inicio like '2010-".$_POST['websites3']."-%'";
				}
				$rs_feria=mysql_query($sql_feria);
				while($rw_feria=mysql_fetch_array($rs_feria)){
					echo "<div style=\"float:left; width:100%; height:auto; padding-bottom:5px; border-bottom:solid 1px #C3C3C3;\">";
						echo "<div class=\"titular\" style=\"float:left; width:60%;\">".utf8_encode(strtoupper($rw_feria['nombre']))."</div>";
						echo utf8_encode("<div class=\"titular\" style=\"float:right; width:40%; font-size:11px; text-align:right;\">".substr($rw_feria['f_inicio'],-2,2)." ".$meses[substr($rw_feria['f_inicio'],-5,2)]."/".substr($rw_feria['f_fin'],-2,2)." ".$meses[substr($rw_feria['f_fin'],-5,2)]."</div>");
						echo "<div style=\"float:left; width:100%;\">".utf8_encode($rw_feria['descripcion'])."</div>";
						echo "<div style=\"float:left; width:100%;\">";
							echo "<b>Organizador:</b>";
							echo "<br />";
							//echo $rw_feria['organizador'];
							echo utf8_encode(str_replace("\n","<br />",$rw_feria['organizador']));
							if($rw_feria['email']){
								echo "<br />";
								echo "<a href=\"mailto:".$rw_feria['email']."\">".$rw_feria['email']."</a>";
							}
							if($rw_feria['web']){
								echo "<br />";
								echo "<a href=\"http://".$rw_feria['web']."\" target=\"_blank\">".$rw_feria['web']."</a>";
							}
						echo "</div>";
					echo "</div>";
				}
			}
			?>
			<div class="titular" style="display:none;">Abbigliamento</div>
			<div style="padding-bottom:5px; border-bottom:solid 2px #264B66; display:none;">
				<div class="titular" style="float:left;">77° PITTI IMMAGINE UOMO</div>
				<div class="titular" style="float:right;">12 enero / 15 enero</div>
				<div style="float:left; width:100%"></div>
				<br /><br /><br />
				<b>Organizador:</b>
				<br />
				PITTI IMMAGINE S.R.l.<br />
				Firenze<br />
				Tel. 055 3693210<br />
				Fax 055 3693200<br />
				<a href="mailto:dir.generale@pittimmagine.com">dir.generale@pittimmagine.com</a><br />
				<a href="http://www.pittimmagine.com" target="_blank">www.pittimmagine.com</a>
			</div>
			<!-- codigo -->
			</div>
			</p>
			<div id="logos"> <a href="#.html"> <img src="img/logos/logo_newhamp.png" border="0" /> </a> <a href="#.html"> <img src="img/logos/logo_njersey.png" border="0" /> </a> <a href="#.html"> <img src="img/logos/logo_arizona.png" border="0" /> </a> <a href="#.html"> <img src="img/logos/logo_exper.png" border="0" /> </a> <br />
				<br />
				<a href="#.html"> <img src="img/logos/logo_massac.png" border="0" /> </a> <a href="#.html"> <img src="img/logos/logo_ny.png" border="0" /> </a> <a href="#.html"> <img src="img/logos/logo_newmexico.png" border="0" /> </a> <a href="#.html"> <img src="img/logos/logo_texas.png" border="0" /> </a> <br />
				<br />
				<a href="#.html"> <img src="img/logos/logo_maine.png" border="0" /> </a> <a href="#.html"> <img src="img/logos/logo_vermont.png" border="0" /> </a> <a href="#.html"> <img src="img/logos/logo_indiana.png" border="0" /> </a> <a href="#.html"> <img src="img/logos/logo_kansas.png" border="0" /> </a> </div>
		</div>
		<!-- content_centro end -->
		<div id="right">
			<div id="idiomas"><a href="index.html"><img src="img/espanol.png" border="0" /></a>&nbsp; <a href="index_it.html"><img src="img/italiano.png" border="0" /></a> </div>
			<div id="secciones_dx">
				<div class="advs"><img src="img/ad.gif" width="180" height="149" /></div>
				<p class="title_dx"> <a href="#.html">Publicación</a> </p>
				<p class="p_dx_claro"> Tema central dirigido a la agroindustria, sector que en los últimos años ha experimentado un rápido crecimiento y generado fuertes expectativas.<br />
					<br />
					<a href="descargas/diciembre 09.pdf"><img src="img/download.png" border="0" /></a> </p>
			</div>
			<!-- seccion dx end -->
		</div>
		<!-- right column end -->
	</div>
	<!-- container end -->
	<div class="clear"></div>
	<div id="footer"> Av. 28 de Julio 1365 Miraflores - Lima 18 - Per&uacute; 
		
		Telefax: (00511) 445-4278 / 447-1785 - <a href="mailto:camerit@cameritpe.com">camerit@cameritpe.com</a>
		<p id="copy"> &copy; 2009 C&aacute;mara de Comercio Italiana del Per&uacute;. &nbsp; 
			
			All rights reserved<br />
			<a href="http://www.involucra.com" target="_blank"> Web Design Involucra </a><br />
		</p>
	</div>
	<!-- footer end -->
</div>
<!-- pre_container end -->
</body>
</html>
