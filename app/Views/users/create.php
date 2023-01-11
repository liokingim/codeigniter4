<h2><?= esc($title); ?></h2>

<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="/users/create" method="post">
    <?= csrf_field() ?>

    <label for="title">Name</label>
    <input type="text" name="name" /><br />

    <label for="email">Email</label>
    <input type="text" name="email" /><br />

    <input type="submit" name="submit" value="Create users" />
</form>