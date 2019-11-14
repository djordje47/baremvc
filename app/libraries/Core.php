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

    public function __construct()
    {
        $url = $this->getUrl();
        $controller_name = ucwords($url[0]);

        if (file_exists('../app/controllers/' . $controller_name . '.php')) {
            $this->currentController = $controller_name;
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->currentController . '.php';

        $this->currentController = new $this->currentController;
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