<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete</title>
</head>
<body>

<?php
# nuskaitom JSON failą į duomenų masyvą.
$taskArray = json_decode(file_get_contents('data.json'), true);
# priskiriam iš formos gautą ID kintamąjam
$index = intval($_POST['id']); ?>

<!--Patikrinam ar duomenų masyve yra užduotis su duotu ID, ištrinam iš masyvo ir atnaujinam duomenų failą -->
<?php if (isset($taskArray[$index])): ?>
    <?php $taskToDelete = $taskArray[$index]['todo'];
    unset($taskArray[$index]);
    file_put_contents('data.json', json_encode(array_values($taskArray), JSON_PRETTY_PRINT));
    ?>
    <!-- Pranešame apie sėkmingai ištrintą įrašą -->
    <h3>Užduotis <i>"<?= $taskToDelete ?>"</i> ištrinta.</h3>
<?php else: ?>
    <!-- Pranešame, jeigu įrašas pagal duotą ID neegzistuoja -->
    <h2>Toks įrašas neegzistuoja.</h2>
<?php endif ?>
<!-- Redirectinam atgal į pradinį puslapį po 2s-->
<script>
    setTimeout(() => {
        window.location = './index.php'
    }, 2000)
</script>
</body>
</html>
