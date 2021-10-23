<?php
/** @var \Dariam\Blog\Block\Category $block */
?>
<section title="Posts">
    <h1><?= $block->getCategory()->getName() ?></h1>
    <div class="post-list">
        <?php foreach ($block->getCategoryPosts() as $post) : ?>
            <div class="post">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/post-placeholder.png" alt="<?= $post->getName() ?>" width="200"/>
                    <h3><?= $post->getName() ?></h3>
                </a>
                <p><?= $post->getAuthor() ?></p>
                <p><?= $post->getCreatedAt() ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
