<?php
/**
 * Base controller,
 * Loads Models and Views
 * All other controllers will extend this one.
 */

class Controller
{
    /**
     * TODO Refactor Base Controller
     * 1) Handle not found view and model much better, replace if else with try - catch
     *    For view try to render 404 page, with some info for example Page not found return home
     *    For models exception would be great.
     * 2) Create the function that will search for files some thing like a switch and then check
     *    Controllers, Models and Views.
     * 3) Create interfaces for this Controller.
     */

    /**
     * Loads models
     * @param $model
     * @return mixed
     */
    protected function model($model)
    {
        if (file_exists('../app/models/' . $model . '.php')) {
            require_once '../app/models/' . $model . '.php';
            return new $model();
        } else {
            die('Model does not exists!');
        }
    }

    /**
     * Loads views
     * @param $view
     * @param array $data
     * @return false|string
     */
    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View does not exists!');
        }
    }
}