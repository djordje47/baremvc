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

    // TODO Clean up constructor create separate private function one that will load controllers and one that will call methods @Djole
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

        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];

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