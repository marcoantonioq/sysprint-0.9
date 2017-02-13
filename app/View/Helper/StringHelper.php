<?php 
App::uses('AppHelper', 'View/Helper'); 
class StringHelper extends AppHelper {
	
	public function singular($word){
        $rules = array( 
            'res' => 'r',
            'es' => 'e',
            'ms' => 'm',
            'ns' => 'n',
            's' => '',
        );
        
        foreach(array_keys($rules) as $key){
            
            if(substr($word, (strlen($key) * -1)) != $key) 
                continue;
            if($key === false) 
                return $word;
            return substr($word, 0, strlen($word) - strlen($key)) . $rules[$key]; 
        }
        return $word;
    }

} 

?>

