<!DOCTYPE html>
<html>
<head>
    <title>Tableau multidimensionnel</title>
</head>
<body>
    <table border=1>
        <tr>
            <th>nom matiere</th>
            <th>note1</th>
            <th>note2</th>
            <th>note3</th>
            <th>Moyenne</th>
        </tr>
        <?php
        $tab6 = ["java" => [14, 15, 8], "html" => [12.5, 15, 11], "js" => [19.25, 13, 17], "css" => [12, 17, 15], "angular" => [8, 14, 13], "nodejs" => [12, 10, 12]];

        // Use the foreach loop to iterate over the $tab6 array
        foreach ($tab6 as $matiere => $notes) {
            echo "<tr>
<td>$matiere</td>
<td>" . $notes[0] . "</td>
<td>" . $notes[1] . "</td>
<td>" . $notes[2] . "</td>
<td>" . round(array_sum($notes) / count($notes), 2) . "</td>
</tr>";
        }
        ?>
    </table>
</body>
</html>