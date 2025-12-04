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

    <link rel="stylesheet" href="<?= $link->asset('css/rootStyle.css') ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-root">
    <div class="container-fluid">

        <!-- Hamburger Menu Icon -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Logo Dropdown -->
        <div class="dropdown ms-auto order-lg-last">
            <!-- Logo -->
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle-no-caret"
               id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= $link->asset("images/gg_logo.png") ?>" alt="Logo" class="navbar-logo">
            </a>

            <!-- Dropdown Items -->
            <ul class="dropdown-menu dropdown-menu-end text-small shadow navbar-dropdown" aria-labelledby="userDropdown">
                <li class="px-3 py-1">
                    <span class="text-muted small navbar-user"> <?= $auth?->user?->getUsername() ?> </span>
                </li>
                <li>
                    <a class="dropdown-item text-danger navbar-logout" href="<?= $link->url('home.logout') ?>">
                        Log Out
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Menu -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $link->url('home.index') ?>">Characters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $link->url('monsters.index') ?>">Monsters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Encounters</a>
                </li>
            </ul>
        </div>

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
