<?php
if(!defined('FROM_INDEX') ) { die("Execute from site's root."); }


class mysqli_db_driver implements database_interface
{
    private $mysqli;
    private $stmt;
    private $result;
    private $results;


    // Implementa Singleton
    // Trae el constructor 
        // Llama a info
        // Llama a error

    function connect($host, $username, $password, $database, $port = 0)
    {
        if (!$port) {
            // Si no le especificamos un puerto en la config se 
            // conecta al puerto por defecto. 
            $port = 3306;
        }
        $this->mysqli = new mysqli($host, $username, $password, $database, $port);
        if ($this->mysqli->connect_error)
        {
            error("Error connecting to database '{$config['database'][$connection]['database']}'");
        }
    }



    function close()
    {
        $this->mysqli->close();
    }


    
    function query($sql, $args = null)
    {
        /* create a prepared statement */
        $this->stmt = $this->mysqli->prepare($sql);
        if ($this->stmt)
        {
            if (is_array($args))
            {
                $params = array();
                $params[] = "";
                foreach ($args as $arg)
                {
                    $params[0] .= "s";
                    $params[] = $arg;
                }

                //print_r($params);
                //echo $sql;
                call_user_func_array(array($this->stmt, 'bind_param'), $params);
            }


            /* execute prepared statement */
            if (!$this->stmt->execute())
            {
                error('Execution failed!');
                return false;
            }
            
            $this->stmt->store_result();
            $meta = $this->stmt->result_metadata();
            $results = array();

            if ($meta)
            {
                while ($column = $meta->fetch_field()) {
                    $columnName = str_replace(' ', '_', $column->name);
                    $bindVarArray[] = &$this->stmt->results[$columnName];
                }

                call_user_func_array(array($this->stmt, 'bind_result'), $bindVarArray);

                while ($this->stmt->fetch() != null)
                {
                    $row = array();
                    foreach ($this->stmt->results as $k => $v) {
                        $row[$k] = $v;
                    }

                    $results[] = $row;
                }
            }

            $this->results = $results;
            return true;
        }
        else
        {
            error('Could not prepare statement ('.$this->mysqli->error.')');
            return false;
        }
    }


    function escape($value)
    {
        return $this->mysqli->real_escape_string($value);
    }


    function unescape($value)
    {
        return $this->mysqli->real_escape_string($value);
    }


    function insert_id()
    {
        return $this->mysqli->insert_id;
    }
}