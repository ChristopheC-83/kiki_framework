<div class="animTitres">

    <h1>Mot de passe oublié</h1>
    
    <br>
    <form action="<?=URL?>envoi_mdpOublie" method="post" class="formulaire">
        
    <div class="entryForm">
            <p>Aprés vérification de votre identité, <br>un mot de passe vous sera envoyé par mail.</p><br>
            <p>Modifiez le dès que possible !</p><br>
            <label for="login">Nom : </label>
            <input type="text" id="loginMdpOublie" name="loginMdpOublie">
        </div>
        <div class="entryForm">
            <label for="mail">Mail : </label>
            <input type="mail" id="mailMdpOublie" name="mailMdpOublie">
        </div>

        <div class="entryForm">
            <!-- Pour éviter d'envoyer à l'appui de la touche ENTER -->
            <!-- <input class="buttonEntryForm" type="button" value="Connexion"onclick="submit()"> -->
            <!-- sinon : --> 
            <button>Envoi</button>
        </div>
        
        
    </form>



</div>