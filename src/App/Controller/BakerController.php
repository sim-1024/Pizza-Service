<?php
declare(strict_types=1);
require_once 'App/Core/BaseController.php';
require_once 'App/Model/OrderingModel.php';

class BakerController extends BaseController
{
    public function processData(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST'||
            !isset(
                $_POST['operation'],
                $_POST['ordered_article_id'],
                $_POST['new_status']
            )
        ) {
            return;
        }

        $operation = $_POST['operation'];
        $ordered_article_id = (int)($_POST['ordered_article_id']);
        $new_status = (int)($_POST['new_status']);

        if ($operation === 'update') {
            $model = new OrderingModel();
            $model->updateOrderedArticle($ordered_article_id, $new_status);
        }

        header('Location: ' . Router::generateUrl('baker'));
        exit;
    }


    private function getData(): array
    {
        $model = new OrderingModel();
        return $model->getAllForBaker();
    }


    public function generateResponse(): void
    {
        $data = $this->getData();
        $this->renderHtml('App/View/baker.view.php', ['data' => $data]);
    }


    public function handleRequest(): void
    {
        $this->processData();
        $this->generateResponse();
    }
}