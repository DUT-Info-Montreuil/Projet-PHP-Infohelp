<?php
require_once('vue_generique.php');

class VueConnexion extends VueGenerique
{
    public function __construct() //Constructeur de la classe
    {
        parent::__construct();
    }

    public function inscription(){
        echo '
            <form action="index.php?action=inscription" method="POST" class="form-example">
                <div class="form-example">
                    <label for="inscription">Inscription: </label>
                    <input type="text" name="login" id="type" maxlength="255" required>
                    <input type="password" name="password" id="type" maxlength="255" required>
                    <input type="submit" name="send" id="send" required>
                </div>
            </form>';
    }

    public function connexion(){
        echo '
            <form action="index.php?action=connexion" method="POST" class="form-example">
            <div class="form-example">
                <label for="connexion">Connexion: </label>
                <input type="text" name="login" id="type" maxlength="255" required>
                <input type="password" name="password" id="type" maxlength="255" required>
                <input type="submit" name="send" id="send" required>
            </div>
            </form>';
    }

}
