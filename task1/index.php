<?php

$data = [
	['Иванов', 'Математика', 5],
	['Иванов', 'Математика', 4],
	['Иванов', 'Математика', 5],
	['Петров', 'Математика', 5],
	['Сидоров', 'Физика', 4],
	['Иванов', 'Физика', 4],
	['Петров', 'ОБЖ', 4],
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

$subjects = [];
foreach ($result as $name => $scores) {
    foreach ($scores as $k => $v) {
        if (!in_array($k, $subjects))
            $subjects[] = $k;
    }
}

    echo '<pre>';
    print_r($result);
    echo '</pre>';

    echo '<pre>';
    print_r($subjects);
    echo '</pre>';
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
            //ksort($subjects);
            echo "<tr><td>$name</td>";

            print_r($subjectScore);

            $i = 0;
            foreach ($subjects as $subject){
                $j = 0;
                foreach ($subjectScore as $k=>$v){
                    if($k == $subject && $i == $j)
                        echo "<td>$v</td>";
                    else{
                        if($i == $j)
                            echo "<td></td>";
                    }
                    $j ++;
                }
                $i++;
            }
            
            echo "</tr>";
        }
    ?>
    </table>

</body>
</html>
