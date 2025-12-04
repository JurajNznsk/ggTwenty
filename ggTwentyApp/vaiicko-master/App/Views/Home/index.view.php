<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Support\View $view */
/** @var array $characters */

use App\Configuration;

$view->setLayout('root');
?>

<div class="container-fluid my-4">
    <div class="row g-4 justify-content-center">
        <?php foreach ($characters as $character): ?>
            <?php
                $imageUrl = $character->getImageUrl();
            ?>

            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="character-card">
                    <div class="character-name">
                        <?= $character->getName() ?>
                    </div>

                    <div class="character-image">
                        <img
                                src="<?= $link->asset(Configuration::UPLOAD_DIR . $imageUrl) ?>"
                                alt="Image of <?= $character->getName() ?>"
                        >
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>