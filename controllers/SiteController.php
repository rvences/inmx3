<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\BadRequestHttpException;
use yii\base\InvalidParamException;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\User;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordsForm;
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
                'only' => ['index','logout'],
                'rules' => [
                    [
                        'actions' => ['index', 'logout'],
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
        if (User::isUserTelefonico(Yii::$app->user->identity->id) ) {
            return $this->redirect(['cedulas-identificaciones/create']);
        }elseif ( User::isAdminTelefonico(Yii::$app->user->identity->id) ) {
            return $this->redirect(['encuesta-telefonica/index']);
        }elseif ( User::isUserPresencial(Yii::$app->user->identity->id) ) {
            return $this->redirect(['cedulas-presenciales/create']);
        }


        //return $this->render('cedula' );*/
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
            if (User::isUserTelefonico(Yii::$app->user->identity->id) ) {
                return $this->redirect(['cedulas-identificaciones/create']);
            }elseif ( User::isAdminTelefonico(Yii::$app->user->identity->id) ) {
                return $this->redirect(['encuesta-telefonica/index']);
            }elseif ( User::isUserPresencial(Yii::$app->user->identity->id) ) {
                return $this->redirect(['cedulas-presenciales/create']);
            }


            //return $this->goBack();
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
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Verifica tu correo para seguir las instrucciones.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'No logramos restablecer la contraseña con el correo proporcionado.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordsForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Se cambio la contraseña con éxito.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }



    # http://inmx.localhost/index.php?r=site/add-admin
    public function actionAddAdmin() {
        $model = User::find()->where(['username' => 'presencial'])->one();
        if (empty($model)) {
            $user = new User();
            $user->tipo_usuario = 'PRESENCIAL';
            $user->nombre= 'Sofía Isabel Villafañe Trujillo';
            $user->username = 'presencial';
            $user->email = 'presencial@nibira.com';
            $user->setPassword('presencial');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'Generado Presencial';
            }
        }
        $model = User::find()->where(['username' => 'telefonico'])->one();
        if (empty($model)) {
            $user = new User();
            $user->tipo_usuario = 'TELEFONICO';
            $user->nombre = 'Captura Telefonico';
            $user->username = 'telefonico';
            $user->email = 'telefonico@nibira.com';
            $user->setPassword('telefonico');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'Generado Telefónico';
            }
        }
        $model = User::find()->where(['username' => 'admintel'])->one();
        if (empty($model)) {
            $user = new User();
            $user->tipo_usuario = 'ADMINTEL';
            $user->nombre = 'Alina García';
            $user->username = 'admintel';
            $user->email = 'admintel@nibira.com';
            $user->setPassword('admintel');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'Generado Administrador Telefónico';
            }
        }
    }



}
