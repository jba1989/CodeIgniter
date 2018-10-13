<?php

/**
 * Created by PhpStorm.
 * User: lonelygod
 * Date: 2018/10/10
 * Time: 下午 9:23
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<head>
    <style>
        table {
            margin:auto;
        }

        table, td, th {
            border:solid 1px black;
        }

        td {
            padding: 0.5em 1.5em 0.5em 1.5em;
            text-align: center;
        }

        th {
            background-color: RGB(100,100,100);
            color: white;
        }

        tr.type1 {
            background-color: RGB(235,235,235);
        }

    </style>
</head>
<body>
    <table>
        <caption>三十六小時天氣預報</caption>
        <tr>
            <th>地區</th>
            <th>時間</th>
            <th>天氣狀況</th>
            <th>降雨機率</th>
            <th>溫度</th>
        </tr>
        <?php foreach ($data as $num => $location): ?>
            <tr class="type<?php echo ($num % 2);?>">
                <td rowspan="3"><?php echo $location['locationName']; ?></td>
                <td><?php echo $location['weatherElement'][0]['time'][0]['startTime'] . '~' . $location['weatherElement'][0]['time'][0]['endTime']; ?></td>
                <td><?php echo $location['weatherElement'][0]['time'][0]['parameter']['parameterName']; ?></td>
                <td><?php echo $location['weatherElement'][1]['time'][0]['parameter']['parameterName'] . '%'; ?></td>
                <td><?php echo $location['weatherElement'][2]['time'][0]['parameter']['parameterName'] . '度'; ?></td>
            <tr class="type<?php echo ($num % 2);?>">
                <td><?php echo $location['weatherElement'][0]['time'][1]['startTime'] . '~' . $location['weatherElement'][0]['time'][1]['endTime']; ?></td>
                <td><?php echo $location['weatherElement'][0]['time'][1]['parameter']['parameterName']; ?></td>
                <td><?php echo $location['weatherElement'][1]['time'][1]['parameter']['parameterName'] . '%'; ?></td>
                <td><?php echo $location['weatherElement'][2]['time'][1]['parameter']['parameterName'] . '度'; ?></td>
            </tr>
            <tr class="type<?php echo ($num % 2);?>">
                <td><?php echo $location['weatherElement'][0]['time'][2]['startTime'] . '~' . $location['weatherElement'][0]['time'][2]['endTime']; ?></td>
                <td><?php echo $location['weatherElement'][0]['time'][2]['parameter']['parameterName']; ?></td>
                <td><?php echo $location['weatherElement'][1]['time'][2]['parameter']['parameterName'] . '%'; ?></td>
                <td><?php echo $location['weatherElement'][2]['time'][2]['parameter']['parameterName'] . '度'; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<body>