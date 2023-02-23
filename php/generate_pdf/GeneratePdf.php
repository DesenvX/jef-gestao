<?php

require_once 'dompdf/autoload.inc.php';
require_once '../services/Services.php';
require_once '../services/Pastures.php';
require_once '../services/Vehicles.php';
require_once '../services/Tractors.php';
require_once '../services/Collaborators.php';
require_once '../functions/GenerateUuid.php';

use Dompdf\Dompdf;
use services\Services;
use services\Pastures;
use services\Tractors;
use services\Vehicles;
use services\Collaborators;

function PDFReportMoviment($LIST, $HOURS, $VALUE_TOTALITY, $DATA_REPORT)
{

    date_default_timezone_set('America/Belem');

    $uuid = uuid();

    $dompdf = new Dompdf(['enable_remote' => true]);
    

    $html = '
        <style>
            body {
                justify-content:center;
                background-image: url("http://localhost/jEF-Gestao/img/logo_fundo_pdf.png");
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

    $collaborator = new Collaborators();
    $operador = $collaborator->getCollaboratorsForSomething($DATA_REPORT['operador']);

    $html .= '
        <table>
            <thead>
                <tr>
                    <td><img src="http://localhost/jEF-Gestao/img/logo.png" width="120px" height="120px"></td>
                    <td>
                        <h1 style="margin-top: 10px; margin-bottom: 4px;"> Fazenda Santa Tereza </h1>
                        <p> Redenção - PA <br> ' . date('d/m/Y H:i:s') . '</p>
                        <h5> ID: ' . $uuid . ' </h5>
                    </td>
                </tr>
            </thead>
        </table>
        <br>
        <table>
            <thead>
                <tr>
                    <td>
                        <strong> Operador: ' . $operador['nome'] . ' </strong> <br>
                    </td>
                </tr>
            </thead>
        </table>
        <br>
    ';

    $html .= '<table>';

    $html .= '
        <tr>
            <th>Data</th>
            <th>Dia</th>
            <th>Máquina</th>
            <th>Serviço</th>
            <th>Pasto</th>
            <th>Horímetro I.</th>
            <th>Horímetro F.</th>
            <th>Horas</th>
            <th>Valor Horas</th>
        </tr>
    ';

    while ($rows = $LIST->fetch_assoc()) {

        $services = new Services();
        $servico = $services->getServicesForSomething($rows['id_servico']);
        $pastures = new Pastures();
        $pasto = $pastures->getPasturesForSomething($rows['id_pasto']);
        $tractors = new Tractors();
        $trator = $tractors->getTractorForSomething($rows['id_maquina']);

        $html .= '
                <tr>
                    <td>' . date('d/m/Y', strtotime($rows['data'])) . '</td>
                    <td>' . $rows['dia_semana'] . '</td>
                    <td>' . $trator['modelo'] . '</td>
                    <td>' . $servico['descricao'] . '</td>
                    <td>' . $pasto['nome'] . '</td>
                    <td>' . $rows['hora_inicial'] . '</td>
                    <td>' . $rows['hora_final'] . '</td>
                    <td>' . $rows['horas_trabalhadas'] . ' Hrs</td>
                    <td>R$ ' . $rows['valor_diaria'] . '</td>
                </tr>';
    }

    $html .= '</table>';

    $html .= '
        <br>
        <table>
            <tfoot>
                <tr>
                    <td style="text-align: center;">
                        <strong> DATA INICIAL: </strong>' . date('d/m/Y', strtotime($DATA_REPORT['data_inicial'])) . '<br>
                        <strong> DATA FINAL: </strong>' . date('d/m/Y', strtotime($DATA_REPORT['data_final'])) . '
                    </td>   
                    <td style="text-align: center;">
                    <strong> HORAS NORMAIS: </strong>' . $HOURS[0]['soma_horas_normais'] . ' Hrs<br>
                    <strong> HORAS EXCEDENTES: </strong>' . $HOURS[1]['soma_horas_excedentes'] . ' Hrs<br>
                        <strong> HORAS TOTAL: </strong>' . $HOURS[2]['soma_horas_trabalhadas'] . ' Hrs<br>
                        <strong> VALOR TOTAL: </strong>R$ ' . $VALUE_TOTALITY['soma_valor_diaria'] . '
                    </td>
                </tr>
            </tfoot>
        </table>

        <div style="text-align: center; margin-top: 80px;">
            <hr style="width: 65%">
            <label> Assinatura </label>
        <div>
    ';

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream("" . $uuid . ".pdf", array("Attachment" => false));
}

function PDFIntakeFuel($LIST, $LITERS, $VALUE_TOTALITY, $DATES)
{

    $dompdf = new Dompdf(['enable_remote' => true]);

    $html = '
        <style>
            body {
                justify-content:center;
                background-image: url("http://localhost/jEF-Gestao/img/logo_fundo_pdf.png");
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
                    <td><img src="http://localhost/jEF-Gestao/img/logo.png" width="120px" height="120px"></td>
                    <td>
                        <h1 style="margin-top: 10px; margin-bottom: 4px;"> Fazenda Santa Tereza </h1>
                        <p> Redenção - PA <br> ' . date('d/m/Y H:i:s') . '</p>
                    </td>
                </tr>
            </thead>
        </table>
        <br>
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
                    <td>' . $rows['litros'] . ' L</td>
                    <td>R$ ' . $rows['valor_litro'] . '</td>
                    <td>R$ ' . $rows['valor_total'] . '</td>
                </tr>';
    }

    $html .= '</table>';

    $html .= '
        <br>
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

    $dompdf->stream("relatorio_entrada_combustivel" . time() . ".pdf", array("Attachment" => false));
}

function PDFOutputFuelGas($LIST, $LITERS, $DATES)
{

    $dompdf = new Dompdf(['enable_remote' => true]);

    $html = '
        <style>
            body {
                justify-content:center;
                background-image: url("http://localhost/jEF-Gestao/img/logo_fundo_pdf.png");
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
                    <td><img src="http://localhost/jEF-Gestao/img/logo.png" width="120px" height="120px"></td>
                    <td>
                        <h1 style="margin-top: 10px; margin-bottom: 4px;"> Fazenda Santa Tereza </h1>
                        <p> Redenção - PA <br> ' . date('d/m/Y H:i:s') . '</p>
                    </td>
                </tr>
            </thead>
        </table>
        <br>
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
                    <td>' . $veiculo['modelo'] . ' (' . $veiculo['placa'] . ')</td>
                    <td>' . $rows['litros'] . ' L</td>
                </tr>';
    }

    $html .= '</table>';

    $html .= '
        <br>
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

    $dompdf->stream("relatorio_saida_gasolina" . time() . ".pdf", array("Attachment" => false));
}

function PDFOutputFuelDisel($LIST, $LITERS, $DATES)
{
    $dompdf = new Dompdf(['enable_remote' => true]);

    $html = '
        <style>
            body {
                justify-content:center;
                background-image: url("http://localhost/jEF-Gestao/img/logo_fundo_pdf.png");
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
                    <td><img src="http://localhost/jEF-Gestao/img/logo.png" width="120px" height="120px"></td>
                    <td>
                        <h1 style="margin-top: 10px; margin-bottom: 4px;"> Fazenda Santa Tereza </h1>
                        <p> Redenção - PA <br> ' . date('d/m/Y H:i:s') . '</p>
                    </td>
                </tr>
            </thead>
        </table>
        <br>
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
            $trator_veiculo = $veiculo['modelo'] . ' (' . $veiculo['placa'] . ')';
        }

        $html .= '
                <tr>
                    <td>' . date('d/m/Y', strtotime($rows['data'])) . '</td>
                    <td>' . $rows['tipo_combustivel'] . '</td>
                    <td>' . $colaborador['nome'] . '</td>
                    <td>' . $servico['descricao'] . '</td>
                    <td>' . $pasto['nome'] . '</td>
                    <td>' . $trator_veiculo . '</td>
                    <td>' . $rows['litros'] . ' L</td>
                </tr>';
    }

    $html .= '</table>';

    $html .= '
        <br>
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

    $dompdf->stream("relatorio_saida_disel" . time() . ".pdf", array("Attachment" => false));
}
