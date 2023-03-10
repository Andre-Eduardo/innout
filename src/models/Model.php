<?php

class Model
{
   protected static $tableName = '';
   protected static $columns = [];
   protected $values = [];


   function __construct($arr)
   {
      $this->loadFromArray(($arr));
   }

   public function loadFromArray($arr)
   {
      if ($arr) {
         foreach ($arr as $key => $value) {
            $this->$key = $value;
         }
      }
   }

   public function __get($key)
   {
      return $this->values[$key];
   }

   public function __set($key, $value)
   {
      $this->values[$key] = $value;
   }
   public static function getSelect($filters = [], $columns = '*')
   {
      $sql = "SELECT {$columns} FROM " . static::$tableName . static::getFilters($filters);
      return $sql;
   }

   public static function getFilters($filters)
   {
      $sql = '';
      if (count($filters) > 0) {
         $sql .= " WHERE 1 = 1";
         foreach ($filters as $columns => $value) {
            $sql .= " AND {$columns} = " . static::getFormattedValue($value);
         }
      }

      return $sql;
   }

   private static function getFormattedValue($value)
   {
      if (is_null($value)) {
         return "null";
      } elseif (gettype(($value) === 'string')) {
         return "'{$value}'";
      } else {
         return $value;
      }
   }
}
