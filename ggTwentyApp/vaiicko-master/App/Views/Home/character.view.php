<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Support\View $view */

use App\Configuration;
use App\Models\Character;
/** @var Character $char */


$view->setLayout('root');
?>

<script src="<?= $link->asset('js/changeCharImage.js') ?>" defer></script> <!-- defer loads script after html -->
<script src="<?= $link->asset('js/editChar.js') ?>" defer></script> <!-- defer loads script after html -->

<!-- Alert Messages (for AJAX) -->
<div id="message-box" class="mt-3 alert d-none" role="alert"></div>

<div class="char-card">
    <h2 class="char-form-heading text-center">
        CHARACTER SHEET
    </h2>

    <form method="post" action="<?= $link->url('edit') ?>" enctype="multipart/form-data" id="edit-character-form">
        <input type="hidden" name="character-id" id="character-id" value="<?= $char->getId() ?>">

        <div class="row">
            <!-- Image Picker -->
            <div class="col-sm-6 mb-4 mb-sm-0">
                <label class="d-block text-white text-center mb-2">Character Image</label>

                <div class="edit-show-image mb-3" id="image-area">
                    <img src="<?= $char->getImageUrl() ?>" id="image-preview" alt="Character Image Preview">
                </div>

                <input name="character-img" type="file" id="image-upload" class="form-control image-file-input" accept="image/*">
            </div>
            <!-- Character Info -->
            <div class="col-sm-6">
                <!-- Name -->
                <label for="character-name" class="d-block text-white text-center mb-2">Character Name</label>
                <input name="character-name" type="text" id="character-name" class="form-control custom-input mb-3" placeholder="<?= $char->getName() ?>" required>

                <hr class="section-separator mb-3">

                <!-- HP / AC -->
                <div class="row g-3 mt-4">
                    <div class="col-4">
                        <label for="character-cur-hp" class="d-block text-white text-center mb-2">HP</label>
                        <input name="character-cur-hp" type="number" id="character-hp" class="form-control" value="<?= $char->getCurrentHp() ?>" min="0" required>
                    </div>
                    <div class="col-4">
                        <label for="character-hp" class="d-block text-white text-center mb-2">MAX HP</label>
                        <input name="character-hp" type="number" id="character-hp" class="form-control" value="<?= $char->getHp() ?>" min="0" required>
                    </div>
                    <div class="col-4">
                        <label for="character-ac" class="d-block text-white text-center mb-2">AC</label>
                        <input name="character-ac" type="number" id="character-ac" class="form-control" value="<?= $char->getAc() ?>" min="0" required>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Delete Button -->
<div class="d-flex justify-content-center">
    <a href="<?= $link->url('delete', ['id' => $char->getId()]) ?>" class="delete-char-btn">
        DELETE CHARACTER
    </a>
</div>