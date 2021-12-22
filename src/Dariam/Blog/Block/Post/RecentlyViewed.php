<?php
declare(strict_types=1);

namespace Dariam\Blog\Block\Post;

use Dariam\Blog\Model\Author\Entity as AuthorEntity;
use Dariam\Blog\Model\Post\Entity as PostEntity;

class RecentlyViewed extends \Dariam\Framework\View\Block
{
    public const SESSION_KEY_RECENTLY_VIEWED_PRODUCTS = 'recently_viewed_posts';

    public const RECENTLY_VIEWED_PRODUCTS_COUNT = 16;

    protected string $template = '../src/Dariam/Blog/view/post/recently_viewed.php';

    private \Dariam\Framework\Http\Request $request;

    private \Dariam\Framework\Session\Session $session;

    private \Dariam\Blog\Model\Author\Repository $authorRepository;

    private \Dariam\Blog\Model\Post\Repository $postRepository;

    /**
     * @param \Dariam\Framework\Http\Request $request
     * @param \Dariam\Framework\Session\Session $session
     * @param \Dariam\Blog\Model\Author\Repository $authorRepository
     * @param \Dariam\Blog\Model\Post\Repository $postRepository
     */
    public function __construct(
        \Dariam\Framework\Http\Request $request,
        \Dariam\Framework\Session\Session $session,
        \Dariam\Blog\Model\Author\Repository $authorRepository,
        \Dariam\Blog\Model\Post\Repository $postRepository
    ) {
        $this->session = $session;
        $this->authorRepository = $authorRepository;
        $this->postRepository = $postRepository;
        $this->request = $request;
    }

    /**
     * @return PostEntity[]
     */
    public function getPosts(): array
    {
        $postIds = (array) $this->session->getData(self::SESSION_KEY_RECENTLY_VIEWED_PRODUCTS);

        /** @var PostEntity $post */
        if ($post = $this->request->getParameter('post')) {
            if (($key = array_search($post->getPostId(), $postIds, true)) !== false) {
                unset($postIds[$key]);
            }
        }

        if (empty($postIds)) {
            return [];
        }

        $in = str_repeat('?,', count($postIds) - 1) . '?';
        $select = $this->postRepository->select()
            ->where("post_id IN($in)")
            ->limit(self::RECENTLY_VIEWED_PRODUCTS_COUNT)
            ->orderBy(sprintf('FIELD(post_id,%s)', implode(',', $postIds)));

        return $this->postRepository->fetchEntities($select, array_values($postIds));
    }

    /**
     * @param PostEntity $post
     * @return AuthorEntity|null
     */
    public function getPostAuthor(PostEntity $post): ?AuthorEntity
    {
        return $this->authorRepository->getById(
            $post->getAuthorId()
        );
    }
}
