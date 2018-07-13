<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'include/utils/utils.php';
require 'include/events/include.inc';
$em = new vteventsmanager($adb);
$em->registerhandler("vtiger.entity.aftersave.final", "modules/com_vtiger_workflow/Custom_functions/ReferenceNumHandler.php", "ReferenceNumHandler", "moduleName in ['SalesOrder', 'Quotes']");
$em->registerhandler("vtiger.entity.aftersave.final", "modules/com_vtiger_workflow/Custom_functions/UpdateLicenseLocation.php", "UpdateLicenseLocation", "moduleName in ['Project']");
$em->registerhandler("vtiger.entity.aftersave.final", "modules/com_vtiger_workflow/Custom_functions/Ticket_Email_Subject_Handler.php", "Ticket_Email_Subject_Handler", "moduleName in ['HelpDesk']");
echo 'custom handlers Registered !';