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
        $this->getUrl();
    }

    /**
     * Gets parameters from url
     * http://baremvc.development/posts/edit/1 -> will echo /posts/edit/1
     * We are using url as index because in htaccess there is mapping all params to url index
     */
    public function getUrl()
    {
        echo $_GET['url'];
    }
}