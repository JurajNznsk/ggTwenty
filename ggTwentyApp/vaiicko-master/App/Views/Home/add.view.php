<?php
?>

<div class="add-char">
    <form id="character-form" class="add-char-form p-4 p-md-5 mx-2">
        <h1 class="text-3xl fw-bolder text-center text-light border-bottom pb-3 mb-4">
            Create New Character
        </h1>

        <div class="row g-4 mb-4">
            <!-- Image -->
            <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                <label for="image-upload" class="form-label text-light w-100 text-center">Character Image File</label>
                <!-- Image Preview Area -->
                <div id="image-preview-container" class="image-preview-container mb-3">
                    <!-- Default Image Placeholder SVG -->
                    <svg id="default-placeholder" class="text-secondary" style="width: 64px; height: 64px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <img id="image-preview" src="#" alt="Character Image Preview" class="d-none">
                </div>
            </div>

            <div class="col-12 col-md-6 d-flex flex-column justify-content-between">
                <!-- NAME -->
                <div class="mb-4">
                    <label for="character-name" class="form-label text-light">Character Name</label>
                    <input type="text" id="character-name" name="name" placeholder="Enter Character Name"
                           class="form-control p-3">
                </div>

                <div class="row g-4">
                    <!-- HP -->
                    <div class="col-6">
                        <label for="character-hp" class="form-label text-light w-100 text-center">Health Points (HP)</label>
                        <input type="number" id="character-hp" name="hp" placeholder="HP" min="1"
                               class="form-control p-3 bg-dark text-light border-secondary">
                    </div>
                    <!-- AC -->
                    <div class="col-6">
                        <label for="character-ac" class="form-label text-light w-100 text-center">Armor Class (AC)</label>
                        <input type="number" id="character-ac" name="ac" placeholder="AC" min="1"
                               class="form-control p-3 bg-dark text-light border-secondary">
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. SAVE BUTTON -->
        <div class="mt-4 pt-3 border-top border-secondary d-flex justify-content-center">
            <button type="submit" class="btn btn-save px-5 py-2 text-lg fw-bold text-white">
                Save Character
            </button>
        </div>
    </form>
</div>
