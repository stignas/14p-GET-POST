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
$message = 'Error occured. Check your inputs and try again.';
$newTask = $_GET['todo'];
$duedatetime = $_GET['date'] . ' ' . $_GET['time'];
$createdAt = date('Y-m-d H:i');
?>
<!--# ---------------- Patikrinam ar visi laukai įvesti ------------------------------>

<?php if ($newTask != '' && $_GET['date'] != '' && $_GET['time'] != '' && ($createdAt < $duedatetime)): ?>

    <!--# ---------------- Įrašom naujus įvestus duomenis į masyvą -------------------->
    <?php
    $taskArray[] = [
        'todo' => $newTask,
        'createdAt' => $createdAt,
        "duedatetime" => $duedatetime
    ];
    ?>
    <?php file_put_contents('data.json', json_encode($taskArray, JSON_PRETTY_PRINT));
//        <!-- Pranešam apie sėkmingai įrašytą naują užduotį į failą -->
    $message = 'Task <i>' . $newTask . '</i> created.' ?>

<?php endif ?>
<!-- Jeigu forma nepilnai užpildyta, pranešame apie klaidą ir įrašo į JSON failą nedarome.-->
<h2> <?= $message ?></h2>
<!-- Redirectinam po 2s į pradinį puslapį -->
<script>
    setTimeout(() => {
        window.location = './index.php'
    }, 2000)
</script>
</body>
</html>




