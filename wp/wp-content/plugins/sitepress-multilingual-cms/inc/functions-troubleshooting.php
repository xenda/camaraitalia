<?php

if ( !function_exists('sys_get_temp_dir')) {
  function sys_get_temp_dir() {
      if( $temp=getenv('TMP') )        return $temp;
      if( $temp=getenv('TEMP') )        return $temp;
      if( $temp=getenv('TMPDIR') )    return $temp;
      $temp=tempnam(__FILE__,'');
      if (file_exists($temp)) {
          unlink($temp);
          return dirname($temp);
      }
      return null;
  }
}
  
function icl_troubleshooting_dumpdb(){
    ini_set('memory_limit','128M');
    ob_start();
    _icl_ts_mysqldump(DB_NAME);
    $data = ob_get_contents();
    ob_end_clean();
   
    $gzdata = gzencode($data, 9);
    
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment; filename=" . DB_NAME . ".sql.gz");
    //header("Content-Encoding: gzip");
    header("Content-Length: ". strlen($gzdata));
    echo $gzdata;
}




function _icl_ts_mysqldump($mysql_database)
{
    $sql="show tables;";
    $result= mysql_query($sql);
    if( $result)
    {
        while( $row= mysql_fetch_row($result))
        {
            _icl_ts_mysqldump_table_structure($row[0]);
            _icl_ts_mysqldump_table_data($row[0]);
        }
    }
    else
    {
        echo "/* no tables in $mysql_database */\n";
    }
    mysql_free_result($result);
}

function _icl_ts_mysqldump_table_structure($table)
{
    echo "/* Table structure for table `$table` */\n";
    
    echo "DROP TABLE IF EXISTS `$table`;\n\n";
        
    $sql="show create table `$table`; ";
    $result=mysql_query($sql);
    if( $result)
    {
        if($row= mysql_fetch_assoc($result))
        {
            echo $row['Create Table'].";\n\n";
        }
    }
    mysql_free_result($result);

}

function _icl_ts_mysqldump_table_data($table)
{
    
    $sql="select * from `$table`;";
    $result=mysql_query($sql);
    if( $result)
    {
        $num_rows= mysql_num_rows($result);
        $num_fields= mysql_num_fields($result);
        
        if( $num_rows > 0)
        {
            echo "/* dumping data for table `$table` */\n";
            
            $field_type=array();
            $i=0;
            while( $i < $num_fields)
            {
                $meta= mysql_fetch_field($result, $i);
                array_push($field_type, $meta->type);
                $i++;
            }
            
            //print_r( $field_type);
            echo "INSERT INTO `$table` VALUES\n";
            $index=0;
            while( $row= mysql_fetch_row($result))
            {
                echo "(";
                for( $i=0; $i < $num_fields; $i++)
                {
                    if( is_null( $row[$i]))
                        echo "null";
                    else
                    {
                        switch( $field_type[$i])
                        {
                            case 'int':
                                echo $row[$i];
                                break;
                            case 'string':
                            case 'blob' :
                            default:
                                echo "'".mysql_real_escape_string($row[$i])."'";
                                
                        }
                    }
                    if( $i < $num_fields-1)
                        echo ",";
                }
                echo ")";
                
                if( $index < $num_rows-1)
                    echo ",";
                else
                    echo ";";
                echo "\n";
                
                $index++;
            }
        }
    }
    mysql_free_result($result);
    echo "\n";
}
 
  
?>
