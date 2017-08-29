<? 
   include("scripts/class_conn.php");
   include("scripts/fx.php");
   include("scripts/path.php");
   session_start();
   if ($_REQUEST["@Mercado"] == ""){
     $_SESSION["@Mercado"] = 1;
   }else{
     $_SESSION["@Mercado"] = 2;
   }
   if($_REQUEST["wVarIdioma"] == ""){
     $_SESSION["@IDIOMA_ID"] = 1;
   }else{
     $_SESSION["@IDIOMA_ID"] = $_REQUEST["wVarIdioma"];
   }
   if($_SESSION["@Title"] == ""){
     $_SESSION["@Title"] == ":: Eves ";
   }
   if($_SESSION['popup'] == ""){
     $_SESSION['popup'] = 1;
   }
   //if($_SESSION["@IDIOMA_ID"] == '' and $_SESSION["@Title"] == ''){
     //header("Location: config_page.php");  
   //}
   
   $wVarMain = 1;
   
   $db = new MySQL();
   
   $KEY_PAIS          = GetKey($db,11 ,$_SESSION["@IDIOMA_ID"]);
   $KEY_DEST          = GetKey($db,12 ,$_SESSION["@IDIOMA_ID"]);
   $KEY_AEREO         = GetKey($db,119,$_SESSION["@IDIOMA_ID"]);
   $KEY_HTL           = GetKey($db,13 ,$_SESSION["@IDIOMA_ID"]);
   $KEY_TRANS         = GetKey($db,59 ,$_SESSION["@IDIOMA_ID"]);
   $KEY_DESDE         = GetKey($db,16 ,$_SESSION["@IDIOMA_ID"]);
   $KEY_HASTA         = GetKey($db,17 ,$_SESSION["@IDIOMA_ID"]);
   $KEY_SEARCH        = GetKey($db,43 ,$_SESSION["@IDIOMA_ID"]);
   $KEY_VALIDATE_1    = GetKey($db,98 ,$_SESSION["@IDIOMA_ID"]);
   $KEY_VALIDATE_2    = GetKey($db,99 ,$_SESSION["@IDIOMA_ID"]);
   $KEY_VALIDATE_3    = GetKey($db,100,$_SESSION["@IDIOMA_ID"]);
   $KEY_VALIDATE_4    = GetKey($db,101,$_SESSION["@IDIOMA_ID"]);
   $KEY_VALIDATE_5    = GetKey($db,102,$_SESSION["@IDIOMA_ID"]);
   $KEY_VALIDATE_6    = GetKey($db,103,$_SESSION["@IDIOMA_ID"]);
   
   //if($_SERVER['REMOTE_ADDR'] == $IP_CLICK){
   //  $_SESSION['popup'] = true;
   //  if(!isset($_SESSION['popup'])){
   //    $POP_UP_HTML     = $db->TraerDatosSQL("SELECT Paginas_HTML FROM Paginas WHERE Paginas_Titulo = 'PopUp' AND Paginas_Ubicacion_ID = 3","Paginas_HTML");
   //  }
   //  else{
   //    $POP_UP_HTML = '';
   //  }
   //}else{
   if($_SESSION['popup'] == 1){
       $POP_UP_HTML     = $db->TraerDatosSQL("SELECT Paginas_HTML FROM Paginas WHERE Paginas_Titulo = 'PopUp' AND Paginas_Ubicacion_ID = 3","Paginas_HTML");
   }
   $_SESSION['popup'] = 2;
   //}
   if($_SESSION["@CLIENTE_ID"] == 429 or $_SESSION["@CLIENTE_ID"] == ""){
   ?>
<!doctype html>
<html>
   <head>
      <title><? echo $_SESSION["@Title"]?></title>
        <meta property="fb:app_id" content="177508899382293">
     <meta property="og:title" content="Eves Turismo" />
     <meta property="og:type" content="article">
     <meta property="og:description" content="EVES Turismo - Programas turisticos de Argentina - Brasil - Cruceros - Destinos Ex&oacute;ticos - Europa - Latinoamerica - M&eacute;xico & Caribe - USA & Canad&aacute;">
     <meta property="og:url" content="http://www.eves.com" />
     <meta property="og:image" content="img/eves.png"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="eves">
      <meta name="keywords" content="eves">
      <meta name="Language" content="Spanish">
      <meta name="Title" content="EVES Turismo - Programas turisticos de Argentina - Brasil - Cruceros - Destinos Ex&oacute;ticos - Europa - Latinoamerica - M&eacute;xico & Caribe - USA & Canad&aacute;">
      <meta charset="utf-8">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
      <link rel="shortcut icon" href="img/eves.png" type="image/x-icon">
      <link rel="stylesheet" href="css/website.css" type="text/css" media="screen">
      <link href="css/eves-new.css" rel="stylesheet" type="text/css">
      <link href="css/main_new.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script type="text/javascript" src="design/js/jquery.tinycarousel.min.js"></script>
      <script type="text/javascript" src="js/jquery.fancybox.js"></script>
	 <link rel="stylesheet" href="css/flickity.css" type="text/css">
	 <script type="text/javascript" src="js/flickity.js"></script>
      <link href="js/slider/slider.style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="css/icons/font-awesome.css">
      <!--<script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.1.5"></script>-->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <link rel="apple-touch-icon href=icon.png">
  <link rel="apple-touch-startup-image href=startup.png">
  <link rel="icon" type="image/png" href="favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/screen.css" type="text/stylesheet" />
      <script>
           $(document).ready(function (){
     <? if($POP_UP_HTML != ""){ ?>
          //$(".fancybox").fancybox().trigger('click');
          $(".fancybox").fancybox({
               width: "1000"
          }).trigger('click');
     <?}?>
     $("#content-opacity").hide();
          $("#menu-lst").click(function(){
               $("#panel-menu").toggleClass( "panel-menu-hid" );
               $("#content-opacity").show();
          });
     $("#content-opacity").click(function(){
          $("#content-opacity").hide();
          $("#panel-menu").toggleClass( "panel-menu-hid" );
     });
     $("#close-panel").click(function(){
          $("#content-opacity").hide();
          $("#panel-menu").toggleClass( "panel-menu-hid" );
     });
     $('#slider1').tinycarousel({ display: 2 });
               
/*FACEBOOK API*/     
window.fbAsyncInit = function() {
    FB.init({
      appId      : '1455666971127615',
      xfbml      : true,
      version    : 'v2.8'
    });
  };
  });
//  if (typeof(FB) != 'undefined' && FB != null ) {
//       (function(d, s, id){
//     var js, fjs = d.getElementsByTagName(s)[0];
//     if (d.getElementById(id)) {return;}
//     js = d.createElement(s); js.id = id;
//     js.src = "//connect.facebook.net/en_US/sdk.js";
//     fjs.parentNode.insertBefore(js, fjs);
//   }(document, 'script', 'facebook-jssdk'));
//          FB.api(
//           '/242480442502207/photos/uploaded',
//           'GET',
//           {"access_token":"EAAUr6ZBC5rz8BABXZBxQLAZAwlJpsDd4JVML2sSjcb9SNWTLDgkQBSSTFXE4KkoOLcnFfhMpMnevB0ZCa0ZA0OOVSd6jriV4PhmaLS2X2nqZBBsCXfuM5j1Nvt1wDpoYFVpFJ05SGFCLb2Al4GUKuEQIhuziZCDPcQZD","fields":"images,link","limit":"1"},
//           function(response) {
//               console.log(response.data);
//               document.getElementById("image-fb").innerHTML = "<a href='"+response.data[0].link+"' target='_blank'><img src='"+response.data[0].images[2].source+"' width='500' height='400'></a>";
//           }
//         );
//} else {
$(window).load(function() {
      (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
          FB.api(
           '/242480442502207/photos/uploaded',
           'GET',
           {"access_token":"EAAUr6ZBC5rz8BAA2cG3u3MOXYTNDAaaRDyxLUR2rRHLP4P2CXDlFlgPWPnZBOlAbVTIyRgavp3MRwjwWmP1eSc3SPORvpMZAKCasDMD1daoEYGF5IOUrPKYJzpFm8qLAXZCu6DVPihpVcjKRlh3iSZA34WPsyWP1invLMPREOagZDZD","fields":"images,link","limit":"1"},
           function(response) {
               console.log(response.data);
               document.getElementById("image-fb").innerHTML = "<a href='"+response.data[0].link+"' target='_blank'><img src='"+response.data[0].images[2].source+"' width='500' height='400'></a>";
           }
         );
});
//}
  //Entrar aca si la sesion de tokens se terminó
  //https://graph.facebook.com/oauth/access_token?client_id=711320945685268&client_secret=39195c3a2f8765f78d732851a435c3fb&grant_type=fb_exchange_token&fb_exchange_token=https://graph.facebook.com/oauth/access_token?client_id=711320945685268&client_secret=EAACEdEose0cBADZABjlz0fIm8kzZC0z4NLwDi3VghDY1XTScGgOMTIvhRZCnbYdoFFWoVGX4ypJB6WLZCoDx299kdZAoyPR3OFVo652ouGwmIl4S3TZByibcYlWo0WZAstXTnrY9RW3Gyt89fZBJHTWs6EJjVWDi0iMRyWvMitQyG7EnrZClDuzru7jYpMkYbiD8ZD&grant_type=fb_exchange_token&fb_exchange_token=EAAUr6ZBC5rz8BAKvMlR95qBxplNfW3d6O3IEPrIKfQ94ZBu133FPBohQFkj1LzdqV9D7wpyqfHp31KmByGOxHdE8Ueu7JVeAEe8pvnWWiQm6Y8kr0vYvZBeZBhFetSj9MroDUnfu31iAalbhm2SHlZCFBTSTAURxWXew3vsZB4YgZDZD
     $(window).resize(function(){
          if ($(window).width() <= 600){
               $('#panel-menu').show();
          }else{
               $('#panel-menu').hide();
          }
     });
      </script>
      <style>
         .slider-t{
         width: 100% !important;
         }
         .div-sl{
         width: 100% !important;
         }
         .div-sl img{
         width: 100% !important;
         }
         .slider-t div{
         width: 100% !important;
         }
         .div-sl a{
         width: 95% !important;
         }
         #slider1_container{
         width: 100% !important;
         }
         /* 
         #slider1_container div{
         width: 100% !important;
         }
         .jssorb05 div{
         width: 94px !important;
         */
         }
      </style>
   </head>
   
   <body <?= $POP_UP ?>>
      <? include("inc_sup_nuevo.php");?>
      <div id="botonera-cotiz-aereo" style="top:90px;right: 100px">
         <div class="div-text"> 88 A&ntilde;os de Experiencia en el Mundo!</div>
      </div>
      <div id="content" style="min-height: 450px; height: auto;width: 1224px;">
      <!-- Actualizar min-height si se agregan filas de segmentos-->
      <div id="col-img-izq">
         <?php
            $UBICACION = "CENTRO";//CENTRO
            $DS_BANN = $db->LoadSQL("SELECT * FROM Conguracion_Web WHERE Conguracion_Web_Ubicacion = '".$UBICACION."' AND Conguracion_Web_Mostrar = 1 AND Conguracion_Web_Tipo IN ('BANNER','HTML') AND Conguracion_Web_SegmentoPromo_ID = 56 ORDER BY Conguracion_Web_Orden LIMIT 1"); 
            if( isset($no_flyers) && $no_flyers == true ) $DS_BANN = 0; 
            if($DS_BANN != 0){
            ?>
         <div class="promos" style="text-align:left">
            <? while($RW_INC = mysql_fetch_array($DS_BANN)){ ?>
            <?
               if($RW_INC["Conguracion_Web_Link"] != ""){
                 $wVarBanner ='<a href="'.$RW_INC["Conguracion_Web_Link"].'" target="_blank">';
                 $wVarBanner.='<img src="'.$wVarPath.'banners/'.$RW_INC["Conguracion_Web_Banner"].'" '; 
                 $wVarBanner.=' width="100%" height="352" border="0" align="absmiddle" style="padding:3px 0px 3px 0px">';
                 $wVarBanner.='</a>';
               }else{
                 if($RW_INC["Conguracion_Web_HTML"] != ""){
                   $wVarBanner = $RW_INC["Conguracion_Web_HTML"];
                 }else{
                   $wVarBanner ='<img src="'.$wVarPath.'banners/'.$RW_INC["Conguracion_Web_Banner"].'"'; 
                   $wVarBanner.=' width="100%" height="350" border="0" align="absmiddle" style="padding:3px 0px 3px 0px">';
                 }
               }
               echo $wVarBanner."<br>";
               /*
               $BannerCount ++;
               if($BannerCount == 4){ 
                 $BannerCount = 0;    
               }*/
               ?>
            <? }//END WHILE $DS_BANN ?>
         </div>
         <? }//END IF $DS_BANN ?>
      </div>
      <div id="col-slide-der">
      <?
         $UBICACION = "CENTRO";
         //Tipo_Segmentos_Promos Tipo_Segmentos_Promos
         
         $DataSet = $db->LoadSQL("SELECT * FROM Conguracion_Web WHERE Conguracion_Web_Ubicacion = '".$UBICACION."' AND  Conguracion_Web_Mostrar = 1 AND Conguracion_Web_Tipo = 'BANNER' AND Conguracion_Web_SegmentoPromo_ID = 54 ORDER BY Conguracion_Web_Orden");
         if ($DataSet != 0) {
         ?>
      <script type="text/javascript"src="js/slider/js/jssor.slider.mini.js"></script>
      <!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
      <!--<script type="text/javascript"src="js/slider/slide.min.js"></script>-->
      <script type="text/javascript">
         $(window).load(function() {
                   $(".main-gallery").flickity({
                       lazyLoad: 3,
                       freeScroll: !0,
                       wrapAround: !0
                   });
               });
      </script>
     <? $UBICACION = "CENTRO";//CENTRO
         $total_paginas = 1;
	?>
      <div class="carousel" style="width:99%;float: right;margin-top: 3px;" data-flickity='{"autoPlay": 3000 , "pauseAutoPlayOnHover": true, "wrapAround": true ,"selectedAttraction": 0.01, "friction": 0.15,"lazyLoad": true}'>
         <?
            while($RW_INC = mysql_fetch_array($DataSet)){
            if($RW_INC["Conguracion_Web_Link"] != ""){
            $total_paginas ++;
            ?>
         <div class="carousel-cell">
          <a href="<?= $RW_INC["Conguracion_Web_Link"]?>">
            <img   data-flickity-lazyload="<?= $wVarPath.'banners/'.$RW_INC["Conguracion_Web_Banner"]?>">
            </a>
         </div>
         <?}?>
         <?}?>
         <?}?>
      </div>
	 </div>
      <div style="margin: 50px auto 0px;display: inline-block;text-align: center;width: 100%;font-size:25px;color: #444">
         <a href="main.php" class="active-div" style="text-decoration: none;color: #444">Destinos</a> | <a href="aereos.php" style="text-decoration: none;color: #444">Aéreos</a> | <a href="hoteles.php" style="text-decoration: none;color: #444">Hoteles</a>
      </div>
      <div style="width: 100%;display: inline-block">
      <?php
         $UBICACION = "CENTRO";
         $SQL = "SELECT * FROM Conguracion_Web WHERE Conguracion_Web_Ubicacion = '".$UBICACION."' AND Conguracion_Web_Tipo = 'BANNER' AND  Conguracion_Web_SegmentoPromo_ID = 55  ORDER BY Conguracion_Web_Orden";
         //$SQL = "SELECT * FROM Conguracion_Web WHERE Conguracion_Web_Ubicacion = '".$UBICACION."' AND Conguracion_Web_Tipo = 'BANNER' ORDER BY Conguracion_Web_Orden";
         $DataSet = $db->LoadSQL($SQL);
         if ($DataSet != 0) {
         	while ($row = mysql_fetch_array($DataSet)){
         		$gt[] = $row["Conguracion_Web_Banner"];
         		$array_bloque_href[] =	$row["Conguracion_Web_Link"]; 
         	}
         ?>
      <div class="free-wall">
         <div class="size320" style="margin-top: 30px">
            <div class="brick size14">
               <a href="<?= $array_bloque_href[0]?>">
               <img src="<?= $wVarPath."banners/".$gt[0]?>" style="width:100% !important;height:100%; !important">
            </div>
            </a>
            <div class="brick size22">
               <a href="<?= $array_bloque_href[1]?>">
               <img src="<?= $wVarPath."banners/".$gt[1]?>" style="width:100% !important;height:100%; !important">
            </div>
            </a>
            <div class="brick size22">
               <a href="<?= $array_bloque_href[2]?>">
               <img src="<?= $wVarPath."banners/".$gt[2]?>" style="width:100%;height:100%;">
            </div>
            </a>
         </div>
         <div class="size320">
            <div class="brick size22">
               <a href="<?= $array_bloque_href[3]?>">
               <img src="<?= $wVarPath."banners/".$gt[3]?>" style="width:100% !important;height:100%; !important">
            </div>
            </a>
            <div class="brick size14" style="float: right;margin-left: 10px;margin-right: 0px">
               <a href="<?= $array_bloque_href[4]?>">
               <img src="<?= $wVarPath."banners/".$gt[4]?>" style="width:100% !important;height:100%; !important">
            </div>
            </a>
            <div class="brick size22">
               <a href="<?= $array_bloque_href[5]?>">
               <img src="<?= $wVarPath."banners/".$gt[5]?>" style="width:100% !important;height:100%; !important">
            </div>
            </a>
         </div>
      </div>
      <?}?>
      <?php
         $UBICACION = "CENTRO";
         $SQL = "SELECT * FROM Conguracion_Web WHERE Conguracion_Web_Ubicacion = '".$UBICACION."' AND Conguracion_Web_Tipo = 'BANNER'  AND  Conguracion_Web_SegmentoPromo_ID = 57 AND Conguracion_Web_Link IS NOT NULL ORDER BY Conguracion_Web_Orden LIMIT 8";
         $DataSet = $db->LoadSQL($SQL);
         if ($DataSet != 0) {
         	while ($row = mysql_fetch_array($DataSet)){
         		$array_bloque_inf[] = $row["Conguracion_Web_Banner"];
         		$array_bloque_ahref[] =	$row["Conguracion_Web_Link"]; 
         	}
         ?>
      <div class="section" style="display: block;width: 100%;">
         <div class="doble-section" style="display:inline">
            <a href="<?= $array_bloque_ahref[0]?>">
            <img src="<?= $wVarPath."banners/".$array_bloque_inf[0]?>" width="609" height="200">
            </a>
         </div>
         <div class="doble-section" style="display:inline">
            <a href="<?= $array_bloque_ahref[1]?>">
            <img src="<?= $wVarPath."banners/".$array_bloque_inf[1]?>" width="609" height="200">
            </a>
         </div>
      </div>
      <div class="section" style="display: block;width: 100%;">
         <div class="quatro-section" style="display:inline">
            <a href="<?= $array_bloque_ahref[2]?>">
            <img src="<?= $wVarPath."banners/".$array_bloque_inf[2]?>" width="403" height="300">
            </a>
         </div>
         <div class="quatro-section" style="display:inline">
            <a href="<?= $array_bloque_ahref[3]?>">
            <img src="<?= $wVarPath."banners/".$array_bloque_inf[3]?>" width="403" height="300">
            </a>
         </div>
         <div class="quatro-section" style="display:inline">
            <a href="<?= $array_bloque_ahref[4]?>">
            <img src="<?= $wVarPath."banners/".$array_bloque_inf[4]?>" width="403" height="300">
            </a>
         </div>
      </div>
      <div class="section" style="display: block;width: 100%;">
         <div class="quatro-section" style="display:inline">
            <a href="<?= $array_bloque_ahref[5]?>">
            <img src="<?= $wVarPath."banners/".$array_bloque_inf[5]?>" width="403" height="300">
            </a>
         </div>
         <div class="quatro-section" style="display:inline">
            <a href="<?= $array_bloque_ahref[6]?>">
            <img src="<?= $wVarPath."banners/".$array_bloque_inf[6]?>" width="403" height="300">
            </a>
         </div>
         <div class="quatro-section" style="display:inline">
            <a href="<?= $array_bloque_ahref[7]?>">
            <img src="<?= $wVarPath."banners/".$array_bloque_inf[7]?>" width="403" height="300">
            </a>
         </div>
      </div>
      <?}?>
      <!--SLIDER INFERIOR-->
      <? $BannerCount		= 0;?>
      <div class="tbl_banners" width="90%" cellpadding="0" cellspacing="0" border="0" align="center">
            <?
               $DS_BANN = $db->LoadSQL("SELECT * FROM Conguracion_Web WHERE Conguracion_Web_Ubicacion = '".$UBICACION."' AND Conguracion_Web_Mostrar = 1 AND Conguracion_Web_Tipo = 'BANNER' AND Conguracion_Web_Orden >= 1000 AND Conguracion_Web_Orden <= 1200 ORDER BY Conguracion_Web_Orden");
               if($DS_BANN != 0){
               	while($RW_INC = mysql_fetch_array($DS_BANN)){?>
            <td width="20%" align="left">
               <? // banner img - swf - html?>
               <? if($RW_INC["Conguracion_Web_Link"] != ""){
                  $wVarBanner   ="<a href='".$RW_INC["Conguracion_Web_Link"]."' target='_blank'>";
                  $wVarBanner  .="<img src='".$wVarPath."banners/".$RW_INC["Conguracion_Web_Banner"]."' "; 
                  $wVarBanner  .="width='".$RW_INC["Conguracion_Web_Ancho"]."' height='".$RW_INC["Conguracion_Web_Alto"]."' border='0' align='absmiddle'>";
                  $wVarBanner  .="</a>";
                  }else{
                  	
                  	if ($RW_INC["Conguracion_Web_HTML"] != ""){
                  $wVarBanner  = $RW_INC["Conguracion_Web_HTML"];
                  }else{
                  	$wVarBanner   ="<img src='".$wVarPath."banners/".$RW_INC["Conguracion_Web_Banner"]."'"; 
                  $wVarBanner  .="width='".$RW_INC["Conguracion_Web_Ancho"]."' height='".$RW_INC["Conguracion_Web_Alto"]."' border='0' align='absmiddle'>";
                  	}
                  }
                  ?>
               <!--<table cellpadding="0" cellspacing="0" align="center" >
                  <tr>
                  <td width="470" align="center" height="170" style="padding-bottom:10px"><?//echo $wVarBanner ?></td>
                  </tr>	
                  </table>-->
               <div class="banners_home"><?= $wVarBanner ?></div>
            </td>
         <? } ?>
         <? } /// FIN BANNERS?>
      </div>
      
      <div class="social-feed" style="margin-left: 30px">
      <h3><i class="fa fa-facebook" aria-hidden="true" style="color: #3b5998"></i> <a href="https://www.facebook.com/eves.com.ar" target="_blank" style="color: inherit;text-decoration: none;">/eves.com.ar</a> </h3>
      <div id="image-fb">
      </div>
      </div>
      <?php
		// Supply a user id and an access token
		$userid = "1416503079";
		$accessToken = "1416503079.1677ed0.3d1334b4553b425a9de3948df96402c0";

		// Gets our data
		function fetchData($url){
		     $ch = curl_init();
		     curl_setopt($ch, CURLOPT_URL, $url);
		     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		     curl_setopt($ch, CURLOPT_TIMEOUT, 1);
		     $result = curl_exec($ch);
		     curl_close($ch); 
		     return $result;
		}
		// Pulls and parses data.
		$result = fetchData("https://api.instagram.com/v1/users/self/media/recent/?access_token={$accessToken}&q=evesturismo&count=1");
		//$result = fetchData("https://api.instagram.com/v1/users/{$userid}/media/recent/?q=evesturismo&access_token={$accessToken}&count=1&client_id=1416503079");
		$result = json_decode($result);
	?>
     
      <div class="social-feed" style="margin-right: 30px">
      <h3><i class="fa fa-instagram" aria-hidden="true" style="color: #3b5998"></i>  <a href="https://www.instagram.com/evesturismo/" target="_blank" style="color: inherit;text-decoration: none;">@evesturismo</a></h3>
	<?php foreach ($result->data as $post): ?>
		<!-- Renders images. @Options (thumbnail,low_resoulution, high_resolution) -->
		<a href="<?= $post->link?>" target="_blank"><img src="<?= $post->images->standard_resolution->url ?>" width="500" height="400"></a>
	<?php endforeach ?>
      </div>
      <div id="slide-logos" style="margin: 10px auto 0 auto;clear: both">
         <? include("slide-banners.php");?>
      </div>
      <? include("inc_pie.php");?>
      <a href="#fancybox" id="Pop-up" class="fancybox" style="display: none"></a>
    <div id="fancybox" style="display: none;">
     <?=$POP_UP_HTML?>
    </div>
   </body>
</html>
<?}else{
   header("Location: tarifario.php");
   }?>