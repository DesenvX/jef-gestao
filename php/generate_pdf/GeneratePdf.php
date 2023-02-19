<?php

require_once 'dompdf/autoload.inc.php';
require_once '../services/Fuel.php';
require_once '../services/Services.php';
require_once '../services/Pastures.php';
require_once '../services/Vehicles.php';
require_once '../services/Tractors.php';
require_once '../services/Collaborators.php';
require_once '../services/Suppliers.php';

use Dompdf\Dompdf;
use services\Services;
use services\Pastures;
use services\Tractors;
use services\Vehicles;
use services\Collaborators;
use services\Suppliers;

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

        $collaborator = new Collaborators();
        $colaborador = $collaborator->getCollaboratorsForSomething($rows['id_colaborador']);

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

function PDFOutputFuelGas($LIST, $LITERS, $DATES)
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
            <th>Colaborador</th>
            <th>Veículo</th>
            <th>Litros</th>
        </tr>
    ';

    while ($rows = $LIST->fetch_assoc()) {

        $collaborator = new Collaborators();
        $colaborador = $collaborator->getCollaboratorsForSomething($rows['id_colaborador']);
        $vehicle = new Vehicles();
        $veiculo = $vehicle->getVehiclesForSomething($rows['id_veiculo']);

        $html .= '
                <tr>
                    <td>' . date('d/m/Y', strtotime($rows['data'])) . '</td>
                    <td>' . $rows['tipo_combustivel'] . '</td>
                    <td>' . $colaborador['nome'] . '</td>
                    <td>' . $veiculo['modelo'] . ' ('.$veiculo['placa'].')</td>
                    <td>' . $rows['litros'] . '</td>
                </tr>';
    }

    $html .= '</table>';

    $html .= '
        <table>
            <tfoot>
                <tr>
                    <td style="text-align: center;"><strong> DATA INICIAL: </strong>' . $DATES[0] . '<br><strong> DATA FINAL: </strong>' . $DATES[1] . '</td>   
                    <td style="text-align: center;"><strong> LITROS GERAL: </strong>' . $LITERS['soma_litros_saida'] . ' L</td>
                </tr>
            </tfoot>
        </table>
    ';

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream("relatorio_saida_gasolina".time().".pdf", array("Attachment" => false));
}

function PDFOutputFuelDisel($LIST, $LITERS, $DATES)
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
            <th>Colaborador</th>
            <th>Serviço</th>
            <th>Pasto</th>
            <th>Maquina / Veículo </th>
            <th>Litros</th>
        </tr>
    ';

    while ($rows = $LIST->fetch_assoc()) {

        $collaborator = new Collaborators();
        $colaborador = $collaborator->getCollaboratorsForSomething($rows['id_colaborador']);
        $services = new Services();
        $servico = $services->getServicesForSomething($rows['id_servico']);
        $pastures = new Pastures();
        $pasto = $pastures->getPasturesForSomething($rows['id_pasto']);
        

        if ($rows['id_trator'] !== 0 && $rows['id_veiculo'] == 0) {

            $tractors = new Tractors();
            $trator = $tractors->getTractorForSomething($rows['id_trator']);
            $trator_veiculo = $trator['modelo'];

        } elseif ($rows['id_veiculo'] !== 0  && $rows['id_trator'] == 0) {

            $vehicle = new Vehicles();
            $veiculo = $vehicle->getVehiclesForSomething($rows['id_veiculo']);
            $trator_veiculo = $veiculo['modelo'] .' ('.$veiculo['placa'].')';

        }

        $html .= '
                <tr>
                    <td>' . date('d/m/Y', strtotime($rows['data'])) . '</td>
                    <td>' . $rows['tipo_combustivel'] . '</td>
                    <td>' . $colaborador['nome'] . '</td>
                    <td>' . $servico['descricao'] . '</td>
                    <td>' . $pasto['nome'] . '</td>
                    <td>' . $trator_veiculo . '</td>
                    <td>' . $rows['litros'] . '</td>
                </tr>';
    }

    $html .= '</table>';

    $html .= '
        <table>
            <tfoot>
                <tr>
                    <td style="text-align: center;"><strong> DATA INICIAL: </strong>' . $DATES[0] . '<br><strong> DATA FINAL: </strong>' . $DATES[1] . '</td>   
                    <td style="text-align: center;"><strong> LITROS GERAL: </strong>' . $LITERS['soma_litros_saida'] . ' L</td>
                </tr>
            </tfoot>
        </table>
    ';

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream("relatorio_saida_disel".time().".pdf", array("Attachment" => false));
}