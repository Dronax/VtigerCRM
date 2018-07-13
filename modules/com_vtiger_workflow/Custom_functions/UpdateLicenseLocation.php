<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UpdateLicenseLocation
 *
 * @author rami_m
 */
class UpdateLicenseLocation extends vteventhandler {
    //put your code here
    
    
        public function handleEvent($name, $data) {
        
        if ($name == 'vtiger.entity.aftersave.final')
        {
            $modulename = $data->getmodulename();
             
//                 sleep(5);
                  global $log, $current_module, $adb, $current_user;
                  
                  // Custom Field Label
                  
                  $LicenseFolderLabel = "License File Folder";
                  $SiteLocationLabel = "Site Location";
                  
                  // get the Id of the record to be updated
                  $recordid = $data->getid();
                  
                  //get Site Location col
                          $customfield_res = $adb->pquery("SELECT columnname FROM vtiger_field WHERE fieldlabel=? AND tablename = 'vtiger_projectcf'", Array($SiteLocationLabel));
                         if($adb->num_rows($customfield_res)) $SiteLocationfield  = $adb->query_result($customfield_res, 0, 'columnname');
                             
                // get the License Folder col
                          $customfield_res2 = $adb->pquery("SELECT columnname FROM vtiger_field WHERE fieldlabel=? AND tablename = 'vtiger_projectcf'", Array($LicenseFolderLabel));
                         if($adb->num_rows($customfield_res2)) $SiteFolderField  = $adb->query_result($customfield_res2, 0, 'columnname');  
                           
                  
                  // get the Project Name
                  $ProjectName = $data->get('projectname');
                  
                  //get the Orgnization Name
                    $Organizationname_res = $adb->pquery("SELECT vtiger_crmentity.label FROM vtiger_crmentity INNER JOIN vtiger_project "
                            . "ON vtiger_crmentity.crmid=vtiger_project.linktoaccountscontacts  WHERE vtiger_project.projectid=?", Array($recordid));
                         if($adb->num_rows($Organizationname_res)) $OrganizationName  = $adb->query_result($Organizationname_res, 0);
                         
                         $OrganizationName = str_replace('&', 'and',$OrganizationName);
                  
                  //get the Site Location Value
                         $Site_Location_res = $adb->pquery("SELECT $SiteLocationfield FROM vtiger_projectcf WHERE projectid=?", Array($recordid));
                         if($adb->num_rows($Site_Location_res)) $SiteLocation = $adb->query_result($Site_Location_res, 0);
                         
                  //Set the License Location URL
                         $LicenseLocation = "http://www.gll-me.com/License-files-manager/index.php?Country=$SiteLocation&CP=$OrganizationName&sitename=$ProjectName";

                  //save the License Location URL in the custom field
                          $adb->pquery("UPDATE vtiger_projectcf SET $SiteFolderField=?  WHERE projectid=?", Array($LicenseLocation, $recordid));
                  
    }
    }
}
