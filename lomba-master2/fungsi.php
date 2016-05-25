<?php
abstract class DB{
    
    // definisikan variabel untuk kelas ini saja
    PRIVATE STATIC $server      = "localhost";
    PRIVATE STATIC $panggilan   = "root";
    PRIVATE STATIC $sandi       = "";
    PRIVATE STATIC $pusatdata   = "aplikasi_islam";


    PROTECTED FUNCTION Buka(){
        
        // koneksikan database
        $j = mysqli_connect
        ( self::$server
        , self::$panggilan
        , self::$sandi
        , self::$pusatdata
        );
        $j->set_charset('utf8');
        // jika J berhasil, maka set $data = J (kunci akses ke database)
        IF($j)
            RETURN $j;
        // atau gagal, selesaikan program.
        ELSE
            DIE("Unable to connect");
        
        // hapus variabel J untuk
        UNSET($j);
    }
    
    PROTECTED FUNCTION Tutup(){
        mysqli_close(self::$db);
    }
    
}

abstract class SQL extends DB{
    
    // deret nama tabel
    const TABEL_JADWAL  = "jadwal_solat";
    const TABEL_TIPS    = "tips";
    
    // menyediakan ruang variabel untuk manipulasi Query
    protected $manipulasi;
    
    // pengiriman data
    private static $data;


    /*
    * langsung terima query
    */
    PROTECTED FUNCTION Jalankan($SQL){
        try{
            $db  = self::Buka();
            $dbc = $db->query( $SQL );
            
            if(!$dbc){
                throw new Exception("Query gagal dipanggil :(");
            }else{
                return $dbc;
            }
        }catch(Exception $e){
            $e->Baca($db->error);
        }
    }
}

CLASS Jadwal_solat extends SQL{
    
    private $tanggal;
    // $manipulasi lihat ke 
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
        self::$data = SELF::Jalankan(sprintf("SELECT imsak,subuh,zuhur,ashar,maghrib,isya FROM %s %s ", SELF::TABEL_JADWAL , SELF::$manipulasi) );
    }

    public function Baca(){
    /*
    * Implementasi :
    *
    * while($data = [objek]->Baca) :
    *    $data['namaKolom'];
    * endwhile;
    */
        return self::$data->fetch_assoc();
    }
}

CLASS Tips{
    
    
    /*
    *
    * @param $param, jika berisi ID, maka akan menampilkan posting seputar tips
    *                jika berisi String, maka akan memunculkan daftar pencarian seputar tips.
    */
    function __construct($param){

        // jika angka, tampilkan posting
        if(is_numeric($param)){
            SELF::$manipulasi = sprintf("WHERE id=%i", $param);
        }else
        // jika string, tampilkan nama judul    
        if(is_string($param)){
            SELF::$manipulasi = sprintf("WHERE (judul like '%%%s%%')", $param);
        }else{
            SELF::$manipulasi = null;
        }
    }

    Function Posting(){
        self::$data = SELF::Jalankan( sprintf("SELECT * FROM %s %s ", SELF::TABEL_TIPS , SELF::$manipulasi) );
    }
    
    FUNCTION Baca(){
        return self::$data->fetch_assoc();
    }
    
    
    
}




echo SQL::Jalankan();

?>