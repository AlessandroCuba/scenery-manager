<?php

namespace backend\modules\scenery\controllers;

use Yii;
use yeesoft\controllers\admin\BaseController;

/**
 * SceneryTagsController implements the CRUD actions for backend\modules\scenery\models\SceneryTag model.
 */
class TagsController extends BaseController 
{
    public $modelClass       = 'backend\modules\scenery\models\SceneryTag';
    public $modelSearchClass = 'backend\modules\scenery\models\SceneryTagsSearch';

    protected function getRedirectPage($action, $model = null)
    {
        switch ($action) {
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return parent::getRedirectPage($action, $model);
        }
    }
}