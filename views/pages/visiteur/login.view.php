<div class="animTitres <?= $css ?>">

    <h1>Page de connexion</h1>

    <form action="<?=URL?>validation_login" method="post" class="form_entry_form">

        <div class="entryForm">
            <label for="login">Nom : </label>
            <input type="text" id="login" name="login">
        </div>
        <div class="entryForm">
            <label for="password">Password : </label>
            <div class="afficherMDP">
                <input type="password" id="password" name="password">
                <i class="fa-regular fa-eye-slash"></i>
                <i class="fa-regular fa-eye dnone"></i>
            </div>
        </div>

        <div class="entryForm">
            <!-- Pour éviter d'envoyer à l'appui de la touche ENTER -->
            <!-- <input class="buttonEntryForm" type="button" value="Connexion"onclick="submit()"> -->
            <!-- sinon : -->
            <button>Connexion</button>
        </div>
        
        
    </form>
    <a href="<?=URL?>mdpOublie">mot de passe oublié</a>



</div>