<?php

/** @var string|null $message */
/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Support\View $view */

$view->setLayout('auth');
?>

<!-- Sign In Button -->
<a href="<?= $link->url('signin.index') ?>" class="top-btn">Sign In</a>

<!-- Log In Card -->
<div class="container d-flex justify-content-center">
    <div class="card my-5 card-auth">
        <div class="card-body">

            <!-- Logo -->
            <div class="text-center mb-3">
                <img src="<?= $link->asset("images/gg_logo.png") ?>" alt="Logo" class="img-fluid logo-auth">
            </div>

            <!-- Validation Error messages -->
            <div class="text-center text-danger mb-3">
                <?= @$message ?>
            </div>

            <!-- Forms -->
            <form method="post" action="<?= $link->url("login") ?>">
                <!-- Username -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input name="username" type="text" id="username" class="form-control" placeholder="Username"
                           required autofocus>
                </div>
                <!-- Password -->
                <div class="form-label-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" id="password" class="form-control"
                           placeholder="Password" required>
                </div>
                <!-- Accept Button -->
                <button type="submit" name="submit" class="btn auth-accept">
                    Log In
                </button>
            </form>

        </div>
    </div>
</div>
