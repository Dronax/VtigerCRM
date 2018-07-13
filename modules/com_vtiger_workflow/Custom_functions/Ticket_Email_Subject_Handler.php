<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReferenceNumHandler
 *
 * @author rami_m
 */
class Ticket_Email_Subject_Handler extends vteventhandler {
    //put your code here
    
    
    public function handleEvent($name, $data) {
        
        if ($name == 'vtiger.entity.aftersave.final')
        {
           // $modulename = $data->getmodulename();
             
//                 sleep(5);
                  global $log, $current_module, $adb, $current_user;
                  
                  //set the label of the field to be updated
                  $fieldlabel  = 'Ticket ID';
                  // get the Id of the record to be updated
                  $recordid = $data->getid();
                  
				  
                  $record_no = $data->get('ticket_no');
                  //get the custom field ID from the label
                    $customfield_res = $adb->pquery("SELECT columnname FROM vtiger_field WHERE fieldlabel=? AND tablename = 'vtiger_ticketcf'", Array($fieldlabel));
                         if($adb->num_rows($customfield_res)) $customfield  = $adb->query_result($customfield_res, 0, 'columnname');
                         
                  //set Reference# field
                  $ticketId =  '[Ticket Id : '.$recordid .' ]'; // example: RE: TT71 [Ticket Id : 10682 ] Connect to Command Center DB
                   
                  $adb->pquery("UPDATE vtiger_ticketcf SET $customfield=?  WHERE ticketid=?", Array($ticketId, $recordid));
                  
                  
        }
    }
  }