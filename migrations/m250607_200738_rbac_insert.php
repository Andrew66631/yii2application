<?php

use yii\db\Migration;

class m250607_200738_rbac_insert extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        $deletePost = $auth->createPermission('deletePost');
        $deletePost->description = 'Delete post';
        $auth->add($deletePost);

        $viewPost = $auth->createPermission('viewPost');
        $viewPost->description = 'View post';
        $auth->add($viewPost);

        $author = $auth->createRole('author');
        $auth->add($author);

        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $user = $auth->createRole('user');
        $auth->add($user);

        $info = $auth->createRole('info');
        $auth->add($info);


        // Назначаем разрешения ролям
        $auth->addChild($author, $createPost);
        $auth->addChild($author, $updatePost);

        $auth->addChild($admin, $author); // admin наследует права author
        $auth->addChild($admin, $deletePost);

        $auth->addChild($user,$createPost);
        $auth->addChild($info,$viewPost);
        // Назначаем роли пользователям (замените ID на реальные)
        $auth->assign($admin, 1); // Пользователь с ID=1 — админ
        $auth->assign($author, 2); // Пользователь с ID=2 — автор
        $auth->assign($user, 3);
        $auth->assign($info, 4);
    }

    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        // Удаляем назначения ролей
        $auth->revokeAll(1);
        $auth->revokeAll(2);
        $auth->revokeAll(3);
        $auth->revokeAll(4);
        // Удаляем роли
        $admin = $auth->getRole('admin');
        if ($admin) {
            $auth->remove($admin);
        }

        $author = $auth->getRole('author');
        if ($author) {
            $auth->remove($author);
        }

        $user = $auth->getRole('user');
        if ($user) {
            $auth->remove($user);
        }

        $info = $auth->getRole('info');
        if ($info) {
            $auth->remove($info);
        }

        // Удаляем разрешения
        foreach (['createPost', 'updatePost', 'deletePost', 'viewPost'] as $permissionName) {
            $permission = $auth->getPermission($permissionName);
            if ($permission) {
                $auth->remove($permission);
            }
        }
    }
}


