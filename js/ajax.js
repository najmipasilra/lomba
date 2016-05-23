(function(x){

// U, url baca data [string URL]
// T, target HTML [$(selector)]
// S, struktur HTML [function(e){ e.judul; e.waktu,.. dsb. return <string>}]
// M, metode [string POST / GET], default : GET
var Posting = function(U, T, S, M){
    // Inisial Objek
    var request = x.ajax( {

        // alamat URL data
        url:U,
        // metode
        method: (M == 'undefined' ? 'GET' : M)
    } );

    // jika data didapatkan dan sukses
    request.done(function(d) {
        // jadikan string menjadi collection (keluarga array)
        var j = eval("(" + d + ")");

        // lakukan perulangan sebanyak data yang dimiliki
        for(i=0;i<j.Tips.length;i++){
            var post = j.Tips[i].isi;

            // push data kedalam objek.
            T.append(S(post));
        }



    });

    request.error(function(e) {
        alert( "error" + e.responseText );
        alert( "error" + e.readyState );
    });
}
x(function(){
    x('[trigger="posting"]').on('click', function(e){
        // eksekusi fungsi Posting();
        Posting('TampilanTips.php?data', x('[ajax="posting"]'), function(f){
            return "<div class='post'>"
            +   "<h1>" + f.judul + "</h1>"
            +   "<h6>" + f.waktu + "</h6>"
            +   "<p>"  + f.post  + "</p>"
            +   "</div>";
        });
        
        // Larangan untuk menjalankan perintah dalam fungsi ini lebih dari 1 kali
        e.preventDefault();
    });
});

})(jQuery);