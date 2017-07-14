<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF {


    public $company = null;
    public $ref_number = 0;
    public $trans_number = 0;
    public $fspr_number = 0;

    function __construct($company)
    {
        parent::__construct();

        $this->SetCreator(PDF_CREATOR);
		    $this->SetAuthor('Doc Generator');

        // set margins
    		$this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP/2, PDF_MARGIN_RIGHT);
        $this->setPageOrientation('P', true, 10);
        $this->SetFont('dejavusans', '', 8); // set the font

        $this->setHeaderMargin(PDF_MARGIN_HEADER);
        $this->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM-10);

        $this->SetPrintHeader(false);
        $this->SetPrintFooter(true);

        $this->setFontSubsetting(false);

        $this->company = $company['company'];
        $this->fspr_number = $company['fspr'];
        $this->trans = null;
        $this->docref = null;
    }

    public function getCompany(){ return $this->company; }
    public function setCompany($s){
        $this->company = $s;
    }


}

?>
