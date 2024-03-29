<?php

namespace app\controllers;

use app\models\Categorias;
use app\models\Codigos;
use app\models\Envios;
use app\models\Pedidos;
use app\models\Tiendas;
use app\models\TiendasProductos;
use app\models\User;
use Exception;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
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
        $idCategory = Yii::$app->request->get('id');
        $searchName = Yii::$app->request->get('search');

        if ($idCategory) {
            $query = Productos::find()
                ->innerJoin('categorias', '`productos`.`categoria` = `categorias`.`id`')
                ->where(['categorias.id' => $idCategory]);
            $category = Categorias::findOne($idCategory);
            $categoryName = $category->categoria;
        } elseif ($searchName) {
            $query = Productos::find()
                ->where(['like', 'nombre', $searchName]);
            $categoryName = $searchName;
        } else {
            $query = Productos::find();
            $categoryName = 'Nuestros productos';
        }
        $count = $query->count();

        if ($idCategory) {
            $productsTop = Productos::find()
                ->innerJoin('categorias', '`productos`.`categoria` = `categorias`.`id`')
                ->innerJoin('pedidos_productos as pp', 'pp.productos_id = productos.id')
                ->where(['categorias.id' => $idCategory])
                ->limit(4)
                ->orderBy('RAND()')
                ->all();
        } else {
            $productsTop = Productos::find()
                ->innerJoin('pedidos_productos as pp', 'pp.productos_id = productos.id')
                ->limit(4)
                ->orderBy('RAND()')
                ->all();
        }

        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 12]);

        $products = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'productos' => $products,
            'productosTop' => $productsTop,
            'categoriaName' => $categoryName,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     * @throws \yii\base\Exception
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $formName = Yii::$app->request->post('form');

        // If new user form is called
        $userModel = new User();
        if ($formName === 'create') {
            if ($userModel->load(Yii::$app->request->post())) {
                $identity = new LoginForm();
                $identity->email = $userModel->email;
                $identity->password = $userModel->password;

                $passwordNormal = $userModel->password;
                $userModel->authKey = rand() . trim($userModel->id);
                $userModel->password = Yii::$app->getSecurity()->generatePasswordHash($passwordNormal);

                if ($userModel->save() && $identity->login()) {
                    if ($userModel->validate()) {
                        Yii::$app->mailer->compose(['html' => '@app/mail/newuser'], ['password' => $passwordNormal, 'nombre' => $userModel->nombre,])
                            ->setFrom('info@tiendafcfacil.com')
                            ->setTo($userModel->email)
                            ->setSubject('Bienvenido a Tienda FC Fácil')
                            ->send();

                        return $this->goHome();
                    }
                }
            }
        }

        // If form login is called
        $model = new LoginForm();
        if ($formName === 'login') {
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->goHome();
            }
        }

        $model->password = '';
        $userModel->password = '';

        return $this->render('login', [
            'model' => $model,
            'newModel' => $userModel,
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
     * @return Response
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
     * @return Response|string
     */
    public function actionPago()
    {
        $cp = Yii::$app->request->post('cp');
        $sentCost = 0;
        $direction = '';
        $sentData = [];
        $sentData['nombreCompleto'] = Yii::$app->request->post('nombre') . ' ' . Yii::$app->request->post('apellidos');
        $sentData['nombre'] = Yii::$app->request->post('nombre');
        $sentData['apellidos'] = Yii::$app->request->post('apellidos');
        $sentData['email'] = Yii::$app->request->post('email');
        $sentData['direccion'] = Yii::$app->request->post('direccion');
        $sentData['ciudadCompleta'] = Yii::$app->request->post('ciudad') . ' ' . Yii::$app->request->post('estado');
        $sentData['ciudad'] = Yii::$app->request->post('ciudad');
        $sentData['estado'] = Yii::$app->request->post('estado');
        $sentData['cp'] = $cp;

        try {
            $branchOffices = Tiendas::find()->all();
            $branchOfficeId = (Yii::$app->request->post('inputSucursal')) ? Yii::$app->request->post('inputSucursal') : 0;
            $branchOffice = Tiendas::findOne($branchOfficeId);

            $cart = Yii::$app->cart;
            $cartPositions = $cart->getPositions();
            $priceTotal = 0;

            if ($branchOffice) {
                $direction = Codigos::find()
                    ->where(['<=', 'cp_from', $cp])
                    ->andWhere(['>=', 'cp_to', $cp])->one();

                $query = new Query();
                $distanceQuery = $query->select("ST_Distance_Sphere(
                (select coordenada FROM tiendas WHERE id = {$branchOfficeId}),
                (select coordenada FROM codigos WHERE id = {$direction->id})
                ) as distance")->one();
                $distance = $distanceQuery['distance'];

                $kms = floor($distance / 1000);
                $shipping = Envios::find()
                    ->where(['<=', 'min', $kms])
                    ->andWhere(['>=', 'max', $kms])->one();

                $sentCost = ($shipping) ? $shipping->precio : 'A calcular';

                foreach ($cartPositions as $cartPosition) {
                    $idProduct = $cartPosition->getId();
                    $quantity = $cartPosition->getQuantity();
                    $model = Productos::findOne($idProduct);
                    $tiendasProductos = TiendasProductos::find()
                        ->where(['tiendas_id' => $branchOfficeId])
                        ->andWhere(['productos_id' => $idProduct])->one();

                    $cart->remove($cartPosition);
                    if ($tiendasProductos) {
                        $precio = $tiendasProductos->precio;
                        $model->setPrice($precio);
                        $cart->put($model, $quantity);
                    }
                    $priceTotal += $cart->getCost();
                }
            }
        } catch (Exception $e) {
            //exit($e->getMessage());
            return $this->redirect(['site/carrito']);
        }

        return $this->render('pago', [
            'dataEnvio' => $sentData,
            'cartPositions' => $cart->getPositions(),
            'sucursales' => $branchOffices,
            'sucursalSelected' => $branchOffice,
            'sucursalId' => $branchOfficeId,
            'costoEnvio' => $sentCost,
            'direccion' => $direction,
            'total' => $priceTotal,
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
    public function actionGracias()
    {
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();
        $idUser = (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->getId() : 'NULL';

        try {
            $costoEnvio = Yii::$app->request->post('costo_envio');
            $direccion = Yii::$app->request->post('direccion');
            $costoTotal = Yii::$app->request->post('costo_total');
            $nombre = Yii::$app->request->post('nombre');
            $email = Yii::$app->request->post('email');
            $cart = Yii::$app->cart;

            $today = date('Y-m-d H:i:s');
            $insertEnvio = "INSERT INTO pedidos VALUES (NULL, $idUser, $costoEnvio, 'creado', '$direccion', $costoTotal, '$nombre', '$email', '$today')";

            $db->createCommand($insertEnvio)->execute();
            $idPedido = Yii::$app->db->getLastInsertID();

            $cartPositions = $cart->getPositions();
            foreach ($cartPositions as $cartPosition) {
                $idProduct = $cartPosition->getId();
                $quantity = $cartPosition->getQuantity();
                $precio = $cartPosition->getPrice();

                $insertPedidosProducto = "INSERT INTO pedidos_productos VALUES (NULL, $idPedido, $idProduct, $quantity, $precio)";
                $db->createCommand($insertPedidosProducto)->execute();
            }

            Yii::$app->mailer->compose(
                ['html' => '@app/mail/neworder'],
                [
                    'cartPositions' => $cartPositions,
                    'costoEnvio' => $costoEnvio,
                    'costoTotal' => $costoTotal,
                    'nombre' => $nombre,
                    'email' => $email,
                ])
                ->setFrom('info@tiendafcfacil.com')
                ->setReplyTo([$email => $nombre])
                ->setTo('info@tiendafcfacil.com')
                ->setSubject("Orden $idPedido generada")
                ->send();

            Yii::$app->mailer->compose(
                ['html' => '@app/mail/newordercustomer'],
                ['cartPositions' => $cartPositions, 'costoEnvio' => $costoEnvio, 'costoTotal' => $costoTotal,])
                ->setFrom('info@tiendafcfacil.com')
                ->setTo($email)
                ->setSubject('Gracias por su compra en Tienda FC Fácil')
                ->send();
            $transaction->commit();
            $cart->removeAll();
        } catch (Exception $e) {
            Yii::info($e->getMessage());
            $transaction->rollBack();
            exit($e->getMessage());
        }

        return $this->render('gracias');
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
     * Displays a single Productos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDetalle($id)
    {
        $model = Productos::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $categorias = Categorias::findOne($model->categoria);

        return $this->render('detalle', [
            'model' => $model,
            'categorias' => $categorias,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionRecovery()
    {
        $email = (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->getEmail() : null;
        return $this->render('recovery', [
            'email' => $email
        ]);
    }

    /**
     * Adding a single Product to cart.
     * @return Response
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

    /**
     * Lists all Pedidos models.
     * @param null|int $id
     * @return string
     */
    public function actionMispedidos($id = NULL)
    {
        $id = (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->getId() : '';

        $dataProvider = new ActiveDataProvider([
            'query' => Pedidos::find()
                ->where(['users_id' => $id])
                ->orderBy('date')
                ->asArray(),
            'pagination' => [
                'pageSize' => 5
            ]
        ]);

        return $this->render('mispedidos', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
