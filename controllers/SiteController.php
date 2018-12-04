<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Post;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $posts = Post::find()->all();
        return $this->render('home', ['posts' => $posts]);
    }

    /**
     * Display create post page.
     * 
     * @return string
     */
    public function actionCreate()
    {
        $post = new Post();
        
        $formData = Yii::$app->request->post();

        if ($post->load($formData)) {
            if ($post->save()) {
                Yii::$app->getSession()->setFlash('message', 'Post published successfully');
                return $this->redirect(['index']);
            } else {
                Yii::$app->getSession()->setFlash('messsage', 'Failed to post');
            }
        }
        return $this->render('create', ['post' => $post]);
    }

    /**
     * Display a post selected.
     * 
     * @return string
     */
    public function actionView(int $id)
    {
        $post = Post::findOne($id);
        return $this->render('view', ['post'=> $post]);
    }

    /**
     * Display update post page.
     * 
     * @return string
     */
    public function actionUpdate(int $id)
    {
        $post = Post::findOne($id);

        $formData = Yii::$app->request->post();

        if ($post->load($formData)) {
            if ($post->save()) {
                Yii::$app->getSession()->setFlash('message', 'Post updated successfully');
                return $this->redirect(['index']);
            } else {
                Yii::$app->getSession()->setFlash('messsage', 'Failed to post');
            }
        }

        return $this->render('update', ['post'=> $post]);
    }

    /**
     * Delete a post.
     * 
     * @return string
     */
    public function actionDelete(int $id)
    {
        $post = Post::findOne($id);
        if($post->delete()) {
            Yii::$app->getSession()->setFlash('message', 'Post removed successfully');
        }
        return $this->redirect(['index']);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
