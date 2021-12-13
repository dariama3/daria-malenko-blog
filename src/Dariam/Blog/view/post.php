<?php
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

<section title="Recently Viewed Posts">
    <h2>Recently Viewed Posts</h2>
    <div class="recently-viewed-slider-wrapper">
        <div class="recently-viewed-slider">
            <div class="post">
                <a class="post-item-image" href="/post-1" title="Post 1">
                    <img src="/images/post-placeholder.png" alt="Post 1" width="200"/>
                </a>
                <a class="post-item-title" href="/post-1" title="Post 1">Post 1</a>
                <span>Robert Downey Jr.</span>
                <p>2020.12.02</p>
            </div>
            <div class="post">
                <a class="post-item-image" href="/post-2" title="Post 2">
                    <img src="/images/post-placeholder.png" alt="Post 2" width="200"/>
                </a>
                <a class="post-item-title" href="/post-2" title="Post 2">Post 2</a>
                <span>Chris Evans</span>
                <p>2020.01.08</p>
            </div>
            <div class="post">
                <a class="post-item-image" href="/post-3" title="Post 3">
                    <img src="/images/post-placeholder.png" alt="Post 3" width="200"/>
                </a>
                <a class="post-item-title" href="/post-3" title="Post 3">Post 3</a>
                <span>Scarlett Johansson</span>
                <p>2019.02.14</p>
            </div>
        </div>
        <button class="slider-control-prev slider-control button-hover" type="button">
            <span class="slider-control-prev-icon"><i class="fas fa-chevron-left"></i></span>
            <span class="slider-control-prev-title">Previous</span>
        </button>
        <button class="slider-control-next slider-control button-hover" type="button">
            <span class="slider-control-next-icon"><i class="fas fa-chevron-right"></i></span>
            <span class="slider-control-prev-title">Next</span>
        </button>
    </div>
</section>
