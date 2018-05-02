<?php

namespace app\modules\person\controllers;

use yii\web\Controller;

/**
 * Default controller for the `person` module
 */
class DefaultController extends AppAdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
