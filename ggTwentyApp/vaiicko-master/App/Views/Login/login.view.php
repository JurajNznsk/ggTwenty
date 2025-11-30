<?php

/** @var string|null $message */
/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Support\View $view */

$view->setLayout('auth');
?>

<!-- Sign In Button -->
<ul class="auth-button">
    <li>
        <a href="<?= $link->url('signin.index') ?>" class="signin-btn">
            Sign In
        </a>
    </li>
</ul>

<!-- Log In Card -->
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin login-card-bg my-5">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="text-center mb-3">
                        <img src="<?= $link->asset("images/gg_logo.png") ?>" alt="Logo" class="img-fluid login-logo">
                    </div>

                    <!-- Validation Error messages -->
                    <div class="text-center text-danger mb-3">
                        <?= @$message ?>
                    </div>

                    <!-- Forms -->
                    <form class="form-signin" method="post" action="<?= $link->url("login") ?>">
                        <!-- Username -->
                        <div class="form-label-group mb-3">
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
                        <button type="submit" name="submit" class="btn btn-primary">
                            Log In
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>