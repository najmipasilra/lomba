<?php
require_once('Fungsi.php');
$json = null; // string
// Setting up all query URL
switch((isset($_GET['data']) && $_GET['data'] != '') ? $_GET['data'] : ''){
    case "jadwalsolat":
        require_once('JadwalSolat.php');
        $t = new Jadwal_Solat();
        $json = $t::JSON();
    break;
    case "tipsramadhan":
        require_once('Tips.php');
        $t = new Tips();
        
        
        $t->Limit( [
            'max' => (isset($_GET['max']) && $_GET['max'] != 0) ? $_GET['max'] : null,
            'hal' => (isset($_GET['hal']) && $_GET['hal'] != null) ? $_GET['hal'] : 0
            
        ] );
        // jalankan
        $t->Posting();
        $json = $t::JSON();
    break;
    default:
        $json = 'Method not Allowed!';
    break;
}
echo $json;
?>