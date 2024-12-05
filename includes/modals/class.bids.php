<?php

class Bids extends DatabaseObject
{

    protected static $table_name = "tbl_bids";
    protected static $db_fields = array(
        'id', 'job_id', 'client_id', 'currency', 'freelancer_id', 'bid_amount', 'delivery', 'message', 'project_status', 'added_date', 'sortorder', 'status'
    );

    public $id, $job_id, $client_id, $freelancer_id, $currency, $bid_amount, $delivery, $message, $project_status, $added_date, $sortorder, $status;


    public static function get_by_type($type = "1")
    {
        global $db;
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE type='$type' AND status=1 LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_jobid($jobid = 0)
    {
        global $db;
        $sql = "SELECT * FROM " . self::$table_name . " WHERE job_id='$jobid' AND status=1 ";
        return self::find_by_sql($sql);
        // return !empty($result_array) ? array_shift($result_array) : false;
    }
    public static function find_by_jobid_bop($jobid=0)
    {
        global $db;
        $sql= "SELECT * FROM " . self::$table_name . " WHERE job_id='$jobid' AND status=1 AND project_status=1";
        return self::find_by_sql($sql);
        // return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_jobid_short($jobid=0)
    {
        global $db;
        $sql= "SELECT * FROM " . self::$table_name . " WHERE job_id='$jobid' AND status=1 AND project_status=2";
        return self::find_by_sql($sql);
        // return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function get_average_bid_by_job_id($jobid = 0)
    {
        global $db;
        $query = "SELECT AVG(bid_amount) as bid_amouunt FROM " . self::$table_name . " WHERE job_id='$jobid' AND status=1 ";
        $sql = $db->query($query);
        $ret = $db->fetch_array($sql);
        return $ret['bid_amouunt'];
    }

    public static function getTotalSub($parent_id = '')
    {
        global $db;
        $cond = !empty($parent_id) ? ' AND parent_id=' . $parent_id : '';
        $query = "SELECT COUNT(id) AS tot FROM " . self::$table_name . " WHERE status=1 $cond ";
        $sql = $db->query($query);
        $ret = $db->fetch_array($sql);
        return $ret['tot'];
    }

    public static function find_total_bids($job_id = '')
    {
        global $db;
        $cond = !empty($job_id) ? ' AND job_id=' . $job_id : '';
        $query = "SELECT COUNT(id) AS tot FROM " . self::$table_name . " WHERE status=1 $cond ";
        $sql = $db->query($query);
        $ret = $db->fetch_array($sql);
        return $ret['tot'];
    }

    //FIND THE HIGHEST MAX NUMBER.
    public static function find_maximum($field = "sortorder")
    {
        global $db;
        $result = $db->query("SELECT MAX({$field}) AS maximum FROM " . self::$table_name);
        $return = $db->fetch_array($result);
        return ($return) ? ($return['maximum'] + 1) : 1;
    }

    //Find all the rows in the current database table.
    public static function find_all()
    {
        global $db;
        return self::find_by_sql("SELECT * FROM " . self::$table_name . " ORDER BY sortorder ASC");
    }

    //Find all the rows in the current database table.
    public static function find_all_active()
    {
        global $db;
        return self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE status=1 ORDER BY sortorder DESC");
    }

    //Get sortorder by id
    public static function field_by_id($id = 0, $fields = "")
    {
        global $db;
        $sql = "SELECT $fields FROM " . self::$table_name . " WHERE id={$id} LIMIT 1";
        $result = $db->query($sql);
        $return = $db->fetch_array($result);
        return ($return) ? $return[$fields] : '';
    }

    //Find a single row in the database where id is provided.
    public static function find_by_id($id = 0)
    {
        global $db;
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE id={$id} LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    //Find rows from the database provided the SQL statement.
    public static function find_by_sql($sql = "")
    {
        global $db;
        $result_set = $db->query($sql);
        $object_array = array();
        while ($row = $db->fetch_array($result_set)) {
            $object_array[] = self::instantiate($row);
        }
        return $object_array;
    }

    //Instantiate all the attributes of the Class.
    private static function instantiate($record)
    {
        $object = new self;
        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    //Check if the attribute exists in the class.
    private function has_attribute($attribute)
    {
        $object_vars = $this->attributes();
        return array_key_exists($attribute, $object_vars);
    }

    //Return an array of attribute keys and thier values.
    protected function attributes()
    {
        $attributes = array();
        foreach (self::$db_fields as $field):
            if (property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        endforeach;
        return $attributes;
    }

    //Prepare attributes for database.
    protected function sanitized_attributes()
    {
        global $db;
        $clean_attributes = array();
        foreach ($this->attributes() as $key => $value):
            $clean_attributes[$key] = $db->escape_value($value);
        endforeach;
        return $clean_attributes;
    }

    //Save the changes.
    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }

    //Add  New Row to the database
    public function create()
    {
        global $db;
        $attributes = $this->sanitized_attributes();
        $sql = "INSERT INTO " . self::$table_name . "(";
        $sql .= join(", ", array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";
        if ($db->query($sql)) {
            $this->id = $db->insert_id();
            return true;
        } else {
            return false;
        }
    }

    //Update a row in the database.
    public function update()
    {
        global $db;
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = array();

        foreach ($attributes as $key => $value):
            $attribute_pairs[] = "{$key}='{$value}'";
        endforeach;

        $sql = "UPDATE " . self::$table_name . " SET ";
        $sql .= join(", ", array_values($attribute_pairs));
        $sql .= " WHERE id=" . $db->escape_value($this->id);
        $db->query($sql);
        return ($db->affected_rows() == 1) ? true : false;
        //return true;
    }
}

?>