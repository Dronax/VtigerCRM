<?php 

error_reporting(0);
global $xPDFM223, $xPDFM224, $xPDFM225, $xPDFM226, $xPDFM227, $xPDFM228, $xPDFM229, $xPDFM22a, $xPDFM22b;
$xPDFM223 = "file_exists";
$xPDFM224 = "filesize";
$xPDFM225 = "fread";
$xPDFM226 = "fopen";
$xPDFM227 = "header";
$xPDFM228 = "is_array";
$xPDFM229 = "ob_clean";
$xPDFM22a = "strpos";
$xPDFM22b = "unlink";
class PDFMaker_checkGenerate_Model extends Vtiger_Module_Model {
    function __construct() {
        global $xPDFM223, $xPDFM224, $xPDFM225, $xPDFM226, $xPDFM227, $xPDFM228, $xPDFM229, $xPDFM22a, $xPDFM22b;
        $this->log = LoggerManager::getLogger('account');
    }
    function generate(Vtiger_Request $xPDFM20b) {
        global $xPDFM223, $xPDFM224, $xPDFM225, $xPDFM226, $xPDFM227, $xPDFM228, $xPDFM229, $xPDFM22a, $xPDFM22b;
        $xPDFM20c = new PDFMaker_PDFMaker_Model();
        $xPDFM20d = $xPDFM20b->getAll();
        $xPDFM20e = PearDatabase::getInstance();
        $xPDFM20f = "site_URL";
        $xPDFM210 = "vtiger_current_version";
        $xPDFM211 = vglobal($xPDFM210);
        $xPDFM212 = vglobal($xPDFM20f);
        $xPDFM213 = $xPDFM20b->get('relmodule');
        $xPDFM214 = CRMEntity::getInstance($xPDFM213);
        $xPDFM215 = $xPDFM20b->get('record');
        $xPDFM216 = $xPDFM20b->get('mode');
        $xPDFM217 = $xPDFM20b->get('language');
        $xPDFM218 = $xPDFM20b->get('type');
        $xPDFM219 = "";
        $xPDFM21a = $xPDFM20c->GetPreparedMPDF($xPDFM219, $xPDFM215, $xPDFM213, $xPDFM217);
        $xPDFM219->Output('cache/' . $xPDFM21a . '.pdf');
        @$xPDFM229();
        $xPDFM227('Content-Type: application/pdf');
        $xPDFM227("Content-length: " . $xPDFM224("./cache/$xPDFM21a.pdf"));
        $xPDFM227("Cache-Control: private");
        $xPDFM227("Content-Disposition: attachment; filename=$xPDFM21a.pdf");
        $xPDFM227("Content-Description: PHP Generated Data");
        echo $xPDFM225($xPDFM226("./cache/$xPDFM21a.pdf", "r"), $xPDFM224("./cache/$xPDFM21a.pdf"));
        @$xPDFM22b("cache/$xPDFM21a.pdf");
    }
    private function x0b($xPDFM21b) {
        global $xPDFM223, $xPDFM224, $xPDFM225, $xPDFM226, $xPDFM227, $xPDFM228, $xPDFM229, $xPDFM22a, $xPDFM22b;
        $xPDFM21c = "site_URL";
        $xPDFM21d = vglobal($xPDFM21c);
        $xPDFM21e = "http://";
        $xPDFM21f = $this->x0c();
        require_once ($xPDFM21f);
        $xPDFM220 = str_get_html($xPDFM21b);
        if ($xPDFM228($xPDFM220->find("img"))) {
            foreach ($xPDFM220->find("img") as $xPDFM221) {
                if ($xPDFM22a($xPDFM221->src, $xPDFM21e) === false) {
                    $xPDFM222 = $xPDFM21d . "/" . $xPDFM221->src;
                    $xPDFM221->src = $xPDFM222;
                }
            }
            return $xPDFM220->save();
        } else {
            return $xPDFM21b;
        }
    }
    private function x0c() {
        global $xPDFM223, $xPDFM224, $xPDFM225, $xPDFM226, $xPDFM227, $xPDFM228, $xPDFM229, $xPDFM22a, $xPDFM22b;
        $xPDFM21f = "include/simplehtmldom/simple_html_dom.php";
        if ($xPDFM223($xPDFM21f)) {
            return $xPDFM21f;
        } else {
            return "modules/PDFMaker/resources/classes/simple_html_dom.php";
        }
    }
} ?>