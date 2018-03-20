<section class="block" id="register">
    <form class="" id="frm-register" action="<?php echo $site_url ?>guardar">
        <hgroup class="block">
            <h2 class="inline">
                Completa tus datos
                <strong class="block">Para avanzar al</strong>
            </h2>
            <h3 class="inline">Nivel 02</h3>
        </hgroup>
        <div class="block border-input">
            <label class="inline" for="name">Nombre</label>
            <input class="inline input" id="name" name="name" type="text" required tabindex="1" value="<?php echo $_SESSION['user_name']; ?>">
        </div>
        <div class="block border-input">
            <label class="inline" for="last_name">Apellido</label>
            <input class="inline input" id="last_name" name="last_name" type="text" required tabindex="2" value="<?php echo $_SESSION['user_lastname']; ?>">
        </div>
        <div class="block border-input">
            <label class="inline" for="doinputcument">Cédula</label>
            <input class="inline input" id="document" name="document" type="number" required tabindex="3">
        </div>
        <div class="block border-input">
            <label class="inline" for="email">Email</label>
            <input class="inline input" id="email" name="email" type="email" required tabindex="4" value="<?php echo $_SESSION['user_email']; ?>">
        </div>
        <div class="block border-input">
            <label class="inline" for="cell">Celular</label>
            <input class="inline input" id="cell" name="cell" type="number" required tabindex="5">
        </div>
        <div class="block border-input">
            <label class="inline" for="departament">Dpto.</label>
            <input class="inline input" id="departament" name="departament" type="text" required tabindex="6">
        </div>
        <div class="block border-input">
            <label class="inline" for="city">Ciudad</label>
            <input class="inline input" id="city" name="city" type="text" required tabindex="7">
        </div>
        <label class="block center terms" for="term">
            <input class="inline" id="term" type="checkbox"  tabindex="8">
            Acepto términos y condiciones
        </label>
        <button class="block center" id="send" type="button"  tabindex="9">Continuar</button>
        <div class="invalid-form-error-message"></div>
    </form>
</section>