<?php
abstract class DB{
    
    // definisikan variabel untuk kelas ini saja
    PRIVATE STATIC $server      = "localhost";
    PRIVATE STATIC $panggilan   = "root";
    PRIVATE STATIC $sandi       = "";
    PRIVATE STATIC $pusatdata   = "aplikasi_islam";

    const UPDATE = 'perbarui';
    const INSERT = 'simpan';
    
    // deret nama tabel
    const TABEL_JADWAL  = "jadwal_solat";
    const TABEL_TIPS    = "tips";

    //const BACA = self::Baca;

    // menyediakan ruang variabel untuk manipulasi Query
    protected static $manipulasi;
    
    // pengiriman data
    protected static $data;
    
    PROTECTED FUNCTION Buka(){

        // koneksikan database
        $j = mysqli_connect( self::$server , self::$panggilan , self::$sandi , self::$pusatdata );
        $j -> set_charset('utf8');
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
    /*
    * langsung terima query
    */
    PROTECTED FUNCTION Jalankan($SQL){
        try{
            $db  = self::Buka();
            $dbc = $db->query( $SQL );
            
            if(!$dbc){
                throw new Exception(mysqli_error($db));
            }else{
                self::$data = $dbc;
                return $dbc;
            }
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    STATIC FUNCTION Baca(){
        return SELF::$data->fetch_assoc();
    }
    
    STATIC FUNCTION Hitung($a = 'baris'){
        if ('kolom' == $a)
            return mysqli_num_fields(SELF::$data);
        
        if ('baris' == $a)
            return mysqli_num_rows(SELF::$data);
    }
    STATIC FUNCTION Jumlah($a = 'baris'){
        SELF::Hitung($a);
    }
    
}
?>