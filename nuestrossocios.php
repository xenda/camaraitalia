<?
include 'admin/func.php';
$listasec = get_sector();
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
<style type="text/css">
<!--
.titulo_empresa {
	font-size:14px;
}
.titulo_info_empresa {
	font-size:11px;
}
-->
</style>
<script language="javascript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.dd.js"></script>
<!--[if IE 6]>

			<script src="js/DD_belatedPNG_0.0.7a-min.js"></script>

			<script>

  				DD_belatedPNG.fix('img, div, h1 a, p, li');

			</script>

		<![endif]-->
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
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
				<h1>Nuestros Socios</h1>
				<p>Indice Sectorizado</p>
				<div class="selectioncontainer22">
					<p>Por sector:</p>
					<form name="form1" method="post">
						<select  name="websites3" id="websites3" style="width:205px; cursor: pointer;" onchange="location.href='nuestrossocios.php?websites3='+this.value">
							<option>[seleccionar]</option>
							<?
							foreach ($listasec as $ls1)
							{
								if ($_REQUEST["websites3"] == $ls1['id'])				
									echo "<option value='".$ls1['id']."' selected='selected'>".utf8_encode($ls1['v_sector'])."</option>";
								else
									echo "<option value='".$ls1['id']."'>".utf8_encode($ls1['v_sector'])."</option>";
							}
							?>
						</select>
					</form>
				</div>
				<div class="selectioncontainer223">
					<p>Por orden alfabetico:</p>
					<form name="form1" method="post">
						<select name="websites2" id="websites2" style="width:110px; cursor: pointer;" onchange="location.href='nuestrossocios.php?websites2='+this.value">
							<option>[seleccionar]</option>
							<?
							$arf = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","Y","X","Z");
							for ($i=0; $i<=count($arf)-1; $i++)
							{
								if ($_REQUEST["websites2"] == $arf[$i])
									echo '<option value="'.$arf[$i].'" selected="selected">'.$arf[$i].'</option>';
								else 
									echo '<option value="'.$arf[$i].'" >'.$arf[$i].'</option>';
				
							}
							?>
						</select>
					</form>
				</div>
				<?
				if (isset ($_REQUEST["websites3"]) && $_REQUEST["websites3"] != "0")
					$listasec = ls_soc_orsec($_REQUEST["websites3"]);
					
				if (isset ($_REQUEST["websites2"]) && $_REQUEST["websites2"] != "0")
					$listasec = ls_soc_liksec($_REQUEST["websites2"]);				
					
				foreach ($listasec as $lsec)
				{
				?>
                <!-- 
				<span class="titular clearer">
				<?=utf8_encode($lsec['v_sector']); ?>
				</span>
                -->
				<ul class="lista_3">
					<?
				$listasocid = ls_soc_idsec($lsec['id'], $_REQUEST["websites2"]);
				
				foreach ($listasocid as $lsid)
				{
				?>
					<li> <span class='titulo_empresa'>
						<?=utf8_encode($lsid['v_socio']); ?>
						</span><br />
						<span class='titulo_info_empresa'>
						<?=utf8_encode($lsid['v_detalle']); ?>
						</span> </li>
					<?
				}
				?>
				</ul>
				<br />
				<br />
				<br />
				<?
				}
					echo "<br /><p style='float:right'><a href='#'>subir ▲</a></p>";
				?>
			</div>
			</p>
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
