<?php if ($level != '0'): ?>
    <section class="block center" id="popup-level">
        <h2>
            Nivel
            <span>0<?php echo $level; ?></span>
        </h2>
        <div class="block">
            <h3>
                ¡Felicitaciones!
                <span>Acabas de pasar al <?php echo $letter; ?></span>
            </h3>
            <p class="block">
                Ahora estás más cerca de ganarte <br>
                un <strong>iPod Nano.</strong>
            </p>
            <button class="block center" id="next-level" type="button">Continuar</button>
        </div>
    </section>
<?php else: ?>
    <section class="block center" id="popup-finish">
        <h2>Felicitaciones</h2>
        <p>
            <strong>Completaste todos los niveles</strong>
            Ahora estás participando por
            <strong>un iPod Nano</strong>
        </p>
        <p class="block" id="shared">Compartir <span class="block">con mis amigos</span></p>
        <nav class="block center" id="redes">
            <a class="inline" id="fb" data-type="fb" href="#"></a>
            <a class="inline" id="tw" data-type="tw" href="#"></a>
        </nav>
        <a class="block center button" href="<?php echo $site_url ?>">Ir a inicio</a>
    </section>
<?php endif ?>