<?php 

class SearchController
{
    public function actionIndex($page = 1) {

        $categories = array();
        $categories = Category::getCategoriesList();

        $result = false;

        if (isset($_POST['find'])) {

            $_SESSION['search'] = $_POST['search'];
            header("Location: /search/");
        }

        if ($keyword = Search::returnKeyword()) {
            $result = Search::searchProducts($keyword, $page);
            $total = Search::getTotalProductsSearch($keyword);
        }

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Search::SHOW_BY_DEFAULT, 'page-');

        // Подключаем вид
        require_once(ROOT . '/views/search/index.php');     
        return true;
    }
}

 ?>