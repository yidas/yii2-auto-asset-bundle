<?php

namespace app\assets;

use Yii;

/**
 * Auto View Asset
 * 
 * @author  Nick Tsai <mtintaer@gmail.com>
 * @version 1.0.0
 * @example
 *  Set $basePath = '@webroot/dist/app' for JS asset reference:
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
        $fileName = $controller . DIRECTORY_SEPARATOR . $viewName;

        // Define asset files with adding extension
        $jsFile = "{$fileName}.js";
        $cssFile = "{$fileName}.css";

        // Load asset files
        if (file_exists($this->baseUrl.$jsFile)) {
            $this->js[] = $file;
        }
        if (file_exists($this->baseUrl.$cssFile)) {
            $this->css[] = $file;
        }
    }
}

