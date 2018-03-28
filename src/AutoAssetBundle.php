<?php

namespace yidas\web;

use Yii;

/**
 * Auto View Asset
 * 
 * @author  Nick Tsai <mtintaer@gmail.com>
 * @version 1.0.0
 * @see     https://github.com/yidas/yii2-auto-asset-bundle
 * @example
 *  For asset file autoload, giving following setting:
 *  $basePath = '@webroot/dist/app' & $baseUrl = '@web/dist/app'
 *  For JS file case would be:
 *  @app/views/site/index.php => @webroot/dist/app/site/index.js
 *  @app/views/level/site/about.php => @webroot/dist/app/level/site/about.js
 */
class AutoAssetBundle extends \yii\web\AssetBundle
{
    /**
     * Asset base setting
     *
     * @var string Path with default related path `dist/app`
     */
    public $basePath = '@webroot/dist/app';
    public $baseUrl = '@web/dist/app';
    
    /**
     * Asset initialization
     *
     * @return void
     */
    public function init()
    {
        parent::init();

        // Fetch View name
        $view = Yii::$app->controller->getView();
        $viewFile = $view->getViewFile();
        $viewFile = str_replace(Yii::$app->controller->getViewPath() . DIRECTORY_SEPARATOR, '', $viewFile);
        $viewName = str_replace("." . $view->defaultExtension, '', $viewFile);

        // Get full controller name (route)
        $controller = Yii::$app->controller->id;

        // Compose to a asset file name without extension
        $fileName = $controller . '/' . $viewName;

        // Define asset files with adding extension
        $jsFile = "{$fileName}.js";
        $cssFile = "{$fileName}.css";

        // Load asset files
        if (file_exists($this->basePath . '/' . $jsFile)) {
            $this->js[] = $jsFile;
        }
        if (file_exists($this->basePath . '/' . $cssFile)) {
            $this->css[] = $cssFile;
        }
    }
}

