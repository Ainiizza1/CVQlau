<?php
require 'drp.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $data_masukkan = array(
        [
            'tanggal' => '18/11/2019',
            'setoran' => 59
        ],
        [
            'tanggal' => '19/11/2019',
            'setoran' => 50
        ],
        [
            'tanggal' => '20/11/2019',
            'setoran' => 53
        ],
        [
            'tanggal' => '21/11/2019',
            'setoran' => 40
        ],
        [
            'tanggal' => '22/11/2019',
            'setoran' => 41
        ],
        [
            'tanggal' => '23/11/2019',
            'setoran' => 52
        ],
    );

    $move = 2;
    $drp = gross_requirement($data_masukkan, $move);


    ?>
    <h3> Tabel Hasil Peramalan Single Moving Average dengan MSE (<?= $move ?> Hari)</h3>
    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>Hari</td>
                <td>Jumlah Pemesanan /Hari (Pcs)</td>
                <td>MA 2 Hari</td>
                <td>Error</td>
                <td>Absolut Error</td>
                <td>Squared Error</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($data_masukkan as $dm) {
            ?>
                <tr>
                    <td><?= $no + 1; ?></td>
                    <td><?= $dm['tanggal']; ?></td>
                    <td><?= $dm['setoran']; ?></td>
                    <td><?= $no > $move - 1 ? $drp['ma'][$no - $move]  : ''; ?></td>
                    <td><?= $no > $move - 1 ? $drp['error'][$no - $move]  : ''; ?></td>
                    <td><?= $no > $move - 1 ? $drp['absolut_error'][$no - $move]  : ''; ?></td>
                    <td><?= $no > $move - 1 ? $drp['squared_error'][$no - $move]  : ''; ?></td>
                </tr>
            <?php
                $no++;
            }
            ?>
            <tr>
                <td colspan="4">Total</td>
                <td><?= array_sum($drp['error']); ?></td>
                <td><?= array_sum($drp['absolut_error']); ?></td>
                <td><?= array_sum($drp['squared_error']); ?></td>
            </tr>
            <tr>
                <td colspan="3">Mean Error</td>
                <td><?= $drp['mean_error']; ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Mean Absolut Error</td>
                <td><?= $drp['mean_absolut_error']; ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Mean Squared Error</td>
                <td><?= $drp['mean_squared_error']; ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <p>Peralaman Untuk Tanggal 24/11/19 = <?= $drp['peramalan']; ?></p>


    <?php
    $move = 3;
    $drp1 = gross_requirement($data_masukkan, $move);

    ?>
    <h3> Tabel Hasil Peramalan Single Moving Average dengan MSE (<?= $move ?> Hari)</h3>
    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>Hari</td>
                <td>Jumlah Pemesanan /Hari (Pcs)</td>
                <td>MA 2 Hari</td>
                <td>Error</td>
                <td>Absolut Error</td>
                <td>Squared Error</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($data_masukkan as $dm) {
            ?>
                <tr>
                    <td><?= $no + 1; ?></td>
                    <td><?= $dm['tanggal']; ?></td>
                    <td><?= $dm['setoran']; ?></td>
                    <td><?= $no > $move - 1 ? $drp1['ma'][$no - $move]  : ''; ?></td>
                    <td><?= $no > $move - 1 ? $drp1['error'][$no - $move]  : ''; ?></td>
                    <td><?= $no > $move - 1 ? $drp1['absolut_error'][$no - $move]  : ''; ?></td>
                    <td><?= $no > $move - 1 ? $drp1['squared_error'][$no - $move]  : ''; ?></td>
                </tr>
            <?php
                $no++;
            }
            ?>
            <tr>
                <td colspan="4">Total</td>
                <td><?= array_sum($drp1['error']); ?></td>
                <td><?= array_sum($drp1['absolut_error']); ?></td>
                <td><?= array_sum($drp1['squared_error']); ?></td>
            </tr>
            <tr>
                <td colspan="3">Mean Error</td>
                <td><?= $drp1['mean_error']; ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Mean Absolut Error</td>
                <td><?= $drp1['mean_absolut_error']; ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Mean Squared Error</td>
                <td><?= $drp1['mean_squared_error']; ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <p>Peralaman Untuk Tanggal 24/11/19 = <?= $drp1['peramalan']; ?></p>

    <h3>Hasil Penghitungan DRP</h3>
    <table border="1">
        <thead>
            <tr>
                <td>Safety Stock</td>
                <td>Past Due</td>
                <td>24/11/19</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Gross Requirements</td>
                <td></td>
                <td><?= $drp['peramalan']; ?></td>
            </tr>
            <tr>
                <td>Schedule Receipts</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Projected On Hand</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Net Requirements</td>
                <td></td>
                <td><?= $drp['net_requirements']; ?></td>
            </tr>
            <tr>
                <td>Planned Order Receipt</td>
                <td></td>
                <td><?= $drp['planned_order_receipt']; ?></td>
            </tr>
            <tr>
                <td>Planned Order Release</td>
                <td></td>
                <td><?= $drp['planned_order_receipt']; ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>