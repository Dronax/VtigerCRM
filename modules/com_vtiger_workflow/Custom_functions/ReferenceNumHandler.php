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
class ReferenceNumHandler extends vteventhandler {
    //put your code here
    
    
    public function handleEvent($name, $data) {
        
        if ($name == 'vtiger.entity.aftersave.final')
        {
            $modulename = $data->getmodulename();
             
//                 sleep(5);
                  global $log, $current_module, $adb, $current_user;
                  
                  //set the label of the field to be updated
                  $fieldlabel  = 'Reference#';
                  // get the Id of the record to be updated
                  $recordid = $data->getid();
                  // the field value starts with the record_no
                  
                   //get current data with formatting
                  $todaydate = date("Y-m-d");
//                  $fieldValue = $dateTime->getDisplayDateTimeValue();

//                  $date = explode(' ', $dateTime);
//	$fieldValue = $date[0];
                  
                  if ($modulename == 'Quotes') {
                  $record_no = $data->get('quote_no');
                  //get the custom field ID from the label
                    $customfield_res = $adb->pquery("SELECT columnname FROM vtiger_field WHERE fieldlabel=? AND tablename = 'vtiger_quotescf'", Array($fieldlabel));
                         if($adb->num_rows($customfield_res)) $customfield  = $adb->query_result($customfield_res, 0, 'columnname');
                         
                  //set Reference# field
                  $reference_num_value = $record_no.'-'.$todaydate;
                   if ($data->isnew()) {
                  $adb->pquery("UPDATE vtiger_quotescf SET $customfield=?  WHERE quoteid=?", Array($reference_num_value, $recordid));
                  }
                  }
                  else {
                  $record_no = $data->get('salesorder_no');
                        //get the custom field ID from the label
                  $customfield_res = $adb->pquery("SELECT columnname FROM vtiger_field WHERE fieldlabel=? AND tablename = 'vtiger_salesordercf'", Array($fieldlabel));
                         if($adb->num_rows($customfield_res)) $customfield  = $adb->query_result($customfield_res, 0, 'columnname');
                         
                          //set Reference# field
                  $reference_num_value = $record_no.'-'.$todaydate;
                   if ($data->isnew()) {
                  $adb->pquery("UPDATE vtiger_salesordercf SET $customfield=?  WHERE salesorderid=?", Array($reference_num_value, $recordid));
                  
                  }
                  
        }
    }
    }
}
