<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Auto Asset Bundle</h1>
    <br>
</p>

Base Asset Bundle for Yii2 to auto-allocate JS & CSS files for each View

[![Latest Stable Version](https://poser.pugx.org/yidas/yii2-auto-asset-bundle/v/stable?format=flat-square)](https://packagist.org/packages/yidas/yii2-auto-asset-bundle)
[![Latest Unstable Version](https://poser.pugx.org/yidas/yii2-auto-asset-bundle/v/unstable?format=flat-square)](https://packagist.org/packages/yidas/yii2-auto-asset-bundle)
[![License](https://poser.pugx.org/yidas/yii2-auto-asset-bundle/license?format=flat-square)](https://packagist.org/packages/yidas/yii2-auto-asset-bundle)

FEATURES
--------

- *Each View would has it own **JS & CSS** asset files*

- ***Standard Asset files' structure** same as View paths*

- ***Single AssetBundle** automatically handles all Views' assets by registering*

Felt dirty of writting *Javascript* code in View file?  Got tired of creating asset for every View files? 

If each View need *Javascript* & *CSS* for it self, the AssetBundle library allocates pairs of asset files for each registered View, which each View's path is same as allocated assets path with base path setting.

---

DEMONSTRATION
-------------

A View file which locates:

```
yii2-app-basic/views/site/about.js
```

After registering AutoAssetBundle, the View file would auto-load above assets files if exist:

```
yii2-app-basic/web/dist/app/site/about.js
yii2-app-basic/web/dist/app/site/about.css
```

> `dist/app/` is the prefix base path which could be customized.

---

REQUIREMENTS
------------

This library requires the following:

- PHP 5.4.0+
- Yii 2.0.0+

---

INSTALLATION
------------

Install via Composer in your Yii2 project:

```
composer require yidas/yii2-auto-asset-bundle
```

---

CONFIGURATION
-------------

You could create an asset to extend `\yidas\web\AutoAssetBundle` with your application configuration:

```php
namespace app\assets;

class AutoAssetBundle extends \yidas\web\AutoAssetBundle {}
```

### Customized Setting

You could customize asset to fit your application:

```php
namespace app\assets;

class AutoAssetBundle extends \yidas\web\AutoAssetBundle
{
    // Base path & url for each view's asset in your application
    public $basePath = '@webroot/dist/app';
    public $baseUrl = '@web/dist/app';
    
    public $depends = [
        'app\assets\AppAsset',
    ];
}
```

---

USAGE
-----

Register [configured asset](#configuration) in the content View, for example `yii2-app-basic/views/controller/action.php`:

```php
<?php

\app\assets\AutoAssetBundle::register($this);
```

After that, this view would auto load following files:  

```
yii2-app-basic/web/dist/app/controller/action.js
yii2-app-basic/web/dist/app/controller/action.css
```

The prefix path relates to the view path.



