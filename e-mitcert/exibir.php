<?php
$chave = md5('tb_certificados'.$_GET['nome']);

/* if ($_GET['evento'] == 1){
	$bg_img = 'Certificado_PEC_covid_complicacoes_endocrinas.jpg';
} else {
	echo '<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nenhum certificado para este evento foi selecionado!';
	exit;
} */
if(md5('tb_certificados'.$_GET['nome']) != $_GET['chave'])
		exit('<script language="javascript">alert("Chave Inválida");window.history.go(-1);</script>');
		
header("Content-Type: application/pdf; charset=ISO-8859-1",true);
require('fpdf16/fpdf.php');

class PDF extends FPDF
{
//Page header 
function Header(){
    //Logo 
    //$this->Image($bg_img,0,0,298);
	
	if ($_GET['evento'] == 1){
		$this->Image('Certificado_PEC_covid_complicacoes_endocrinas.jpg',0,0,298);
  } elseif ($_GET['evento'] == 2){
		$this->Image('Certificado_PEC_Terapia_Hormonal_Masculina.jpg',0,0,298);
  } elseif ($_GET['evento'] == 3){
		$this->Image('Certificado_PEC_SíndromedaApneiaObstrutivadoSono.jpg',0,0,298);
  } elseif ($_GET['evento'] == 4){
		$this->Image('Certificado_PEC_Terapia_Hormonal_Feminina.jpg',0,0,298);
  } elseif ($_GET['evento'] == 5){
		$this->Image('Certificado_LGPD.jpg',0,0,298);
  } elseif ($_GET['evento'] == 6){
		$this->Image('Certificado_Disautonomia.jpg',0,0,298);
  } elseif ($_GET['evento'] == 7){
		$this->Image('CERTIFICADO_PEC_VITAMINAD.jpg',0,0,298);
  } elseif ($_GET['evento'] == 8){
		$this->Image('CERTIFICADO_PEC-DEFICIENCIA-ANDROGENICA.jpg',0,0,298);
  } elseif ($_GET['evento'] == 9){
		$this->Image('CERTIFICADO_PEC-CIRROSE-HEPATICA.jpg',0,0,298);
  } elseif ($_GET['evento'] == 10){
		$this->Image('CERTIFICADO_PEC_LGPD.jpg',0,0,298);
  } elseif ($_GET['evento'] == 11){
		$this->Image('CERTIFICADO_PEC_O_ANO_EM_DIABETES.jpg',0,0,298);
  } elseif ($_GET['evento'] == 12){
		$this->Image('CERTIFICADO_PEC_TABAGISMO.jpg',0,0,298);
  } elseif ($_GET['evento'] == 13){
		$this->Image('CERTIFICADOS_PEC_ANEMIA-02.jpg',0,0,298);
  } elseif ($_GET['evento'] == 14){
		$this->Image('CERTIFICADOS_PEC_AMBR_ONCO_HEMATOLOGIA.jpg',0,0,298);
  } elseif ($_GET['evento'] == 15){
		$this->Image('CERTIFICADOS_PEC_AMBR-ESCLEROSE MULTIPLA.jpg',0,0,298);
  } elseif ($_GET['evento'] == 17){
		$this->Image('CERTIFICADOS PEC AMBR HORMONIO CRESCIMENTO.jpg',0,0,298);
  } elseif ($_GET['evento'] == 19){
		$this->Image('CERTIFICADOS_PEC_METABOLISMO_OSSEO.jpg',0,0,298);
  } elseif ($_GET['evento'] == 22){
		$this->Image('CERTIFICADOS_PEC_ANTIVIRAIS.jpg',0,0,298);
  } elseif ($_GET['evento'] == 23){
		$this->Image('23-PEC-VACINAS-COVID-19.jpg',0,0,298);
  } elseif ($_GET['evento'] == 24){
		$this->Image('24-PEC-DOENCAS-INFLAMATORIAS-INFLAMATORIAS-INTESTINAIS.jpg',0,0,298);
  }	 elseif ($_GET['evento'] == 25){
		$this->Image('25-PEC-PREVENCAO-DO-CANCER-COM-FOCO-NA-ABORDAGEM-CIRURGICA-DAS-MAMAS.jpg',0,0,298);
  }	else {
		echo '<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nenhum certificado foi selecionado!';
		exit;
	}
}

}
$nome = $_GET['nome'];
$carga = $_GET['carga'];

//Instanciation of inherited class
$pdf=new PDF("L");
$pdf->AliasNbPages();
$pdf->AddPage();

if ($_GET['evento'] == 7){
	$pdf->SetY(67);
} elseif ($_GET['evento'] == 8){
	$pdf->SetY(75);
} elseif ($_GET['evento'] == 10){
	$pdf->SetY(65);
} elseif ($_GET['evento'] == 11){
	$pdf->SetY(76);
}  elseif ($_GET['evento'] == 12){
	$pdf->SetY(80);
} elseif ($_GET['evento'] == 13){
	$pdf->SetY(80);
} elseif ($_GET['evento'] == 14){
	$pdf->SetY(80);
} elseif ($_GET['evento'] == 15){
	$pdf->SetY(80);
} elseif ($_GET['evento'] == 17){
	$pdf->SetY(80);
} elseif ($_GET['evento'] == 19){
	$pdf->SetY(80);
} elseif ($_GET['evento'] == 22){
	$pdf->SetY(80);
} elseif ($_GET['evento'] == 23){
	$pdf->SetY(80);
} elseif ($_GET['evento'] == 24){
	$pdf->SetY(80);
}  elseif ($_GET['evento'] == 25){
	$pdf->SetY(80);
} else {
	$pdf->SetY(54);
}
$pdf->SetFont('Arial','B',19,'ISO-8859-1');
$pdf->Cell(0,55,''.$nome,0,1,'C');

$pdf->SetFont('Arial','',11,'ISO-8859-1');
//$pdf->Cell(0,48,''.$carga,0,1,'C');

$pdf->SetFont('Arial','B',15,'ISO-8859-1');
//$pdf->Cell(0,-14,'(na qualidade de Participante)',0,1,'C');
$pdf->Output();
?>