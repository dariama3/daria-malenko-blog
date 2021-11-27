<?php
/** @var \Dariam\Blog\Block\Post $block */
$post = $block->getPost();
$author = $block->getAuthor();
?>
<section title="Post">
    <img src="/images/post-placeholder.png" alt="<?= $post->getName() ?>" width="300"/>
    <h1><?= $post->getName() ?></h1>
    <?php if ($author) : ?>
        <a href="<?= $author->getUrl() ?>"><?= $author->getName() ?></a>
    <?php else : ?>
        <span>admin</span>
    <?php endif ?>
    <p><?= $post->getContent() ?></p>
    <p><?= $post->getCreatedAt() ?></p>
</section>
