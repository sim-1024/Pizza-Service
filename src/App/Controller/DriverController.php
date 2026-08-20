<?php
declare(strict_types=1);
require_once 'App/Core/BaseController.php';
require_once 'App/Model/OrderingModel.php';

class DriverController extends BaseController
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
        $ordering_id = (int)($_POST['ordering_id']);
        $new_status = (int)($_POST['new_status']);

        if ($operation === 'update') {
            $orderingModel = new OrderingModel();

            if ($new_status === 4) {
                $orderingModel->deleteOrdering($ordering_id);
            } else {
                $orderingModel->updateStatusByOrderingId($ordering_id, $new_status);
            }
        }

        header('Location: ' . Router::generateUrl('driver'));
        exit;
    }


    private function getData(): array
    {
        $model = new OrderingModel();
        return $model->getAllForDriver();
    }

    public function generateResponse(): void
    {
        $data = $this->getData();
        $this->renderHtml('App/View/driver.view.php', ['data' => $data]);
    }

    public function handleRequest(): void
    {
        $this->processData();
        $this->generateResponse();
    }
}