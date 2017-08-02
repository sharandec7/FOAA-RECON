<?php

#pick inputs 
#seelct list
#join list 
#where list
#group by list
class QueryBuilderUtils {
	public $SELECT_ITEM = "SELECT \n"
	function syntaxify($string_list) {
		foreach ($string_list as $string_item) {
			$string_query . = $string_item.", \n";
		}
		return rtrim($string_query,',');	
	}

}



?>