<?php

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$header = '
<table>
    <tr>
        <td style="text-align: center;">Cabeçalho do PDF</td>
    </tr>
</table>
';

$body = '
<h1>Exemplo de uso do Dompdf</h1>
<p>Este é um exemplo simples de como usar o Dompdf para criar um arquivo PDF com um cabeçalho, corpo e rodapé.</p>
';

$footer = '
<table>
    <tr>
        <td style="text-align: center;">Rodapé do PDF</td>
    </tr>
</table>
';

$html = $header . $body . $footer;

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("nome_do_arquivo.pdf", array("Attachment" => false));
?>