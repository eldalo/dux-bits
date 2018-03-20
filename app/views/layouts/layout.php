<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" manifest="<?php echo $site_url; ?>manifest.mf?time=<?php echo time(); ?>"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?>Dux Bits, para que tu música siga.</title>
        <meta name="description" content="Vive una aventura llena de ritmo con los nuevos  Dux Bits y prepárate para ganar.">
        <meta name="keywords" content="dux, dux bits, bits, ritmo, juego, premios, web, noel">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=0.6, user-scalable=no">

        <meta property="og:image" content="<?php echo $base_url; ?>images/dux-bits-de-sabor.png" />

        <link rel="shortcut icon" href="<?php echo $base_url; ?>images/favicon.png">

        <link rel="stylesheet" href="<?php echo $base_url; ?>css/normalize.css">
        <link rel="stylesheet" href="<?php echo $base_url; ?>css/fonts.css">
        <link rel="stylesheet" href="<?php echo $base_url; ?>css/animate.css">

        <link rel="stylesheet" href="<?php echo $base_url; ?>includes/widgets/lightbox-evolution/jquery.lightbox.css">
        <link rel="stylesheet" href="<?php echo $base_url; ?>includes/widgets/simple-scroll/jquery.mCustomScrollbar.css">

        <link rel="stylesheet/less" href="<?php echo $base_url; ?>css/main.less">

        <script>
            var base_url = "<?php echo $base_url; ?>", site_url = "<?php echo $site_url; ?>";
        </script>

        <script src="<?php echo $base_url; ?>js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="<?php echo $base_url; ?>js/vendor/prefixfree.min.js"></script>
        <script src="<?php echo $base_url; ?>js/vendor/less.js"></script>
        <script src="<?php echo $base_url; ?>js/public.js"></script>
    </head>
    <body>
        <div class="fb-root"></div>
        <section class="none" id="landscape-waring">
            <h3>Para una mejor experiencia, por favor, girar el dispositivo.</h3>
        </section>
        <section class="none" id="preload">
            <div class="block center">
                <section class="animated inline" id="percentage">
                    <span class="block">00%</span>
                    <strong class="block">Cargando</strong>
                </section>
                <section class="inline" id="instructions">
                    <figure class="animated block" id="inst-bounce" style="margin-top: 27px;">
                        <img class="center" src="<?php echo $base_url; ?>images/instrucciones-como-jugar.png" alt="Cómo Jugar">
                    </figure>
                    <figure class="animated block" id="inst-shake" style="margin-top: 15px;">
                        <img src="<?php echo $base_url; ?>images/instrucciones-recolectar.png" alt="Recolecta la mayor cantidad de Bits para que tu música no pare.">
                    </figure>
                    <figure class="animated block" id="inst-taba" style="margin-top: 10px;">
                        <img src="<?php echo $base_url; ?>images/instrucciones-evitar-chocar.png" alt="Evitar chocar con los obstáculos y así no perderás energía.">
                    </figure>
                    <figure class="animated block" id="inst-bounceInUp" style="margin-top: 85px;">
                        <img class="center" src="<?php echo $base_url; ?>images/intrucciones.png" alt="Completa los 5 niveles y ¡participa en el sorteo!">
                    </figure>
                </section>
            </div>
        </section>
        <section class="none" id="gameover">
            <section class="animated block center" id="popup-gameover">
                <h2>No te preocupes, <br> vuelve a intentarlo.</h2>
                <p>Conserva tu ritmo y podrás ganar un iPod Nano.</p>
                <button class="block center" id="init-game" type="button">Jugar de nuevo</button>
            </section>
        </section>

        <header>
            <div class="wrapper-main center">
                <figure class="block animated bounceInDown" id="logo">
                    <a href="<?php echo $site_url ?>inicio" title="Dux - Pequeños Bits de sabor para que tu música siga">
                        <img class="center" src="<?php echo $base_url; ?>images/dux-bits-logo.png" alt="Dux Bits">
                    </a>
                </figure>
                <nav class="block" id="main-menu">
                    <ul>
                        <!-- <li class="current"><a href="<?php echo $site_url ?>jugar">Jugar</a></li> -->
                        <li><a href="<?php echo $site_url ?>mecanica">Mecánica</a></li>
                        <li><a href="<?php echo $site_url ?>premios">Premios</a></li>
                        <li><a href="<?php echo $site_url ?>ganadores">Ganadores</a></li>
                        <li><a href="<?php echo $site_url ?>terminos-y-condiciones">Términos y condiciones</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <section id="main">
            <div class="wrapper-main center">
                <?php if (isset( $_SESSION['is_login'] ) && $_SESSION['is_login'] == true && $current_url == 'jugar'): ?>
                    <script>
                        level       = "<?php echo $_SESSION['level_id']; ?>",
                        level_end   = "<?php echo $_SESSION['level_end']; ?>";
                    </script>
                    <?php if (isset( $_SESSION['level_end'] )): ?>
                        <script> ; </script>
                    <?php endif ?>
                <?php endif; ?>
                <?php echo $yield; ?>
            </div>
        </section>
        <footer>
            <figure class="animated bounceInRight">
                <img src="<?php echo $base_url; ?>images/nuevos-dux-bits.png" alt="Nuevos Dux Bits Original">
            </figure>
        </footer>

        <script>
            window.fbAsyncInit = function()
            {
                FB.init({
                    appId  : '1444580625788819',
                    oauth  : true,
                    status : true,
                    cookie : true,
                    xfbml  : true
                });
            };

            (function(d){
                var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
                js = d.createElement('script'); js.id = id; js.async = true;
                js.src = "//connect.facebook.net/en_US/all.js";
                d.getElementsByTagName('head')[0].appendChild(js);
            }(document));
        </script>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $base_url; ?>js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="<?php echo $base_url; ?>js/vendor/jquery-migrate-1.2.1.js"></script>
        <script src="<?php echo $base_url; ?>js/vendor/jquery.backstretch.min.js"></script>
        <script src="<?php echo $base_url; ?>js/vendor/underscore-min.js"></script>

        <script src="<?php echo $base_url; ?>js/vendor/phaser.min.js"></script>

        <script src="<?php echo $base_url; ?>js/vendor/parsley.min.js"></script>
        <script src="<?php echo $base_url; ?>js/vendor/es.js"></script>

        <script src="<?php echo $base_url; ?>includes/widgets/lightbox-evolution/jquery.lightbox.min.js"></script>
        <script src="<?php echo $base_url; ?>includes/widgets/simple-scroll/jquery.mCustomScrollbar.concat.min.js"></script>

        <script src="<?php echo $base_url; ?>js/main.js"></script>
        <?php if (isset( $_SESSION['is_login'] ) && $_SESSION['is_login'] == true && $current_url == 'jugar'): ?>
        <script src="<?php echo $base_url; ?>js/game.js"></script>
        <?php endif ?>

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-44451115-1', 'laactituddux.com');
            ga('require', 'displayfeatures');
            ga('send', 'pageview');
        </script>
    </body>
</html>
