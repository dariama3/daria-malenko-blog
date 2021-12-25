<?php
/** @var \Dariam\Blog\Block\CategoryList $block */
?>
<div class="menu__wrapper menu__wrapper--top" id="navigation-menu">
    <ul class="menu__list">
        <?php foreach ($block->getCategories() as $category) : ?>
            <li>
                <a class="menu__item" href="/<?= $category->getUrl() ?>"><?= $category->getName() ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
