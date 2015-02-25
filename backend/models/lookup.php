<?php

namespace backend\models;

use Yii;

class Lookup extends \yii\db\ActiveRecord
{
 /**
 * The followings are the available columns in table 'tbl_lookup':
 * @var integer $id
 * @var string $object_type
 * @var integer $code
 * @var string $name_en
 * @var string $name_fr
 * @var integer $sequence
 * @var integer $status
 */
 
    private static $_items=[];

    /**
     * @return string the associated database table name
     */
     public static function tableName()
    {
        return 'lookup';
    }

    /**
     * Returns the items for the specified type.
     * @param string item type (e.g. 'PostStatus').
     * @return array item names indexed by item code. The items are order by their position values.
     * An empty array is returned if the item type does not exist.
     */
     public static function items($type,$grup)
     {
     if(!isset(self::$_items[$type]))
     self::loadItems($type,$grup);
     return self::$_items[$type];
     }

    /**
     * Returns the item name for the specified type and code.
     * @param string the item type (e.g. 'PostStatus').
     * @param integer the item code (corresponding to the 'code' column value)
     * @return string the item name for the specified the code. False is returned if the item type or code does not exist.
     */
     public static function item($type,$grup,$code)
     {
     if(!isset(self::$_items[$type]))
     self::loadItems($type,$grup);
     return isset(self::$_items[$type][$code]) ? self::$_items[$type][$code] : false;
     }

    /**
     * Loads the lookup items for the specified type from the database.
     * @param string the item type
     */
     private static function loadItems($type,$grup)
     {
        self::$_items[$type]=[];
        $models= self::findAll([
              'type'=>$type,
              'grup'=>$grup,
//            'condition'=>'type=:type',
//            'params'=>[':type'=>$type],
//            'order'=>'position',
            ]);
//            var_dump($models);
//                        exit();
        foreach($models as $model)
        self::$_items[$type][$model->code]=$model->name;
     }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

