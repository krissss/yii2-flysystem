<?php

namespace kriss\storage;

use League\Flysystem\AdapterInterface;
use League\Flysystem\Filesystem;
use yii\base\BaseObject;
use yii\base\InvalidConfigException;

class Storage extends BaseObject
{
    public $adapter;

    public $config = [];


    private $fileSystem = false;

    public function getFileSystem()
    {
        if ($this->fileSystem === false) {
            $this->fileSystem = new Filesystem($this->getInnerAdapter(), $this->config);
        }
        return $this->fileSystem;
    }

    public function getAdapter()
    {
        return $this->getFileSystem()->getAdapter();
    }

    private function getInnerAdapter()
    {
        $adapter = call_user_func($this->adapter);
        if (!is_a($adapter, AdapterInterface::class)) {
            throw new InvalidConfigException('adapter must implements AdapterInterface');
        }
        return $adapter;
    }
}
