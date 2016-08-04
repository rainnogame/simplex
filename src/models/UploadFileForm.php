<?


namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadFileForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {

        if ($this->validate()) {

            $this->file->saveAs('upload/article/' . $this->file->baseName . '.' . $this->file->extension);
            return true;
        } else {

            return false;
        }
    }

}