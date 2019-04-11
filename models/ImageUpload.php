<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ImageUpload extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions'=>'jpg,png']
        ];
    }

    public function uploadFile($file, $currentImage)
    {
        $this->image = $file;
        if ($this->validate()) {
            $this->deleteCurrentImage($currentImage);
            return $this->saveImage();
        }
    }

    public function saveImage()
    {
        $filename = $this->generateFileName();
        $this->image->saveAs($this->getFolder() . $filename);
        return $filename;
    }

    public function deleteCurrentImage($currentImage)
    {
        if ($this->fileExist($currentImage)) {
            unlink($this->getFolder().$currentImage);
        }
    }

    public function fileExist($currentImage)
    {
        if(!empty($currentImage) && $currentImage != null)
        {
            return file_exists($this->getFolder().$currentImage);
        }
    }

    private function getFolder()
    {
        return Yii::getAlias('@web') . 'uploads/';
    }

    private function generateFileName()
    {
        return strtolower(md5(uniqId($this->image->baseName)) . '.' . $this->image->extension);
    }
}
