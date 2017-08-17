<?php

namespace App\Vue;

class TemplateLogin extends TemplateLegal {

    /**
     * Formulaire de connexion au site.
     */
    public function seeLogin(){
        ?>
        <section class="log">
            <form class="login" method="post" action="<?php echo 'index.php?action=sendLogin' ?>">
                <div class="space white">
                    <h3>Connexion</h3>
                </div>
                <div class="space white pseudo">
                    <label>Pseudo : </label><input type="text" name="login" value=""/>
                </div>
                <div class="space white password">
                    <label>Mot de passe : </label><input type="password" name="password"/>
                </div>
                <div class="space white">
                    <input class="button" type="submit" value="Connexion" />
                </div>
            </form>
        </section>
        <?php
    }

}