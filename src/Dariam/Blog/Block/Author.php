<?php
declare(strict_types=1);

namespace Dariam\Blog\Block;

use Dariam\Blog\Model\Author\Entity as AuthorEntity;
use Dariam\Blog\Model\Post\Entity as PostEntity;

class Author extends \Dariam\Framework\View\Block
{
    private \Dariam\Framework\Http\Request $request;

    private \Dariam\Blog\Model\Post\Repository $postRepository;

    protected string $template = '../src/Dariam/Blog/view/author.php';

    /**
     * @param \Dariam\Framework\Http\Request $request
     * @param \Dariam\Blog\Model\Post\Repository $postRepository
     */
    public function __construct(
        \Dariam\Framework\Http\Request $request,
        \Dariam\Blog\Model\Post\Repository $postRepository
    ) {
        $this->request = $request;
        $this->postRepository = $postRepository;
    }

    /**
     * @return AuthorEntity
     */
    public function getAuthor(): AuthorEntity
    {
        return $this->request->getParameter('author');
    }

    /**
     * @return PostEntity[]
     */
    public function getAuthorPosts(): array
    {
        return $this->postRepository->getByAuthorId($this->getAuthor()->getAuthorId());
    }
}
