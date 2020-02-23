<?php  
    $this->load->library('fpdf');
    ini_set('memmory_limit', '512M');
    ini_set('max_execution_time', 0);
    class FPDF_AutoWrapTable extends FPDF {
      	private $data = array();
      	private $options = array(
      		'filename' => '',
      		'destinationfile' => '',
      		'paper_size'=>'A4',
      		'orientation'=>'L'
      	);
     
      	function __construct($data = array(), $options = array(), $Title, $Tahun) {
        	parent::__construct();
        	$this->data = $data;
        	$this->options = $options;
        	$this->Title = $Title;
            $this->Tahun = $Tahun;
            
    	}
     function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('times','I',8);
    // Print current and total page numbers
    $this->Cell(0,10,'Halaman : '.$this->PageNo().'/{nb}',0,1,'R');
}
    	public function rptDetailData () {
			
    		$border = 0;
    		$this->AddPage();
    		$this->SetAutoPageBreak(true,60);
            $this->SetMargins(60,50,50,50);
    		$this->AliasNbPages();
    		$left = 25;
            
     		//header
    		$this->setFont('times','B',14);
            $this->ln(20);
            $this->SetX($left); $this->Cell(0, 1, 'MONITORING INPUT DATA PEMELIHARAAN DAN PERAWATAN' ,0,1, 'C');
            $this->ln(20);
            $this->SetX($left); $this->Cell(0, 1, 'MATERIIL FASILITAS DAN BANGUNAN T.A. '.$this->Tahun ,0,1, 'C');
            $this->ln(40);
			
            $this->setFont('times','B',11);
            $this->MultiCell(0, 9, 'UNIT ORGANISASI   : KEMENTERIAN PERTAHANAN');
            $this->ln();
            $h = 30;
    		$left = 40;
    		$top = 80;	
    		#tableheader
            $this->SetFillColor(200,200,200);	
    		$left = $this->GetX();
			$this->Cell(150, 30, 'TANGGAL', 1, 0, 'C',true);
    		$this->SetX($left += 150); $this->Cell(110, 30, 'IP', 1, 0, 'C',true);
    		$this->SetX($left += 110); $this->Cell(110, 30, 'USER', 1, 0, 'C',true);
			$this->SetX($left += 110); $this->Cell(200, 30, 'URAIAN', 1, 0, 'C',true);
			$this->SetX($left += 200); $this->Cell(150, 30, 'KETERANGAN', 1, 1, 'C',true);
            
           //$this->Ln(20);
     
    		$this->SetFont('times','',12);
    		$this->SetWidths(array(150,110,110,200,150));
    		$this->SetAligns(array('C','C','C','L','L'));
			foreach ($this->data as $baris) {
                
				$this->Row(
    				array( 
    				date('d-m-Y H:i:s', strtotime($baris['tanggal'])),
					$baris['ip'],
					$baris['uo'],
					$baris['uraian'],
					$baris['keterangan']
    			));
    		}
			
    	}
     
    	public function printPDF () {
     
    		if ($this->options['paper_size'] == "A3") {
    			$a = 8.3 * 72; //1 inch = 72 pt
    			$b = 13.0 * 72;
    			$this->FPDF($this->options['orientation'], "pt", array($a,$b));
    		} else {
    			$this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
    		}
     
    	    $this->SetAutoPageBreak(false);
    	    $this->AliasNbPages();
    	    
     
    	    $this->rptDetailData();
     
    	    $this->Output($this->options['filename'],$this->options['destinationfile']);
      	}
     
      	private $widths;
    	private $aligns;
     
    	function SetWidths($w)
    	{
    		//Set the array of column widths
    		$this->widths=$w;
    	}
     
    	function SetAligns($a)
    	{
    		//Set the array of column alignments
    		$this->aligns=$a;
    	}
     
    	function Row($data)
    	{
    		//Calculate the height of the row
    		$nb=3;
    
    
            
    		for($i=0;$i<count($data);$i++)
    			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    		$h=10*$nb;
    		//Issue a page break first if needed
    		$this->CheckPageBreak($h);
    		//Draw the cells of the row
    		for($i=0;$i<count($data);$i++)
    		{
    			$w=$this->widths[$i];
    			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
    			//Save the current position
    			$x=$this->GetX();
    			$y=$this->GetY();
    			//Draw the border
    			$this->Rect($x,$y,$w,$h);
    			//Print the text
    			$this->MultiCell($w,10,"\n".$data[$i],0,$a);
    			//Put the position to the right of the cell
    			$this->SetXY($x+$w,$y);
    		}
    		//Go to the next line
    		$this->Ln($h);
            
    	}
     
    	function CheckPageBreak($h)
    	{
    		//If the height h would cause an overflow, add a new page immediately
    		if($this->GetY()+$h>$this->PageBreakTrigger)
    			$this->AddPage($this->CurOrientation);
            
    	}
     
    	function NbLines($w,$txt)
    	{
    		//Computes the number of lines a MultiCell of width w will take
    		$cw=&$this->CurrentFont['cw'];
    		if($w==0)
    			$w=$this->w-$this->rMargin-$this->x;
    		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    		$s=str_replace("\r",'',$txt);
    		$nb=strlen($s);
    		if($nb>0 and $s[$nb-1]=="\n")
    			$nb--;
    		$sep=-1;
    		$i=0;
    		$j=0;
    		$l=0;
    		$nl=1;
    		while($i<$nb)
    		{
    			$c=$s[$i];
    			if($c=="\n")
    			{
    				$i++;
    				$sep=-1;
    				$j=$i;
    				$l=0;
    				$nl++;
    				continue;
    			}
    			if($c==' ')
    				$sep=$i;
    			$l+=$cw[$c];
    			if($l>$wmax)
    			{
    				if($sep==-1)
    				{
    					if($i==$j)
    						$i++;
    				}
    				else
    					$i=$sep+1;
    				$sep=-1;
    				$j=$i;
    				$l=0;
    				$nl++;
    			}
    			else
    				$i++;
    		}
    		return $nl;
    	}
    } 
    
     
    //pilihan
    $options = array(
    	'filename' => '', //nama file penyimpanan, kosongkan jika output ke browser
    	'destinationfile' => '', //I=inline browser (default), F=local file, D=download
    	'paper_size'=>'A4',	//paper size: F4, A3, A4, A5, Letter, Legal
    	'orientation'=>'L' //orientation: P=portrait, L=landscape
       

    );
     
    $tabel = new FPDF_AutoWrapTable($data, $options, $Title, $Tahun);
    $tabel->printPDF();
    ?>

