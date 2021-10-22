<?php
/** @var \Dariam\Blog\Model\Category\Entity $category */
?>
<section title="Posts">
    <h1><?= $category->getName() ?></h1>
    <div class="post-list">
        <?php foreach (blogGetCategoryPosts($category->getCategoryId()) as $post) : ?>
            <div class="post">
                <a href="/<?= $post['url'] ?>" title="<?= $post['name'] ?>">
                    <img src="/post-placeholder.png" alt="<?= $post['name'] ?>" width="200"/>
                    <h3><?= $post['name'] ?></h3>
                </a>
                <p><?= $post['author'] ?></p>
                <p><?= $post['created_at'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
