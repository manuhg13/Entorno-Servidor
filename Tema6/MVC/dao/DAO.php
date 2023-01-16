<?
    interface DAO{
        public static function findAll();
        public static function findById($id);
        public static function delete($id);
        public static function insert();
        public static function update($objeto);
    }
?>