<?php
include_once "../config/koneksi.php";  
include_once "../config/fungsi_indotgl.php";
include_once "../config/fungsi.php";
include_once "../config/library.php";
include_once '../config/librari.php'; 
include_once '../config/appsettings.php';

header('Content-Type: application/json');

$username = $_GET["key"];
$user_check_sql = "SELECT COUNT(*) as count FROM tbl_user WHERE username = '$username'";
$user_check_result = mysqli_query($konek, $user_check_sql);
$user_check_data = mysqli_fetch_assoc($user_check_result);

if ($user_check_data['count'] == 0) {
    echo json_encode(['error' => 'User not found'], JSON_PRETTY_PRINT);
    exit;
}


$sql = "SELECT  
    a.nama name, b.nama_kriteria as criteria, c.nilai as value, b.bobot_kriteria as weight, b.atribut as attribute  
    FROM
    tbl_produk a, tbl_kriteria b, tbl_himpunan c, tbl_klasifikasi d 
    WHERE  
    a.id_produk = d.id_produk AND c.id_himpunan = d.id_himpunan AND b.id_kriteria = c.id_kriteria
    ORDER BY a.id_produk ASC, b.id_kriteria ASC";

$result = mysqli_query($konek, $sql);

$data = array();
$kriterias = array();
$bobot = array();
$atribut = array();
$nilai_kuadrat = array();

while ($row = mysqli_fetch_object($result)) {
    if (!isset($data[$row->name])) {
        $data[$row->name] = array();
    }
    if (!isset($data[$row->name][$row->criteria])) {
        $data[$row->name][$row->criteria] = array();
    }
    if (!isset($nilai_kuadrat[$row->criteria])) {
        $nilai_kuadrat[$row->criteria] = 0;
    }
    $bobot[$row->criteria] = $row->weight;
    $atribut[$row->criteria] = $row->attribute;
    $data[$row->name][$row->criteria] = $row->value;
    $nilai_kuadrat[$row->criteria] += pow($row->value, 2);
    $kriterias[] = $row->criteria;
}

$kriteria = array_unique($kriterias);
$jml_kriteria = count($kriteria);

$response = [
    'evaluation_matrix' => [],
    'normalized_performance_ratings' => [],
    'weighted_normalized_ratings' => [],
    'ideal_solution_positive' => [],
    'ideal_solution_negative' => [],
    'positive_distance' => [],
    'negative_distance' => [],
    'preference_values' => [],
    'ranking' => []
];

$i = 0;
foreach ($data as $nama => $krit) {
    $row = [
        'no' => ++$i,
        'alternatif' => "A{$i}",
        'nama' => $nama,
        'criteria' => []
    ];
    foreach ($kriteria as $k) {
        $row['criteria'][$k] = $krit[$k];
    }
    $response['evaluation_matrix'][] = $row;
}

$i = 0;
foreach ($data as $nama => $krit) {
    $row = [
        'no' => ++$i,
        'alternatif' => "A{$i}",
        'nama' => $nama,
        'criteria' => []
    ];
    foreach ($kriteria as $k) {
        $row['criteria'][$k] = round(($krit[$k]) / sqrt($nilai_kuadrat[$k]), 4);
    }
    $response['normalized_performance_ratings'][] = $row;
}

$i = 0;
$y = [];
foreach ($data as $nama => $krit) {
    $row = [
        'no' => ++$i,
        'alternatif' => "A{$i}",
        'nama' => $nama,
        'criteria' => []
    ];
    foreach ($kriteria as $k) {
        $y[$k][$i - 1] = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 4) * $bobot[$k];
        $row['criteria'][$k] = $y[$k][$i - 1];
    }
    $response['weighted_normalized_ratings'][] = $row;
}

$yplus = [];
foreach ($kriteria as $k) {
    $yplus[$k] = ($atribut[$k] == 'benefit' ? max($y[$k]) : min($y[$k]));
}
$response['ideal_solution_positive'] = $yplus;

$ymin = [];
foreach ($kriteria as $k) {
    $ymin[$k] = ($atribut[$k] == 'cost' ? max($y[$k]) : min($y[$k]));
}
$response['ideal_solution_negative'] = $ymin;

$i = 0;
$dplus = [];
foreach ($data as $nama => $krit) {
    $dplus[$i] = 0;
    foreach ($kriteria as $k) {
        $dplus[$i] += pow($yplus[$k] - $y[$k][$i], 2);
    }
    $response['positive_distance'][] = [
        'no' => ++$i,
        'alternatif' => "A{$i}",
        'nama' => $nama,
        'distance' => round(sqrt($dplus[$i - 1]), 6)
    ];
}

$i = 0;
$dmin = [];
foreach ($data as $nama => $krit) {
    $dmin[$i] = 0;
    foreach ($kriteria as $k) {
        $dmin[$i] += pow($ymin[$k] - $y[$k][$i], 2);
    }
    $response['negative_distance'][] = [
        'no' => ++$i,
        'alternatif' => "A{$i}",
        'nama' => $nama,
        'distance' => round(sqrt($dmin[$i - 1]), 6)
    ];
}

$i = 0;
$V = [];
foreach ($data as $nama => $krit) {
    $V[$i] = $dmin[$i] / ($dmin[$i] + $dplus[$i]);
    $response['preference_values'][] = [
        'no' => ++$i,
        'alternatif' => "A{$i}",
        'nama' => $nama,
        'value' => $V[$i - 1]
    ];
}

array_multisort($V, SORT_DESC, $data);

$i = 0;
foreach ($data as $nama => $krit) {
    $response['ranking'][] = [
        'nama' => $nama,
        'ranking' => ++$i
    ];
}

echo json_encode($response, JSON_PRETTY_PRINT);
?>
