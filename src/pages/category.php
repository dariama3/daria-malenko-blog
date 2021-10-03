<section title="Posts">
    <h1><?= $data['name'] ?></h1>
    <div class="post-list">
        <?php foreach (catalogGetCategoryPosts($data['category_id']) as $post) : ?>
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
