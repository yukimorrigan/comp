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
		// связать таблицы
		$category->ownAttributeList[] = $attribute;
		R::store($category);

		/* Один-ко-многим: аттрибуты содержат значения*/
		// сохранить все значения аттрибутов
		foreach ($values as $value) {
			// создать бин значение
			$attributevalue = R::dispense('attributevalue');
			$attributevalue->name = $value;
			// связать таблицы
			$attribute->ownAttributeValueList[] = $attributevalue;
		}
		R::store($attribute);
    }
}

 ?>