<?php
/** @var \Dariam\Framework\View\Renderer $this */
/** @var \Dariam\Blog\Block\Post $block */
$post = $block->getPost();
$author = $block->getAuthor();
?>
<section title="Post" class="post-page content-wrapper">
    <div class="post-media">
        <figure class="post-image">
            <img src="/images/post-placeholder.png" alt="<?= $post->getName() ?>" width="300"/>
        </figure>
        <div class="post-description">
            <h1 class="post-title page-title"><?= $post->getName() ?></h1>
            <?php if ($author) : ?>
                <a href="<?= $author->getUrl() ?>"><?= $author->getName() ?></a>
            <?php else : ?>
                <span>admin</span>
            <?php endif ?>
            <p class="post-content"><?= $post->getContent() ?></p>
            <p class="post-created-at"><?= $post->getCreatedAt() ?></p>
        </div>
    </div>
</section>
<?= $this->render(\Dariam\Blog\Block\Post\RecentlyViewed::class) ?>
