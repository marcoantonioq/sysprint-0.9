<?php

App::uses('Folder', 'Utility');
//App::uses('File', 'Utility');

class ConvertBehavior extends ModelBehavior {
	// caminho a ser salvo: /files/pasta/field_dir
	// O noma da figura fica salvo em: field
	public $defaults = array(
		'dir' => null,
		'config' => array(
			'path'=>'/tmp/files'
		),
		'soffice' => '/usr/bin/soffice',
		'tamanho' => 3048576,
		'deleteFolderOnDelete' => false,
		'mode' => 0777,
	);

	protected $_imagetypes = array(
		'application/odt',
		'application/pdf',
		'application/txt',
		'application/doc',
		'application/msword',
		'application/wps-office.doc',
		'application/wps-office.docx',
		'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		'application/wps-office.xls',
		'application/wps-office.xlt',
		'image/bmp',
		'image/gif',
		'image/jpeg',
		'image/pjpeg',
		'image/png',
		'image/vnd.microsoft.icon',
		'image/x-icon',
		'text/plain',
	);

	public function setup(Model $Model, $config = null) {
		if ( !empty($config) )
			$this->defaults['config'] = $config;
	}

	private function moveFile($file=array(), $path)
	{
		@mkdir($this->defaults['config']['path']);
		extract($file);
		$up = move_uploaded_file($tmp_name, $path);
		return $up;
	}

	public function convertTo(Model $Model, $file = array() ) {
		if (!empty($file['name'])) {
			extract($file);
		}

		$name = ucwords($name);
		$name 			=	str_replace(array(" ", "/","'","\"",",","(",")","[","]","{","}",";",":","º","ª","°","§","%","#","!","$","%","¨","&","*"), "_", $name);
		$path_file 		=	$this->defaults['config']['path']."/".$name;

		pr($name);
		pr($path_file);

		if ( $this->moveFile($file, $path_file) ) {
			if ( !stristr($type, 'pdf')) {
				$comand = "export HOME=/tmp; {$this->defaults['soffice']} --headless --convert-to pdf --outdir  {$this->defaults['config']['path']} $path_file";

				exec($comand, $result,$error);
				echo "<p>result:"; pr($result);
				
				$path_file = $this->defaults['config']['path']."/".pathinfo($name, PATHINFO_FILENAME).".pdf";
			}
		}
		return $path_file;
	}

    public function typeFile(Model $MODEL, $data=array())
    {
    	if(!empty($data['file'][0]['type'])){
    		if ( array_search($data['file'][0]['type'], $this->_imagetypes) === false ) {
					return 'O tipo de arquivo enviado é inválido! (Arquivos válidos: PDF, txt, png, jpge)';
				}
    	}
    	return true;
    }
}
