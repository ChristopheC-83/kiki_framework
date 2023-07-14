<div class="animTitres">

    <h1>Page de création de compte</h1>

    <form action="validation_creerCompte" method="post" class="formulaire">

        <div class="entryForm">
            <label for="login">Nom : </label>
            <input type="text" id="login" name="login">
        </div>
        <div class="entryForm">
            <label for="passwordCreation">Password : </label>
            <div class="afficherMDP">
                <input type="password" id="passwordCreation" name="password" class="password">
                <div class="eye"><i class="fa-regular fa-eye-slash"></i>
                    <i class="fa-regular fa-eye dnone"></i>
                </div>
            </div>
        </div>
        <div class="entryForm">
            <label for="mail">Mail : </label>
            <input type="mail" id="mail" name="mail">
        </div>

        <div class="entryForm">
            <button id="btnEnregistrement">Enregistrer</button>
        </div>

    </form>




</div>