<section id="game">
    <section class="animated none" id="panel-user">
        <section class="block" id="username">
            <figure class="inline" id="userphoto">
                <img src="//graph.facebook.com/<?php echo $_SESSION['user_fb']; ?>/picture" alt="">
            </figure>
            <div id="close" title="Salir!!!"></div>
            <?php echo $_SESSION['user_name'] .' '. strtoupper( substr($_SESSION['user_lastname'], 0, 1) . '.' ); ?>
        </section>
    </section>
    <section class="center animated none" id="panel-info">
        <div>
            <section class="inline-center" id="sound-track">Nivel</section>
            <section class="inline-center" id="artist"><?php echo $_SESSION['level_id']; ?></section>
        </div>
        <div class="block none" id="panel-energy">
            <section class="inline-center animated" id="life-img">
            </section>
            <div class="inline-center">
                <section class="block" id="life-info">Energia</section>
                <section class="block" id="life-value"><span>100</span>%</section>
            </div>
        </div>
        <figure class="animated block none" id="option-game" data-state="true">
            <img src="<?php echo $base_url; ?>images/pausar-juego.png" alt="" title="Pausear el Juego">
        </figure>
    </section>
    <section class="block center" id="state-game">
        <a class="animated block none" id="option-game" href="#" ></a>
        <div class="inline" id="state-game-left"></div>
        <section id="phaser-game"></section>
        <div class="inline" id="state-game-right"></div>
        <figure class="none block animated" id="instru">
            <img src="<?php echo $base_url; ?>images/instrucciones-dux-bits.png" alt="Instrucciones" title="Instrucciones de Comó Jugar">
        </figure>
    </section>
</section>