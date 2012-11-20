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
            <h1 class="tk-adelle">Tus impuestos: $<?php echo number_format($_POST['taxes'], 0, ',', '.') ?></h1>
            <h2 class="tk-adelle">Este es el aporte directo de tu sueldo mensual al Estado de Chile.</h2>
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
        <nav class="buttons">
          <a href="#list"   rel="impuestos" title="Link">Ver listado</a>
          <a href="#graph1" rel="grafico-1">Ver Gráfico 1</a>
          <a href="#graph2" rel="grafico-2">Ver Gráfico 2</a>

        </nav>
        
        <section id="impuestos" class="tabs">
          <ul>
          </ul>    
        </section>
                            
        <section id="grafico-1" class="tabs" style="display: none">
          <iframe width="900" height="900" style="background-color: transparent;" frameborder="0" scrolling="no" src="<?php echo BASE_URL ?>/graficos/circle.html"></iframe>
        </section>
        
        <section id="grafico-2" class="tabs" style="display: none">
          <iframe width="900" height="850" frameborder="0" scrolling="no" src="<?php echo BASE_URL ?>/graficos/treemap.html"></iframe>
        </section>

        
        <section class="next">
            <h3 class="tk-adelle">Esto depende de tí</h3>
            <h4 class="tk-adelle highlight">Sólo con tu voto y participación ciudadana puedes cambiar esta distribución.</h4>
            <h4 class="tk-adelle">Ya sea eligiendo a representantes que apoyen reformas en las áreas de tu interés, o participando activamente en tu comunidad para exigir a tus actuales representantes los cambios que tu y tu comunidad necesitan</h4>
            <h4 class="tk-adelle"><a href="../" title="Link">‹ Intentar con otro monto</a></h4>
        </section>
        
    </section>

    <script src="<?php echo BASE_URL ?>/assets/js/jquery.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/js/jquery.tooltipsy.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/js/callers.js"></script>
    
    <script type="text/javascript" src="//use.typekit.net/nmy6gvf.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <script>
    
      var taxes = <?php echo $_POST['taxes'] ?>;
      
      $.getJSON('<?php echo BASE_URL ?>/data/shares.json', function(items) {
      
        $.each(items, function(i, item) {
        
          var percent = Math.round(item.share * 10000) / 100;
        
          var li = $('<li class="slide"></li>')
          
          li.append('<strong>' + item.label + '</strong>')
          li.append('<big>' + money(taxes * item.share)  + '</big>')
          li.append('<small>Correspondiente al ' + percent + '% de tu impuesto'  + '</small>');
          
          $('#impuestos ul').append(li);
          
          
          setTimeout(function() {
            li.addClass('visible');
          }, 1000 * i);
          
        });
      
      });   
    
    </script>

  </body>
</html>
