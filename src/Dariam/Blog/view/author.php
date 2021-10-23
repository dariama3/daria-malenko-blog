<?php
/** @var \Dariam\Blog\Block\Author $block */
$author = $block->getAuthor();
?>
<section title="Author">
    <h1><?= $author->getName() ?></h1>
    <div class="post-list">
        <?php foreach ($block->getAuthorPosts() as $post) : ?>
            <div class="post">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/post-placeholder.png" alt="<?= $post->getName() ?>" width="200"/>
                    <h3><?= $post->getName() ?></h3>
                </a>
                <p><?= $post->getCreatedAt() ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
