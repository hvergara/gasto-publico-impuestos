<?php include_once dirname(__FILE__) . '/header.php' ?>
            
<section id="main">
    <form  id="form_id" name="form_name" action="<?php echo BASE_URL ?>/liquidacion/" method="post">
        <input name="salary" id="salary" type="number" placeholder="Ingresa tu sueldo líquido" class="clean" style="text-align: center" autocomplete="off" />
        <input type="submit" value="Calcular"/>
        <small>Ingresa tu sueldo, sin puntos ni comas. Todos los datos ingresados son anónimos, <strong>respetamos tu privacidad</strong></small>
    </form>
</section>         

<section id="profiles">
    <h3 class="tk-adelle">– Descubre –</h3>
    <p class="tk-adelle">Cómo distintos profesionales y trabajadores de Chile contribuyen con su sueldo al crecimiento del país.</p>
    <article>
        <figure>
            <a href="#" onclick="doCalc(220000); return false;"><img src="<?php echo BASE_URL ?>/assets/img/perfil_1.png" /></a>
            <figcaption>
                <small>Calcular con:</small>
                <a href="#" onclick="doCalc(220000); return false;">$220.000</a>
            </figcaption>
        </figure>
        <h4 class="tk-adelle">Alejandra Rosales</h4>
        <p>Doña Alejandra es una exitosa micro-empresaria que maneja su propio negocio de venta de abarrotes.</p>
    </article>
    <article>
        <figure>
            <a href="#" onclick="doCalc(750000); return false;"><img src="<?php echo BASE_URL ?>/assets/img/perfil_2.png" /></a>
            <figcaption>
                <small>Calcular con:</small>
                <a href="#" onclick="doCalc(750000); return false;" title="Link">$750.000</a>
            </figcaption>
        </figure>
        <h4  class="tk-adelle">Andrés Perez</h4>
        <p>Andrés luego de terminar su carrera de Ingeniería Comercial encontró un muy buen trabajo con excelente proyección.</p>
    </article>
    <article>
        <figure>
            <a href="#" onclick="doCalc(1900000); return false;"><img src="<?php echo BASE_URL ?>/assets/img/perfil_4.png" /></a>
            <figcaption>
                <small>Calcular con:</small>
                <a href="#" onclick="doCalc(1900000); return false;">$1.900.000</a>
            </figcaption>
        </figure>
        <h4  class="tk-adelle">Felipe Contreras</h4>
        <p>Felipe es uno de los más hábiles músicos de Chile, con 5 años de experiencia.</p>
    </article>
    <article>
        <figure>
            <a href="#" onclick="doCalc(6000000); return false;"><img src="<?php echo BASE_URL ?>/assets/img/perfil_3.png" /></a>
            <figcaption>
                <small>Calcular con:</small>
                <a href="#" onclick="doCalc(6000000); return false;">$6.000.000</a>
            </figcaption>
        </figure>
        <h4  class="tk-adelle">Alejandro Navarro</h4>
        <p>Senador de la República por la 8va región, circunscripción Bío-Bío Costa.</p>
    </article>
</section>

<section id="profiles">
    <h3 class="tk-adelle">– Infórmate –</h3>
    <p class="tk-adelle">Sobre tus derechos y deberes respecto a tus impuestos</p>
    <article>
        <h4 class="tk-adelle">¿Cómo puedo exigir que se utilizen mas impuestos en un area especifica?</h4>
        <p>Sólo con tu voto y participación ciudadana puedes cambiar esta distribución.</p>
    </article>
    <article>
        <h4  class="tk-adelle">¿ Qué son cada uno de los items que me descuentan ?</h4>
        <p>Corresponden a descuentos legales segun la Constitución de Chile, para la protección de tu retiro, salud y desempleo.</p>
    </article>
    <article>
        <h4  class="tk-adelle">¿ Si no tengo un contrato, aún pago impuestos ?</h4>
        <p>Todos pagamos impuestos, ya sea con tu contrato o pagando el 19% cada vez que efectuas una compra</p>
    </article>
    <article>
        <h4  class="tk-adelle">¿ Cómo puedo informarme más ?</h4>
        <p>Ingresa  a los portales de cada institución:</p>
        <ul class="lista_enlaces">
            <li><a href="http://www.safp.cl/"   target="_blank">Superintendencia de Pensiones</a></li>
            <li><a href="http://www.supersalud.gob.cl/" target="_blank">Superintendencia de Salud</a></li>
            <li><a href="http://www.gob.cl/"    target="_blank">Gobierno de Chile</a></li>
        </ul>
    </article>
</section>

<?php include_once dirname(__FILE__) . '/footer.php' ?>