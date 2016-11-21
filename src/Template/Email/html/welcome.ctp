<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    </title>
</head>
<body>
<?php echo $this->fetch('content') ?>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
</title>
    </head>
<body>
<h1>Bienvenue <?=$users->username?>!</h1>
<p>Merci de t'être inscrit sur mon blog. Je t'invite à lire mes articles et à les commenter si tu le désire et à me poser des questions.</p>
<p>Bonne navigation et à bientôt sur mon blog!</p>

<h3>Audrey alias admin </h3>
</body>
</html>