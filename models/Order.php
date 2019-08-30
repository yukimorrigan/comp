<?php 

class Order
{
	public static function create($userId, $userName, $userPhone, $userComment, $products)
	{
        if ($userId) { // пользователь зарегестрирован
            $products = json_encode($products);

            $user = R::load('user', $userId);

            $order = R::dispense('productorder');
            $order->user_name = $userName;
            $order->user_phone = $userPhone;
            $order->user_comment = $userComment;
            $order->products = $products;

            $user->ownItemList[] = $order;
            R::store($user);

            return R::getInsertId();

        } else {

            $products = json_encode($products);

            $order = R::dispense('productorder');
            $order->user_name = $userName;
            $order->user_phone = $userPhone;
            $order->user_comment = $userComment;
            $order->products = $products;

            R::store($order);
            return R::getInsertId();
        }
	}
	/**
     * Возвращает список заказов
     * @return array <p>Список заказов</p>
     */
    public static function getOrdersList()
    {
        return R::getAll('SELECT `id`, `user_name`, `user_phone`, `date`, `status` FROM `productorder`'
            . ' ORDER BY `id` ASC');
    }
    /**
     * Возвращает текстое пояснение статуса для заказа :<br/>
     * <i>1 - Новый заказ, 2 - В обработке, 3 - Доставляется, 4 - Закрыт</i>
     * @param integer $status <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }
    /**
     * Возвращает заказ с указанным id 
     * @param integer $id <p>id</p>
     * @return array <p>Массив с информацией о заказе</p>
     */
    public static function getOrderById($id)
    {
        $id = intval($id);

        if ($id) {
            return R::load('productorder', $id);
        }
    }
    /**
     * Удаляет заказ с заданным id
     * @param integer $id <p>id заказа</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteOrderById($id)
    {
        $order = R::load('productorder', $id);
        R::trash($order);
    }
    /**
     * Редактирует заказ с заданным id
     * @param integer $id <p>id товара</p>
     * @param string $userName <p>Имя клиента</p>
     * @param string $userPhone <p>Телефон клиента</p>
     * @param string $userComment <p>Комментарий клиента</p>
     * @param string $date <p>Дата оформления</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status)
    {
        $order = R::load('productorder', $id);

        $order->user_name = $userName;
        $order->user_phone = $userPhone;
        $order->user_comment = $userComment;
        $order->date = $date;
        $order->status = (int) $status;

        R::store($order);
    }
}

 ?>