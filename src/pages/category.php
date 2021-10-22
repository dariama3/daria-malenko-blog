<?php
/** @var \Dariam\Blog\Model\Category\Entity $category */
/** @var \Dariam\Blog\Model\Post\Entity[] $posts */
?>
<section title="Posts">
    <h1><?= $category->getName() ?></h1>
    <div class="post-list">
        <?php foreach ($posts as $post) : ?>
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
