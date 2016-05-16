<?php
CLASS Tips extends DB{

    /*
    *
    * @param $param, jika berisi ID, maka akan menampilkan posting seputar tips
    *                jika berisi String, maka akan memunculkan daftar pencarian seputar tips.
    */
    function __construct($param = null){

        // jika angka, tampilkan posting
        if(is_numeric($param)){
            SELF::$manipulasi = sprintf("WHERE id=%i", $param);
        }else
        // jika string, tampilkan nama judul    
        if(is_string($param)){
            SELF::$manipulasi = sprintf("WHERE (judul like '%%%s%%')", $param); // jelek, tapi akurat
        }else{
            SELF::$manipulasi = '';
        }
        
        $this->Posting();
    }

    Function Posting(){
        self::$data = SELF::Jalankan( sprintf("SELECT id, judul, isi, waktu FROM %s %s ", SELF::TABEL_TIPS , SELF::$manipulasi) );
    }

    Function JSON(){
        $temp = [];
        while($k = SELF::Baca()){
            array_push($temp, [ 'id'=> $k['id'], 'isi' => [ 'judul' => $k['judul'], 'post' => $k['isi'], 'tanggal' => ['waktu'] ] ]);
        }
        return sprintf("{\"Tips\":%s}", json_encode($temp));
    }
}
?>