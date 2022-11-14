<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<?php
$todos = json_decode(file_get_contents('data.json'), true);
?>
<body>

<fieldset>
    <legend>New TODO</legend>
    <form action="submit.php" method='GET'>
        <input type='text' name="todo" placeholder="Enter the task...">
        <input type="date" name="date">
        <input type="time" name="time">
        <input type="submit">
    </form>
</fieldset>

<fieldset>
    <legend>TODOs</legend>
    <table style="width: 100%">
        <?php if (!empty($todos)): ?>
            <?php foreach ($todos as $key => $task): ?>
                <tr>
                    <td style="text-align: left"><?= trim($task['todo']) ?> </td>
                    <td style="text-align: right">Created At: <?= $task['createdAt'] ?></td>
                    <td>
                        <form method="POST" action="delete.php">
                            <button type="submit"><input type="hidden" name="id" value="<?= $key ?>">Delete</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>Due date: <?= $task['duedatetime'] ?></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</fieldset>
</body>
</html>