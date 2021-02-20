<?php
function drp()
{
}

function gross_requirement($data_masukkan, $move)
{
    $jumlah = count($data_masukkan);

    // Penghitungan Moving berdasarkan $move-nya Hari (DO)
    $hasil = [];
    for ($i = 0; $i < $jumlah; $i++) {
        if ($i == ($jumlah - $move)) {
            break;
        }

        $s = 0;
        for ($j = 0; $j < $move; $j++) {
            $s += $data_masukkan[$i + $j]['setoran'];
        }

        array_push($hasil, $s / $move);
    }

    // Perhitungan Error dan Squared Error Moving 2 Hari
    $error = [];
    $absolut_error = [];
    $squared_error = [];
    for ($i = $move; $i < $jumlah; $i++) {
        $e = $data_masukkan[$i]['setoran'] - $hasil[$i - $move];
        array_push($error, $e);
        array_push($absolut_error, abs($e));
        array_push($squared_error, abs($e * $e));
    }

    //Mean Error
    $mean_error = array_sum($error) / ($jumlah - $move);

    //Mean Absolut Error
    $mean_absolut_error = array_sum($absolut_error) / ($jumlah - $move);

    // Mean Squared Error
    $mean_squared_error = array_sum($squared_error) / ($jumlah - $move);

    // Peramalan Tanggal Selanjutnya
    $r = 0;
    for ($j = 1; $j <= $move; $j++) {
        $r += $data_masukkan[$jumlah - $j]['setoran'];
    }
    $peramalan = round($r / $move, 0);

    /*Penghitungan Safety Stock*/

    // Service Level
    $service_level = NormSInv(0.95);

    // Standar Deviasi
    $standar_deviasi = array_sum(array_column($data_masukkan, 'setoran')) / $jumlah;

    // Lead time
    $lead_time = 1;

    // Safety Stock
    $safety_Stock = round($service_level * $standar_deviasi * sqrt($lead_time), 0);

    // Project On Hand
    $project_on_hand = 0;

    // Net Requirements
    $net_requirements = ($peramalan + $safety_Stock) - (0 - $project_on_hand);

    // Planned Order Receipt
    $planned_order_receipt = $net_requirements + $safety_Stock;

    return [
        'ma' => $hasil,
        'error' => $error,
        'absolut_error' => $absolut_error,
        'squared_error' => $squared_error,
        'mean_error' => $mean_error,
        'mean_absolut_error' => $mean_absolut_error,
        'mean_squared_error' => $mean_squared_error,
        'peramalan' => $peramalan,
        'service_level' => $service_level,
        'standar_deviasi' => $standar_deviasi,
        'lead_time' => $lead_time,
        'safety_Stock' => $safety_Stock,
        'project_on_hand' => $project_on_hand,
        'net_requirements' => $net_requirements,
        'planned_order_receipt' => $planned_order_receipt
    ];
}

function NormSInv($probability)
{
    $a1 = -39.6968302866538;
    $a2 = 220.946098424521;
    $a3 = -275.928510446969;
    $a4 = 138.357751867269;
    $a5 = -30.6647980661472;
    $a6 = 2.50662827745924;

    $b1 = -54.4760987982241;
    $b2 = 161.585836858041;
    $b3 = -155.698979859887;
    $b4 = 66.8013118877197;
    $b5 = -13.2806815528857;

    $c1 = -7.78489400243029E-03;
    $c2 = -0.322396458041136;
    $c3 = -2.40075827716184;
    $c4 = -2.54973253934373;
    $c5 = 4.37466414146497;
    $c6 = 2.93816398269878;

    $d1 = 7.78469570904146E-03;
    $d2 = 0.32246712907004;
    $d3 = 2.445134137143;
    $d4 =  3.75440866190742;

    $p_low = 0.02425;
    $p_high = 1 - $p_low;
    $q = 0;
    $r = 0;
    $normSInv = 0;
    if (
        $probability < 0 ||
        $probability > 1
    ) {
        throw new \Exception("normSInv: Argument out of range.");
    } else if ($probability < $p_low) {

        $q = sqrt(-2 * log($probability));
        $normSInv = ((((($c1 * $q + $c2) * $q + $c3) * $q + $c4) * $q + $c5) * $q + $c6) / (((($d1 * $q + $d2) * $q + $d3) * $q + $d4) * $q + 1);
    } else if ($probability <= $p_high) {

        $q = $probability - 0.5;
        $r = $q * $q;
        $normSInv = ((((($a1 * $r + $a2) * $r + $a3) * $r + $a4) * $r + $a5) * $r + $a6) * $q / ((((($b1 * $r + $b2) * $r + $b3) * $r + $b4) * $r + $b5) * $r + 1);
    } else {

        $q = sqrt(-2 * log(1 - $probability));
        $normSInv = - ((((($c1 * $q + $c2) * $q + $c3) * $q + $c4) * $q + $c5) * $q + $c6) / (((($d1 * $q + $d2) * $q + $d3) * $q + $d4) * $q + 1);
    }

    return $normSInv;
}
