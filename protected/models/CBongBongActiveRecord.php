<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CBongBongActiveRecord
 *
 * @author Hoang Minh Duc
 */
class CBongBongActiveRecord extends CActiveRecord{
    function beforeValidate(){
        if ($this->isNewRecord){
            $this->create_time=$this->update_time=new CDbExpression('NOW()');
            $this->create_user_id=$this->update_user_id=Yii::app()->user->id;
        }
        else{
            $this->update_time=new CDbExpression('NOW()');
            $this->update_user_id=Yii::app()->user->id;
        }
        return parent::beforeValidate();
    }
}
?>
