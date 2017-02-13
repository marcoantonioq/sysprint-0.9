<?php

App::uses('Folder', 'Utility');
//App::uses('File', 'Utility');

class UploadBehavior extends ModelBehavior {
	// caminho a ser salvo: /files/pasta/field_dir
	// O noma da figura fica salvo em: field
	public $defaults = array(
		'dir' => null,
		'config' => null,

		'config' => array(
			'pasta'=>array(
				'field'=>'title',
				'field_dir'=>'caminho'
			)
		),
		'tamanho' => 3048576,
		'deleteFolderOnDelete' => false,
		'mode' => 0777,
	);

	protected $_imagetypes = array(
		'application/odt',
		'application/pdf',
		'application/txt',
		//'application/doc',
		//'application/msword',
		//'application/wps-office.doc',
		//'application/wps-office.docx',
		//'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		//'application/wps-office.xls',
		//'application/wps-office.xlt',
		'image/bmp',
		'image/gif',
		'image/jpeg',
		'image/pjpeg',
		'image/png',
		'image/vnd.microsoft.icon',
		'image/x-icon',
		'text/plain',
	);

	public function setup(Model $Model, $config = array()) {
		$this->defaults['config'] = $config;
		//pr($this->defaults['config']);
		//exit;
	}

	public function afterDelete(Model $Model) {

		/*foreach ($this->settings[$Model->alias] as $field => $options) {
			if ($options['deleteFolderOnDelete'] == true) {
				$this->deleteFolder($Model, $options['path']);
				return true;
			}
		}
		return $result;*/
		return true;
	}

	private function setFolter($path)
	{
		new Folder($path, true, $this->defaults['mode']);
	}

	private function moveUploaded($upload=array(), $path)
	{
		extract($upload);
		// movendo arquivo tmp
		$up = move_uploaded_file($tmp_name, $path);
		return $up;
	}

	private function upload(Model $Model, $data = array() ) {

		foreach ($this->defaults['config'] as $folder => $config)
		{

			// $this->setFolter("files/{$Model->name}");
			$this->setFolter("files/{$Model->name}/{$folder}");

			if ( !empty($Model->data[$Model->name][$config['field']][0]['name']) )
	    	{
	    		$file_names="";
	    		$path_files="";
	    		$up=true;

	    		foreach ($Model->data[$Model->name][$config['field']] as $key => $upload) {

	    			extract($upload);

	    			$name 			=	str_replace(array(" ", "/",","), "", $name);
	    			$path 			=	WWW_ROOT."files/{$Model->name}/{$folder}/".date("Ymd-Hmi");
	    			$path_file 		=	$path."-".$name;
	    			$file_names		.=	" ".$name;
	    			$path_files		.=	" ".$path."-".$name;

	    			$up = $this->moveUploaded($upload, $path_file);

	    			if ( !$up)
					{
						$up=false;
					}
	    		}

	    		$Model->data[$Model->name][$config['field']] = $file_names;
	    		$Model->data[$Model->name][$config['field_dir']] = $path_files;

	    		// pr("Multiple Upload!!!");
				// pr($Model->data); exit;

	    	} else
	    	{
	    		pr("Nenhuma configuração!!!");
	    		if ( !empty($Model->data[$Model->name][$config['field']]) && is_array( $Model->data[$Model->name][$config['field']] ) )
	    		{
	    			unset($Model->data[$Model->name][$config['field']]);
	    		}
	    	}
		}
	}

	public function beforeSave(Model $Model, $option = array()){

		$this->upload($Model);
		return true;

    }

    public function afterSave(Model $Model, $created, $options = array()){
		// // pr($Model->data);
		// if(!empty($Model->data['tmp'])){
		// 	foreach ($Model->data['tmp'] as $folder => $tmp) {

		// 		$origem = $tmp['path_file'];
		// 		$destino = $tmp['path_dir'].$Model->data[$Model->name][$Model->primaryKey].'.'.$tmp['extencion'];

		// 		$Model->data[$Model->name][$tmp['field_dir']] = $destino;

		// 		copy($origem, WWW_ROOT.$destino);
		// 		unlink($origem);

		// 		unset($Model->data['tmp']);
		// 		$Model->save($Model->data[$Model->name]);
		// 	}
		// }
		// pr($Model->data); exit;
    }


	// Function validation
    public function typeFile(Model $MODEL, $data=array())
    {
    	//pr($data); exit;
    	// return true;
    	if(!empty($data['file'][0]['type'])){
    		if ( array_search($data['file'][0]['type'], $this->_imagetypes) === false ) {
				return 'O tipo de arquivo enviado é inválido! (Arquivos válidos: PDF, txt, png, jpge)';
			// } else if ($data['file']['size'] > $this->defaults['tamanho']) {
			// 	return 'O tamanho do arquivo enviado é maior que o limite!';
			}
    	}
    	return true;

    }



}
