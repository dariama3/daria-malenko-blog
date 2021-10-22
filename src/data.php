<?php
declare(strict_types=1);

function blogGetCategories(): array
{
    return [
        1 => [
            'category_id' => 1,
            'name'        => 'Avengers',
            'url'         => 'avengers',
            'posts'       => [1, 2, 3],
        ],
        2 => [
            'category_id' => 2,
            'name'        => 'Star Wars',
            'url'         => 'star-wars',
            'posts'       => [3, 4, 5],
        ],
        3 => [
            'category_id' => 3,
            'name'        => 'Pokemon',
            'url'         => 'pokemon',
            'posts'       => [2, 4, 6],
        ],
    ];
}

function blogGetPosts(): array
{
    return [
        1 => [
            'post_id'    => 1,
            'name'       => 'Post 1',
            'url'        => 'post-1',
            'content'    => 'Post 1 Content',
            'author'     => 'Robert Downey Jr.',
            'created_at' => '2019.11.28',
        ],
        2 => [
            'post_id'    => 2,
            'name'       => 'Post 2',
            'url'        => 'post-2',
            'content'    => 'Post 2 Content',
            'author'     => 'Chris Evans',
            'created_at' => '2019.12.01',
        ],
        3 => [
            'post_id'    => 3,
            'name'       => 'Post 3',
            'url'        => 'post-3',
            'content'    => 'Post 3 Content',
            'author'     => 'Scarlett Johansson',
            'created_at' => '2019.12.02',
        ],
        4 => [
            'post_id'    => 4,
            'name'       => 'Post 4',
            'url'        => 'post-4',
            'content'    => 'Post 4 Content',
            'author'     => 'Zoe Saldana',
            'created_at' => '2020.02.02',
        ],
        5 => [
            'post_id'    => 5,
            'name'       => 'Post 5',
            'url'        => 'post-5',
            'content'    => 'Post 5 Content',
            'author'     => 'Chris Pratt',
            'created_at' => '2020.10.02',
        ],
        6 => [
            'post_id'    => 6,
            'name'       => 'Post 6',
            'url'        => 'post-6',
            'content'    => 'Post 6 Content',
            'author'     => 'Chris Hemsworth',
            'created_at' => '2020.12.04',
        ],
    ];
}

function blogGetCategoryPosts(int $categoryId): array
{
    $categories = blogGetCategories();

    if (!isset($categories[$categoryId])) {
        throw new InvalidArgumentException("Category with ID $categoryId does not exist");
    }

    $postsForCategory = [];
    $posts = blogGetPosts();

    foreach ($categories[$categoryId]['posts'] as $postId) {
        if (!isset($posts[$postId])) {
            throw new InvalidArgumentException("Post with ID $postId from category $categoryId does not exist");
        }

        $postsForCategory[] = $posts[$postId];
    }

    return $postsForCategory;
}

function blogGetPostByUrl(string $url): ?array
{
    $data = array_filter(
        blogGetPosts(),
        static function ($post) use ($url) {
            return $post['url'] === $url;
        }
    );

    return array_pop($data);
}
