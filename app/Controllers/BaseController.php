<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = service('session');
    }

    public function getMenu()
    {
        $db = \Config\Database::connect();
        $query = $db->table("master_menu")->where("status", "Y")->get()->getResultArray();
        return $query;
    }

    public function getYear()
    {
        date_default_timezone_set('Asia/Jakarta');
        return date('Y');
    }

    public function getUser()
    {
        $session = \config\Services::session();
        $name = $session->get('name');
        $email = $session->get('email');
        $group_cd = $session->get('group_cd');
        $pict = $session->get('pict');

        $data = [
            'name' => $name,
            'email' => $email,
            'group_cd' => $group_cd,
            'pict' => $pict,
        ];

        return $data;
    }
    // You can add more global variables here like user information, etc.

    public function render($view, $data = [])
    {
        // Merge the $menu with any other data passed to the view
        $data['menu'] = $this->getMenu();
        $data['year'] = $this->getYear();
        $data['user'] = $this->getUser();
        
        return view($view, $data);
    }
}
