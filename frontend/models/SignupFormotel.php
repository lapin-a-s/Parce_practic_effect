<?php
namespace frontend\models;
use Yii;
use yii\base\Model;
use common\models\User;
use yii\web\UploadedFile;
/**
 * Signup form
 */
class SignupFormotel extends Model
{
    public $username;
    public $email;
    public $password;
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }
    public function rules()
    {

        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой логин уже занят.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такая почта уже занята.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            [['image'], 'file','skipOnEmpty' =>false, 'extensions' => 'png, jpg, PNG'],
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $filename = 'images/' . $this->image->baseName . '.' . $this->image->extension;
        if($this->image->saveAs($filename)) {
            $this->image = $filename;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->image = $this->image;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
}