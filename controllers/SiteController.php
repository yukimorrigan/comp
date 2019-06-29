<?php 

class SiteController
{
	public function actionIndex() {
		
		$categories = array();
		$categories = Category::getCategoriesList();

		$latestProducts = array();
		$latestProducts = Product::getLatestProducts(8);

		require_once(ROOT . '/views/site/index.php');
		return true;
	}

	public function actionContact() {
        
        $categories = array();
		$categories = Category::getCategoriesList();

        $userEmail = '';
        $userTheme = '';
        $userText = '';
        $result = false;
        
        if (isset($_POST['submit'])) {
            
            $userEmail = $_POST['userEmail'];
            $userTheme = $_POST['userTheme'];
            $userText = $_POST['userText'];
    
            $errors = false;
                        
            // Валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }
            
            // Отправка письма
            if ($errors == false) {
                $adminEmail = 'stereoalina@gmail.com';
                $message = 'Текст: {$userText}. От {$userEmail}';
                $subject = 'Тема письма: {$userTheme}';    
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }
        
        require_once(ROOT . '/views/site/contact.php');
        return true;
    }
    /**
     * Action для страницы "О магазине"
     */
    public function actionAbout()
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        
        // Подключаем вид
        require_once(ROOT . '/views/site/about.php');
        return true;
    }
}

 ?>