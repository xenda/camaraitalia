<?
   class util
   {
                private $db = "envios_camara";   
                private $server = "ext-db-1.shservers.com";
                private $user = "envios_ucamara";
                private $password = "ucamara";
				//
				/*private $db = "camara";   
                private $server = "localhost";
                private $user = "root";
                private $password = "123456";*/
				//
				private $nroRows=0;
				
                //implementacion de singleton
                private static $instancia = null;

                public static function getInstancia()
				{
                        if(is_null(self::$instancia))
						{
                            self::$instancia = new util();
                        }
                        return self::$instancia;
                        //getInstancia
                }

                /******************************************************/
                function setProcedure($usp){
                         $this->name_procedure=$usp;
                   }

                   function getProcedure(){
                    return  $this->name_procedure;
                   }

                function  EjecutarProcedimiento(){

                        $argumentos_array=func_get_args();
                          //echo $this->PreparaStatement($argumentos_array)."<br>";
                         $sql="call ".$this->getProcedure()."(".$this->PreparaStatement($argumentos_array).")";



                         $query = $this->executeUpdate($sql);
                       echo $sql."<br>";
                        return $query;
                }
                function PreparaStatement($array)
				{  $string="";
				   $separador='';
				   //$num_args = func_num_args();
				   //$lista=func_get_args(1);
				   $num_args=count($array);
				// echo  $array[i];
					 for($i=0;$i<$num_args; $i++)
						{ if($i!=($num_args-1))
							{
								$separador=",";
							 }
						  $string.="'".$array[$i]."'".$separador;
					   }
				 return trim($string,',');
				}

			    function prepareStatementUpdate($header,$array)
				{
					$string="";
				    $separador='';
				    //$num_args = func_num_args();
				    //$lista=func_get_args(1);
				     $num_args=count($header);
				     //echo  $array[i];
					 for($i=0;$i<$num_args; $i++)
						{ if($i!=($num_args-1))
							{
								$separador=",";
							 }
						   if($array[$i]!="")
						   {
						    $set=$header[$i][0]."=";
						    $string.=$set.'"'.$array[$i].'"'.$separador;
						   }
					   }
				 return trim($string,',');
				}


			   function setInsertByValue($table,$argumentos_array){
			   	$sql="insert into ".$table." values(". $this->PreparaStatement($argumentos_array).")";
				 return $sql;
			   }

			    function setUpdateByValue($table,$header,$argumentos_array,$field,$key){
			    	$setter=$this->prepareStatementUpdate($header,$argumentos_array);
	              //$parametro="culummana_ultimo";
				 $sql="update ".$table." set ".$setter."  where ".$field."='".$key."'";
				 return $sql;
			   }
        /**********************************************************************/


              public function executeUpdate($sql){

                       $rpta = null;
                       $rpta = mysql_query($sql, $this->cn);

                        if(mysql_errno($this->cn) != 0){$rpta = mysql_error();}

                        return $rpta;
                } //ejecutar comando

			    public function numeroFilas($rs)
				{ //echo $rs;
				return mysql_num_rows($rs);

				}
			    public function nroFields($sql){
			    	$rs= $this->executeUpdate($sql);
			    return	mysql_num_fields($rs);

			    }

                public function iniciarTransaccion(){

                        mysql_query("BEGIN",$this->cn);

                }//iniciar transaccion

                public function confirmarTransaccion(){

                        mysql_query("COMMIT",$this->cn);

                }//confirmar transaccion

                public function cancelarTransaccion(){

                        mysql_query("ROLLBACK",$this->cn);

                }//cancelar transaccion

                public function __construct(){

				// echo "NO conectado";
                     $this->cn = mysql_connect($this->server,$this->user,$this->password);


                    if($this->cn){
                                $db = mysql_select_db($this->db,$this->cn);
                                if(!$db){$this->dispose($this->cn);}

                        }


                }// metodo constructor

                public function dispose(){

                        if($this->cn){
                                mysql_close($this->cn);
                                $this->cn = null;
                        }
                }//dispose

                public function __destruct(){

                        if($this->cn){
                                $this->cancelarTransaccion();
                                $this->dispose();
                        }
                }//destructor
		

                public function consultar($sql){
                               		$cont=0;
					   $lista = array();
                        $rs=mysql_query($sql);

                       if($rs){
                                while($fila = mysql_fetch_array($rs))
                                {
                                       $lista[] = $fila;
									   $cont++;
                                }
                                $this->nroRows=$cont;
                                mysql_free_result($rs);
                       }

                       return $lista;

                }//consultar

                public  function getNroRows(){

					return $this->nroRows;
                }
                public function isConnected(){

                        $rpta = false;
                        if($this->cn){$rpta = true;}
                        return $rpta;

                }//isConnected

}//fin clase

class tables
{
	private $id_sector;
	private $v_socio;
	private $id_datosec;
	private $letra;		

	public function setId_sector($data)
	{
		$this -> id_sector = $data;	
	}
	
	public function setV_socio($data)
	{
		$this -> v_socio = $data;	
	}	
	
	public function setId_ds($data)
	{
		$this -> id_datosec = $data;	
							
	}
	
	public function setLetra($data)
	{
		$this -> letra = $data;	
							
	}	
						
  
    public function get_sector()
	{  	 
	    $mysql = util::getInstancia();
        $sql = "SELECT * FROM com_sector";
        return $mysql->consultar($sql);
	}
	
    public function get_socios()
	{  	 
	    $mysql = util::getInstancia();
        $sql = "SELECT * FROM com_socios";
        return $mysql->consultar($sql);
	}
	
    public function get_socios_idsector()
	{  	 
	    $mysql = util::getInstancia();
        //$sql = "SELECT * FROM com_sector WHERE 1 order by id = ".$this->id_sector." DESC, id ASC;";
		$sql = "SELECT * FROM com_sector WHERE id = ".$this->id_sector." ;";
        return $mysql->consultar($sql);
	}	

    public function get_socios_liksector()
	{  	 
	    $mysql = util::getInstancia();
        $sql = "SELECT distinct se.id ,se.v_sector FROM com_sector AS se, com_socios AS so WHERE se.id = so.id_sector AND so.v_socio like '".$this->id_sector."%' order by v_sector like '".$this->id_sector."%' DESC, id ASC;";
        return $mysql->consultar($sql);
	}	

    public function get_socios_soc()
	{  	 
	    $mysql = util::getInstancia();
        $sql = "SELECT * FROM com_socios WHERE 1 order by v_socio = ".$this->v_socio." Desc;";
        return $mysql->consultar($sql);
	}		
	
    public function get_socios_idsector2()
	{  	 
	    $mysql = util::getInstancia();
        $sql = "SELECT * FROM com_socios WHERE v_socio like '".$this->letra."%' AND id_sector = ".$this->id_sector.";";
        return $mysql->consultar($sql);
	}		
	
	public function get_datosec()
	{  	 
	    $mysql = util::getInstancia();
        $sql = "SELECT * FROM com_datos_ec;";
        return $mysql->consultar($sql);
	}			
	
	
	public function get_datosec2()
	{	
	    $mysql = util::getInstancia();
        $sql = "SELECT * FROM com_datos_ec WHERE 1 order by id = '".$this->id_datosec."' DESC;";
        return $mysql->consultar($sql);
	}	
	
}	


?>