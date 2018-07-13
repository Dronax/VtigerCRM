<?php error_reporting(0);
$memory_limit = substr(ini_get("memory_limit"), 0, -1);
if ($memory_limit < 256) {
    ini_set("memory_limit", "256M");
}
global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
$array_keys = "array_keys";
$array_push = "array_push";
$array_merge = "array_merge";
$array_sum = "array_sum";
$count = "count";
$date = "date";
$explode = "explode";
$file_exists = "file_exists";
$html_entity_decode = "html_entity_decode";
$iconv = "iconv";
$implode = "implode";
$in_array = "in_array";
$is_array = "is_array";
$is_object = "is_object";
$is_numeric = "is_numeric";
$md5 = "md5";
$nl2br = "nl2br";
$number_format = "number_format";
$round = "round";
$rtrim = "rtrim";
$sprintf = "sprintf";
$str_replace = "str_replace";
$str_ireplace = "str_ireplace";
$strlen = "strlen";
$strtoupper = "strtoupper";
$strpos = "strpos";
$substr = "substr";
$strtolower = "strtolower";
$trim = "trim";
class PDFMaker_PDFContent_Model extends Vtiger_Base_Model {
    private static $PDFM1x0b;
    private static $module;
    private static $language;
    private static $focus;
    private static $PearDatabase_getInstance;
    private static $Vtiger_Language_Handler;
    private static $vglobal_default_charset;
    private static $PDFM1x12;
    private static $PDFM1x13;
    private static $PDFM1x14;
    private static $PDFM1x15;
    public static $PDFM1x16;
    private static $PDFM1x17;
    private static $PDFM1x18 = array();
    private static $header;
    private static $footer;
    private static $body;
    private static $PDFM1x1c;
    private static $PDFM1x1d;
    private static $file_name;
    private static $PDFM1x1f;
    private static $blabla = "&#%ITS%%%@@@%%%ITS%#&";
    private static $PDFM1x21;
    private static $table_name = Array("PurchaseOrder" => "vtiger_purchaseorder", "SalesOrder" => "vtiger_salesorder", "Quotes" => "vtiger_quotes", "Invoice" => "vtiger_invoice", "Issuecards" => "vtiger_issuecards", "Receiptcards" => "vtiger_receiptcards", "Creditnote" => "vtiger_creditnote", "StornoInvoice" => "vtiger_stornoinvoice");
    private static $id_col = Array("PurchaseOrder" => "purchaseorderid", "SalesOrder" => "salesorderid", "Quotes" => "quoteid", "Invoice" => "invoiceid", "Issuecards" => "issuecardid", "Receiptcards" => "receiptcardid", "Creditnote" => "creditnote_id", "StornoInvoice" => "stornoinvoice_id");
    private static $id_col2 = Array("PurchaseOrder" => "purchaseorderid", "SalesOrder" => "salesorderid", "Quotes" => "quoteid", "Invoice" => "invoiceid");
    private static $company_details = array("organizationname" => "COMPANY_NAME", "address" => "COMPANY_ADDRESS", "city" => "COMPANY_CITY", "state" => "COMPANY_STATE", "code" => "COMPANY_ZIP", "country" => "COMPANY_COUNTRY", "phone" => "COMPANY_PHONE", "fax" => "COMPANY_FAX", "website" => "COMPANY_WEBSITE", "logo" => "COMPANY_LOGO",);
    public static $PDFM1x26 = array();
    private static $PDFM1x27 = array();
    function __construct($module, $focus, $language) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $vtiger_current_version = "vtiger_current_version";
        $PDFM1x2c = vglobal($vtiger_current_version);
        $site_URL = "site_URL";
        $PDFM1x2e = vglobal($site_URL);
        $default_charset = "default_charset";
        $vglobal_default_charset = vglobal($default_charset);
        self::$PearDatabase_getInstance = PearDatabase::getInstance();
        self::$vglobal_default_charset = $vglobal_default_charset;
        self::$module = $module;
        self::$focus = $focus;
        self::$language = $language;
        $Vtiger_Language_Handler = Vtiger_Language_Handler::getModuleStringsFromFile(self::$language, self::$module);
        self::$Vtiger_Language_Handler = $Vtiger_Language_Handler['languageStrings'];
        $this->page_settings();
        $this->ignorepicklistvalues();
        self::$PDFM1x26["record"] = self::$focus->id;
        self::$PDFM1x26["templateid"] = self::$PDFM1x0b;
        self::$PDFM1x17 = "<rowbreak />";
    }
    public function getContent() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x32 = $this->simple_html_dom();
        require_once ($PDFM1x32);
        $vtiger_current_version = "vtiger_current_version";
        $PDFM1x2c = vglobal($vtiger_current_version);
        $img_root_directory = "img_root_directory";
        $PDFM1x34 = vglobal($img_root_directory);
        if (isset(self::$table_name[self::$module])) $PDFM1x35 = self::$table_name[self::$module];
        else $PDFM1x35 = "";
        if (isset(self::$id_col[self::$module])) $PDFM1x36 = self::$id_col[self::$module];
        else $PDFM1x36 = "";
        if (isset(self::$id_col2[self::$module])) {
            self::$PDFM1x1c = self::$body;
            self::$PDFM1x1c = self::$header . self::$blabla;
            self::$PDFM1x1c.= self::$body . self::$blabla;
            self::$PDFM1x1c.= self::$file_name . self::$blabla;
            self::$PDFM1x1c.= self::$footer;
            self::$PDFM1x21["&nbsp;"] = " ";
            self::$PDFM1x21["##PAGE##"] = "{PAGENO}";
            self::$PDFM1x21["##PAGES##"] = "{nb}";
            self::$PDFM1x21["##DD-MM-YYYY##"] = $date("d-m-Y");
            self::$PDFM1x21["##DD.MM.YYYY##"] = $date("d.m.Y");
            self::$PDFM1x21["##MM-DD-YYYY##"] = $date("m-d-Y");
            self::$PDFM1x21["##YYYY-MM-DD##"] = $date("Y-m-d");
            self::$PDFM1x21["src='"] = "src='" . $PDFM1x34;
            self::$PDFM1x21["$" . $strtoupper(self::$module) . "_CRMID$"] = self::$focus->id;
            if ($PDFM1x2c == '5.2.1') {
                $PDFM1x37 = getDisplayDate(self::$focus->column_fields['createdtime']);
                $PDFM1x38 = getDisplayDate(self::$focus->column_fields['modifiedtime']);
            } else {
                $PDFM1x39 = new DateTimeField(self::$focus->column_fields['createdtime']);
                $PDFM1x37 = $PDFM1x39->getDisplayDateTimeValue();
                $PDFM1x3a = new DateTimeField(self::$focus->column_fields['modifiedtime']);
                $PDFM1x38 = $PDFM1x3a->getDisplayDateTimeValue();
            }
            self::$PDFM1x21["$" . $strtoupper(self::$module) . "_CREATEDTIME_DATETIME$"] = $PDFM1x37;
            self::$PDFM1x21["$" . $strtoupper(self::$module) . "_MODIFIEDTIME_DATETIME$"] = $PDFM1x38;
            $this->get_module_image();
            $this->x15();
            self::$PDFM1x1c = $html_entity_decode(self::$PDFM1x1c, ENT_QUOTES, self::$vglobal_default_charset);
            $PDFM1x3b = str_get_html(self::$PDFM1x1c);
            if ($is_array($PDFM1x3b->find("div[style^=page-break-after]"))) {
                foreach ($PDFM1x3b->find("div[style^=page-break-after]") as $PDFM1x3c) {
                    $PDFM1x3c->outertext = self::$PDFM1x16;
                    self::$PDFM1x1c = $PDFM1x3b->save();
                }
            }
            if ($is_array($PDFM1x3b->find("div[style^=PAGE-BREAK-AFTER]"))) {
                foreach ($PDFM1x3b->find("div[style^=PAGE-BREAK-AFTER]") as $PDFM1x3c) {
                    $PDFM1x3c->outertext = self::$PDFM1x16;
                    self::$PDFM1x1c = $PDFM1x3b->save();
                }
            }
            $this->get_rel_module();
            $this->x10(self::$module, self::$focus);
            $this->Product_lines_calc();
            if ($this->focus->column_fields["assigned_user_id"] == "") {
                $this->focus->column_fields["assigned_user_id"] = self::$PearDatabase_getInstance->query_result(self::$PearDatabase_getInstance->pquery("SELECT smownerid FROM vtiger_crmentity WHERE crmid = ?", array(self::$focus->id)), 0, "smownerid");
            }
            $this->x0e();
            $this->x11();
            $this->x12();
            $this->x13();
            $this->x14();
            if ($strtoupper(self::$vglobal_default_charset) != "UTF-8") {
                self::$PDFM1x1c = $iconv(self::$vglobal_default_charset, "UTF-8//TRANSLIT", self::$PDFM1x1c);
            }
            $PDFM1x3d = array();
            if ($PDFM1x35 != "" AND $PDFM1x36 != "") list($PDFM1x3d["header"], $PDFM1x3d["body"], $PDFM1x3d["file_name"], $PDFM1x3d["footer"]) = $explode(self::$blabla, self::$PDFM1x1c);
        } else {
            $PDFM1x3d = array("header" => "", "body" => "", "footer" => "");
        }
        return $PDFM1x3d;
    }
    public function getSettings() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x3e = "SELECT (margin_top * 10) AS margin_top,
                     (margin_bottom * 10) AS margin_bottom,
                      (margin_left * 10) AS margin_left, 
                     (margin_right*10) AS margin_right,
                     format, 
                     orientation, 
                     encoding,                      disp_header, disp_footer 
              FROM vtiger_pdfmaker_settings WHERE templateid = ?";
        $PDFM1x3f = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array(self::$PDFM1x0b));
        $PDFM1x40 = self::$PearDatabase_getInstance->fetchByAssoc($PDFM1x3f, 1);
        return $PDFM1x40;
    }
    private function get_rel_module() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x2b = "vtiger_current_version";
        $PDFM1x2c = vglobal($PDFM1x2b);
        $PDFM1x41 = "_fieldinfo_cache";
        $PDFM1x3e = "SELECT fieldid, relmodule FROM vtiger_fieldmodulerel";
        $PDFM1x3f = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array());
        $PDFM1x42 = array();
        while ($PDFM1x43 = self::$PearDatabase_getInstance->fetchByAssoc($PDFM1x3f)) {
            $PDFM1x42[$PDFM1x43["fieldid"]][] = $PDFM1x43["relmodule"];
        }
        $PDFM1x44 = getTabId(self::$module);
        $PDFM1x3e = "SELECT fieldid, fieldname, uitype, columnname 
              FROM vtiger_field 
              WHERE tabid = ? AND (displaytype != ? OR fieldid = ?)";
        $PDFM1x3f = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array($PDFM1x44, '3', '64'));
        $PDFM1x45 = self::$PearDatabase_getInstance->num_rows($PDFM1x3f);
        if ($PDFM1x45 > 0) {
            while ($PDFM1x43 = self::$PearDatabase_getInstance->fetch_array($PDFM1x3f)) {
                $module_type = "";
                $PDFM1x47 = $PDFM1x43["columnname"];
                $PDFM1x48 = self::$focus->column_fields[$PDFM1x43["fieldname"]];
                switch ($PDFM1x43["uitype"]) {
                    case "51":
                        $module_type = "Accounts";
                    break;
                    case "57":
                        $module_type = "Contacts";
                    break;
                    case "58":
                        $module_type = "Campaigns";
                    break;
                    case "59":
                        $module_type = "Products";
                    break;
                    case "73":
                        $module_type = "Accounts";
                    break;
                    case "75":
                        $module_type = "Vendors";
                    break;
                    case "81":
                        $module_type = "Vendors";
                    break;
                    case "76":
                        $module_type = "Potentials";
                    break;
                    case "78":
                        $module_type = "Quotes";
                    break;
                    case "80":
                        $module_type = "SalesOrder";
                    break;
                    case '53':
                    case "101":
                        $module_type = "Users";
                    break;
                    case "68":
                    case "10":
                        $module_type = getSalesEntityType($PDFM1x48);
                    break;
                }
                if ($module_type != "") {
                    $PDFM1x49 = getTabId($module_type);
                    $PDFM1x4a = & VTCacheUtils::$$PDFM1x41;
                    unset($PDFM1x4a[$PDFM1x49]);
                    $module_record = CRMEntity::getInstance($module_type);
                    if ($PDFM1x48 != "" && $PDFM1x48 != "0") {
                        if ($module_type == "Users") {
                            $PDFM1x4c = "SELECT deleted FROM vtiger_users WHERE id=? AND deleted=0";
                        } else {
                            $PDFM1x4c = "SELECT deleted FROM vtiger_crmentity WHERE crmid=? AND deleted=0";
                        }
                        $PDFM1x4d = self::$PearDatabase_getInstance->pquery($PDFM1x4c, array($PDFM1x48));
                        if (self::$PearDatabase_getInstance->num_rows($PDFM1x4d) > 0) {
                            $module_record->retrieve_entity_info($PDFM1x48, $module_type);
                            $module_record->id = $PDFM1x48;
                        }
                    }
                    if ($PDFM1x2c == '5.2.1') {
                        $PDFM1x37 = getDisplayDate($module_record->column_fields['createdtime']);
                        $PDFM1x38 = getDisplayDate($module_record->column_fields['modifiedtime']);
                    } else {
                        $PDFM1x39 = new DateTimeField($module_record->column_fields['createdtime']);
                        $PDFM1x37 = $PDFM1x39->getDisplayDateTimeValue();
                        $PDFM1x3a = new DateTimeField($module_record->column_fields['modifiedtime']);
                        $PDFM1x38 = $PDFM1x3a->getDisplayDateTimeValue();
                    }
                    self::$PDFM1x21["$" . "R_" . $strtoupper($PDFM1x47) . "_CRMID$"] = $module_record->id;
                    self::$PDFM1x21["$" . "R_" . $strtoupper($PDFM1x47) . "_CREATEDTIME_DATETIME$"] = $PDFM1x37;
                    self::$PDFM1x21["$" . "R_" . $strtoupper($PDFM1x47) . "_MODIFIEDTIME_DATETIME$"] = $PDFM1x38;
                    if ($module_type != "Users") {
                        self::$PDFM1x21["$" . "R_" . $strtoupper($module_type) . "_CRMID$"] = $module_record->id;
                        self::$PDFM1x21["$" . "R_" . $strtoupper($module_type) . "_CREATEDTIME_DATETIME$"] = $PDFM1x37;
                        self::$PDFM1x21["$" . "R_" . $strtoupper($module_type) . "_MODIFIEDTIME_DATETIME$"] = $PDFM1x38;
                    }
                    if (isset($module_type)) {
                        $PDFM1x4e = "";
                        switch ($module_type) {
                            case "Contacts":
                                $PDFM1x4e = $this->x1b($module_record->id);
                            break;
                            case "Products":
                                $PDFM1x4e = $this->x1d($module_record->id);
                            break;
                        }
                        if ($module_type != "Users") {
                            self::$PDFM1x21["$" . "R_" . $strtoupper($module_type) . "_IMAGENAME$"] = $PDFM1x4e;
                        }
                        self::$PDFM1x21["$" . "R_" . $strtoupper($PDFM1x47) . "_IMAGENAME$"] = $PDFM1x4e;
                    }
                    if (isset($PDFM1x4f[$module_type])) {
                        $PDFM1x50 = $this->x2d($module_record->id);
                        $PDFM1x50 = $html_entity_decode($PDFM1x50, ENT_QUOTES, self::$vglobal_default_charset);
                        self::$PDFM1x21["$" . "R_" . $strtoupper($PDFM1x47) . "_MODCOMMENTS$"] = $PDFM1x50;
                    }
                    $this->x15();
                    if ($module_type != "Users") {
                        $this->x10($module_type, $module_record, true);
                    }
                    $this->x10($module_type, $module_record, $PDFM1x47);
                    $this->totals_calculation($module_type, $module_record, $PDFM1x47);
                    unset($module_record);
                }
                if ($PDFM1x43["uitype"] == "68") {
                    $PDFM1x42[$PDFM1x43["fieldid"]][] = "Contacts";
                    $PDFM1x42[$PDFM1x43["fieldid"]][] = "Accounts";
                }
                if (isset($PDFM1x42[$PDFM1x43["fieldid"]])) {
                    foreach ($PDFM1x42[$PDFM1x43["fieldid"]] as $PDFM1x51 => $PDFM1x52) {
                        if ($PDFM1x52 == $module_type) continue;
                        $PDFM1x53 = getTabId($PDFM1x52);
                        $PDFM1x4a = & VTCacheUtils::$$PDFM1x41;
                        unset($PDFM1x4a[$PDFM1x53]);
                        if ($file_exists("modules/" . $PDFM1x52 . "/" . $PDFM1x52 . ".php")) {
                            $PDFM1x54 = CRMEntity::getInstance($PDFM1x52);
                            if ($PDFM1x2c == '5.2.1') {
                                $PDFM1x37 = getDisplayDate($PDFM1x54->column_fields['createdtime']);
                                $PDFM1x38 = getDisplayDate($PDFM1x54->column_fields['modifiedtime']);
                            } else {
                                $PDFM1x39 = new DateTimeField($PDFM1x54->column_fields['createdtime']);
                                $PDFM1x37 = $PDFM1x39->getDisplayDateTimeValue();
                                $PDFM1x3a = new DateTimeField($PDFM1x54->column_fields['modifiedtime']);
                                $PDFM1x38 = $PDFM1x3a->getDisplayDateTimeValue();
                            }
                            if ($module_type != "Users") {
                                self::$PDFM1x21["$" . "R_" . $strtoupper($PDFM1x52) . "_CRMID$"] = $PDFM1x54->id;
                                self::$PDFM1x21["$" . "R_" . $strtoupper($PDFM1x52) . "_CREATEDTIME_DATETIME$"] = $PDFM1x37;
                                self::$PDFM1x21["$" . "R_" . $strtoupper($PDFM1x52) . "_MODIFIEDTIME_DATETIME$"] = $PDFM1x38;
                                $this->x10($PDFM1x52, $PDFM1x54, true);
                            }
                            self::$PDFM1x21["$" . "R_" . $strtoupper($PDFM1x47) . "_CRMID$"] = $PDFM1x54->id;
                            self::$PDFM1x21["$" . "R_" . $strtoupper($PDFM1x47) . "_CREATEDTIME_DATETIME$"] = $PDFM1x37;
                            self::$PDFM1x21["$" . "R_" . $strtoupper($PDFM1x47) . "_MODIFIEDTIME_DATETIME$"] = $PDFM1x38;
                            $this->x10($PDFM1x52, $PDFM1x54, $PDFM1x47);
                            $this->totals_calculation($PDFM1x52, $PDFM1x54, $PDFM1x47);
                            unset($PDFM1x54);
                        }
                    }
                }
            }
        }
    }
    private function get_prod_block() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x32 = $this->simple_html_dom();
        require_once ($PDFM1x32);
        $PDFM1x3b = str_get_html(self::$PDFM1x1c);
        $PDFM1x55 = false;
        if ($is_array($PDFM1x3b->find("td"))) {
            foreach ($PDFM1x3b->find("td") as $PDFM1x56) {
                if ($trim($PDFM1x56->plaintext) == "#PRODUCTBLOC_START#") {
                    $PDFM1x56->parent->outertext = "#PRODUCTBLOC_START#";
                    $PDFM1x57 = $PDFM1x56->parent;
                    while ($PDFM1x57->tag != "table") $PDFM1x57 = $PDFM1x57->parent;
                    list($PDFM1x58) = $explode(">", $PDFM1x57->outertext, 2);
                    $PDFM1x19 = $PDFM1x57->first_child();
                    if ($PDFM1x19->tag != "tr") $PDFM1x19 = $PDFM1x19->children(0);
                    if ($is_object($PDFM1x56->parent->prev_sibling()->children[0])) {
                        $PDFM1x59 = $PDFM1x56->parent->prev_sibling()->children[0]->getAttribute("style");
                    } else {
                        $PDFM1x59 = '';
                    }
                    $PDFM1x5a = "<tr>";
                    if (isset($PDFM1x59)) {
                        $PDFM1x5b = $explode(";", $PDFM1x59);
                        if (isset($PDFM1x5b)) {
                            foreach ($PDFM1x5b as $PDFM1x5c) {
                                if ($strpos($PDFM1x5c, "border-top") == TRUE) {
                                    $PDFM1x5a.= "<td colspan='" . $PDFM1x56->getAttribute("colspan") . "' style='" . $PDFM1x5c . "'>&nbsp;</td>";
                                }
                            }
                        }
                    } else {
                        $PDFM1x5a.= "<td colspan='" . $PDFM1x56->getAttribute("colspan") . "' style='border-top:1px solid #000000;'>&nbsp;</td>";
                    }
                    $PDFM1x5a.= "</tr>";
                    $PDFM1x5d = $PDFM1x56->parent->next_sibling()->last_child()->plaintext;
                    $PDFM1x5e = "";
                    if ($strpos($PDFM1x5d, "TOTAL") !== false) {
                        if ($is_object($PDFM1x56)) {
                            $PDFM1x5f = $PDFM1x56->getAttribute("style");
                        }
                        if (isset($PDFM1x56->innertext)) {
                            list($PDFM1x60, $PDFM1x61) = $explode("#PRODUCTBLOC_START#", $PDFM1x56->innertext);
                        } else {
                            $PDFM1x60 = "";
                            $PDFM1x61 = "";
                        }
                        if (isset($PDFM1x5f)) {
                            $PDFM1x62 = $explode(";", $PDFM1x5f);
                            if (isset($PDFM1x62)) {
                                foreach ($PDFM1x62 as $PDFM1x63) {
                                    if ($strpos($PDFM1x63, "border-top") == TRUE) {
                                        $PDFM1x58.= " style='" . $PDFM1x63 . "'";
                                        break;
                                    }
                                }
                            }
                        } else {
                            $PDFM1x5f = "";
                        }
                        $PDFM1x5e = "<tr>";
                        $PDFM1x5e.= "<td colspan='" . ($PDFM1x56->getAttribute("colspan") - 1) . "' style='" . $PDFM1x5f . ";border-right:none'>" . $PDFM1x60 . "%G_Subtotal%" . $PDFM1x61 . "</td>";
                        $PDFM1x5e.= "<td align='right' nowrap='nowrap' style='" . $PDFM1x5f . "'>" . $PDFM1x60 . "" . $rtrim($PDFM1x5d, "$") . "_SUBTOTAL$" . $PDFM1x61 . "</td>";
                        $PDFM1x5e.= "</tr>";
                    }
                    $PDFM1x58.= ">";
                    $PDFM1x55["tag"] = $PDFM1x58;
                    $PDFM1x55["header"] = $PDFM1x19->outertext;
                    $PDFM1x55["footer"] = $PDFM1x5a;
                    $PDFM1x55["subtotal"] = $PDFM1x5e;
                }
                if ($trim($PDFM1x56->plaintext) == "#PRODUCTBLOC_END#") $PDFM1x56->parent->outertext = "#PRODUCTBLOC_END#";
            }
            self::$PDFM1x1c = $PDFM1x3b->save();
        }
        return $PDFM1x55;
    }
    private function Product_lines_calc() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x64 = "select * from vtiger_inventoryproductrel where id=?";
        $PDFM1x3f = self::$PearDatabase_getInstance->pquery($PDFM1x64, array(self::$focus->id));
        $PDFM1x45 = self::$PearDatabase_getInstance->num_rows($PDFM1x3f);
        if ($PDFM1x45 > 0) {
            $PDFM1x65 = $this->totals_calculation(self::$module, self::$focus);
            $PDFM1x66 = array();
            if ($strpos(self::$PDFM1x1c, "#PRODUCTBLOC_START#") !== false && $strpos(self::$PDFM1x1c, "#PRODUCTBLOC_END#") !== false) {
                $PDFM1x67 = $this->get_prod_block();
                $PDFM1x68 = $this->x19();
                $PDFM1x69 = $PDFM1x68["products"];
                $PDFM1x6a = $PDFM1x68["show_header"];
                $PDFM1x6b = $PDFM1x68["show_subtotal"];
                $PDFM1x6c = "";
                if ($count($PDFM1x69) > 0) {
                    if ($PDFM1x67 !== false) {
                        $PDFM1x6c = "</table>" . self::$PDFM1x16 . $PDFM1x67["tag"];
                        if ($PDFM1x6a == 1) $PDFM1x6c.= $PDFM1x67["header"];
                        if ($PDFM1x6b == 1) {
                            $PDFM1x6c = $PDFM1x67["subtotal"] . $PDFM1x6c;
                        } else {
                            $PDFM1x6c = $PDFM1x67["footer"] . $PDFM1x6c;
                        }
                    } else {
                        $PDFM1x6c = self::$PDFM1x16;
                    }
                }
                $PDFM1x6d = array();
                $PDFM1x6e = $explode("#PRODUCTBLOC_START#", self::$PDFM1x1c);
                $PDFM1x6d[] = $PDFM1x6e[0];
                for ($PDFM1x6f = 1;$PDFM1x6f < $count($PDFM1x6e);$PDFM1x6f++) {
                    $PDFM1x70 = $explode("#PRODUCTBLOC_END#", $PDFM1x6e[$PDFM1x6f]);
                    foreach ($PDFM1x70 as $PDFM1x71) $PDFM1x6d[] = $PDFM1x71;
                    $PDFM1x72 = $PDFM1x6f * 2 - 1;
                    $PDFM1x73[$PDFM1x72] = $PDFM1x6d[$PDFM1x72];
                    $PDFM1x6d[$PDFM1x72] = '';
                }
                if ($PDFM1x65["P"]) {
                    foreach ($PDFM1x65["P"] AS $PDFM1x74) {
                        foreach ($PDFM1x73 as $PDFM1x75 => $PDFM1x76) {
                            $PDFM1x77 = "";
                            if ($PDFM1x6c != "" && isset($PDFM1x69[$PDFM1x74["SERVICES_RECORD_ID"] . "_" . $PDFM1x74["PRODUCTSEQUENCE"]]) || isset($PDFM1x69[$PDFM1x74["PRODUCTS_RECORD_ID"] . "_" . $PDFM1x74["PRODUCTSEQUENCE"]])) {
                                $PDFM1x77 = $PDFM1x6c;
                            }
                            $PDFM1x76.= $PDFM1x77;
                            foreach ($PDFM1x74 AS $PDFM1x78 => $PDFM1x79) {
                                $PDFM1x76 = $str_replace("$" . $strtoupper($PDFM1x78) . "$", $PDFM1x79, $PDFM1x76);
                            }
                            $PDFM1x6d[$PDFM1x75].= $PDFM1x76;
                        }
                    }
                }
                self::$PDFM1x1c = $implode('', $PDFM1x6d);
            }
        }
    }
    private function x0e() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x3b = str_get_html(self::$PDFM1x1c);
        $PDFM1x7a = 0;
        if ($is_array($PDFM1x3b->find("rowbreak"))) {
            foreach ($PDFM1x3b->find("rowbreak") as $PDFM1x7b) {
                if ($PDFM1x7b->outertext == self::$PDFM1x17) {
                    $PDFM1x7c = $PDFM1x7b;
                    while ($PDFM1x7c != null && $PDFM1x7c->tag != "td") {
                        $PDFM1x7c = $PDFM1x7c->parent();
                    }
                    if ($PDFM1x7c->tag == "td") {
                        if ($PDFM1x7a > 0) {
                            $PDFM1x7a--;
                            continue;
                        }
                        $PDFM1x7d = $PDFM1x7c->prev_sibling();
                        $PDFM1x7e = array();
                        while ($PDFM1x7d != null) {
                            $PDFM1x7e[] = $this->x0f($PDFM1x7d);
                            $PDFM1x7d = $PDFM1x7d->prev_sibling();
                        }
                        $PDFM1x7f = $PDFM1x7c->next_sibling();
                        $PDFM1x80 = array();
                        while ($PDFM1x7f != null) {
                            $PDFM1x80[] = $this->x0f($PDFM1x7f);
                            $PDFM1x7f = $PDFM1x7f->next_sibling();
                        }
                        $PDFM1x81 = $explode(self::$PDFM1x17, $PDFM1x7c->innertext);
                        for ($PDFM1x2d = 0;$PDFM1x2d < ($count($PDFM1x81) - 1);$PDFM1x2d++) {
                            $PDFM1x7c->innertext = $PDFM1x81[$PDFM1x2d];
                            $PDFM1x82 = '<tr>';
                            for ($PDFM1x83 = 0;$PDFM1x83 < $count($PDFM1x7e);$PDFM1x83++) {
                                $PDFM1x82.= '<td ' . $PDFM1x7e[$PDFM1x83] . '>&nbsp;</td>';
                            }
                            $PDFM1x82.= '<td style="' . $PDFM1x7c->getAttribute("style") . '">' . $PDFM1x81[$PDFM1x2d + 1] . '</td>';
                            for ($PDFM1x83 = 0;$PDFM1x83 < $count($PDFM1x80);$PDFM1x83++) {
                                $PDFM1x82.= '<td ' . $PDFM1x80[$PDFM1x83] . '>&nbsp;</td>';
                            }
                            $PDFM1x82.= '</tr>';
                            $PDFM1x7c->parent()->outertext = $PDFM1x7c->parent()->outertext . $PDFM1x82;
                        }
                        $PDFM1x7a = $count($PDFM1x81) - 2;
                    }
                }
            }
            self::$PDFM1x1c = $PDFM1x3b->save();
        }
    }
    private function x0f($PDFM1x84) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x85 = "";
        if ($PDFM1x84 != null) {
            foreach ($PDFM1x84->attr as $PDFM1x86 => $PDFM1x87) {
                $PDFM1x85.= $PDFM1x86 . '="' . $PDFM1x87 . '" ';
            }
        }
        return $PDFM1x85;
    }
    private function x10($module, $focus, $PDFM1x8a = false, $PDFM1x8b = false) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x8c = Users_Record_Model::getCurrentUserModel();
        $PDFM1x8d = array("related_to", "relatedto", "parent_id", "parentid", "product_id", "productid", "service_id", "serviceid", "vendor_id", "product", "account", "invoiceid", "linktoaccountscontacts", "projectid", "sc_related_to");
        if ($PDFM1x8b !== false) $PDFM1x8e = array();
        $PDFM1x49 = getTabid($module);
        $PDFM1x8f = $module;
        if ($PDFM1x8a === false) {
            $PDFM1x90 = "";
        } else {
            $PDFM1x90 = "R_";
            if ($PDFM1x8a !== true) $PDFM1x8f = $PDFM1x8a;
        }
        $PDFM1x91 = array();
        $PDFM1x92 = array();
        $PDFM1x93 = array();
        $PDFM1x94 = array();
        $PDFM1x95 = array();
        $PDFM1x96 = array();
        $PDFM1x97 = array();
        $PDFM1x98 = array();
        $PDFM1x99 = array();
        $PDFM1x3e = "SELECT fieldname, uitype, typeofdata FROM vtiger_field WHERE tabid ";
        if ($PDFM1x49 == '9') {
            $PDFM1x3e.= "IN (9,16)";
        } else {
            $PDFM1x3e.= "= '" . $PDFM1x49 . "'";
        }
        $PDFM1x3f = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array());
        while ($PDFM1x43 = self::$PearDatabase_getInstance->fetchByAssoc($PDFM1x3f)) {
            switch ($PDFM1x43['uitype']) {
                case '19':
                case '20':
                case '21':
                case '24':
                    $PDFM1x93[] = $PDFM1x43['fieldname'];
                break;
                case '5':
                case '6':
                case '23':
                case '70':
                    $PDFM1x94[] = $PDFM1x43['fieldname'];
                break;
                case '15':
                    $PDFM1x92[] = $PDFM1x43['fieldname'];
                break;
                case '56':
                    $PDFM1x91[] = $PDFM1x43['fieldname'];
                break;
                case '33':
                    $PDFM1x95[] = $PDFM1x43['fieldname'];
                break;
                case '71':
                    $PDFM1x96[] = $PDFM1x43['fieldname'];
                break;
                case '72':
                case '9':
                    $PDFM1x97[] = $PDFM1x43['fieldname'];
                break;
                case '53':
                case '101':
                    $PDFM1x98[] = $PDFM1x43['fieldname'];
                break;
                case '52':
                    $PDFM1x99[] = $PDFM1x43['fieldname'];
                break;
                case '10':
                    if (!$in_array($PDFM1x43['fieldname'], $PDFM1x8d)) $PDFM1x8d[] = $PDFM1x43['fieldname'];
                    break;
                case '7':
                    if ($substr($PDFM1x43["typeofdata"], 0, 1) == "N") {
                        $PDFM1x97[] = $PDFM1x43["fieldname"];
                    }
                    break;
                }
                if ($PDFM1x43["fieldname"] == "salutationtype") {
                    $PDFM1x92[] = $PDFM1x43["fieldname"];
                }
        }
        foreach ($focus->column_fields as $PDFM1x9a => $PDFM1x79) {
            if ($PDFM1x9a == "account_id") {
                $PDFM1x79 = getAccountName($PDFM1x79);
            } elseif ($PDFM1x9a == "potential_id") $PDFM1x79 = getPotentialName($PDFM1x79);
            elseif ($PDFM1x9a == "contact_id") $PDFM1x79 = getContactName($PDFM1x79);
            elseif ($PDFM1x9a == "quote_id") $PDFM1x79 = getQuoteName($PDFM1x79);
            elseif ($PDFM1x9a == "salesorder_id") $PDFM1x79 = getSoName($PDFM1x79);
            elseif ($PDFM1x9a == "campaignid") $PDFM1x79 = getCampaignName($PDFM1x79);
            elseif ($PDFM1x9a == "terms_conditions") $PDFM1x79 = $this->x25($PDFM1x79);
            elseif ($PDFM1x9a == "comments") $PDFM1x79 = $this->x26($focus);
            elseif ($PDFM1x9a == "folderid") $PDFM1x79 = $this->x27($PDFM1x79);
            elseif ($PDFM1x9a == "time_start" || $PDFM1x9a == "time_end") {
                $PDFM1x9b = DateTimeField::convertToUserTimeZone($PDFM1x79);
                $PDFM1x79 = $PDFM1x9b->format('H:i');
            } elseif ($in_array($PDFM1x9a, $PDFM1x8d)) {
                if ($PDFM1x79 != "") {
                    $PDFM1x9c = getSalesEntityType($PDFM1x79);
                    $PDFM1x9d = getEntityName($PDFM1x9c, $PDFM1x79);
                    if (!empty($PDFM1x9d)) {
                        foreach ($PDFM1x9d as $PDFM1x9e) {
                            $PDFM1x79 = $PDFM1x9e;
                        }
                    }
                    if ($PDFM1x9a == "invoiceid" && $PDFM1x79 == "0") $PDFM1x79 = "";
                }
            }
            if ($in_array($PDFM1x9a, $PDFM1x94)) {
                if ($module == "Events" || $module == "Calendar") {
                    if ($PDFM1x9a == "date_start" && $focus->column_fields["time_start"] != "") {
                        $PDFM1x9b = $focus->column_fields['time_start'];
                        $PDFM1x79 = $PDFM1x79 . ' ' . $PDFM1x9b;
                    } elseif ($PDFM1x9a == "due_date" && $focus->column_fields["time_end"] != "") {
                        $PDFM1x9b = $focus->column_fields['time_end'];
                        $PDFM1x79 = $PDFM1x79 . ' ' . $PDFM1x9b;
                    }
                }
                if ($PDFM1x79 != "") $PDFM1x79 = getValidDisplayDate($PDFM1x79);
            } elseif ($in_array($PDFM1x9a, $PDFM1x92)) {
                if (!$in_array($trim($PDFM1x79), self::$PDFM1x18)) {
                    $PDFM1x79 = $this->x20($PDFM1x79, $module);
                } else {
                    $PDFM1x79 = "";
                }
            } elseif ($in_array($PDFM1x9a, $PDFM1x91)) {
                if ($PDFM1x79 == 1) {
                    $PDFM1x79 = vtranslate('LBL_YES');
                } else {
                    $PDFM1x79 = vtranslate('LBL_NO');
                }
            } elseif ($in_array($PDFM1x9a, $PDFM1x93)) {
                $PDFM1x79 = $nl2br($PDFM1x79);
                $PDFM1x79 = $html_entity_decode($PDFM1x79, ENT_QUOTES, self::$vglobal_default_charset);
            } elseif ($in_array($PDFM1x9a, $PDFM1x95)) $PDFM1x79 = $str_ireplace(' |##| ', ', ', $PDFM1x79);
            elseif ($in_array($PDFM1x9a, $PDFM1x96)) {
                if ($is_numeric($PDFM1x79)) {
                    if ($PDFM1x8b === false) {
                        $PDFM1x9f = getCurrencySymbolandCRate($PDFM1x8c->currency_id);
                        $PDFM1xa0 = $PDFM1x9f["rate"];
                    } else {
                        $PDFM1xa0 = $PDFM1x8b["conversion_rate"];
                    }
                    $PDFM1x79 = $PDFM1x79 * $PDFM1xa0;
                }
                $PDFM1x79 = $this->number_format($PDFM1x79);
            } elseif ($in_array($PDFM1x9a, $PDFM1x97)) {
                $PDFM1x79 = $this->number_format($PDFM1x79);
            } elseif ($in_array($PDFM1x9a, $PDFM1x98)) {
                if ($PDFM1x79 != "0" && $PDFM1x79 != "") $PDFM1x79 = getOwnerName($PDFM1x79);
                else $PDFM1x79 = "";
            } elseif ($in_array($PDFM1x9a, $PDFM1x99)) {
                if ($PDFM1x79 != "0" && $PDFM1x79 != "") {
                    $PDFM1xa1 = $PDFM1x79;
                    $PDFM1x79 = getUserFullName($PDFM1xa1);
                    if ($PDFM1x79 == "") {
                        $PDFM1x79 = $PDFM1xa1;
                        $PDFM1x9c = getSalesEntityType($PDFM1xa1);
                        $PDFM1x9d = getEntityName($PDFM1x9c, $PDFM1xa1);
                        if (!empty($PDFM1x9d)) {
                            foreach ($PDFM1x9d as $PDFM1x9e) {
                                $PDFM1x79 = $PDFM1x9e;
                            }
                        }
                    }
                } else $PDFM1x79 = "";
            }
            if ($PDFM1x8b !== false) {
                $PDFM1x8e[$strtoupper($module . "_" . $PDFM1x9a) ] = $PDFM1x79;
            } else {
                self::$PDFM1x21["$" . $PDFM1x90 . $strtoupper($PDFM1x8f . "_" . $PDFM1x9a) . "$"] = $PDFM1x79;
            }
        }
        if ($PDFM1x8b !== false) {
            return $PDFM1x8e;
        } else {
            $this->x15();
        }
    }
    private function x11() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1xa2 = "root_directory";
        $PDFM1xa3 = vglobal($PDFM1xa2);
        $PDFM1x8c = Users_Record_Model::getCurrentUserModel();
        $PDFM1x3e = "SELECT * FROM vtiger_organizationdetails";
        $PDFM1x3f = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array());
        $PDFM1xa4 = self::$PearDatabase_getInstance->fetchByAssoc($PDFM1x3f, 1);
        foreach ($PDFM1xa4 AS $PDFM1x78 => $PDFM1x79) {
            if ($PDFM1x78 == "logo") $PDFM1x79 = '<img src="' . $PDFM1xa3 . 'test/logo/' . $PDFM1xa4["logoname"] . '">';
            self::$PDFM1x21["$" . self::$company_details[$PDFM1x78] . "$"] = $PDFM1x79;
        }
        $PDFM1x3e = "SELECT tandc FROM vtiger_inventory_tandc WHERE type = ?";
        $PDFM1xa5 = self::$PearDatabase_getInstance->query_result(self::$PearDatabase_getInstance->pquery($PDFM1x3e, array('Inventory')), 0, "tandc");
        self::$PDFM1x21["$" . "TERMS_AND_CONDITIONS$"] = $nl2br($PDFM1xa5);
        if (self::$focus->column_fields["assigned_user_id"] != "") {
            $PDFM1xa6 = "SELECT * FROM vtiger_users WHERE id = ?";
            $PDFM1xa7 = self::$PearDatabase_getInstance->pquery($PDFM1xa6, array(self::$focus->column_fields["assigned_user_id"]));
            $PDFM1xa8 = self::$PearDatabase_getInstance->fetchByAssoc($PDFM1xa7);
            $this->x31($PDFM1xa8["id"], $PDFM1xa8, "USER");
        } else $this->x31($PDFM1x8c->id, $PDFM1x8c, "USER");
        $this->x31($PDFM1x8c->id, $PDFM1x8c, "L_USER");
        $PDFM1xa9 = CRMEntity::getInstance("Users");
        $PDFM1xa9->id = self::$focus->column_fields["assigned_user_id"];
        $this->x24($PDFM1xa9, $PDFM1xa9->id, "Users");
        $this->x10("Users", $PDFM1xa9, false);
        $PDFM1xaa = CRMEntity::getInstance("Users");
        $PDFM1xaa->id = $PDFM1x8c->id;
        $this->x24($PDFM1xaa, $PDFM1xaa->id, "Users");
        $this->x10("Users", $PDFM1xaa, true);
        self::$PDFM1x21["$" . "USERS_CRMID$"] = $PDFM1xa9->id;
        self::$PDFM1x21["$" . "R_USERS_CRMID$"] = $PDFM1xaa->id;
        $this->x15();
    }
    private function x12() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1xab = new PDFMaker_PDFMaker_Model();
        $PDFM1xac = Vtiger_Language_Handler::getModuleStringsFromFile(self::$language);
        $PDFM1xad = Vtiger_Language_Handler::getModuleStringsFromFile(self::$language, self::$module);
        $PDFM1xae = $PDFM1xac["languageStrings"];
        $PDFM1xaf = $PDFM1xad["languageStrings"];
        self::$PDFM1x21["%G_Qty%"] = $PDFM1xae["Quantity"];
        self::$PDFM1x21["%G_Subtotal%"] = $PDFM1xae["Sub Total"];
        self::$PDFM1x21["%M_LBL_VENDOR_NAME_TITLE%"] = $PDFM1xae["Vendor Name"];
        $this->x15();
        if ($strpos(self::$PDFM1x1c, "%G_") !== false) {
            foreach ($PDFM1xae as $PDFM1xb0 => $PDFM1x79) {
                self::$PDFM1x21["%G_" . $PDFM1xb0 . "%"] = $PDFM1x79;
            }
            $this->x15();
        }
        if ($strpos(self::$PDFM1x1c, "%M_") !== false) {
            foreach ($PDFM1xaf as $PDFM1xb0 => $PDFM1x79) {
                self::$PDFM1x21["%M_" . $PDFM1xb0 . "%"] = $PDFM1x79;
            }
            $this->x15();
            foreach ($PDFM1xae as $PDFM1xb0 => $PDFM1x79) {
                self::$PDFM1x21["%M_" . $PDFM1xb0 . "%"] = $PDFM1x79;
            }
            if (self::$module == "SalesOrder") self::$PDFM1x21["%G_SO Number%"] = $PDFM1xaf["SalesOrder No"];
            if (self::$module == "Invoice") self::$PDFM1x21["%G_Invoice No%"] = $PDFM1xaf["Invoice No"];
            $this->x15();
        }
        if ($strpos(self::$PDFM1x1c, "%C_") !== false) {
            foreach ($PDFM1xb1 as $PDFM1xb0 => $PDFM1x79) {
                self::$PDFM1x21["%" . $PDFM1x79->GetKey() . "%"] = $PDFM1x79->GetLangValue($PDFM1xb2);
            }
            $this->x15();
        }
    }
    private function x13() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x32 = $this->simple_html_dom();
        require_once ($PDFM1x32);
        self::$PDFM1x21["[BARCODE|"] = "<barcode>";
        self::$PDFM1x21["|BARCODE]"] = "</barcode>";
        $this->x15();
        $PDFM1x3b = str_get_html(self::$PDFM1x1c);
        if ($is_array($PDFM1x3b->find("barcode"))) {
            foreach ($PDFM1x3b->find("barcode") as $PDFM1xb3) {
                $PDFM1xb4 = $explode("|", $PDFM1xb3->plaintext);
                list($PDFM1x1f, $PDFM1xb5) = $explode("=", $PDFM1xb4[0], 2);
                $PDFM1xb6 = 'code="' . $PDFM1xb5 . '" type="' . $PDFM1x1f . '" ';
                for ($PDFM1x2d = 1;$PDFM1x2d < $count($PDFM1xb4);$PDFM1x2d++) {
                    list($PDFM1x86, $PDFM1x87) = $explode("=", $PDFM1xb4[$PDFM1x2d], 2);
                    $PDFM1xb6.= $strtolower($PDFM1x86) . '="' . $PDFM1x87 . '" ';
                }
                $PDFM1xb3->outertext = '<barcode ' . $PDFM1xb6 . '/>';
            }
            self::$PDFM1x1c = $PDFM1x3b->save();
        }
    }
    private function x14() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x2d = "site_URL";
        $PDFM1xb7 = vglobal($PDFM1x2d);
        $PDFM1x32 = $this->simple_html_dom();
        require_once ($PDFM1x32);
        $PDFM1x3b = str_get_html(self::$PDFM1x1c);
        if ($is_array($PDFM1x3b->find("img"))) {
            foreach ($PDFM1x3b->find("img") as $PDFM1xb8) {
                if ($PDFM1xb7[$strlen($PDFM1xb7) - 1] != "/") $PDFM1xb7 = $PDFM1xb7 . "/";
                if ($strpos($PDFM1xb8->src, $PDFM1xb7) === 0) {
                    $PDFM1xb9 = $str_replace($PDFM1xb7, "", $PDFM1xb8->src);
                    if ($file_exists($PDFM1xb9)) $PDFM1xb8->src = $PDFM1xb9;
                }
            }
            self::$PDFM1x1c = $PDFM1x3b->save();
        }
    }
    private function x15() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        if (!empty(self::$PDFM1x21)) {
            self::$PDFM1x1c = $str_replace($array_keys(self::$PDFM1x21), self::$PDFM1x21, self::$PDFM1x1c);
            self::$PDFM1x21 = array();
        }
    }
    private function page_settings() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $site_URL = "site_URL";
        $vglobal_site_URL = vglobal($site_URL);
        self::$PDFM1x12 = $trim($vglobal_site_URL, "/");
        $vtiger_pdfmaker_settings = "SELECT vtiger_pdfmaker.*, vtiger_pdfmaker_settings.* 
              FROM vtiger_pdfmaker 
              LEFT JOIN vtiger_pdfmaker_settings
                ON vtiger_pdfmaker_settings.templateid = vtiger_pdfmaker.templateid 
              WHERE vtiger_pdfmaker.module=? LIMIT 0,1";
        $PDFM1x3f = self::$PearDatabase_getInstance->pquery($vtiger_pdfmaker_settings, array(self::$module));
        $PDFM1xba = self::$PearDatabase_getInstance->fetch_array($PDFM1x3f);
        self::$PDFM1x0b = $PDFM1xba["templateid"];
        $PDFM1xbb = vglobal("PDFMaker_template_id", self::$PDFM1x0b);
        self::$PDFM1x13 = $html_entity_decode($PDFM1xba["decimal_point"], ENT_QUOTES);
        self::$PDFM1x14 = $html_entity_decode(($PDFM1xba["thousands_separator"] != "sp" ? $PDFM1xba["thousands_separator"] : " "), ENT_QUOTES);
        self::$PDFM1x15 = $PDFM1xba["decimals"];
        self::$header = $PDFM1xba["header"];
        self::$footer = $PDFM1xba["footer"];
        self::$body = $PDFM1xba["body"];
        self::$PDFM1x1d = $PDFM1xba["module"];
        self::$file_name = $PDFM1xba["file_name"];
        $PDFM1xbc = $PDFM1xba["format"];
        if ($strpos($PDFM1xbc, ";") > 0) {
            $PDFM1xbd = $explode(";", $PDFM1xbc);
            $PDFM1xbc = $PDFM1xbd[0] . "mm " . $PDFM1xbd[1] . "mm";
        } elseif ($PDFM1xba["orientation"] == "landscape") {
            $PDFM1xbc.= "-L";
        }
        self::$PDFM1x16 = '<pagebreak sheet-size="' . $PDFM1xbc . '" orientation="' . $PDFM1xba["orientation"] . '" margin-left="' . ($PDFM1xba["margin_left"] * 10) . 'mm" margin-right="' . ($PDFM1xba["margin_right"] * 10) . 'mm" margin-top="0mm" margin-bottom="0mm" margin-header="' . ($PDFM1xba["margin_top"] * 10) . 'mm" margin-footer="' . ($PDFM1xba["margin_bottom"] * 10) . 'mm" />';
    }
    private function ignorepicklistvalues() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x3e = "SELECT value FROM vtiger_pdfmaker_ignorepicklistvalues";
        $PDFM1x3f = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array());
        while ($PDFM1x43 = self::$PearDatabase_getInstance->fetchByAssoc($PDFM1x3f)) {
            self::$PDFM1x18[] = $PDFM1x43["value"];
        }
    }
    private function products_block($PDFM1x0c, $PDFM1x0e) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1xbe = $this->tax_type($PDFM1x0c, $PDFM1x0e);
        $product_details = "select case when vtiger_products.productid != '' then vtiger_products.productname else vtiger_service.servicename end as productname," . " case when vtiger_products.productid != '' then vtiger_products.productid else vtiger_service.serviceid end as psid," . " case when vtiger_products.productid != '' then vtiger_products.product_no else vtiger_service.service_no end as psno," . " case when vtiger_products.productid != '' then 'Products' else 'Services' end as entitytype," . " case when vtiger_products.productid != '' then vtiger_products.unit_price else vtiger_service.unit_price end as unit_price," . " case when vtiger_products.productid != '' then vtiger_products.usageunit else vtiger_service.service_usageunit end as usageunit," . " case when vtiger_products.productid != '' then vtiger_products.qty_per_unit else vtiger_service.qty_per_unit end as qty_per_unit," . " case when vtiger_products.productid != '' then vtiger_products.qtyinstock else 'NA' end as qtyinstock," . " case when vtiger_products.productid != '' then c1.description else c2.description end as psdescription, vtiger_inventoryproductrel.* " . " from vtiger_inventoryproductrel" . " left join vtiger_products on vtiger_products.productid=vtiger_inventoryproductrel.productid " . " left join vtiger_crmentity as c1 on c1.crmid = vtiger_products.productid " . " left join vtiger_service on vtiger_service.serviceid=vtiger_inventoryproductrel.productid " . " left join vtiger_crmentity as c2 on c2.crmid = vtiger_service.serviceid " . " where id=? ORDER BY sequence_no";
        $PDFM1x3f = self::$PearDatabase_getInstance->pquery($product_details, array($PDFM1x0e->id));
        $PDFM1x45 = self::$PearDatabase_getInstance->num_rows($PDFM1x3f);
        $PDFM1xbf = "0.00";
        $PDFM1xc0 = 0;
        $PDFM1xc1 = 0;
        $PDFM1xc2 = 0;
        list($PDFM1xc3, $PDFM1xc4) = $this->x1a($PDFM1x0e->id);
        $PDFM1xc5 = array();
        $PDFM1xc6 = array();
        for ($PDFM1x2d = 1;$PDFM1x2d <= $PDFM1x45;$PDFM1x2d++) {
            $PDFM1xc7 = self::$PearDatabase_getInstance->pquery("SELECT productid from vtiger_inventorysubproductrel WHERE id=? AND sequence_no=?", array($PDFM1x0e->id, $PDFM1x2d));
            $PDFM1xc8 = '';
            if (self::$PearDatabase_getInstance->num_rows($PDFM1xc7) > 0) {
                for ($PDFM1x83 = 0;$PDFM1x83 < self::$PearDatabase_getInstance->num_rows($PDFM1xc7);$PDFM1x83++) {
                    $PDFM1xc9 = self::$PearDatabase_getInstance->query_result($PDFM1xc7, $PDFM1x83, "productid");
                    $PDFM1xca = getProductName($PDFM1xc9);
                    $PDFM1xcb = "";
                    if ($PDFM1x83 > 0) $PDFM1xcb = ":";
                    $PDFM1xc8.= $PDFM1xcb . " - " . $PDFM1xca;
                }
            }
            $PDFM1xc8 = $str_replace(":", "<br>", $PDFM1xc8);
            $PDFM1xcc = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "psid");
            $PDFM1xcd = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "psno");
            $PDFM1xce = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "productid");
            $PDFM1xcf = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "entitytype");
            $PDFM1xd0 = $PDFM1xd1 = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "productname");
            if ($PDFM1xc8 != "") $PDFM1xd1.= "<br/><span style='color:#C0C0C0;font-style:italic;'>" . $PDFM1xc8 . "</span>";
            $PDFM1xd2 = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "comment");
            $PDFM1xd3 = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "psdescription");
            $PDFM1xd4 = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "description");
            $PDFM1xd5 = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "qtyinstock");
            $PDFM1xd6 = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "quantity");
            $PDFM1xd7 = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "qty_per_unit");
            $PDFM1xd8 = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "usageunit");
            $PDFM1xd9 = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "unit_price");
            $PDFM1xda = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "listprice");
            $PDFM1xdb = $PDFM1xd6 * $PDFM1xda;
            $PDFM1xdc = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "discount_percent");
            $PDFM1xdd = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "discount_amount");
            $PDFM1xde = $PDFM1xdb;
            $PDFM1xdf = "0.00";
            $PDFM1xe0 = "";
            if ($PDFM1xdc != "NULL" && $PDFM1xdc != "") {
                $PDFM1xdf = $PDFM1xda * $PDFM1xdc / 100;
                $PDFM1xde = ($PDFM1xda - $PDFM1xdf) * $PDFM1xd6 ;
                $PDFM1xe0 = $PDFM1xdc;
            } elseif ($PDFM1xdd != "NULL" && $PDFM1xdd != "") {
                $PDFM1xdf = $PDFM1xdd;
                $PDFM1xde = ($PDFM1xda - $PDFM1xdf) * $PDFM1xd6;
            }
            $PDFM1xe1 = $PDFM1xde;
            if ($PDFM1xbe == "individual") {
                $PDFM1xe2 = "0.00";
                $PDFM1xe3 = $PDFM1x10["LBL_TOTAL_AFTER_DISCOUNT"] . " = $PDFM1xde 
";
                $PDFM1xe4 = getTaxDetailsForProduct($PDFM1xce, "all");
                $PDFM1xe5 = array();
                for ($PDFM1xe6 = 0;$PDFM1xe6 < $count($PDFM1xe4);$PDFM1xe6++) {
                    $PDFM1xe7 = $PDFM1xe4[$PDFM1xe6]["taxname"];
                    $PDFM1xe8 = $PDFM1xe4[$PDFM1xe6]["taxlabel"];
                    $PDFM1xe9 = getInventoryProductTaxValue($PDFM1x0e->id, $PDFM1xce, $PDFM1xe7);
                    $PDFM1xea = $PDFM1xde * $PDFM1xe9 / 100;
                    $PDFM1xe2 = $PDFM1xe2 + $PDFM1xea;
                    if ($PDFM1xe7 != "" && $PDFM1xe9 > 0) {
                        $PDFM1xeb[$PDFM1xe7 . "-" . $PDFM1xe9]["label"] = $PDFM1xe8;
                        $PDFM1xeb[$PDFM1xe7 . "-" . $PDFM1xe9]["netto"]+= $PDFM1xde;
                        $PDFM1xeb[$PDFM1xe7 . "-" . $PDFM1xe9]["vat"]+= $round($PDFM1xea, self::$PDFM1x15);
                        $PDFM1xeb[$PDFM1xe7 . "-" . $PDFM1xe9]["value"] = $PDFM1xe9;
                        $array_push($PDFM1xe5, $PDFM1xe9);
                        $array_push($PDFM1xc6, $PDFM1xe9);
                    }
                }
                $PDFM1xe1 = $PDFM1xe1 + $PDFM1xe2;
                if ($count($PDFM1xe5) > 0) {
                    $PDFM1xec = $array_sum($PDFM1xe5);
                } else {
                    $PDFM1xec = "0.00";
                }
                $PDFM1xed["P"][$PDFM1x2d]["PRODUCTVATPERCENT"] = $this->number_format($PDFM1xec);
                $PDFM1xed["P"][$PDFM1x2d]["PRODUCTVATSUM"] = $this->number_format($PDFM1xe2);
            }
            if ($PDFM1xcf == "Products") {
                $PDFM1xed["P"][$PDFM1x2d]["PRODUCTS_CRMID"] = $PDFM1xcc;
                $PDFM1xed["P"][$PDFM1x2d]["SERVICES_CRMID"] = "";
            } else {
                $PDFM1xed["P"][$PDFM1x2d]["PRODUCTS_CRMID"] = "";
                $PDFM1xed["P"][$PDFM1x2d]["SERVICES_CRMID"] = $PDFM1xcc;
            }
            $PDFM1xed["P"][$PDFM1x2d]["PS_CRMID"] = $PDFM1xcc;
            $PDFM1xed["P"][$PDFM1x2d]["PS_NO"] = $PDFM1xcd;
            if ($PDFM1xd2 != "") {
                $PDFM1xd2 = $str_replace("
", "<br>", $nl2br($PDFM1xd2));
                $PDFM1xd2 = $html_entity_decode($PDFM1xd2, ENT_QUOTES, self::$vglobal_default_charset);
                $PDFM1xd1.= "<br /><small>" . $PDFM1xd2 . "</small>";
            }
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTNAME"] = $PDFM1xd1;
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTTITLE"] = $PDFM1xd0;
            $PDFM1xd3 = $str_replace("
", "<br>", $nl2br($PDFM1xd3));
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTDESCRIPTION"] = $html_entity_decode($PDFM1xd3, ENT_QUOTES, self::$vglobal_default_charset);
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTEDITDESCRIPTION"] = $PDFM1xd2;
            $PDFM1xd4 = $str_replace("
", "<br>", $nl2br($PDFM1xd4));
            $PDFM1xed["P"][$PDFM1x2d]["CRMNOWPRODUCTDESCRIPTION"] = $html_entity_decode($PDFM1xd4, ENT_QUOTES, self::$vglobal_default_charset);
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTLISTPRICE"] = $this->number_format($PDFM1xda);
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTTOTAL"] = $this->number_format($PDFM1xdb);
//            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTQUANTITY"] = $this->x23($PDFM1xd6);
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTQUANTITY"] = number_format($PDFM1xd6, 0);  //number format for quantity
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTQINSTOCK"] = $this->number_format($PDFM1xd5);
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTPRICE"] = $this->number_format($PDFM1xd9);
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTPOSITION"] = $PDFM1x2d;
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTQTYPERUNIT"] = $this->number_format($PDFM1xd7);
            $PDFM1x79 = $PDFM1xd8;
            if (!$in_array($trim($PDFM1x79), self::$PDFM1x18)) {
                $PDFM1x79 = $this->x20($PDFM1x79, "Products/Services");
            } else {
                $PDFM1x79 = "";
            }
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTUSAGEUNIT"] = $PDFM1x79;
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTDISCOUNT"] = $this->number_format($PDFM1xdf);
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTDISCOUNTPERCENT"] = $this->number_format($PDFM1xe0);
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTSTOTALAFTERDISCOUNTSUM"] = $PDFM1xde;
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTSTOTALAFTERDISCOUNT"] = $this->number_format($PDFM1xde);
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTTOTALSUM"] = $this->number_format($PDFM1xde + $PDFM1xe2);
            $PDFM1xc0+= $PDFM1xde;
            $PDFM1xc1+= $PDFM1xdb;
            $PDFM1xc2+= $PDFM1xde + $PDFM1xe2;
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTSTOTALAFTERDISCOUNT_SUBTOTAL"] = $this->number_format($PDFM1xc0);
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTTOTAL_SUBTOTAL"] = $this->number_format($PDFM1xc1);
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTTOTALSUM_SUBTOTAL"] = $this->number_format($PDFM1xc2);
            $PDFM1xc5[$PDFM1x2d]["$" . "TOTALAFTERDISCOUNT_SUBTOTAL$"] = $PDFM1xed["P"][$PDFM1x2d]["PRODUCTSTOTALAFTERDISCOUNT_SUBTOTAL"];
            $PDFM1xc5[$PDFM1x2d]["$" . "TOTAL_SUBTOTAL$"] = $PDFM1xed["P"][$PDFM1x2d]["PRODUCTTOTAL_SUBTOTAL"];
            $PDFM1xc5[$PDFM1x2d]["$" . "TOTALSUM_SUBTOTAL$"] = $PDFM1xed["P"][$PDFM1x2d]["PRODUCTTOTALSUM_SUBTOTAL"];
            $PDFM1xee = self::$PearDatabase_getInstance->query_result($PDFM1x3f, $PDFM1x2d - 1, "sequence_no");
            $PDFM1xed["P"][$PDFM1x2d]["PRODUCTSEQUENCE"] = $PDFM1xee;
            if (isset($PDFM1xc3[$PDFM1xce . "_" . $PDFM1xee])) {
                $PDFM1xef = "";
                $PDFM1xf0 = "";
                if ($PDFM1xc3[$PDFM1xce . "_" . $PDFM1xee]["width"] > 0) $PDFM1xef = " width='" . $PDFM1xc3[$PDFM1xce . "_" . $PDFM1xee]["width"] . "' ";
                if ($PDFM1xc3[$PDFM1xce . "_" . $PDFM1xee]["height"] > 0) $PDFM1xf0 = " height='" . $PDFM1xc3[$PDFM1xce . "_" . $PDFM1xee]["height"] . "' ";
                $PDFM1xed["P"][$PDFM1x2d]["PRODUCTS_IMAGENAME"] = "<img src='" . self::$PDFM1x12 . "/" . $PDFM1xc3[$PDFM1xce . "_" . $PDFM1xee]["src"] . "' " . $PDFM1xef . $PDFM1xf0 . "/>";
            } elseif (isset($PDFM1xc4[$PDFM1xce . "_" . $PDFM1xee])) {
                $PDFM1xed["P"][$PDFM1x2d]["PRODUCTS_IMAGENAME"] = "<img src='" . self::$PDFM1x12 . "/" . $PDFM1xc4[$PDFM1xce . "_" . $PDFM1xee]["src"] . "' width='83' />";
            }
            $product_entity = CRMEntity::getInstance("Products");
            if ($PDFM1xcf == "Products" && $PDFM1xcc != "") {
                $product_entity->id = $PDFM1xcc;
                $this->x24($product_entity, $PDFM1xcc, "Products");
            }
            $PDFM1xf2 = $this->x21($PDFM1x0c, $PDFM1x0e);
            $PDFM1xf3 = $this->x10("Products", $product_entity, false, $PDFM1xf2);
            $PDFM1xed["P"][$PDFM1x2d] = $array_merge($PDFM1xf3, $PDFM1xed["P"][$PDFM1x2d]);
            unset($product_entity);
            $PDFM1xf4 = CRMEntity::getInstance("Services");
            if ($PDFM1xcf == "Services" && $PDFM1xcc != "") {
                $PDFM1xf4->id = $PDFM1xcc;
                $this->x24($PDFM1xf4, $PDFM1xcc, "Services");
            }
            $PDFM1xf5 = $this->x10("Services", $PDFM1xf4, false, $PDFM1xf2);
            $PDFM1xed["P"][$PDFM1x2d] = $array_merge($PDFM1xf5, $PDFM1xed["P"][$PDFM1x2d]);
            unset($PDFM1xf4);
            $PDFM1xf6+= $PDFM1xde;
            $PDFM1xbf = $PDFM1xbf + $PDFM1xe1;
        }
        if (self::$module == $PDFM1x0c) self::$PDFM1x26["subtotalsArray"] = $PDFM1xc5;
        $PDFM1xf7 = "0.00";
        $PDFM1xf8 = "0";
        $PDFM1xf9 = "";
        if ($PDFM1x0e->column_fields["hdnDiscountPercent"] != "" && $PDFM1x0e->column_fields["hdnDiscountPercent"] <> 0) {
            $PDFM1xf7 = ($PDFM1xbf * $PDFM1x0e->column_fields["hdnDiscountPercent"] / 100);
            $PDFM1xf9 = $PDFM1x0e->column_fields["hdnDiscountPercent"];
        } elseif ($PDFM1x0e->column_fields["hdnDiscountAmount"] != "0") {
            $PDFM1xf7 = $PDFM1x0e->column_fields["hdnDiscountAmount"];
        }
        $PDFM1xe2 = "0.00";
        if ($PDFM1xbe == "group") {
            $PDFM1xfa = $PDFM1xbf - $PDFM1xf7;
            $PDFM1xe4 = getAllTaxes("available", "", "edit", $PDFM1x0e->id);
            for ($PDFM1xe6 = 0;$PDFM1xe6 < $count($PDFM1xe4);$PDFM1xe6++) {
                $PDFM1xe7 = $PDFM1xe4[$PDFM1xe6]["taxname"];
                $PDFM1xe8 = $PDFM1xe4[$PDFM1xe6]["taxlabel"];
                $PDFM1xe9 = self::$PearDatabase_getInstance->query_result($PDFM1x3f, 0, $PDFM1xe7);
                if ($PDFM1xe9 == "" || $PDFM1xe9 == "NULL") $PDFM1xe9 = "0.00";
                $PDFM1xfb = ($PDFM1xbf - $PDFM1xf7) * $PDFM1xe9 / 100;
                $PDFM1xe2 = $PDFM1xe2 + $PDFM1xfb;
                if ($PDFM1xe7 != "" && $PDFM1xe9 > 0) {
                    $PDFM1xeb[$PDFM1xe7]["label"] = $PDFM1xe8;
                    $PDFM1xeb[$PDFM1xe7]["netto"] = $PDFM1xfa;
                    $PDFM1xeb[$PDFM1xe7]["vat"]+= $PDFM1xfb;
                    $PDFM1xeb[$PDFM1xe7]["value"] = $PDFM1xe9;
                }
                $PDFM1xfc+= $PDFM1xe9;
            }
            $PDFM1xfd = $PDFM1xe2;
            foreach ($PDFM1xed["P"] as $PDFM1xfe => $PDFM1xff) {
                $PDFM1x100 = ($PDFM1xed["P"][$PDFM1xfe]["PRODUCTSTOTALAFTERDISCOUNTSUM"] * $PDFM1xfc) / 100;
                $PDFM1x101 = $PDFM1xed["P"][$PDFM1xfe]["PRODUCTSTOTALAFTERDISCOUNTSUM"] + $PDFM1x100;
                $PDFM1xed["P"][$PDFM1xfe]["PRODUCTVATPERCENT"] = $this->number_format($PDFM1xfc);
                $PDFM1xed["P"][$PDFM1xfe]["PRODUCTVATSUM"] = $this->number_format($PDFM1x100);
                $PDFM1xed["P"][$PDFM1xfe]["PRODUCTTOTALSUM"] = $this->number_format($PDFM1x101);
            }
        } else {
            if ($count($PDFM1xeb) > 0) {
                foreach ($PDFM1xeb as $PDFM1x102 => $PDFM1x103) $PDFM1xfd+= $PDFM1x103["vat"];
            } else {
                $PDFM1xfd = "0.00";
            }
        }
        $PDFM1x104 = ($PDFM1x0e->column_fields["hdnS_H_Amount"] != "") ? $PDFM1x0e->column_fields["hdnS_H_Amount"] : "0.00";
        $PDFM1x105 = "0.00";
        $PDFM1x106 = getAllTaxes("available", "sh", "edit", $PDFM1x0e->id);
        for ($PDFM1x107 = 0;$PDFM1x107 < $count($PDFM1x106);$PDFM1x107++) {
            $PDFM1x108 = $PDFM1x106[$PDFM1x107]["taxname"];
            $PDFM1x109 = $PDFM1x106[$PDFM1x107]["taxlabel"];
            $PDFM1x10a = getInventorySHTaxPercent($PDFM1x0e->id, $PDFM1x108);
            $PDFM1x10b = $PDFM1x104 * $PDFM1x10a / 100;
            $PDFM1x105 = $PDFM1x105 + $PDFM1x10b;
        }
        $PDFM1x10c = $PDFM1xf6 - $PDFM1xf7;
        $PDFM1x10d = ($PDFM1xf6 - $PDFM1xf7) + $PDFM1xfd;
        $PDFM1xed["TOTAL"]["NETTOTAL"] = $this->number_format($PDFM1xbf);
        $PDFM1xed["TOTAL"]["TOTALWITHOUTVAT"] = $this->number_format($PDFM1xf6);
        $PDFM1xed["TOTAL"]["FINALDISCOUNT"] = $this->number_format($PDFM1xf7);
        $PDFM1xed["TOTAL"]["FINALDISCOUNTPERCENT"] = $this->number_format($PDFM1xf9);
        $PDFM1xed["TOTAL"]["TOTALAFTERDISCOUNT"] = $this->number_format($PDFM1x10c);
        $PDFM1xed["TOTAL"]["TAXTOTAL"] = $this->number_format($PDFM1xfd);
        $PDFM1xed["TOTAL"]["TAXTOTALPERCENT"] = $this->number_format($PDFM1xfc);
        $PDFM1xed["TOTAL"]["TOTALWITHVAT"] = $this->number_format($PDFM1x10d);
        $PDFM1xed["TOTAL"]["SHTAXAMOUNT"] = $this->number_format($PDFM1x104);
        $PDFM1xed["TOTAL"]["SHTAXTOTAL"] = $this->number_format($PDFM1x105);
        $PDFM1xed["TOTAL"]["VATBLOCK"] = $PDFM1xeb;
        return $PDFM1xed;
    }
    private function x19() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x3e = "SELECT productid, sequence, show_header, show_subtotal FROM vtiger_pdfmaker_breakline WHERE crmid=?";
        $PDFM1x10e = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array(self::$focus->id));
        $PDFM1x10f = array();
        $PDFM1x6a = 0;
        $PDFM1x6b = 0;
        while ($PDFM1x43 = self::$PearDatabase_getInstance->fetchByAssoc($PDFM1x10e)) {
            $PDFM1x10f[$PDFM1x43["productid"] . "_" . $PDFM1x43["sequence"]] = $PDFM1x43["sequence"];
            $PDFM1x6a = $PDFM1x43["show_header"];
            $PDFM1x6b = $PDFM1x43["show_subtotal"];
        }
        $PDFM1x110["products"] = $PDFM1x10f;
        $PDFM1x110["show_header"] = $PDFM1x6a;
        $PDFM1x110["show_subtotal"] = $PDFM1x6b;
        return $PDFM1x110;
    }
    private function x1a($PDFM1x111, $PDFM1x112 = false) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        if ($PDFM1x112 === false) {
            $PDFM1x3e = "SELECT vtiger_inventoryproductrel.productid, vtiger_inventoryproductrel.sequence_no, vtiger_attachments.attachmentsid, name, path             FROM vtiger_inventoryproductrel
 		          LEFT JOIN vtiger_seattachmentsrel 
	             ON vtiger_seattachmentsrel.crmid=vtiger_inventoryproductrel.productid
		          LEFT JOIN vtiger_attachments
	             ON vtiger_attachments.attachmentsid=vtiger_seattachmentsrel.attachmentsid 
				  INNER JOIN vtiger_crmentity
			     ON vtiger_attachments.attachmentsid=vtiger_crmentity.crmid
		          WHERE vtiger_crmentity.deleted=0 AND vtiger_inventoryproductrel.id=?
 	 	  ORDER BY vtiger_inventoryproductrel.sequence_no";
        } else {
            $PDFM1x3e = "SELECT vtiger_products.productid, '1' AS sequence_no, 
		            vtiger_attachments.attachmentsid, name, path 
 	          FROM vtiger_products
		          LEFT JOIN vtiger_seattachmentsrel
	             ON vtiger_seattachmentsrel.crmid=vtiger_products.productid
 		          LEFT JOIN vtiger_attachments
 	            ON vtiger_attachments.attachmentsid=vtiger_seattachmentsrel.attachmentsid
                  INNER JOIN vtiger_crmentity
			     ON vtiger_attachments.attachmentsid=vtiger_crmentity.crmid 
		          WHERE vtiger_crmentity.deleted=0 AND vtiger_products.productid=? ORDER BY vtiger_attachments.attachmentsid";
        }
        $PDFM1x113 = array();
        $PDFM1xc4 = array();
        $PDFM1x10e = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array($PDFM1x111));
        $PDFM1x10f = array();
        while ($PDFM1x43 = self::$PearDatabase_getInstance->fetchByAssoc($PDFM1x10e)) {
            $PDFM1x10f[$PDFM1x43["productid"] . "#_#" . $PDFM1x43["sequence_no"]][$PDFM1x43["attachmentsid"]]["path"] = $PDFM1x43["path"];
            $PDFM1x10f[$PDFM1x43["productid"] . "#_#" . $PDFM1x43["sequence_no"]][$PDFM1x43["attachmentsid"]]["name"] = $PDFM1x43["name"];
        }
        $PDFM1x114 = "SELECT productid, sequence, attachmentid, width, height FROM vtiger_pdfmaker_images WHERE crmid=?";
        $PDFM1x115 = self::$PearDatabase_getInstance->pquery($PDFM1x114, array($PDFM1x111));
        $PDFM1x116 = array();
        $PDFM1x117 = array();
        while ($PDFM1x118 = self::$PearDatabase_getInstance->fetchByAssoc($PDFM1x115)) {
            $PDFM1x116[$PDFM1x118["productid"] . "_" . $PDFM1x118["sequence"]] = $PDFM1x118["attachmentid"];
            $PDFM1x117[$PDFM1x118["productid"] . "_" . $PDFM1x118["sequence"]]["width"] = ($PDFM1x118["width"] > 0 ? $PDFM1x118["width"] : "");
            $PDFM1x117[$PDFM1x118["productid"] . "_" . $PDFM1x118["sequence"]]["height"] = ($PDFM1x118["height"] > 0 ? $PDFM1x118["height"] : "");
        }
        foreach ($PDFM1x10f as $PDFM1x119 => $PDFM1xba) {
            list($PDFM1xce, $PDFM1x11a) = $explode("#_#", $PDFM1x119, 2);
            foreach ($PDFM1xba as $PDFM1x11b => $PDFM1xc3) {
                if ($PDFM1x11b != "") {
                    if (isset($PDFM1x116[$PDFM1xce . "_" . $PDFM1x11a])) {
                        if ($PDFM1x116[$PDFM1xce . "_" . $PDFM1x11a] == $PDFM1x11b) {
                            $PDFM1xef = $PDFM1x117[$PDFM1xce . "_" . $PDFM1x11a]["width"];
                            $PDFM1xf0 = $PDFM1x117[$PDFM1xce . "_" . $PDFM1x11a]["height"];
                            $PDFM1x113[$PDFM1xce . "_" . $PDFM1x11a]["src"] = $PDFM1xc3["path"] . $PDFM1x11b . '_' . $PDFM1xc3["name"];
                            $PDFM1x113[$PDFM1xce . "_" . $PDFM1x11a]["width"] = $PDFM1xef;
                            $PDFM1x113[$PDFM1xce . "_" . $PDFM1x11a]["height"] = $PDFM1xf0;
                        }
                    } elseif (!isset($PDFM1xc4[$PDFM1xce . "_" . $PDFM1x11a])) {
                        $PDFM1xc4[$PDFM1xce . "_" . $PDFM1x11a]["src"] = $PDFM1xc3["path"] . $PDFM1x11b . '_' . $PDFM1xc3["name"];
                    }
                }
            }
        }
        return array($PDFM1x113, $PDFM1xc4);
    }
    private function x1b($PDFM1x111) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        if (isset($PDFM1x111) AND $PDFM1x111 != "") {
            $PDFM1x64 = "SELECT vtiger_attachments.path, vtiger_attachments.name, vtiger_attachments.attachmentsid
              FROM vtiger_contactdetails
              INNER JOIN vtiger_seattachmentsrel
                 ON vtiger_contactdetails.contactid=vtiger_seattachmentsrel.crmid 
              INNER JOIN vtiger_attachments
                ON vtiger_attachments.attachmentsid=vtiger_seattachmentsrel.attachmentsid
              INNER JOIN vtiger_crmentity
                ON vtiger_attachments.attachmentsid=vtiger_crmentity.crmid
              WHERE deleted=0 AND vtiger_contactdetails.contactid=?";
            $PDFM1x3f = self::$PearDatabase_getInstance->pquery($PDFM1x64, array($PDFM1x111));
            $PDFM1x45 = self::$PearDatabase_getInstance->num_rows($PDFM1x3f);
            if ($PDFM1x45 > 0) {
                $PDFM1x11c = self::$PearDatabase_getInstance->query_result($PDFM1x3f, 0, "path") . self::$PearDatabase_getInstance->query_result($PDFM1x3f, 0, "attachmentsid") . "_" . self::$PearDatabase_getInstance->query_result($PDFM1x3f, 0, "name");
                $PDFM1x11d = "<img src='" . self::$PDFM1x12 . "/" . $PDFM1x11c . "'/>";
                return $PDFM1x11d;
            }
        } else {
            return "";
        }
    }
    private function x1c($PDFM1x111) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        if (isset($PDFM1x111) AND $PDFM1x111 != "") {
            $PDFM1x3e = "select vtiger_attachments.* from vtiger_attachments left join vtiger_salesmanattachmentsrel on vtiger_salesmanattachmentsrel.attachmentsid = vtiger_attachments.attachmentsid where vtiger_salesmanattachmentsrel.smid=?";
            $PDFM1x11e = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array($PDFM1x111));
            $PDFM1x11f = self::$PearDatabase_getInstance->query_result($PDFM1x11e, 0, 'attachmentsid');
            $PDFM1x120 = self::$PearDatabase_getInstance->query_result($PDFM1x11e, 0, 'path');
            $PDFM1x121 = self::$PearDatabase_getInstance->query_result($PDFM1x11e, 0, 'name');
            $PDFM1x122 = $PDFM1x120 . $PDFM1x11f . "_" . $PDFM1x121;
            if ($PDFM1x121 != '') {
                $PDFM1x11d = '<img src="' . $PDFM1x122 . '" width="250px" border="0">';
            } else {
                $PDFM1x11d = '';
            }
            return $PDFM1x11d;
        } else {
            return "";
        }
    }
    private function x1d($PDFM1x111) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1xce = $PDFM1x111;
        list($PDFM1xc3, $PDFM1xc4) = $this->x1a($PDFM1xce, true);
        $PDFM1xee = "1";
        $PDFM1x123 = "";
        if (isset($PDFM1xc3[$PDFM1xce . "_" . $PDFM1xee])) {
            $PDFM1xef = "";
            $PDFM1xf0 = "";
            if ($PDFM1xc3[$PDFM1xce . "_" . $PDFM1xee]["width"] > 0) $PDFM1xef = " width='" . $PDFM1xc3[$PDFM1xce . "_" . $PDFM1xee]["width"] . "' ";
            if ($PDFM1xc3[$PDFM1xce . "_" . $PDFM1xee]["height"] > 0) $PDFM1xf0 = " height='" . $PDFM1xc3[$PDFM1xce . "_" . $PDFM1xee]["height"] . "' ";
            $PDFM1x123 = "<img src='" . self::$PDFM1x12 . "/" . $PDFM1xc3[$PDFM1xce . "_" . $PDFM1xee]["src"] . "' " . $PDFM1xef . $PDFM1xf0 . "/>";
        } elseif (isset($PDFM1xc4[$PDFM1xce . "_" . $PDFM1xee])) {
            $PDFM1x123 = "<img src='" . self::$PDFM1x12 . "/" . $PDFM1xc4[$PDFM1xce . "_" . $PDFM1xee]["src"] . "' width='83' />";
        }
        return $PDFM1x123;
    }
    private function x1e($PDFM1x111) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        if ($PDFM1x111 != "") {
            $PDFM1x3e = "SELECT user_name FROM vtiger_users WHERE id=?";
            $PDFM1x3f = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array($PDFM1x111));
            $PDFM1x124 = self::$PearDatabase_getInstance->query_result($PDFM1x3f, 0, "user_name");
        }
        if ($PDFM1x124 == "") {
            $PDFM1x3e = "SELECT groupname FROM vtiger_groups WHERE groupid=?";
            $PDFM1x3f = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array($PDFM1x111));
            $PDFM1x124 = self::$PearDatabase_getInstance->query_result($PDFM1x3f, 0, "groupname");
        } else {
            $PDFM1x124 = getUserFullName($PDFM1x111);
        }
        return $PDFM1x124;
    }
    private function x1f($PDFM1x125) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x126 = "";
        if ($PDFM1x125 != '') {
            $PDFM1x3e = "SELECT account_no FROM vtiger_account WHERE accountid=?";
            $PDFM1x3f = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array($PDFM1x125));
            $PDFM1x126 = self::$PearDatabase_getInstance->query_result($PDFM1x3f, 0, "account_no");
        }
        return $PDFM1x126;
    }
    private function x20($PDFM1x127, $PDFM1x88) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        if ($PDFM1x88 != "Products/Services") {
            $PDFM1xae = return_application_language(self::$language);
            $PDFM1xaf = return_specified_module_language(self::$language, $PDFM1x88);
        } else {
            $PDFM1xae = return_specified_module_language(self::$language, "Services");
            $PDFM1xaf = return_specified_module_language(self::$language, "Products");
        }
        $PDFM1x128 = ($PDFM1xaf[$PDFM1x127] != '') ? $PDFM1xaf[$PDFM1x127] : (($PDFM1xae[$PDFM1x127] != '') ? $PDFM1xae[$PDFM1x127] : $PDFM1x127);
        return $PDFM1x128;
    }
    private function x21($PDFM1x0c, $PDFM1x0e) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x35 = self::$table_name[$PDFM1x0c];
        $PDFM1x36 = self::$id_col[$PDFM1x0c];
        $PDFM1x10e = self::$PearDatabase_getInstance->pquery("SELECT currency_id, " . $PDFM1x35 . ".conversion_rate AS conv_rate, vtiger_currency_info.*
                            FROM " . $PDFM1x35 . "
                           INNER JOIN vtiger_currency_info ON " . $PDFM1x35 . ".currency_id = vtiger_currency_info.id
                           WHERE " . $PDFM1x36 . "=?", array($PDFM1x0e->id));
        $PDFM1x129 = array();
        $PDFM1x129["currency_id"] = self::$PearDatabase_getInstance->query_result($PDFM1x10e, 0, "currency_id");
        $PDFM1x129["conversion_rate"] = self::$PearDatabase_getInstance->query_result($PDFM1x10e, 0, "conv_rate");
        $PDFM1x129["currency_name"] = self::$PearDatabase_getInstance->query_result($PDFM1x10e, 0, "currency_name");
        $PDFM1x129["currency_code"] = self::$PearDatabase_getInstance->query_result($PDFM1x10e, 0, "currency_code");
        $PDFM1x129["currency_symbol"] = self::$PearDatabase_getInstance->query_result($PDFM1x10e, 0, "currency_symbol");
        return $PDFM1x129;
    }
    private function tax_type($PDFM1x0c, $PDFM1x0e) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x10e = self::$PearDatabase_getInstance->pquery("SELECT taxtype FROM " . self::$table_name[$PDFM1x0c] . " WHERE " . self::$id_col[$PDFM1x0c] . "=?", array($PDFM1x0e->id));
        $PDFM1xbe = self::$PearDatabase_getInstance->query_result($PDFM1x10e, 0, 'taxtype');
        return $PDFM1xbe;
    }
    private function number_format($PDFM1x79) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        if ($is_numeric($PDFM1x79)) {
            $PDFM1x12a = $number_format($PDFM1x79, self::$PDFM1x15, self::$PDFM1x13, self::$PDFM1x14);
        } else {
            $PDFM1x12a = "";
        }
        return $PDFM1x12a;
    }
    private function x24(&$PDFM1x0e, $PDFM1x12b, $PDFM1x0c) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x3f = Array();
        foreach ($PDFM1x0e->tab_name_index as $PDFM1x12c => $PDFM1x12d) $PDFM1x3f[$PDFM1x12c] = self::$PearDatabase_getInstance->pquery("SELECT * FROM " . $PDFM1x12c . " WHERE " . $PDFM1x12d . "=?", array($PDFM1x12b));
        $PDFM1x49 = getTabid($PDFM1x0c);
        $PDFM1x12e = "SELECT fieldname, fieldid, fieldlabel, columnname, tablename, uitype, typeofdata, presence
               FROM vtiger_field WHERE tabid=?";
        $PDFM1x12f = self::$PearDatabase_getInstance->pquery($PDFM1x12e, array($PDFM1x49));
        $PDFM1x130 = self::$PearDatabase_getInstance->num_rows($PDFM1x12f);
        if ($PDFM1x130) {
            while ($PDFM1x131 = self::$PearDatabase_getInstance->fetch_array($PDFM1x12f)) {
                $PDFM1x132 = $PDFM1x131["columnname"];
                $PDFM1x133 = $PDFM1x131["tablename"];
                $PDFM1x9a = $PDFM1x131["fieldname"];
                $PDFM1x134 = "";
                if (isset($PDFM1x3f[$PDFM1x133])) $PDFM1x134 = self::$PearDatabase_getInstance->query_result($PDFM1x3f[$PDFM1x133], 0, $PDFM1x132);
                $PDFM1x0e->column_fields[$PDFM1x9a] = $PDFM1x134;
            }
        }
        $PDFM1x0e->column_fields["record_id"] = $PDFM1x12b;
        $PDFM1x0e->column_fields["record_module"] = $PDFM1x0c;
    }
    private function x25($PDFM1x79) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        if ($file_exists("modules/Settings/EditTermDetails.php")) {
            $PDFM1x3e = "SELECT tandc FROM vtiger_inventory_tandc WHERE id = ?";
            $PDFM1x10e = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array($PDFM1x79));
            $PDFM1x135 = self::$PearDatabase_getInstance->num_rows($PDFM1x10e);
            if ($PDFM1x135 > 0) {
                $PDFM1xa5 = self::$PearDatabase_getInstance->query_result($PDFM1x10e, 0, "tandc");
            } else {
                $PDFM1xa5 = $PDFM1x79;
            }
        } else {
            $PDFM1xa5 = $PDFM1x79;
        }
        return $PDFM1xa5;
    }
    private function x26($PDFM1x89) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x136 = "";
        $PDFM1x137 = "";
        if ($PDFM1x89->column_fields["record_module"] == "HelpDesk") {
            $PDFM1x137 = "ticket";
        } elseif ($PDFM1x89->column_fields["record_module"] == "Faq") {
            $PDFM1x137 = "faq";
        }
        if ($PDFM1x137 != "") {
            $PDFM1xaf = return_specified_module_language(self::$language, $PDFM1x89->column_fields["record_module"]);
            $PDFM1x3e = "SELECT * FROM vtiger_" . $PDFM1x137 . "comments WHERE " . $PDFM1x137 . "id = ?";
            $PDFM1x3f = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array($PDFM1x89->id));
            while ($PDFM1x43 = self::$PearDatabase_getInstance->fetchByAssoc($PDFM1x3f)) {
                $PDFM1xd2 = $PDFM1x43["comments"];
                $PDFM1x138 = getValidDisplayDate($PDFM1x43["createdtime"]);
                $PDFM1x1b = "";
                if ($PDFM1x137 == "ticket") {
                    $PDFM1x139 = $this->x1e($PDFM1x43["ownerid"]);
                    $PDFM1x1b = $PDFM1xd2 . "<br />" . $PDFM1xaf["LBL_AUTHOR"] . ": " . $PDFM1x139 . "<br />" . $PDFM1xaf["Created Time"] . ": " . $PDFM1x138 . "<br /><br />";
                } else {
                    $PDFM1x1b = $PDFM1xd2 . "<br />" . $PDFM1xaf["Created Time"] . ": " . $PDFM1x138 . "<br /><br />";
                }
                $PDFM1x136.= $PDFM1x1b;
            }
        }
        return $PDFM1x136;
    }
    private function x27($PDFM1x13a) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x3e = "SELECT foldername FROM vtiger_attachmentsfolder WHERE folderid = ?";
        return $PDFM1x13b = self::$PearDatabase_getInstance->query_result(self::$PearDatabase_getInstance->pquery($PDFM1x3e, array($PDFM1x13a)), 0, "foldername");
    }
    public function getFilename() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
//        return vtranslate(self::$PDFM1x0c, self::$PDFM1x0c);
//        return vtranslate(self::$focus->id, self::$focus->id);
        return vtranslate(self::$file_name, self::$file_name);
    }
    private function x28($PDFM1x13c) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        return $md5($PDFM1x13c);
    }
    private function x29() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x32 = $this->simple_html_dom();
        require_once ($PDFM1x32);
        $PDFM1x3b = str_get_html(self::$PDFM1x1c);
        if ($is_array($PDFM1x3b->find("td"))) {
            foreach ($PDFM1x3b->find("td") as $PDFM1x56) {
                if ($trim($PDFM1x56->plaintext) == "#VATBLOCK_START#") {
                    $PDFM1x56->parent->outertext = "#VATBLOCK_START#";
                }
                if ($trim($PDFM1x56->plaintext) == "#VATBLOCK_END#") {
                    $PDFM1x56->parent->outertext = "#VATBLOCK_END#";
                }
            }
            self::$PDFM1x1c = $PDFM1x3b->save();
        }
    }
    private function x2a() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x13d = array();
        $PDFM1x13e = $is_numeric(getTabId("Tac4you"));
        if ($PDFM1x13e == true) {
            $PDFM1x13f = "SELECT text FROM vtiger_tac4you_texts WHERE id=?";
            $PDFM1x140 = self::$PearDatabase_getInstance->pquery($PDFM1x13f, array(self::$focus->id));
            $PDFM1x141 = self::$PearDatabase_getInstance->query_result($PDFM1x140, 0, "text");
            self::$PDFM1x21["$" . $strtoupper(self::$module) . "_TAC4YOU$"] = $html_entity_decode($PDFM1x141, ENT_QUOTES, self::$vglobal_default_charset);
        }
    }
    private function x2b() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x142 = array();
        $PDFM1x143 = $is_numeric(getTabId("Descriptions4you"));
        if ($PDFM1x143 == true) {
            $PDFM1x144 = "SELECT text FROM vtiger_descriptions4you_texts WHERE id=?";
            $PDFM1x145 = self::$PearDatabase_getInstance->pquery($PDFM1x144, array(self::$focus->id));
            $PDFM1x146 = self::$PearDatabase_getInstance->query_result($PDFM1x145, 0, "text");
            self::$PDFM1x21["$" . $strtoupper(self::$module) . "_DESC4YOU$"] = $html_entity_decode($PDFM1x146, ENT_QUOTES, self::$vglobal_default_charset);
        }
    }
    private function x2c() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x4f = array();
        $PDFM1x147 = $is_numeric(getTabId("ModComments"));
        $PDFM1x148 = "";
        if ($PDFM1x147 == true) {
            $PDFM1x3e = "SELECT relmodule FROM vtiger_fieldmodulerel WHERE module='ModComments' AND relmodule = ?";
            $PDFM1x3f = self::$PearDatabase_getInstance->pquery($PDFM1x3e, array(self::$module));
            if (self::$PearDatabase_getInstance->num_rows($PDFM1x3f) > 0) {
                $PDFM1x148 = $this->x2d(self::$focus->id);
            }
        }
        self::$PDFM1x21["$" . $strtoupper(self::$module) . "_MODCOMMENTS$"] = $html_entity_decode($PDFM1x148, ENT_QUOTES, self::$vglobal_default_charset);
    }
    private function x2d($PDFM1x149) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x148 = "";
        if ($file_exists("modules/ModComments/ModComments.php") == true) {
            require_once ("modules/ModComments/ModComments.php");
            $PDFM1x14a = "ModComments";
            $PDFM1x14b = CRMEntity::getInstance($PDFM1x14a);
            $PDFM1x14c = $sprintf(" ORDER BY %s.%s DESC ", $PDFM1x14b->table_name, $PDFM1x14b->table_index);
            $PDFM1x64 = $PDFM1x14b->getListQuery($PDFM1x14a, $sprintf(" AND %s.related_to=?", $PDFM1x14b->table_name));
            $PDFM1x64.= $PDFM1x14c;
            $PDFM1x3f = self::$PearDatabase_getInstance->pquery($PDFM1x64, array($PDFM1x149));
            $PDFM1x14d = array();
            if (self::$PearDatabase_getInstance->num_rows($PDFM1x3f)) {
                while ($PDFM1x131 = self::$PearDatabase_getInstance->fetch_array($PDFM1x3f)) {
                    $PDFM1x14e = new ModComments_CommentsModel($PDFM1x131);
                    $PDFM1x148.= "<p>[" . $PDFM1x14e->author() . ": " . $PDFM1x14e->timestamp() . " ]<br />" . $PDFM1x14e->content() . "</p>";
                }
            }
        }
        return $PDFM1x148;
    }
    private function x2e($PDFM1x0c, $PDFM1x0e) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        if (isset($PDFM1x0e->column_fields["currency_id"]) && isset($PDFM1x0e->column_fields["conversion_rate"]) && isset($PDFM1x0e->column_fields["hdnGrandTotal"])) {
            self::$table_name[$PDFM1x0c] = $PDFM1x0e->table_name;
            self::$id_col[$PDFM1x0c] = $PDFM1x0e->table_index;
        }
    }
    private function totals_calculation($module_type, $PDFM1x0e, $PDFM1x8a = false) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        if (!isset(self::$table_name[$module_type])) $this->x2e($module_type, $PDFM1x0e);
        if (!isset(self::$table_name[$module_type])) return array();
        $PDFM1x137 = "";
        if ($PDFM1x8a !== false) $PDFM1x137 = "R_" . $strtoupper($PDFM1x8a) . "_";
        self::$PDFM1x21["$" . $PDFM1x137 . "SUBTOTAL$"] = $this->number_format($PDFM1x0e->column_fields["hdnSubTotal"]);
        self::$PDFM1x21["$" . $PDFM1x137 . "TOTAL$"] = $this->number_format($PDFM1x0e->column_fields["hdnGrandTotal"]);
        $PDFM1xf2 = $this->x21($module_type, $PDFM1x0e);
        $PDFM1xf2["currency_symbol"] = $str_replace("â�¬", "&euro;", $PDFM1xf2["currency_symbol"]);
        $PDFM1xf2["currency_symbol"] = $str_replace("�£", "&pound;", $PDFM1xf2["currency_symbol"]);
        self::$PDFM1x21["$" . $PDFM1x137 . "CURRENCYNAME$"] = getTranslatedCurrencyString($PDFM1xf2["currency_name"]);
        self::$PDFM1x21["$" . $PDFM1x137 . "CURRENCYSYMBOL$"] = $PDFM1xf2["currency_symbol"];
        self::$PDFM1x21["$" . $PDFM1x137 . "CURRENCYCODE$"] = $PDFM1xf2["currency_code"];
        self::$PDFM1x21["$" . $PDFM1x137 . "ADJUSTMENT$"] = $this->number_format($PDFM1x0e->column_fields["txtAdjustment"]);
        $PDFM1x65 = $this->products_block($module_type, $PDFM1x0e);
        self::$PDFM1x21["$" . $PDFM1x137 . "TOTALWITHOUTVAT$"] = $PDFM1x65["TOTAL"]["TOTALWITHOUTVAT"];
        self::$PDFM1x21["$" . $PDFM1x137 . "VAT$"] = $PDFM1x65["TOTAL"]["TAXTOTAL"];
        self::$PDFM1x21["$" . $PDFM1x137 . "VATPERCENT$"] = $PDFM1x65["TOTAL"]["TAXTOTALPERCENT"];
        self::$PDFM1x21["$" . $PDFM1x137 . "TOTALWITHVAT$"] = $PDFM1x65["TOTAL"]["TOTALWITHVAT"];
        self::$PDFM1x21["$" . $PDFM1x137 . "SHTAXAMOUNT$"] = $PDFM1x65["TOTAL"]["SHTAXAMOUNT"];
        self::$PDFM1x21["$" . $PDFM1x137 . "SHTAXTOTAL$"] = $PDFM1x65["TOTAL"]["SHTAXTOTAL"];
        self::$PDFM1x21["$" . $PDFM1x137 . "TOTALDISCOUNT$"] = $PDFM1x65["TOTAL"]["FINALDISCOUNT"];
        self::$PDFM1x21["$" . $PDFM1x137 . "TOTALDISCOUNTPERCENT$"] = $PDFM1x65["TOTAL"]["FINALDISCOUNTPERCENT"];
        self::$PDFM1x21["$" . $PDFM1x137 . "TOTALAFTERDISCOUNT$"] = $PDFM1x65["TOTAL"]["TOTALAFTERDISCOUNT"];
        $this->x15();
        if ($PDFM1x8a === false) {
            if ($count($PDFM1x65["TOTAL"]["VATBLOCK"]) > 0) {
                $PDFM1x14f = "<table border='1' style='border-collapse:collapse;' cellpadding='3'>";
                $PDFM1x14f.= "<tr>                                 <td nowrap align='center'>" . vtranslate("Name") . "</td>
                                <td nowrap align='center'>" . self::$Vtiger_Language_Handler["LBL_VATBLOCK_VAT_PERCENT"] . "</td> 
                                <td nowrap align='center'>" . self::$Vtiger_Language_Handler["LBL_VATBLOCK_SUM"] . " (" . $PDFM1xf2["currency_symbol"] . ")" . "</td>
                                <td nowrap align='center'>" . self::$Vtiger_Language_Handler["LBL_VATBLOCK_VAT_VALUE"] . " (" . $PDFM1xf2["currency_symbol"] . ")" . "</td>
                               </tr>";
                foreach ($PDFM1x65["TOTAL"]["VATBLOCK"] as $PDFM1x150 => $PDFM1x151) {
                    if ($PDFM1x151["netto"] != 0) {
                        $PDFM1x14f.= "<tr>
                                        <td nowrap align='left' width='20%'>" . $PDFM1x151["label"] . "</td>
                          		 <td nowrap align='right' width='25%'>" . $this->number_format($PDFM1x151["value"]) . " %</td>
                                        <td nowrap align='right' width='30%'>" . $this->number_format($PDFM1x151["netto"]) . "</td>
                                        <td nowrap align='right' width='25%'>" . $this->number_format($PDFM1x151["vat"]) . "</td>
                                       </tr>";
                    }
                }
                $PDFM1x14f.= "</table>";
            } else {
                $PDFM1x14f = "";
            }
            self::$PDFM1x21["$" . "VATBLOCK$"] = $PDFM1x14f;
            $this->x15();
            if ($strpos(self::$PDFM1x1c, "#VATBLOCK_START#") !== false && $strpos(self::$PDFM1x1c, "#VATBLOCK_END#") !== false) {
                $this->x29();
                $PDFM1x152 = array();
                $PDFM1x153 = $explode("#VATBLOCK_START#", self::$PDFM1x1c);
                $PDFM1x152[] = $PDFM1x153[0];
                for ($PDFM1x6f = 1;$PDFM1x6f < $count($PDFM1x153);$PDFM1x6f++) {
                    $PDFM1x154 = $explode("#VATBLOCK_END#", $PDFM1x153[$PDFM1x6f]);
                    foreach ($PDFM1x154 as $PDFM1x155) {
                        $PDFM1x152[] = $PDFM1x155;
                    }
                    $PDFM1x156 = $PDFM1x6f * 2 - 1;
                    $PDFM1x157[$PDFM1x156] = $PDFM1x152[$PDFM1x156];
                    $PDFM1x152[$PDFM1x156] = '';
                }
                if ($count($PDFM1x65["TOTAL"]["VATBLOCK"]) > 0) {
                    foreach ($PDFM1x65["TOTAL"]["VATBLOCK"] as $PDFM1x150 => $PDFM1x151) {
                        foreach ($PDFM1x157 as $PDFM1x75 => $PDFM1x76) {
                            if ($PDFM1x151["netto"] != 0) {
                                foreach ($PDFM1x151 as $PDFM1x158 => $PDFM1x159) {
                                    if ($is_numeric($PDFM1x159)) $PDFM1x159 = $this->number_format($PDFM1x159);
                                    $PDFM1x76 = $str_replace("$" . "VATBLOCK_" . $strtoupper($PDFM1x158) . "$", $PDFM1x159, $PDFM1x76);
                                }
                                $PDFM1x152[$PDFM1x75].= $PDFM1x76;
                            }
                        }
                    }
                }
                self::$PDFM1x1c = $implode('', $PDFM1x152);
            }
        }
        return $PDFM1x65;
    }
    private function get_module_image() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        self::$PDFM1x21["$" . "USERS_IMAGENAME$"] = $this->x1c(self::$focus->column_fields["assigned_user_id"]);
        self::$PDFM1x21["$" . "R_USERS_IMAGENAME$"] = $this->x1c($_SESSION["authenticated_user_id"]);
        switch (self::$module) {
            case "Contacts":
                self::$PDFM1x21["$" . "CONTACTS_IMAGENAME$"] = $this->x1b(self::$focus->id);
            break;
            case "Products":
                self::$PDFM1x21["$" . "PRODUCTS_IMAGENAME$"] = $this->x1d(self::$focus->id);
            break;
        }
    }
    private function x31($PDFM1x111, $PDFM1xba, $PDFM1x1f) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        self::$PDFM1x21["$" . $PDFM1x1f . "_FIRSTNAME$"] = $this->x32("first_name", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_LASTNAME$"] = $this->x32("last_name", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_EMAIL$"] = $this->x32("email1", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_TITLE$"] = $this->x32("title", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_FAX$"] = $this->x32("phone_fax", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_DEPARTMENT$"] = $this->x32("department", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_OTHER_EMAIL$"] = $this->x32("email2", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_PHONE$"] = $this->x32("phone_work", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_YAHOOID$"] = $this->x32("yahoo_id", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_MOBILE$"] = $this->x32("phone_mobile", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_HOME_PHONE$"] = $this->x32("phone_home", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_OTHER_PHONE$"] = $this->x32("phone_other", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_SIGHNATURE$"] = $this->x32("signature", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_NOTES$"] = $this->x32("description", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_ADDRESS$"] = $this->x32("address_street", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_COUNTRY$"] = $this->x32("address_country", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_CITY$"] = $this->x32("address_city", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_ZIP$"] = $this->x32("address_postalcode", $PDFM1xba);
        self::$PDFM1x21["$" . $PDFM1x1f . "_STATE$"] = $this->x32("address_state", $PDFM1xba);
        $this->x15();
    }
    private function x32($PDFM1x15a, $PDFM1xba) {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        if ($is_object($PDFM1xba)) {
            return $PDFM1xba->column_fields[$PDFM1x15a];
        } else {
            return $PDFM1xba[$PDFM1x15a];
        }
    }
    private function simple_html_dom() {
        global $array_keys, $array_push, $array_merge, $array_sum, $count, $date, $explode, $file_exists, $html_entity_decode, $iconv, $implode, $in_array, $is_array, $is_object, $is_numeric, $md5, $nl2br, $number_format, $round, $rtrim, $sprintf, $str_replace, $str_ireplace, $strlen, $strtoupper, $strpos, $substr, $strtolower, $trim;
        $PDFM1x32 = "include/simplehtmldom/simple_html_dom.php";
        if ($file_exists($PDFM1x32)) {
            return $PDFM1x32;
        } else {
            return "modules/PDFMaker/resources/classes/simple_html_dom.php";
        }
    }
} ?>