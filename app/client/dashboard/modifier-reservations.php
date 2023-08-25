
<?php if ($type_chambre === 'Solo') { ?>
    <!-- Champs pour le type Solo -->
    <?php include 'champs_modification_solo.php'; ?>
<?php } elseif ($type_chambre === 'Doubles') { ?>
    <!-- Champs pour le type Doubles -->
    <?php include 'champs_modification_doubles.php'; ?>
<?php } elseif ($type_chambre === 'Triples') { ?>
    <!-- Champs pour le type Triples -->
    <?php include 'champs_modification_triples.php'; ?>
<?php } elseif ($type_chambre === 'Suite') { ?>
    <!-- Champs pour le type Suite -->
    <?php include 'champs_modification_suite.php'; ?>
<?php } ?>
