<?php

class TemplateProduction extends TemplateContact {

    /**
     * Fonction permettant de visualiser les informations sur un site.
     */
    public function seeProduction(){
        while($data = $this->request->fetch()) {
            ?>
            <div class="product space white">
                <? echo '<div class="production" id="P'.$data['ID'].'">';
                    echo '<a href="'.$data['href'].'" target="blank">';
                ?>
                        <div class="info">
                            <p class="name"><?= $data['name'] ?></p>
                            <ul class="fa-ul">
                                <li><i class="fa-li fa fa-check-square"></i><?= $data['infos1'] ?></li>
                                <li><i class="fa-li fa fa-check-square"></i><?= $data['infos2'] ?></li>
                                <li><i class="fa-li fa fa-check-square"></i><?= $data['infos3'] ?></li>
                            </ul>
                            <p class="infos"><?= $data['description'] ?></p>
                        </div>
                </div>
                </a>
            </div>
            <?php
        }
    }

}