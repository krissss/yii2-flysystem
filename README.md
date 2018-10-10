Yii2 Flysystem
==============
yii2-flysystem

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

```
php composer.phar require --prefer-dist kriss/yii2-flysystem
```

config
-----

```php
return [
    'components' => [
        // others
        'storage' => [
            'class' => \kriss\storage\Storage::class,
            'adapter' => function () {
                return new \League\Flysystem\Adapter\Local(Yii::getAlias('@webroot/files'));
            }
        ],
    ]
]
```

usage
-----

```php
use kriss\storage\Storage;
use Yii;

/** @var Storage $storage */
$storage = Yii::$app->get('storage');
$fileSystem = $storage->getFileSystem();
$adapter = $storage->getAdapter();
// or
$adapter = $storage->getFileSystem()->getAdapter();
```

more Info
-----

[flysystem](https://github.com/thephpleague/flysystem)

[fileSystem API](https://flysystem.thephpleague.com/docs/usage/filesystem-api/)

[Commonly-Used Adapters](https://github.com/thephpleague/flysystem#user-content-adapters)

[Aliyun OSS Adapter](https://github.com/xxtime/flysystem-aliyun-oss)

[QiNiu Adapter](https://github.com/overtrue/flysystem-qiniu)
