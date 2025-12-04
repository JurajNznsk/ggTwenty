<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Support\View $view */
/** @var array $characters */

$view->setLayout('root');
?>

<!-- Characters screen body -->
<?php if (!empty($characters)): ?>
    <p> <?= $characters[0]->getName() ?> </p>
<?php endif; ?>
