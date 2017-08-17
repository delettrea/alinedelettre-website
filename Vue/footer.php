<?php
?>
<footer class="black">
    <a class="footerGithub" href="https://github.com/delettrea" target="_blank"><i class="fa fa-github-square gitHub" aria-hidden="true"></i><p>delettrea</p></a>
    <p>2017 <a href="index.php">Aline Delettre</a> - <a href="index.php?action=ml">Mentions légales</a>-
        <?php
        if(empty($_SESSION['login'])) {
        echo "<a class='' href='index.php?action=login'>Espace d'administration</a>";
        }
        else{
        echo 'Bievenue sur le site '.$_SESSION['login'].' - <a class="" href="index.php?action=logout">Se déconnecter</a>';
        }
        ?>
    </p>
</footer>
<script src="menu.js"></script>
<script src="production.js"></script>
<script src="index.js"></script>
</body>

</html>
