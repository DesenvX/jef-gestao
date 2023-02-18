<?php

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

function PDFIntakeFuel($LIST, $LITERS, $VALUE_TOTALITY, $DATES)
{

    $dompdf = new Dompdf(['enable_remote' => true]);

    $html = '
        <style>
            body {
                justify-content:center;
                background-image: url("../../img/logo_fundo_pdf.jpg");
                background-position: center;
            }
            td, th {
                border: 1px solid black;
                padding: 5px; 
                text-align: center;
            }

            th {
                background-color: #A0CFFC;
            }

            thead {
                background-color: #E6EDF4;
            }

            tfoot {
                background-color: #E6EDF4;
            }

            table {
                border: 1px solid black;
                border-collapse: collapse;
                width: 100%;
                font-size: 12px;
            }
        </style>
    ';

    $html .= '
        <table>
            <thead>
                <tr>
                    <td style="text-align: center;"><img src"../../img/logo_fundo_pdf.png"></td>
                </tr>
            </thead>
        </table>
    ';


    $html .= '<table>';

    $html .= '
        <tr>
            <th>Data</th>
            <th>Combustível</th>
            <th>Fonecedor</th>
            <th>Litros</th>
            <th>Valor p/ Litro</th>
            <th>Valor Total</th>
        </tr>
    ';

    while ($rows = $LIST->fetch_assoc()) {

        $html .= '
                <tr>
                    <td>' . date('d/m/Y', strtotime($rows['data'])) . '</td>
                    <td>' . $rows['tipo_combustivel'] . '</td>
                    <td>' . $rows['fornecedor'] . '</td>
                    <td>' . $rows['litros'] . '</td>
                    <td>' . $rows['valor_litro'] . '</td>
                    <td>' . $rows['valor_total'] . '</td>
                </tr>';
    }

    $html .= '</table>';

    $html .= '
        <table>
            <tfoot>
                <tr>
                    <td style="text-align: center;"><strong> DATA INICIAL: </strong>' . $DATES[0] . '<br><strong> DATA FINAL: </strong>' . $DATES[1] . '</td>   
                    <td style="text-align: center;"><strong> LITROS GERAL: </strong>' . $LITERS['soma_litros_entrada'] . ' L<br><strong> VALOR GERAL: </strong>R$ ' . $VALUE_TOTALITY['soma_valor_total_entrada'] . '</td>
                </tr>
            </tfoot>
        </table>
    ';

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream("relatorio_entrada_combustivel".time().".pdf", array("Attachment" => false));
}
