<?php 

class Attribute {

	public static function createAttribute($name, $categoryId, $values)
    {
    	$categoryId = intval($categoryId);
    	
    	/* Один-ко-многим: категория содержит аттрибуты*/
    	// получить категорию
		$category = R::load('category', $categoryId);
		// создать бин аттрибута
		$attribute = R::dispense('attribute');
		$attribute->name = $name;
		$attribute->status = 1;
		// связать таблицы
		$category->xownAttributeList[] = $attribute;
		R::store($category);

		/* Один-ко-многим: аттрибуты содержат значения*/
		// сохранить все значения аттрибутов
		foreach ($values as $value) {
			// создать бин значение
			$attributevalue = R::dispense('attributevalue');
			$attributevalue->name = $value;
			// связать таблицы
			$attribute->xownAttributevalueList[] = $attributevalue;
		}
		R::store($attribute);
    }

    public static function getAttributesList()
    {
        return R::find('attribute', 'ORDER BY `id` ASC');
    }

    public static function getAttributeById($id)
    {
        return R::load('attribute', $id);
    }

    public static function deleteAttributeById($id)
    {
        $attribute = R::load('attribute', $id);
        R::trash($attribute);
    }

    public static function updateAttributeById($id, $name, $categoryId, $values, $status)
    {
        $attribute = R::load('attribute', $id);

        $attribute->name = $name;
        $attribute->category_id = (int) $categoryId;
        $attribute->status = $status;

        $attributevalues = array();
        for ($i=0; $i < count($values); $i++) { 
        	// создать бин значение
        	$attributevalues[$i] = R::dispense('attributevalue');
			$attributevalues[$i]->name = $values[$i];
        }
        $attribute->ownAttributevalueList = $attributevalues;

        R::store($attribute);
    }
}

 ?>