<?php
/**
 * Leave of Absence (LoA) v.0.9 Module
 * 
 * phpVMS Module for pilots to submit a LoA request that is stored in a database 
 * and an option for staff to view all the LoA requests through the admin panel
 * This module is released under the Creative Commons Attribution-Noncommercial-Share Alike  3.0 Unported License
 * You are free to redistribute and alter this work as you wish but you must keep the original 'copyright' information on all the places it comes in the original work.
 * You are not allowed to delete the copyright information and/or gain any profit by adopting or using this module.
 *
 * @author Sava Markovic - savamarkovic.com
 * @copyright Copyright (c) 2013, Sava Markovic
 * @link http://www.savamarkovic.com
 * @license http://creativecommons.org/licenses/by-nc-sa/3.0/
 */

class LoAData extends CodonData {

        public function CheckPilotID ($pilotid) {
		$pilotid=DB::escape($pilotid);
		$query = "SELECT * FROM ".TABLE_PREFIX."loa WHERE pilotid ='$pilotid'";
		$sql = mysql_query($query);
		$count = mysql_num_rows($sql); 
		return $count;
	}
        
	public function AddLoa ($data)  {
		$pilotid = DB::escape($data['pilotid']);
 		$start   = DB::escape($data['start']);
 		$end     = DB::escape($data['end']);
 		$reason  = DB::escape($data['reason']);
 		$sql = "INSERT INTO ".TABLE_PREFIX."loa (pilotid,start, end, reason) VALUES ('$pilotid', '$start', '$end', '$reason')";
 		$insert = DB::query($sql);
	}

	public function GetAllRequests ()   {
		$sql   = "SELECT ".TABLE_PREFIX."loa.pilotid,
                                ".TABLE_PREFIX."loa.start,
                                ".TABLE_PREFIX."loa.end,
                                ".TABLE_PREFIX."loa.reason,
                                ".TABLE_PREFIX."pilots.pilotid,
                                ".TABLE_PREFIX."pilots.firstname,
                                ".TABLE_PREFIX."pilots.lastname
                                FROM ".TABLE_PREFIX."loa 
                                JOIN ".TABLE_PREFIX."pilots ON ".TABLE_PREFIX."loa.pilotid = ".TABLE_PREFIX."pilots.pilotid";
		$ret = DB::get_results($sql);
		return $ret;
	}
	
	public function GetInfoByID($id)    {
		$id=DB::escape($id);
		$sql = "SELECT * FROM ".TABLE_PREFIX."loa WHERE pilotid='$id'";
		$query = DB::get_results($sql);
		return $query;
	}

	public function DeleteLoA ($id) {
                $id=DB::escape($id);
		$sql   = "DELETE FROM ".TABLE_PREFIX."loa WHERE pilotid='$id'";
		$query = mysql_query($sql);
		return mysql_affected_rows();
	}
}