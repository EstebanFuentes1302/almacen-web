<?php
	class conexionSingleton
	{
		static private $instance = null;
        static private $conexion;
		private function conexionSingleton()
		{
			$conexion=mysqli_connect('8.12.17.20','esteban','123','bd_almacen');
        }
        
		public function getInstance()
		{
			if(self::$instance == null)
				self::$instance = new conexionSingleton();	
			return(self::$conexion);
		}		
	}
?>