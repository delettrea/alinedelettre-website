<?php

class TemplateContact extends Production {

    /**
     * Formulaire permettant de prendre contact.
     */
    public function seeContact(){
        ?>
        <form class="form" method="post" action=<?= "index.php?action=contact" ?>>
            <div class="space white name">
                <label>Votre nom : </label><input type="text" name="name" placeholder="Titre de l'article" value="" "/>
            </div>
            <div class="space white email">
                <label>Votre email : </label><input type="email" name="email" placeholder="Titre de l'article" value="" "/>
            </div>
            <div class="space white object">
                <label>Sujet de votre contact : </label><input type="text" name="object" placeholder="Titre de l'article" value="" "/>
            </div>
            <div class="space white">
                <label>Votre message : </label>
                <textarea name="mail" class="article"></textarea>
            </div>
            <div class="space white">
            <input class="button" type="submit" value="Contacter" />
            </div>
        </form>

        <?php
        self::seeContactSend();
        ?>
        <?php
    }

    public function seeContactSend(){
        if (isset($_GET['action']) && $_GET['action'] == "contact"){
            echo "<div class='space white'> <p class='send'>Votre message à été transmit.</p></div>";
        }
    }

}