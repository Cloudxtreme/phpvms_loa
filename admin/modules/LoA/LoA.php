<?php
/**
 * Leave of Absence (LoA) v.1.0 Module
 * 
 * phpVMS Module for pilots to submit a LoA request that is stored in a database 
 * and an option for staff to view all the LoA requests through the admin panel
 * This module is released under the Creative Commons Attribution-Noncommercial-Share Alike  3.0 Unported License
 * You are free to redistribute and alter this work as you wish but you must keep the original 'copyright' information on all the places it comes in the original work.
 * You are not allowed to delete the copyright information and/or gain any profit by adopting or using this module.
 *
 * @author Sava Markovic - savamarkovic.com
 * @copyright Copyright (c) 2012, Sava Markovic
 * @link http://www.savamarkovic.com
 * @license http://creativecommons.org/licenses/by-nc-sa/3.0/
 */

class LoA extends CodonModule {

    public $title = "Leave of Absence Admin";
    
    public function HTMLHead()
        {
           $this->set('sidebar', 'loa/loa_admin_sidebar.tpl');
        }

    public function NavBar ()
        {
            echo '<li><a href="'.SITE_URL.'/admin/index.php/LoA">LoA Admin</a></li>';
        }

    public function index ()

    {
        $version = '1.0';
        $leaves = LoAData::GetAllRequests(array());
        $this->set('all_leaves', $leaves);
        $this->render('loa/loa_admin_index.tpl');
        $this->check($version);
     }



     public function viewLOA()
     {  
        $id = $this->get->id;        
        $getinfo = LoAData::GetInfoByID($id);
        $this->set('info', $getinfo);
        $this->render('loa/loa_admin_view_request.tpl');

     }

     public function confirmDeleteLOA()
     {
       $id = $this->get->id;        
        $getinfo = LoAData::GetInfoById($id);
        $this->set('info', $getinfo);
        $this->render('loa/loa_admin_confirm_delete_request.tpl');
     }
     public function deleteLOA()
     {
        $id = $this->get->id;
        $getinfo = LoAData::DeleteLoA($id);
       
        if (mysql_affected_rows() == -1)
        {
            $this->set('message', 'The LoA Reqest hasn\'t been deleted from the database for some reason. This isn\'t suppose to happen. Check the phpVMS forums for support.');
            $this->render('loa/loa_admin_delete_request.tpl');
        }
        else
        {
            
            $this->set('message', 'The LoA Reqest has been successfuly deleted from the database.');
            $this->render('loa/loa_admin_delete_request.tpl');
        }


     }
     protected function check ($version)
     {
        $version_to_check = $version;
        $url = 'http://www.savamarkovic.com/loa.csv';
        $fp = @fopen ($url, 'r') or $message = "The updater checking service is currently offline"; //If the server is unreachable
        $read = fgetcsv ($fp); 
        fclose ($fp); // Closes the connection
        if ($read[0] > $version_to_check && $read[2] == "1") { $critical = TRUE; } // If its 1, set ciritcal to true
        if ($read[0] > $version_to_check) { $update = TRUE; } // Anything other than 1 set update to true
        if ($read[0] == $version_to_check) {
            echo '<p id="success">Your version of this module is up to date. Wohooooo! ;))</p>';
        }else if ($critical) {
                echo '<h4>CRITICAL UPDATE FOUND!</h4>';
                echo '<p id="error">There is a critical update available! Here is the information associated with the update. <br/><b>Version:
                 '.$read[0].' - '. $read[1].' <br /></b>Please send an email to ceo@airserbiavirtual.com to receive the updated version.</p>';
        }else if ($update){
                echo '<h4>NON CRITICAL UPDATE FOUND!</h4>';
                echo '<p id="error" style="background:#fffca7;border-color:orange">There is NON critical update available! Here is the information associated with the update. <br/><b>Version:
                 '.$read[0].' - '. $read[1].' <br /></b>Please send an email to ceo@airserbiavirtual.com to receive the updated version.</p>';
      }

   
}
}
