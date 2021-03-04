<?php 



//CARREGAR DOMPDF
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dataInicial = $_POST['txtdataInicial'];
$dataFinal = $_POST['txtdataFinal'];




if ($dataInicial == ''){
	$dataInicial = Date('Y-m-d');
}

if ($dataFinal == ''){
	$dataFinal = Date('Y-m-d');
}

//ALIMENTAR OS DADOS NO RELATÓRIO
$html = utf8_encode(file_get_contents("http://localhost:8080/InoGest/static/rel/rel_gastos_data.php?dataInicial=".$dataInicial."&dataFinal=".$dataFinal));



//INICIALIZAR A CLASSE DO DOMPDF
$pdf = new DOMPDF();

//Definir o tamanho do papel e orientação da página
$pdf->setPaper('A4', 'portrait');
$options = $pdf->getOptions();
$options->set('isPhpEnabled', true);
$pdf->setOptions($options);

//CARREGAR O CONTEÚDO HTML
$pdf->loadHtml(utf8_decode($html));

//RENDERIZAR O PDF
$pdf->render();

//NOMEAR O PDF GERADO
$pdf->stream(
'relatorioGastosData.pdf',
array("Attachment" => false)
);


