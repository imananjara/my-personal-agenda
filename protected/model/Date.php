<?php
/**
 * Date class allows manage date's operations
 * @author imananjara <ivan.mananjara@gmail.com>
 */
class Date
{
	/**
	 * Transform sql date into the human's format (dd/mm/yyyy)
	 * @param  $date
	 * @return string
	 */
	public static function _dateSQLToHuman($date)
	{
		if (empty($date)) return '';
		$date = explode('-', $date);
		return $date[2].'/'.$date[1].'/'.$date[0];
	}
	
	/**
	 * Transform human date into the sql's format (yyyy-mm-dd)
	 * @param  $date
	 * @return string
	 */
	public static function _dateHumanToSQL($date)
	{
		if (empty($date)) return '';
		$date = explode('/', $date);
		return $date[2].'-'.$date[1].'-'.$date[0];
	}
	
	/**
	 * Transform sql hour into the human's format (hh:mm)
	 * @param  $hour
	 * @return string
	 */
	public static function _hourSQLToHuman($hour)
	{
		if (empty($hour)) return '';
		$hour = explode(":", $hour);
		return $hour[0] .":". $hour[1];
	}
}