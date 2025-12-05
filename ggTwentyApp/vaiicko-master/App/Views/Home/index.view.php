<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Support\View $view */
/** @var array $characters */

use App\Configuration;

$view->setLayout('root');
?>

<script src="<?= $link->asset('js/characterNameFontSize.js') ?>"></script>

<div class="container my-4 character-card-grid">
    <div class="row g-4 justify-content-center">
        <?php foreach ($characters as $character): ?>
            <?php
                $imageUrl = $character->getImageUrl();
            ?>

            <div class="col-12 col-md-6 col-lg-4">
                <a href="<?= $link->url('character', ['id' => $character->getId()]) ?>" class="text-decoration-none text-dark">
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
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>