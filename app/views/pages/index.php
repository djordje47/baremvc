<?php require APP_ROOT . '/views/includes/header.php' ?>
<h1><?= $data['title']; ?></h1>

<?php foreach ($data['users'] as $user) : ?>
    <p><?= $user->first_name ?> <?= $user->last_name ?></p>
<?php endforeach; ?>
<?php require APP_ROOT . '/views/includes/footer.php' ?>
