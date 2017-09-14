<?php namespace Tuke\Themes\Triangle\Http\Controllers\Blog;

use Tuke\Plugins\Blog\Models\Contracts\PostModelContract;
use Tuke\Plugins\Blog\Models\Post;
use Tuke\Plugins\Blog\Repositories\CategoryRepository;
use Tuke\Plugins\Blog\Repositories\Contracts\CategoryRepositoryContract;
use Tuke\Plugins\Blog\Repositories\Contracts\PostRepositoryContract;
use Tuke\Plugins\Blog\Repositories\PostRepository;
use Tuke\Themes\Triangle\Http\Controllers\AbstractController;

class PostController extends AbstractController
{
    /**
     * @var Post
     */
    protected $post;

    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    public function __construct(PostRepositoryContract $repository, CategoryRepositoryContract $categoryRepository)
    {
        parent::__construct();

        $this->repository = $repository;

        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param Post $item
     * @return mixed
     */
    public function handle(PostModelContract $item, array $data)
    {
        $this->dis = $data;

        $this->post = $item;

        $this->getMenu('category', $this->dis['categoryIds']);

        $happyMethod = '_template_' . studly_case($item->page_template);
        if (method_exists($this, $happyMethod)) {
            return $this->$happyMethod();
        }
        return $this->defaultTemplate();
    }

    /**
     * @return mixed
     */
    protected function defaultTemplate()
    {
        return $this->view('front.post-templates.default');
    }
}
