<?php
/** @var \Dariam\Blog\Block\Post\RecentlyViewed $block */

if (!($posts = $block->getPosts())) {
    return;
}
?>
<section title="Recently Viewed Posts">
    <h2>Recently Viewed Posts</h2>
    <div class="recently-viewed-slider-wrapper campus-slider">
        <?php foreach ($posts as $post) : ?>
            <?php $author = $block->getPostAuthor($post); ?>
            <div class="post">
                <a class="post-item-image" href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/images/post-placeholder.png" alt="<?= $post->getName() ?>"/>
                </a>
                <a class="post-item-title"
                   href="/<?= $post->getUrl() ?>"
                   title="<?= $post->getName() ?>"
                ><?= $post->getName() ?></a>
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
