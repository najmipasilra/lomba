<?php
CLASS Tips extends DB{
    private static $limit;
    const maxpost = 3;
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
        //$this->Posting();
    }
    Function Limit($limit = []){
        if(!empty($limit)){

            if(isset($limit['max']) && is_numeric($limit['max'])){
                $hal = (isset($limit['hal']) && is_numeric($limit['hal'])) ? $limit['hal'] : 0;
                $max = $limit['max'];

                $start = ($limit['hal'] * $max);
                self::$limit = sprintf("LIMIT %s , %s", $start, $max);
            }else{
                self::$limit = " LIMIT 0, 2";
            }
        }
        //$this->Posting();
    }

    Function Posting(){
        self::$data = SELF::Jalankan( sprintf("SELECT id, judul, isi, waktu, gambar FROM %s %s %s", SELF::TABEL_TIPS , SELF::$manipulasi, SELF::$limit) );
    }

    Function JSON(){
        $temp = [];
        while($k = SELF::Baca()){
            array_push($temp, [ 'id'=> $k['id'], 'tanggal' => $k['waktu'], 'isi' => [ 'judul' => $k['judul'], 'post' => $k['isi'], 'foto' => (!empty($k['gambar']) ? $k['gambar'] : 'img/slide-3.jpg') ] ]);
        }
        return sprintf("{\"Tips\":%s}", json_encode($temp));
    }
}
?>