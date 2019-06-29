<?php 

/**
 * 
 */
class AttributeValue
{
	public static function getAttributeValuesListAdmin()
	{
		// Соединение с БД
        $db = Db::getConnection();
         // Запрос к БД
        $result = $db->query('SELECT id, attribute_id, name, sort_order, status FROM attribute_value ORDER BY sort_order ASC');
        // Получение и возврат результатов
        $attributeValuesList = array();
        $i = 0;
        while ($row = $result->fetch()) {
        	$attributeValuesList[$i]['id'] = $row['id'];
        	$attributeValuesList[$i]['attribute_id'] = $row['attribute_id'];
            $attributeValuesList[$i]['name'] = $row['name'];
            $attributeValuesList[$i]['sort_order'] = $row['sort_order'];
            $attributeValuesList[$i]['status'] = $row['status'];
            $i++;
        }
        return $attributeValuesList;
	}

	public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыто';
                break;
        }
    }
}

 ?>