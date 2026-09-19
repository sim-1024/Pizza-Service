<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if (isset($script)): ?>
        <script src="<?= $script ?>" defer></script>
    <?php endif; ?>

    <link rel="stylesheet" href="assets/css/style.css">

    <title><?= $title ?> </title>
    <link rel="icon" type="image/png" href="../../../assets/images/logo.png">
</head>