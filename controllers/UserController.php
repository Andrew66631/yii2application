<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\User;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\web\BadRequestHttpException;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    throw new ForbiddenHttpException('У вас нет прав для просмотра этой страницы.');
                },
            ],
        ];
    }
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC,
                ],
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $user = $this->findModel($id);

        return $this->render('view', [
            'user' => $user,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
    public function actionUpdate($id)
    {
        $user = $this->findModel($id);

        if ($user->load(Yii::$app->request->post()) && $user->save()) {
            return $this->redirect(['view', 'id' => $user->id]);
        }

        return $this->render('update', [
            'model' => $user,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws HttpException
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $user = $this->findModel($id);
        if ($user->delete()) {
            return $this->redirect(['index']);
        } else {
            throw new HttpException(500, 'Не удалось удалить пользователя.');
        }
    }

    /**
     * @param $id
     * @return User|null
     * @throws NotFoundHttpException
     */
    private function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Пользователь не найден.');
    }
}
