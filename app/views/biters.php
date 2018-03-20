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
        <p style="line-height: 17px; margin: 8px 0  3px;">Conoce los participantes que han superado los <strong>5 niveles</strong> y están participando por uno de los <strong>8 iPods Nano que entregaremos.</strong></p>
        <section class="block" id="top-winners">
            <p>Nicolás López</p>
            <p>María de los Ángeles</p>
            <p>Sara Pedroza</p>
            <p>Sebastian Geovo Meneses</p>
            <p>Rosana Alandete</p>
            <p>Jhon Riveri Ballesteros</p>
            <p>Natalia Solano</p>
            <p>Jeyson Ortiz</p>
        </section>
    </section>
</section>