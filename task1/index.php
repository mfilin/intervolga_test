<?php

    $data = [
        ['Иванов', 'Математика', 5],
        ['Иванов', 'Математика', 4],
        ['Иванов', 'Математика', 5],
        ['Петров', 'Математика', 5],
        ['Сидоров', 'Физика', 4],
        ['Иванов', 'Физика', 4],
        ['Петров', 'ОБЖ', 4],
        ['Петров', 'Физика', 5],
    ];

    // Сортировка и суммирование данных
    $result = array_reduce($data, function ($carry, $item) {
        $name = $item[0];
        $subject = $item[1];
        $score = $item[2];

        if (!isset($carry[$name])) {
            $carry[$name] = [];
        }

        if (!isset($carry[$name][$subject])) {
            $carry[$name][$subject] = 0;
        }

        $carry[$name][$subject] += $score;

        return $carry;
    }, []);

    // Получение списка предметов
    $subjects = [];
    foreach ($result as $name => $scores) {
        foreach ($scores as $k => $v) {
            if (!in_array($k, $subjects))
                $subjects[] = $k;
        }
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Баллы школьников</title>
</head>
<body>
    
    <table>
    <?php    
        ksort($result);

        echo "<tr><th></th>";
        foreach ($subjects as $subject) {
            echo "<th>$subject</th>";
        }
        echo "</tr>";

        foreach ($result as $name => $subjectScore) {
            echo "<tr><td>$name</td>";
            foreach ($subjects as $subject){
                if(isset($subjectScore[$subject]))
                    echo "<td>$subjectScore[$subject]</td>";
                else
                    echo "<td></td>";
            }

            echo "</tr>";
        }
    ?>
    </table>

</body>
</html>
