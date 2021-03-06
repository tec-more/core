<?php namespace Tuke\Base\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Tuke\Base\Repositories\Eloquent\EloquentBaseRepository;

abstract class BaseController extends Controller
{
    /**
     * @var Request
     */
    public $request;

    /**
     * @var EloquentBaseRepository
     */
    protected $repository;

    /**
     * @var string
     */
    public $adminRoute;

    /**
     * Specify all variables will be passed to view
     * @var array
     */
    public $dis = [];

    public function __construct()
    {
        $this->request = request();

        $this->adminRoute = config('tuke.admin_route');
    }

    /**
     * Set css class for body
     * @param string $class
     */
    public function setBodyClass($class)
    {
        view()->share([
            'bodyClass' => $class,
        ]);
    }

    /**
     * Set page title
     * @param $title
     * @param null $subTitle
     */
    public function setPageTitle($title, $subTitle = null)
    {
        view()->share([
            'pageTitle' => $title,
            'subPageTitle' => $subTitle,
        ]);
    }

    /**
     * @param $viewName
     * @param null $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function view($viewName, $data = null)
    {
        if ($data === null || !is_array($data)) {
            $data = $this->dis;
        }
        if(property_exists($this, 'module')) {
            return view($this->module . '::' . $viewName, $data);
        }
        return view($viewName, $data);
    }
}
