<?php
declare(strict_types=1);

namespace Dariam\Blog\Block;

use Dariam\Blog\Model\Author\Entity as AuthorEntity;
use Dariam\Blog\Model\Post\Entity as PostEntity;

class Post extends \Dariam\Framework\View\Block
{
    private \Dariam\Framework\Http\Request $request;

    private \Dariam\Blog\Model\Author\Repository $authorRepository;

    protected string $template = '../src/Dariam/Blog/view/post.php';

    /**
     * @param \Dariam\Framework\Http\Request $request
     * @param \Dariam\Blog\Model\Author\Repository $authorRepository
     */
    public function __construct(
        \Dariam\Framework\Http\Request $request,
        \Dariam\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->authorRepository = $authorRepository;
    }

    /**
     * @return PostEntity
     */
    public function getPost(): PostEntity
    {
        return $this->request->getParameter('post');
    }

    /**
     * @return AuthorEntity|null
     */
    public function getAuthor(): ?AuthorEntity
    {
        return $this->authorRepository->getById(
            $this->getPost()->getAuthorId()
        );
    }
}
