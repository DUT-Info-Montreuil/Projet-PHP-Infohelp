<?php
class viewLogin
{

    public function __construct()
    {
    }




    public function showRegistration()
    {
        echo '
            <form action="index.php?action=b1" method="POST" class="form-example">
            <div class="form-example">
                <h2>Inscription</h2>
                <input type="text" name="last_name" placeholder="nom(ex:Dupont)" id="type" maxlength="255" required>
                <input type="text" name="first_name" placeholder="prenom(ex:Alice)" id="type" maxlength="255" required>
                <input type="text" name="email" placeholder="email" length="255" required>                
                <input type="password" name="password" placeholder="mot de passe" id="type" maxlength="255" required>
                <input type="submit" name="b1" id="b1" required>
            </div>
            </form>
            <style>
            form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {
                font-size: 15px;
                font-weight: bold;
            }
            </style>';
    }
}
