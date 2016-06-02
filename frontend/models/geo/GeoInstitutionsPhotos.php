<?php

namespace app\models\geo;

use Yii;

/**
 * This is the model class for table "institutions_photo".
 *
 * @property string $id
 * @property string $institution_id
 * @property string $img
 * @property integer $title
 * @property integer $queue
 *
 * @property GeoInstitutions $institution
 */
class GeoInstitutionsPhotos extends \yii\db\ActiveRecord
{
    //Первое в очереди фото (из бд)
    const FIRST_QUEUE = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geo_institutions_photos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['institution_id', 'img'], 'required'],
            [['institution_id', 'title', 'queue'], 'integer'],
            [['img'], 'string', 'max' => 255],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoInstitutions::className(), 'targetAttribute' => ['institution_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institution_id' => 'Institution ID',
            'img' => 'Img',
            'title' => 'Title',
            'queue' => 'очередь вывода, по умолчанию -0',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution()
    {
        return $this->hasOne(GeoInstitutions::className(), ['id' => 'institution_id']);
    }

    /**
     * @inheritdoc
     * @return InstitutionsPhotoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GeoInstitutionsPhotosQuery(get_called_class());
    }
}
