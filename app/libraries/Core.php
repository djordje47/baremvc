<?php

/**
 * Core class
 * Creates Urls & loads core controller
 * Url format -> /controller/method/params
 * Example /posts/edit/1
 */
class Core
{
    /**
     * @var string
     * Go to pages by default
     */
    protected $currentController = 'Pages';
    /**
     * @var string
     * Call index method by default
     */
    protected $currentMethod = 'index';
    /**
     * @var array
     * Parameters in url
     */
    protected $params = [];
    /**
     * @var array Url
     */
    protected $url = [];

    public function __construct()
    {
        $this->url = $this->getUrl();
        $this->loadController();
        $this->invokeMethod();
    }

    /**
     * Loads controller by the url
     */
    protected function loadController()
    {
        $controller_name = ucwords($this->url[0]);

        if (file_exists('../app/controllers/' . $controller_name . '.php')) {
            $this->currentController = $controller_name;
            unset($this->url[0]);
        }

        require_once '../app/controllers/' . $this->currentController . '.php';

        $this->currentController = new $this->currentController;
    }

    /**
     * Invokes a method by the params inside url in the previously loaded controller
     */
    protected function invokeMethod()
    {
        if (isset($this->url[1])) {
            if (method_exists($this->currentController, $this->url[1])) {
                $this->currentMethod = $this->url[1];
                unset($this->url[1]);
            }
        }
        $this->params = $this->url ? array_values($this->url) : [];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    /**
     * Gets parameters from url
     * We are using url as index because in htaccess there is mapping all params to url index
     */
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}