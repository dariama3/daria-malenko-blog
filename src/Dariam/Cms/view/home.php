<?php
/** @var \Dariam\Framework\View\Renderer $this */
?>
<section class="welcome-section">
    <div class="content-wrapper">
        <div class="content">
            <div class="welcome-section-title">
                <h1>Lorem ipsum dolor sit amet</h1>
                <h2>consectetur adipisicing elit.</h2>
            </div>
            <div class="welcome-section-items">

                <!-- 1 -->
                <div class="welcome-section-item">
                    <div class="welcome-section-item-image"></div>
                    <h3>Lorem ipsum dolor</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto dolore illo nisi optio
                        repudiandae? Architecto cumque exercitationem, facilis minima nesciunt nisi recusandae tempora
                        voluptas.</p>
                </div>

                <!-- 2 -->
                <div class="welcome-section-item">
                    <div class="welcome-section-item-image"></div>
                    <h3>Lorem ipsum dolor</h3>
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, tempora voluptate? A dolor earum
                        eveniet excepturi fugit incidunt laudantium magni maiores, veniam?</p>
                </div>

                <!-- 3 -->
                <div class="welcome-section-item">
                    <div class="welcome-section-item-image"></div>
                    <h3>Lorem ipsum dolor</h3>
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, consequatur cum debitis
                        distinctio dolorem eius est hic ipsum molestiae natus omnis porro sit.</p>
                </div>
            </div>
            <a href="javascript: void(0)" class="read-more-btn button-hover">
                Read More
            </a>
        </div>
    </div>
</section>
<?= $this->render(\Dariam\Blog\Block\Post\RecentlyViewed::class) ?>
