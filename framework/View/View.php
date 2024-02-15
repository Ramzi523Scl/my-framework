<?php

namespace MyFramework\Framework\View;

use MyFramework\Framework\Http\Response;

class View
{
    public function render(Page $page)
    {
        return $this->renderView($page);
    }

    private function renderView(Page $page)
    {
        $nameView = ucfirst($page->view) . '.php';
        $layoutPath = BASE_PATH . "/app/View/$nameView";
        if (!file_exists($layoutPath)) {
            return new Response('File not found: $viewFilePath', 404);
        }

        $data = $page->data;
        extract(['data' => $data]);

        ob_start();
        require($layoutPath);
        $content = ob_get_clean();

        return $content;
    }
}