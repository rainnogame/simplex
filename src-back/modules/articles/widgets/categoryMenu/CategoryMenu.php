<?
namespace app\modules\articles\widgets\categoryMenu;

use yii\base\Widget;

class CategoryMenu extends Widget
{
    
    /*
     Array (
            [0] => Array (
                    [name] => PHP
                    [alias] => /php
                    [articlesCount] => 5
                    [items] => Array (
                            [0] => Array (
                                    [name] => Yii
                                    [alias] => /php/yii
                                    [articlesCount] => 12
                                    [items] => Array
                                        (
                                            [0] => Array
                                                (
                                                   [name] => Полезные советы
                                                    [alias] => /php/yii/advices
                                                )

                                            [1] => Array
                                                (
                                                   [name] => Рендеринг
                                                    [alias] => /php/yii/render
                                                )
                                            ...

            [1] => Array (
                    ...
     */
    
    /** @var  array $categoryTree category tree in array form */
    public $items = [];
    public $currentItem = [];
    public $parentItem = [];
    
    
    /**
     * Executes the widget.
     *
     * @return string the result of widget execution to be outputted.
     */
    public function run()
    {
        
        return $this->render('_list', [
            'items' => $this->items,
            'currentItem' => $this->currentItem,
            'parentItem' => $this->parentItem,
            'root' => 'true',
        ]);
        
    }
    
}