<?php

/**
 * Trait ini memungkinkan kelas pakai fungsi render Action Column
 * tapi berdasarkan hak akses atas Institution ID
 */
trait AccessActionColumn{
    private function hasAccess($institution_id)
    {
        $userInstitution = \Yii::$app->user->identity->institution_id;
        if($userInstitution==null) return true;

        if($institution_id == $userInstitution) return true;

        return false;
    }

    public function getAccessActionColumn()
    {
        return [
            'class' => 'kartik\grid\ActionColumn',
            'buttons' => [
                'update' => function ($url, $model) {
                    return $this->hasAccess($model->id) ? Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url):"";
                }
             ],           
        ];
    }
}