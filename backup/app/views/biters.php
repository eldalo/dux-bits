<section class="block center" id="biters">
    <section class="inline" id="participants">
        <h3>
            Participantes
            <span>Encuentra aquí los participantes que completaron todos los niveles y están inscritos para los sorteos.</span>
        </h3>
        <article class="block">
            <ul class="block">
                <?php if (!empty( $participants )): ?>
                    <?php foreach ($participants as $item): ?>
                        <li>
                            <?php echo $item['nombres'] .' '. $item['apellidos']; ?>
                        </li>
                    <?php endforeach ?>
                <?php else: ?>
                    <li>Espéralos pronto</li>
                <?php endif ?>
            </ul>
        </article>
    </section>
    <section class="inline" id="winners">
        <h3>Ganadores</h3>
        <p>Conoce los participantes que han superado los <strong>5 niveles</strong> y están participando por uno de los <strong>8 iPods Nano que entregaremos.</strong></p>
        <section class="block" id="top-winners"><?php echo $winners; ?></section>
    </section>
</section>