<?php 
CLASS Jadwal_Solat extends DB{
    
    private $tanggal;
    
    /*
    * @param $param, jika diisi tanggal hari ini, maka tampilkan jadwal solat hari ini.
    */
    function __construct($param = null){

        if($param){
            SELF::$manipulasi = sprintf("WHERE date = %s", str_replace(['\'','"'], [''], $param ) );
        }else{
            SELF::$manipulasi = "";
        }
        $this->Posting();
    }

    private function Posting(){
        self::$data = SELF::Jalankan(sprintf("SELECT date as tgl, imsak as i,subuh as s,dzuhur as z,ashar as a,magrib as m,isya as y FROM %s %s ", SELF::TABEL_JADWAL , SELF::$manipulasi) );
    }

    function Simpan($a = [], $b = 'perintah'){
        if('masukkan'){
            
        }
        
        if('perbarui'){
            
        }
        return SELF::Jalankan(sprintf("UPDATE %s SET "));
    }
    
    
    
    function JSON(){
        $temp = [];
        while($k = SELF::Baca()){
            array_push($temp, [ 'tanggal'=>$k['tgl'], 'waktu'=>['i'=>$k['i'] , 's'=>$k['s'], 'z'=>$k['z'], 'a'=>$k['a'], 'm'=>$k['m'], 'y'=>$k['y']] ] );
        }
        return sprintf("{\"JadwalSolat\":%s}", json_encode($temp));
    }
    
    
}
?>