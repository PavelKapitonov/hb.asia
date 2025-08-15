<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Services;
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
class BaseController extends Controller
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
     * @var array
     */
    protected $helpers = ['url'];

    protected $viewData = [];

    protected $session;
    /**
     * Constructor.
     */
    // public function __construct()
    // {
    //     $this->cachePage(15);
    // }

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->loadGlobalSettings();
        $this->loadGlobalCategories();
        helper('form');
        
        $this->viewData['locale'] = $request->getLocale();
        $this->viewData['supportedLocales'] = $request->config->supportedLocales;
        $data = model(Rates::class)->getOne('MYR');
        $this->viewData['MYR'] = $data['course'];
        if (session_status() == PHP_SESSION_NONE)
        {
            $this->session = Services::session();
        }
    }

    public function loadGlobalSettings()
    {
        $globalSettings = cache('global_settings');
    
        if (null === $globalSettings) {
            $appSettingModel = model(SettingsModel::class);
            
            $app_settings = $appSettingModel->getSettings();
            $globalSettings = [];
        
            foreach ($app_settings as $row) {
                $globalSettings[$row['title']] = $row['value'];
            }
            
            cache()->save('global_settings', $globalSettings, DAY*15);
        }
    
        return $globalSettings;
    }
    public function loadGlobalCategories()
    {
        $globalSettings = cache('global_categories');
    
        if (null === $globalSettings) {
            $appCategoriesModel = model(CategoriesModel::class);
            
            $app_settings = $appCategoriesModel->getCategories();
            $globalSettings = [];
        
            foreach ($app_settings as $row) {
                $categories_text = model(CategoriesTextModel::class);
                $category = $categories_text->getTextLang($row['id'], 'ru');
                $globalSettings[$row['slug']] = $category['title'];
            }
            
            cache()->save('global_categories', $globalSettings, DAY*15);
        }
    
        return $globalSettings;
    }        
}
