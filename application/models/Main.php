<?
class Main
{
   public static function upField($value, $id, $field){
      $db = Db::getConnection();
      $sql = "UPDATE tasks SET {$field}=? WHERE id=?";
      $stmt = $db->prepare($sql);
      $stmt->execute([$value, $id]);
   }
}