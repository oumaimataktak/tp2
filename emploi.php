<?php
session_start();

$jours = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
$heures = ['08-09', '09-10', '10-11', '11-12', '12-13', '13-14', '14-15', '15-16', '16-17'];

if (isset($_POST['submit'])) {
    $jour = $_POST['jour'];
    $heure = $_POST['heure'];
    $matiere = $_POST['matiere'];

    if (!isset($_SESSION['emploi'])) {
        $_SESSION['emploi'] = [];
    }

    if (!isset($_SESSION['emploi'][$jour])) {
        $_SESSION['emploi'][$jour] = [];
    }

    $_SESSION['emploi'][$jour][$heure] = $matiere;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Emploi</title>
</head>
<body>
    <button type="button" onclick="imprimer()">Imprimer</button>
    <form action="emploi.php" method="post">
        <label for="jour">Jour:</label>
        <select name="jour" id="jour" required>
            <option value="">---Choisir le jours---</option>
            <?php foreach ($jours as $jour): ?>
                <option value="<?= $jour ?>"><?= $jour ?></option>
            <?php endforeach; ?>
        </select>

        <label for="heure">Heure:</label>
        <select name="heure" id="heure" required>
            <option value="">---Choisir l'heure---</option>
            <?php foreach ($heures as $heure): ?>
                <option value="<?= $heure ?>"><?= $heure ?></option>
            <?php endforeach; ?>
        </select>

        <label for="matiere">Matière:</label>
        <input type="text" name="matiere" required>

        <button type="submit" name="submit">Envoyer</button>
    </form>

    <table border="1">
        <tr>
            <td></td>
            <?php foreach ($heures as $heure): ?>
                <td><?= $heure ?></td>
            <?php endforeach; ?>
        </tr>

        <?php foreach ($jours as $jour): ?>
            <tr>
                <td><?= $jour ?></td>
                <?php foreach ($heures as $heure): ?>
                    <?php if (isset($_SESSION['emploi'][$jour][$heure])): ?>
                        <td><?= $_SESSION['emploi'][$jour][$heure] ?></td>
                    <?php else: ?>
                        <td></td>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<script>
function imprimer() {
    var content = document.getElementsByTagName('table')[0].outerHTML;
    var win = window.open('', '_blank');
    win.document.write('<html><head><title>Emploi</title></head><body>');
    win.document.write('<h1>Emploi</h1>');
    win.document.write(content);
    win.document.write('</body></html>');
    win.print();
    win.close();
}
</script>
