<?php

namespace app\controllers;

use app\models\Categorias;
use app\models\Codigos;
use app\models\Envios;
use app\models\Tiendas;
use app\models\TiendasProductos;
use app\models\User;
use Exception;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Productos;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $idCategoria = Yii::$app->request->get('id');

        if ($idCategoria) {
            $productos = Productos::find()
                ->innerJoin('categorias', '`productos`.`categoria` = `categorias`.`id`')
                ->where(['categorias.id' => $idCategoria])
                ->orderBy('productos.categoria')
                ->all();
            $categoria = Categorias::findOne($idCategoria);
            $categoriaName = $categoria->categoria;
        } else {
            $productos = Productos::find()
                ->orderBy('categoria')
                ->all();
            $categoriaName = 'Nuestros productos';
        }

        $productosTop = Productos::find()
            ->innerJoin('categorias', '`productos`.`categoria` = `categorias`.`id`')
            ->innerJoin('tiendas_productos as tp', 'tp.productos_id = productos.id')
            ->where(['categorias.id' => $idCategoria])
            ->limit(4)
            ->all();

        return $this->render('index', [
            'productos' => $productos,
            'productosTop' => $productosTop,
            'categoriaName' => $categoriaName,
        ]);
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
            return $this->goHome();
        }

        $model->password = '';

        $newModel = new User();

        return $this->render('login', [
            'model' => $model,
            'newModel' => $newModel,
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

        return $this->redirect('login');
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionCarrito()
    {
        $cart = Yii::$app->cart;

        if (!Yii::$app->user->isGuest) {
            $userId = Yii::$app->user->id;
            $user = User::findOne($userId);
        } else {
            $user = new User();
        }

        $cartPositions = $cart->getPositions();

        return $this->render('carrito', [
            'cartPositions' => $cartPositions,
            'user' => $user,
            'estados' => Yii::$app->params['estados'],
        ]);
    }

    /**
     * Delete a single Product to cart.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->post('id-product');
        $cart = Yii::$app->cart;

        /** Check if exists open carts in DB */
        $model = Productos::findOne($id);
        if ($model) {
            $cart->removeById($id);
            return $this->redirect(['site/carrito']);
        }
        throw new NotFoundHttpException();
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionPago()
    {
        $codigo_postal = Yii::$app->request->post('cp');
        $costoEnvio = 0;
        $direccion = '';
        $dataEnvio = [];
        $dataEnvio['nombreCompleto'] = Yii::$app->request->post('nombre') . ' ' . Yii::$app->request->post('apellidos');
        $dataEnvio['nombre'] = Yii::$app->request->post('nombre');
        $dataEnvio['apellidos'] = Yii::$app->request->post('apellidos');
        $dataEnvio['email'] = Yii::$app->request->post('email');
        $dataEnvio['direccion'] = Yii::$app->request->post('direccion');
        $dataEnvio['ciudadCompleta'] = Yii::$app->request->post('ciudad') . ' ' . Yii::$app->request->post('estado');
        $dataEnvio['ciudad'] = Yii::$app->request->post('ciudad');
        $dataEnvio['estado'] = Yii::$app->request->post('estado');
        $dataEnvio['cp'] = $codigo_postal;

        try {
            $sucursales = Tiendas::find()->all();
            $sucursalId = (Yii::$app->request->post('inputSucursal')) ? Yii::$app->request->post('inputSucursal') : 0;
            $sucursal = Tiendas::findOne($sucursalId);

            $cart = Yii::$app->cart;
            $cartPositions = $cart->getPositions();
            $precioTotal = 0;

            if ($sucursal) {
                $direccion = Codigos::find()
                    ->where(['<=', 'cp_from', $codigo_postal])
                    ->andWhere(['>=', 'cp_to', $codigo_postal])->one();

                $query = new Query();
                $distanceQuery = $query->select("ST_Distance_Sphere(
                (select coordenada FROM tiendas WHERE id = {$sucursalId}),
                (select coordenada FROM codigos WHERE id = {$direccion->id})
                ) as distance")->one();
                $distance = $distanceQuery['distance'];

                $kms  = floor($distance / 1000);
                $envios = Envios::find()
                    ->where(['<=', 'min', $kms])
                    ->andWhere(['>=', 'max', $kms])->one();

                $costoEnvio = ($envios) ? $envios->precio : 'A calcular';

                foreach ($cartPositions as $cartPosition) {
                    $idProduct = $cartPosition->getId();
                    $quantity = $cartPosition->getQuantity();
                    $model = Productos::findOne($idProduct);
                    if ($model) {
                        $cart->remove($cartPosition);
                        $tiendasProductos = TiendasProductos::find()
                            ->where(['tiendas_id' => $sucursalId])
                            ->andWhere(['productos_id' => $idProduct])->one();
                        $precio = $tiendasProductos->precio;
                        $model->setPrice($precio);
                        $precioTotal += $precio;
                        $cart->put($model, $quantity);
                    }
                }
            }
        } catch (Exception $e) {
            exit(var_dump($e->getMessage()));
            Yii::info($e->getMessage());
            return $this->redirect(['site/carrito']);
        }

        return $this->render('pago', [
            'dataEnvio' => $dataEnvio,
            'cartPositions' => $cart->getPositions(),
            'sucursales' => $sucursales,
            'sucursalSelected' => $sucursal,
            'sucursalId' => $sucursalId,
            'costoEnvio' => $costoEnvio,
            'direccion' => $direccion,
            'precioTotal' => $precioTotal,
        ]);

    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionSucursales()
    {
        return $this->render('sucursales');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAyuda()
    {
        return $this->render('ayuda');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionContacto()
    {
        return $this->render('contact');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionCompra()
    {
        return $this->render('compra');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionProductos()
    {
        return $this->render('productos');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionDetalle()
    {
        return $this->render('detalle');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionRecovery()
    {
        return $this->render('recovery');
    }


    /**
     * Adding a single Product to cart.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAdd()
    {
        $id = Yii::$app->request->post('id');
        $cantidad = (Yii::$app->request->post('cantidad')) ?: 1;
        $cart = Yii::$app->cart;
        /** Check if exists open carts in DB */

        $model = Productos::findOne($id);
        if ($model) {
            $model->setPrice(0);
            $cart->put($model, $cantidad);
            return $this->redirect(['index']);
        }
        throw new NotFoundHttpException();
    }
}
