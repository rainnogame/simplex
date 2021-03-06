<?php
/**
 * Yii bootstrap file.
 *
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   http://www.yiiframework.com/license/
 */

use app\Application;

require(__DIR__ . '/../vendor/yiisoft/yii2/BaseYii.php');

/**
 * Yii is a helper class serving common framework functionalities.
 *
 * It extends from [[\yii\BaseYii]] which provides the actual implementation.
 * By writing your own Yii class, you can customize some functionalities of [[\yii\BaseYii]].
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since  2.0
 */
class Yii extends \yii\BaseYii
{
    /**
     * @var Application the application instance
     */
    public static $app;
}

spl_autoload_register(['Yii', 'autoload'], TRUE, TRUE);
Yii::$classMap = require(__DIR__ . '/../vendor/yiisoft/yii2/classes.php');
Yii::$container = new yii\di\Container();
