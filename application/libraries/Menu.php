<<<<<<< HEAD
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Menu{
		private $arr_menu;
		private $arr_menu2;
		public $cont=0,$i=0;

		public function __construct($arr){
			$this->arr_menu = $arr;
		}

		public function construirMenu(){
			$ret_menu = "<nav><ul id='jMenu'>";
			foreach ($this->arr_menu as $opcion) {
				if($this->cont==1){
					$ret_menu .= "<li><a href='".$opcion."'>".$opcion."</a>";
				}
				else if($this->cont==2){
					$ret_menu.="<ul>";
					foreach ($this->arr_menu[$this->cont] as $opcion2) {
						$ret_menu .= "<li><a href='".$opcion2."'>".$opcion2."</a></li>";
						$this->i++;
					}
					$ret_menu.="</ul></li>";
				}
				else{
					$ret_menu .= "<li><a href='".$opcion."'>".$opcion."</a></li>";
				}
				
				$this->cont++;
			}
		$ret_menu .="</ul></nav>";
		return $ret_menu;
	}
}
=======
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Menu{
		private $arr_menu;
		private $arr_menu2;
		public $cont=0,$i=0;

		public function __construct($arr){
			$this->arr_menu = $arr;
		}

		public function construirMenu(){
			$ret_menu = "<nav><ul id='jMenu'>";
			foreach ($this->arr_menu as $opcion) {
				if($this->cont==1){
					$ret_menu .= "<li><a href='".$opcion."'>".$opcion."</a>";
				}
				else if($this->cont==2){
					$ret_menu.="<ul>";
					foreach ($this->arr_menu[$this->cont] as $opcion2) {
						$ret_menu .= "<li><a href='".$opcion2."'>".$opcion2."</a></li>";
						$this->i++;
					}
					$ret_menu.="</ul></li>";
				}
				else{
					$ret_menu .= "<li><a href='".$opcion."'>".$opcion."</a></li>";
				}
				
				$this->cont++;
			}
		$ret_menu .="</ul></nav>";
		return $ret_menu;
	}
}
>>>>>>> 5ffd4a828276a7817dc5def3723c788813fb6c62
?>