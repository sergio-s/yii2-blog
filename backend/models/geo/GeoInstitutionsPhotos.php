<?php

namespace backend\models\geo;

use Yii;

/**
 * This is the model class for table "geo_institutions_photos".
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

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_DELITE = 'delite';
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
            [['institution_id', 'queue'], 'integer'],
            [['title'], 'string'],
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
            'queue' => 'Queue',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios[self::SCENARIO_CREATE] = [
                                        'institution_id',
                                        'img',
                                    ];
        $scenarios[self::SCENARIO_UPDATE] = [

                                    ];
        $scenarios[self::SCENARIO_DELITE] = [

                                    ];


        return $scenarios;
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
     * @return GeoInstitutionsPhotosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GeoInstitutionsPhotosQuery(get_called_class());
    }
}
