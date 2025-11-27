<?php

/** @var string $contentHTML */
/** @var \Framework\Core\IAuthenticator $auth */
/** @var \Framework\Support\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= App\Configuration::APP_NAME ?></title>
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $link->asset('favicons/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $link->asset('favicons/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $link->asset('favicons/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= $link->asset('favicons/site.webmanifest') ?>">
    <link rel="shortcut icon" href="<?= $link->asset('favicons/favicon.ico') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= $link->asset('css/styl.css') ?>">
    <script src="<?= $link->asset('js/script.js') ?>"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #000d12;">
    <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="<?= $link->url('home.index') ?>">
            <img src="<?= $link->asset('images/gg_logo.png') ?>" alt="Logo" style="height: 40px;">
        </a>

        <!-- Hamburger button for small screens -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- Centered navigation links -->
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= $link->url('characters.index') ?>">Characters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= $link->url('monsters.index') ?>">Monsters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= $link->url('encounters.index') ?>">Encounters</a>
                </li>
            </ul>

            <!-- User info + Logout -->
            <?php if ($auth?->isLogged()) { ?>
                <div class="d-flex align-items-center text-white ms-auto">
                    <span class="me-3">User: <b><?= $auth?->user?->name ?></b></span>
                    <a class="btn btn-outline-light btn-sm" href="<?= $link->url('auth.logout') ?>">Log out</a>
                </div>
            <?php } else { ?>
                <div class="d-flex align-items-center text-white ms-auto">
                    <a class="btn btn-outline-light btn-sm" href="<?= App\Configuration::LOGIN_URL ?>">Log in</a>
                </div>
            <?php } ?>
        </div>

    </div>
</nav>

<nav class="navbar navbar-expand-sm bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= $link->url('home.index') ?>">
            <img src="<?= $link->asset('images/gg_logo.png') ?>" title="<?= App\Configuration::APP_NAME ?>" alt="Framework Logo">
        </a>
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= $link->url('home.contact') ?>">Contact</a>
            </li>
        </ul>
        <?php if ($auth?->isLogged()) { ?>
            <span class="navbar-text">Logged in user: <b><?= $auth?->user?->name ?></b></span>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $link->url('auth.logout') ?>">Log out</a>
                </li>
            </ul>
        <?php } else { ?>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= App\Configuration::LOGIN_URL ?>">Log in</a>
                </li>
            </ul>
        <?php } ?>
    </div>
</nav>

<!-- Site content -->
<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>
</body>
</html>
