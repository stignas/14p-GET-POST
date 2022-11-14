<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit</title>
</head>
<body>
<?php
# Nustatom laiko zoną.
date_default_timezone_set('Europe/Vilnius');

# ----- Nuskaitom duomenų failą į masyvą ir patikrinam ar jame kas nors yra. -------------

$taskArray = json_decode(file_get_contents('data.json'), true);
if (empty($taskArray)) {
    $taskArray = [];
}
?>
<!--# ---------------- Patikrinam ar visi laukai įvesti ------------------------------>

<?php if ($_GET['todo'] != '' && $_GET['date'] != '' && $_GET['time'] != ''): ?>

<!--# ---------------- Įrašom naujus įvestus duomenis į masyvą ir įrašome į JSON duomenų failą -------------------->

    <?php
    $taskArray[] = [
        'todo' => $_GET['todo'],
        'createdAt' => date('Y-m-d H:i'),
        "duedatetime" => $_GET['date'] . ' ' . $_GET['time']
    ];
    file_put_contents('data.json', json_encode($taskArray, JSON_PRETTY_PRINT)); ?>
<!-- Pranešam apie sėkmingai įrašytą naują užduotį į failą -->
    <h2>Task <i><?= $taskArray[0]['todo'] ?></i> submitted.</h2>
<?php else: ?>

<!-- Jeigu forma nepilnai užpildyta, pranešame apie klaidą ir įrašo į JSON failą nedarome.-->
    <h2>Error occured. Try again.</h2>
<?php endif ?>

<!-- Redirectinam po 2s į pradinį puslapį -->
<script>
    setTimeout(() => {
        window.location = './index.php'
    }, 2000)
</script>
</body>
</html>




