<?php
/**
 * Created by PhpStorm.
 * User: User: Michaela
 */

namespace app\classes\models;

/**
 * snadnejsi pristupp k databazi -> pres staticke metody
 */
class vratZDatabaze
{
	public static function vratPrvniRadek($db, $sql)
	{
		$result = $db->query($sql);
		// fetch -> vrati radek (u sloupce je to pak specifikovane)
		return $result->fetch();
	}

	public static function vratPrvniSloupec($db, $sql)
	{
		$result = $db->query($sql);
		return $result->fetchColumn();
	}

	/**
	 * @return pole objektu
	 */
	public static function vratVse($db, $sql)
	{
		return $db->query($sql);
	}

	public static function query($db, $sql)
	{

		$db->query($sql);
	}
}