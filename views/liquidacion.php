<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#" >
  <head>
    <title>Gasto Público</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/css/normalizer.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/css/style.css"      type="text/css" />

  </head>
  
  <body>

    <header>
        <section class="wrapper">
            <h1 class="tk-adelle">Tu liquidación de sueldo*</h1>
            <nav>
                <ul>
                	<li><a href="<?php echo BASE_URL ?>"             title="Ir a Portada">Portada</a></li>
                	<li><a href="<?php echo BASE_URL ?>/proyecto/"   title="Acerca de este proyecto">Proyecto</a></li>
                	<li><a href="<?php echo BASE_URL ?>/informate/"  title="Informate sobre tus impuestos e imposiciones">Infórmate</a></li>
                	<li><a href="<?php echo BASE_URL ?>/privacidad/" title="Privacidad y Terminos de uso">Privacidad</a></li>
                </ul>
            </nav>
        </section>
    </header>

    <section class="wrapper">
    
        <small class="note">* Montos aproximados</small>
    
        <section  id="liquidacion">
            <ul>
                <li class="ingresos">
                    <strong>Ingreso Inicial (Bruto):</strong>
                    <big class="flash" id="wage_brute"></big>
                    <small>Este monto corresponde al sueldo total Bruto, es decir: sin ningún tipo de descuentos legales aplicado</small>
                </li>
            	<li class="descuentos">
                    <strong>Descuentos</strong>
                    <ul>
                    	<li>
                    	   <strong>Fondo de Pensión ( AFP )</strong>
                            <big class="flash" id="disc_pension"></big>
                            <small>Este es el monto descontado para tu pensión de Retiro  –  <a href="#" rel="help-afp" class="tooltip">¿Que es una AFP?</a></small>
                        </li>
                    	<li>
                    	   <strong>Fondo de Salud ( Isapre )</strong>
                            <big class="flash" id="disc_health"></big>
                            <small>Este es el monto descontado para tu seguro de Salud – <a href="#" rel="help-isapre" class="tooltip">¿Que es una Isapre?</a></small>
                        </li>
                    	<li>
                    	   <strong>Seguro Cesantía</strong>
                            <big class="flash" id="disc_insurance"></big>
                            <small>Este es el monto descontado para tu seguro de Cesantía – <a href="#" rel="help-seguro" class="tooltip">¿Que es el Seguro de Cesantia?</a></small>
                        </li>
                    	<li class="impuesto">
                    	   <strong>Impuesto Único</strong>
                            <big class="flash" id="disc_tax"></big>
                            <small>Este es el monto descontado para el libre uso por el estado – <a href="#" rel="help-impuesto" class="tooltip">¿Que es el Impuesto Único?</a></small>
                        </li>
                    </ul>
                </li>
                <li class="total">
                    <strong>Ingreso Final (líquido):</strong>
                    <big class="flash" id="wage_final"></big>
                    <small>Este es el monto efectivo que recibes cada mes</small>
                </li>
            	<li class="total_descuentos">
            	   <strong>Total Descuentos aplicados:</strong>
                    <big class="flash" id="disc_total"></big>
                </li>
            </ul>
        </section>                    
        <section class="next">
            <h3 class="tk-adelle"><a href="#" onclick="$('#nextform').submit(); return false;" title="Link">¿Entonces, en que se utilizan mis impuestos?</a></h3>
            <h4 class="tk-adelle"><a href="<?php echo BASE_URL ?>" title="Link">‹ Intentar con otro monto</a></h4>
        </section>
    </section>
    
    <form id="nextform" action="<?php echo BASE_URL ?>/detalle/" method="post">
        <input id="taxes" name="taxes" type="hidden" />
    </form>


    <script src="<?php echo BASE_URL ?>/assets/js/jquery.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/js/jquery.tooltipsy.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/js/callers.js"></script>
    
    <script type="text/javascript" src="//use.typekit.net/nmy6gvf.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <script src="<?php echo BASE_URL ?>/assets/js/sueldo.js"></script>
    
    <script>
      
      function fillWithDelay(id, step, value) {
        setTimeout(function() {
          $(id).text(value).addClass('visible')
        }, step * 1000);
      }
      
      function loadSalary() {
      
        var liquido = <?php echo $_POST['salary'] ?>;
      
        var brute = Sueldos.calcularBruto(liquido);
        var summary = Sueldos.Liquidacion(brute);
      
        var discounts = summary.descuentos.pension + summary.descuentos.salud + summary.descuentos.cesantia + summary.descuentos.impuestos;
        var difference = Math.ceil(summary.liquido - liquido);
        
        $('#taxes').val(Math.round(summary.descuentos.impuestos));
        
        fillWithDelay('#wage_brute',     1, money(brute));
        fillWithDelay('#disc_pension',   2, money(summary.descuentos.pension));
        fillWithDelay('#disc_health',    3, money(summary.descuentos.salud));
        fillWithDelay('#disc_insurance', 4, money(summary.descuentos.cesantia));
        fillWithDelay('#disc_tax',       5, money(summary.descuentos.impuestos));
        fillWithDelay('#disc_total',     6, money(discounts));   
        fillWithDelay('#wage_final',     7, money(liquido));
      
      }
    
      loadSalary();
      
    </script>    
  </body>
</html>