<?php

namespace App\Vue;


class TemplateWebsite extends TemplateProduction{

    public function seeWebsite(){
        $nav = new \App\Controller\Controller();
        ?>
        <div class="page">
            <section class="section section1">
                <div class="space white">
                    <h3>Présentation</h3>
                </div>
                <div class="space white">
                    <p>Jeune femme dynamique passionnée d'informatique.<br>Je suis étudiante sur Openclassrooms en Développement Web.</p>
                    <a href="https://github.com/delettrea" class="button"><i class="fa fa-github" aria-hidden="true"></i> mon GitHub</a>
                </div>
                <div class="space black">
                    <p>Mes diplômes</p>
                    <ul>
                        <li>Licence de Philosohpie</li>
                        <li>Licence d'Adminsitration Publique</li>
                        <li>Baccalauréat économique et social</li>
                    </ul>
                </div>
                <div class="space white row">
                    <p>
                        Je travaille principalement sous les distributions GNU/linux Debian et Manjaro.
                        <br>J’ai testé de nombreuses distributions que j'utilise plus rarement comme Archlinux, Ubuntu ou encore Fedora.
                    </p>
                    <i class="icon fa fa-linux  fa-2x" aria-hidden="true"></i>
                </div>
                <div class="space white row">
                    <div class="icon iconCenter">
                        <i class="fa fa-desktop fa-2x" aria-hidden="true"></i>
                        <i class=" fa fa-tablet fa-2x" aria-hidden="true"></i>
                        <i class="fa fa-mobile fa-2x" aria-hidden="true"></i>
                    </div>
                    <p>
                        Tous mes sites web sont responsives, c'est-à-dire que l'on peut les utiliser sur toutes les plateformes du pc au téléphone mobile.
                    </p>
                </div>
                <div class="space white">
                    <a href="" class="button">Voir mes réalisations</a>
                    <a href="" class="button">Prendre contact</a>
                </div>
            </section>
            <section class="section section2">
                <div class="space white">
                    <h3>Réalisations</h3>
                </div>
                <div class="rowProduct">
                <?php
                $nav->production();
                ?>
                </div>
            </section>
            <section class="section section3">
                <div class="space white">
                    <h3>Contact</h3>
                </div>
                <?php
                $nav->contact();
                ?>
            </section>
        </div>
        <?php
    }

}