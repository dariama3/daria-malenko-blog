<?php
declare(strict_types=1);

namespace Dariam\Blog\Controller;

use Dariam\Blog\Block\Post\RecentlyViewed;
use Dariam\Blog\Model\Post\Entity;
use Dariam\Framework\Http\ControllerInterface;
use Dariam\Framework\Http\Response\Raw;

class Post implements ControllerInterface
{
    private \Dariam\Framework\View\PageResponse $pageResponse;

    private \Dariam\Framework\Http\Request $request;

    private \Dariam\Framework\Session\Session $session;

    /**
     * @param \Dariam\Framework\View\PageResponse $pageResponse
     * @param \Dariam\Framework\Http\Request $request
     * @param \Dariam\Framework\Session\Session $session
     */
    public function __construct(
        \Dariam\Framework\View\PageResponse $pageResponse,
        \Dariam\Framework\Http\Request $request,
        \Dariam\Framework\Session\Session $session
    ) {
        $this->pageResponse = $pageResponse;
        $this->request = $request;
        $this->session = $session;
    }

    /**
     * @return Raw
     */
    public function execute(): Raw
    {
        /** @var Entity $post */
        $post = $this->request->getParameter('post');
        $recentlyViewedPosts = (array) $this->session->getData(RecentlyViewed::SESSION_KEY_RECENTLY_VIEWED_PRODUCTS);
        array_unshift($recentlyViewedPosts, $post->getPostId());

        $this->session->setData(
            RecentlyViewed::SESSION_KEY_RECENTLY_VIEWED_PRODUCTS,
            array_unique($recentlyViewedPosts)
        );

        return $this->pageResponse->setBody(\Dariam\Blog\Block\Post::class);
    }
}
