<?php

namespace App\Vue;


class TemplateProduction extends TemplateContact {

    /**
     * Fonction permettant de visualiser les informations sur un site.
     */

    public function seeProduction(){
        while($data = $this->request->fetch()) {
            ?>
            <div class="product space white">
                <? echo '<div class="production" id="P'.$data['id'].'">';
                ?>
                <? echo '<div class="P'.$data['id'].' info">'?>
                    <?php $this->seeNumberProject($data)?>
                    <p class="name"><?= $data['name'] ?></p>
                    <ul class="fa-ul delete">
                        <li><i class="fa-li fa fa-check-square"></i><?= $data['infos1'] ?></li>
                        <li><i class="fa-li fa fa-check-square"></i><?= $data['infos2'] ?></li>
                        <li><i class="fa-li fa fa-check-square"></i><?= $data['infos3'] ?></li>
                    </ul>
                    <p class="infos delete"><?= $data['description'] ?></p>
                </div>
            </div>
            </div>
            <?php
        }
        $this->seeNewProduction();
        $this->seeDeleteEditProduct();
        $this->seeEditProduct();
    }

    public function seeAllProduction(){
        ?>
        <ul class="fa-ul">
            <li><i class="fa-li fa fa-check-square"></i><?= $data['infos1'] ?></li>
            <li><i class="fa-li fa fa-check-square"></i><?= $data['infos2'] ?></li>
            <li><i class="fa-li fa fa-check-square"></i><?= $data['infos3'] ?></li>
        </ul>
        <p class="infos"><?= $data['description'] ?></p>
        <?php
    }

    public function seeNumberProject($data){
        if(isset($_SESSION) && !empty($_SESSION) && $_SESSION['type'] == "admin") {
            ?>
            <p class="no-padding">Projet  <?=$data['id']?></p>
            <?php
        }
    }


    public function seeNewProduction(){
        if(isset($_SESSION) && !empty($_SESSION) && $_SESSION['type'] == "admin") {
            ?>
            <div class="product space white newProduct">
                <h3>Nouveau projet</h3>
                <form method="post" action="<?php echo 'index.php?action=sendProduction' ?>">
                    <div class="space white no-padding">
                        <input type="text" name="name" placeholder="Nom du projet"/>
                    </div>
                    <div class="space white">
                        <input type="url" name="href" placeholder="Lien http"/>
                    </div>
                    <div class="space white no-padding">
                        <input type="text" name="infos1" placeholder="Infos n°1"/>
                    </div>
                    <div class="space white no-padding">
                        <input type="text" name="infos2" placeholder="Infos n°2"/>
                    </div>
                    <div class="space white no-padding">
                        <input type="text" name="infos3" placeholder="Infos n°3"/>
                    </div>
                    <div class="space white">
                        <input type="text" name="description" placeholder="Description du projet"/>
                    </div>
                    <div class="space white no-padding">
                        <input class="button" type="submit" value="Envoyer"/>
                    </div>
                </form>
            </div>
            <?php
        }
    }

    public function seeDeleteEditProduct(){
        if(isset($_SESSION) && !empty($_SESSION) && $_SESSION['type'] == "admin") {
            ?>
            <div class="product space white newProduct">
                <h3>Supprimer un projet</h3>
                <form class="choices" method="post" action="<?php echo 'index.php?action=deleteProduction' ?>">
                    <label for="id">Choisir le projet à surpprimer</label><br />
                    <select name="id" id="deleteID">
                        <?php
                        $this->sqlPrepare($this->sqlSelectId, $this->emptyArray);
                        while ($data = $this->request->fetch()){
                            echo '<option value="'.$data['id'].'">'.$data['id'].'</option>';
                        }?>
                    </select>
                    <div class="space white no-padding">
                        <input class="button" type="submit" value="Supprimer"/>
                    </div>
                </form>
                <h3>Modifier un projet</h3>
                <form class="choices" method="post" action="<?php echo 'index.php?action=editProduction' ?>">
                    <label for="id">Choisir le projet à surpprimer</label><br />
                    <select name="id" id="editID">
                        <?php
                        $this->sqlPrepare($this->sqlSelectId, $this->emptyArray);
                        while ($data = $this->request->fetch()){
                            echo '<option value="'.$data['id'].'">'.$data['id'].'</option>';
                        }?>
                    </select>
                    <div class="space white no-padding">
                        <input class="button" type="submit" value="Modifier"/>
                    </div>
                </form>
            </div>
            <?php
        }
    }

    public function seeEditProduct(){
        if(isset($_GET['action']) && $_GET['action'] == 'editProduction'){
            $this->sqlPrepare($this->sqlSeeEditProduction, $this->arrayEditProduct());
            while($data = $this->request->fetch()){
                ?>
                <div class="product space white newProduct">
                    <h3>Modifier un projet</h3>
                    <form method="post" action="<?php echo 'index.php?action=sendEditProduction&id='.$data['id'].'' ?>">
                        <div class="space white no-padding">
                            <input type="text" name="name" value="<?= $data['name'] ?>"/>
                        </div>
                        <div class="space white">
                            <input type="url" name="href" value="<?= $data['href'] ?>"/>
                        </div>
                        <div class="space white no-padding">
                            <input type="text" name="infos1" value="<?= $data['infos1'] ?>"/>
                        </div>
                        <div class="space white no-padding">
                            <input type="text" name="infos2" value="<?= $data['infos2'] ?>"/>
                        </div>
                        <div class="space white no-padding">
                            <input type="text" name="infos3" value="<?= $data['infos3'] ?>"/>
                        </div>
                        <div class="space white">
                            <input type="text" name="description" value="<?= $data['description'] ?>"/>
                        </div>
                        <div class="space white no-padding">
                            <input class="button" type="submit" value="Modifier"/>
                        </div>
                    </form>
                </div>
                <?php
            }
        }
    }

}