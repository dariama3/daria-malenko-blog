<?php
/** @var \Dariam\Blog\Block\Category $block */
?>
<section title="Posts">
    <h1><?= $block->getCategory()->getName() ?></h1>
    <div class="post-list">
        <?php foreach ($block->getCategoryPosts() as $post) : ?>
            <?php $author = $block->getPostAuthor($post); ?>
            <div class="post">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/images/post-placeholder.png" alt="<?= $post->getName() ?>" width="200"/>
                    <h3><?= $post->getName() ?></h3>
                </a>
                <?php if ($author) : ?>
                    <a href="<?= $author->getUrl() ?>"><?= $author->getName() ?></a>
                <?php else : ?>
                    <span>admin</span>
                <?php endif ?>
                <p><?= $post->getCreatedAt() ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
