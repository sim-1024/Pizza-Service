<?php
declare(strict_types=1);
require_once 'App/Core/BaseController.php';
require_once 'App/Model/ArticleModel.php';
require_once 'App/Model/OrderingModel.php';

class OrderController extends BaseController
{
    public function processData(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $address = trim($_POST['adresse']);
        $warenkorb = $_POST['warenkorb'];

        if ($address === '' || count($warenkorb) === 0) {
            header('Location: ' . Router::generateUrl('order') . '?message=error');
            exit;
        }

        $orderingModel = new OrderingModel();

        $ordering_id = $orderingModel->createOrdering($address);

        // SESSION wird in index.php gestartet.
        $_SESSION["ordering_id"] = $ordering_id;

        foreach ($warenkorb as $article_id) {
            $orderingModel->createOrderedArticle((int)$article_id, $ordering_id);
        }

        header('Location: ' . Router::generateUrl('customer') . '?message=success');
        exit;
    }


    private function getData(): array
    {
        $model = new ArticleModel();
        return $model->getAll();
    }

    public function generateResponse(): void
    {
        $data = $this->getData();
        $this->renderHtml('App/View/order.view.php', ['data' => $data]);
    }

    public function handleRequest(): void
    {
        $this->processData();
        $this->generateResponse();
    }
}