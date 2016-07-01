<?php

namespace app\models\wiki;

use Yii;

/**
 * This is the model class for table "wiki_terms".
 *
 * @property string $id
 * @property string $id_letter
 * @property string $alias
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $h1
 * @property string $content
 * @property string $createdDate
 * @property string $updatedDate
 * @property integer $autorId
 * @property integer $updaterId
 *
 * @property WikiLetters $idLetter
 */
class WikiTerms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wiki_terms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_letter', 'alias', 'title', 'description', 'h1'], 'required'],
            [['id_letter', 'autorId', 'updaterId'], 'integer'],
            [['content'], 'string'],
            [['createdDate', 'updatedDate'], 'safe'],
            [['alias', 'title', 'description', 'keywords', 'h1'], 'string', 'max' => 255],
            [['id_letter'], 'exist', 'skipOnError' => true, 'targetClass' => WikiLetters::className(), 'targetAttribute' => ['id_letter' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_letter' => 'Id Letter',
            'alias' => 'Alias',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'h1' => 'H1',
            'content' => 'Content',
            'createdDate' => 'Created Date',
            'updatedDate' => 'Updated Date',
            'autorId' => 'Autor ID',
            'updaterId' => 'Updater ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLetter()
    {
        return $this->hasOne(WikiLetters::className(), ['id' => 'id_letter']);
    }


    /**
     * @inheritdoc
     * @return WikiTermsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WikiTermsQuery(get_called_class());
    }

    public function getSiblingsTerms($id_letter = false)
    {
        if($id_letter){
            $res = self::find()
                    ->select('id, alias, title')
                    ->where(['=', 'id_letter', $id_letter])
                    ->orderBy(['title' => SORT_DESC])
                    ->indexBy('id')
                    ->limit(5)
                    ->all();
        }else{
            $res = self::find()
                    ->select('id, alias, title')
                    ->orderBy(['title' => SORT_DESC])
                    ->indexBy('id')
                    ->limit(5)
                    ->all();
        }

        //удаляем текущий материал из списка похожих статей
        if(isset($res[$this->id]) ){
          unset($res[$this->id]);
        }

        return $res;
    }

}
