<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Модель пользователя
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * Имя таблицы
     */
    public static function tableName()
    {
        return '{{%user}}'; // предполагается таблица user
    }

    /**
     * Правила валидации
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            [['username', 'email'], 'unique'],
            ['email', 'email'],
            ['username', 'string', 'max' => 255],
            ['email', 'string', 'max' => 255],
            ['password_hash', 'string', 'max' => 255],
            ['auth_key', 'string', 'max' => 32],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'email' => 'Электронная почта',
            'password_hash' => 'Пароль',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * Находит пользователя по ID
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Находит пользователя по access token (не реализовано)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; // если не используете токены
    }

    /**
     * Находит пользователя по username
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Возвращает ID пользователя
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * Возвращает auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Проверяет auth key
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Проверяет пароль
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Устанавливает пароль
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Генерирует auth key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                // Генерируем auth_key при создании нового пользователя
                $this->auth_key = Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
}

