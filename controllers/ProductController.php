<?php

namespace app\controllers;

use app\models\User;
use yii\web\Controller;
use app\models\Products;
use app\models\PurchasedProducts;
class ProductController extends Controller
{
    public function actionIndex()
    {
        $products = Products::find()->all();
        return $this->render('index', [
            'products' => $products,
        ]);
    }

    /**
     * @return string
     */
    public function actionPurchase()
    {
        $purchases = PurchasedProducts::find()
            ->with(['user', 'product'])
            ->all();

        $grouped = [];
        foreach ($purchases as $purchase) {
            $userName = $purchase->user ? $purchase->user->username : 'Unknown user';
            if (!isset($grouped[$userName])) {
                $grouped[$userName] = [];
            }
            $grouped[$userName][] = $purchase->product;
        }

        return $this->render('grouped-by-user', [
            'grouped' => $grouped,
        ]);
    }

    /**
     * @param $userId
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */

    public function actionView($userId)
    {
        $user = User::findOne($userId);
        if (!$user) {
            throw new \yii\web\NotFoundHttpException('Пользователь не найден.');
        }

        $products = Products::find()
            ->innerJoinWith('purchasedProducts p')
            ->where(['p.user_id' => $userId])
            ->all();

        return $this->render('by-user', [
            'user' => $user,
            'product' => $products,
        ]);
    }

}