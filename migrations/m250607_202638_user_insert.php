<?php
use yii\db\Migration;

/**
* Class m230601_000002_fill_users_table
*/
class m250607_202638_user_insert extends Migration
{
public function safeUp()
{
$auth = Yii::$app->authManager;

for ($i = 1; $i <= 50; $i++) {
$user = new \app\models\User();
$user->username = "user{$i}";
$user->email = "user{$i}@example.com";
$user->setPassword('password');
$user->generateAuthKey();

if ($user->save()) {
if ($i <= 10) {
$role = 'admin';
} elseif ($i <= 20) {
$role = 'author';
} elseif ($i <= 30) {
$role = 'user';
} else {
$role = 'info';
}

$authRole = $auth->getRole($role);
if ($authRole) {
// Проверяем, не назначена ли уже роль
$assignment = $auth->getAssignment($role, $user->id);
if ($assignment === null) {
$auth->assign($authRole, $user->id);
}
}
}
}
}

public function safeDown()
{
$auth = Yii::$app->authManager;

for ($i = 1; $i <= 50; $i++) {
$user = \app\models\User::findOne(['username' => "user{$i}"]);
if ($user) {
$auth->revokeAll($user->id);
$user->delete();
}
}
}
}

