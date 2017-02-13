<?php 
App::uses('AppHelper', 'View/Helper'); 

class TableHelper extends AppHelper
{
    var $helpers = array('Html', 'Paginator', 'Form', 'Link');

    public function _getField($tableDisplayField, &$entry){
        $fieldToDisplay = null;
        //$tableDisplayField = "<Marco.antonio> as 'Queiro.silva'";
        $fields = preg_split("/[ <>'\"\/]{1,}/i", $tableDisplayField);        
        $fields = preg_grep("/^[a-z_]+\.[a-z_]+$/i", $fields);
        
        //preg_grep(regex, input);
        foreach ($fields as $field) {
            $input = explode(".", $field);
            if (isset($input[1])) {
                if( isset($entry[$input[1]]) ){
                    $fieldToDisplay = $entry[$input[1]];
                }elseif (isset( $entry["{$input[0]}"]["{$input[1]}"] ) ) {
                    $fieldToDisplay = $entry["{$input[0]}"]["{$input[1]}"];
                }
                switch ($input[1]) {
                    case 'status':
                    case null:
                        $fieldToDisplay = $this->Link->status($fieldToDisplay);
                        break;
                }
                $tableDisplayField = preg_replace("/$field/", $fieldToDisplay, $tableDisplayField);
            }else{
                $fieldToDisplay = "Error: variável vazia";
            }
        }
        return $tableDisplayField;
    }
    
    public function createTableForm(
		$tableModelName, 
		$tableEntries, 
		$tableDisplayFields,
		$tableActions = array('view','edit','delete'), 
		$noItemsMessage = "Não há itens a serem exibidos"){

        if (empty($tableEntries)){
            return $noItemsMessage;
        }
        
        // Create header
        $output = "<table class='responsive table table-bordered' id='checkAll'>";
        $output .= "<thead>";
        $output .= "<tr>";
	        foreach($tableDisplayFields as $tableDisplayFieldName => $tableDisplayField){
	            $output .= "<th>".$this->Paginator->sort($tableDisplayField, $tableDisplayFieldName)."</th>";
	        }

	        $hasActions = (!empty($tableActions));
	        //if ($hasActions){
	            $output .= "<th>Ações</th>";
	        //}
			$output .= "
			<th id='masterCh' class='ch'>
				<input type='checkbox' name='{$tableModelName}' value='all' class='styled' />
			</th>";
        $output .= "</tr>";
        $output .= "</thead>";
        
        // Create entries
        foreach ($tableEntries as $entry){
            $output .= "<tr>";
            foreach($tableDisplayFields as $tableDisplayFieldName => $tableDisplayField){
                $fieldToDisplay = $this->_getField($tableDisplayField, $entry);
                $output .= "<td>".$fieldToDisplay."</td>";
            }

            $output .= '<td><div class="controls center">';
            
            if ( in_array('view',$tableActions )){
                $output .= 
                        $this->Html->link(
                            "<span class='icon12 brocco-icon-search'></span>",
                            array('action' => 'view', $entry[$tableModelName]['id']),
                            array(
                                "title"=>"Ver",
                                'class'=>"tip",
                                'escape'=>false,
                            )
                        );
            }
            if ( in_array('edit',$tableActions )){
                $output .= 
                        $this->Html->link(
                            "<span class='icon12 icomoon-icon-pencil'></span>",
                            array('action' => 'edit', $entry[$tableModelName]['id']),
                            array(
                                "title"=>"Editar",
                                'class'=>"tip",
                                'escape'=>false,
                            )
                        );
            }
            if ( in_array('delete',$tableActions )){
                $output .= 
                        $this->Form->postLink(
                            "<span class='icon12 icomoon-icon-remove'></span>",
                            array('action' => 'delete', $entry[$tableModelName]['id']),
                            array(
                                "title"=>"Apagar",
                                'class'=>"tip",
                                'escape'=>false,
                            ),
                            __('Are you sure you want to delete?')
                        );
            }
            $output .= '</div></td>';
                //$output .= "<td>";
                /*foreach ($tableActions as $tableActionKey => $tableActionValue){
                    list(
                        $actionName, 
                        $actionUrlPrefix,
                        $actionUrlFieldName
                    )  = array(
                        $tableActionKey, 
                		$tableActionValue[0], 
                		$tableActionValue[1]
            		);
                    
                    $actionConfirm = false;
                    if (isset($tableActionValue[2])){
                        $actionConfirm = $tableActionValue[2];
                    }
                    $actionUrl = $actionUrlPrefix. $this->_getField(
                    	$tableModelName,
						$entry,
						$actionUrlFieldName
					);
                    
                    $output .= $this->Html->link(
                    	$actionName, 
                    	$actionUrl, 
                    	array(), 
                    	$actionConfirm
                	);
                    $output .= " ";
                    
                }*/
                //$output .= "</td>";
            //}

            $output .= 
            '<td class="chChildren">'.
                $this->Form->checkbox('row.'.$entry[$tableModelName]['id'], array(
                    'class'=>'styled'
                )).
            '</td>';

            $output .= "</tr>";
        }
        $output .= "</table>";
        
        return $output;
    }

    public function createTable(
        $tableModelName, 
        $tableEntries, 
        $tableDisplayFields,
        $tableActions = array(), 
        $noItemsMessage = "Não há itens a serem exibidos"){

        if (empty($tableEntries)){
            return $noItemsMessage;
        }

        // Create header
        $output = "<table class='responsive table table-bordered'>";
        $output .= "<thead>";
        $output .= "<tr>";
            foreach($tableDisplayFields as $tableDisplayFieldName => $tableDisplayField){
                $output .= "<th>".__($tableDisplayFieldName)."</th>";
            }

            $hasActions = (!empty($tableActions));
            if ($hasActions){
                $output .= "<th>Ações</th>";
            }
            
        $output .= "</tr>";
        $output .= "</thead>";
        
        // Create entries
        foreach ($tableEntries as $key => $entry){
            $output .= "<tr>";
            foreach($tableDisplayFields as $tableDisplayFieldName => $tableDisplayField){                
                $fieldToDisplay = $this->_getField($tableDisplayField, $entry);
                $output .= "<td>".$fieldToDisplay."</td>";
            }
            
            if ($hasActions){
                $output .= '<td>';
                if(in_array('view', $tableActions)){
                    $output .= $this->Html->link(
                        "<span class='icon12 brocco-icon-search'></span>",
                        array('controller'=>"${tableModelName}s", 'action' => 'view', $entry['id']),
                        array(
                            "title"=>"Ver",
                            'class'=>"tip",
                            'escape'=>false,
                        )
                    );
                }

                if(in_array('edit', $tableActions)){
                    $output .= $this->Html->link(
                        "<span class='icon12 icomoon-icon-pencil'></span>",
                        array('action' => 'edit', $entry['id']),
                        array(
                            "title"=>"Editar",
                            'class'=>"tip",
                            'escape'=>false,
                        )
                    );
                }

                if(in_array('delete', $tableActions)){
                    $output .= $this->Form->postLink(
                        "<span class='icon12 icomoon-icon-remove'></span>",
                        array('action' => 'delete', $entry['id']),
                        array(
                            "title"=>"Apagar",
                            'class'=>"tip",
                            'escape'=>false,
                        )
                    );
                }

                $output .= '</td>';
            }

            $output .= "</tr>";
        }
        $output .= "</table>";
        
        return $output;
    }
    

    public function tabtable($tableEntries, $tableDisplayFields){
        $output = "
        <div class='tabbable'>";
            $output .= "
            <ul class='nav nav-tabs'>";
                $i = 0;
                foreach ($tableDisplayFields as $key=>$entry){
                    ++$i;
                    $output .= "
                    <li class='".(($i==1)?'active':'')."''>
                        <a href='#tab".$i."' data-toggle='tab'>".$key."</a>
                    </li>";
                    //pr($key);
                }
            $output .= "
            </ul>
            <div class='tab-content'>";

            $i = 0; 
            foreach ($tableDisplayFields as $key=>$entry){
                ++$i;
                $output .= "<div class='tab-pane ".(($i==1)?'active':'')."' id='tab".$i."'>";
                    $output .= "<dl>";
                        foreach ($entry as $title => $field) {
                            $fieldToDisplay = $this->_getField($field, $tableEntries);
                            $output .= "<dt>".__($title)."</dt>
                            <dd>
                                ".$fieldToDisplay."
                                &nbsp;
                            </dd>";
                        }
                    $output .= "</dl>";
                $output .= "</div>";
                //pr($entry);
            }
            //pr($tableEntries);
            $output .= "
            </div>";

        $output .= "
        </div>";
        return $output;
    }

    public function tabinput($tableDisplayFields){
        $output = "
        <div class='tabbable'>";
            $output .= "
            <ul class='nav nav-tabs'>";
                $i = 0;
                foreach ($tableDisplayFields as $key=>$entry){
                    ++$i;
                    $output .= "
                    <li class='".(($i==1)?'active':'')."''>
                        <a href='#tab".$i."' data-toggle='tab'>".$key."</a>
                    </li>";
                    //pr($key);
                }
            $output .= "
            </ul>
            <div class='tab-content'>";

            $i = 0; 
            foreach ($tableDisplayFields as $key=>$entry){
                ++$i;
                $output .= "<div class='tab-pane ".(($i==1)?'active':'')."' id='tab".$i."'>";
                    foreach ($entry as $title => $field) {
                        //pr($field);
                        if(empty($field)) $field = null;
                        $output .= $this->Form->input($title, $field);
                    }
                $output .= "</div>";
                //pr($entry);
            }
            //exit;
            //pr($tableEntries);
            $output .= "
            </div>";

        $output .= "
        </div>";
        return $output;
    }
}