(function(x){

// U, url baca data [string URL]
// T, target HTML [$(selector)]
// S, struktur HTML [function(e){ e.judul; e.waktu,.. dsb. return <string>}]
// M, metode [string POST / GET], default : GET
var 
async = (function(U, Berhasil, Error){
    var request = x.ajax( {
        // alamat URL data
        url         :  U.url,
        // method [POST, GET]
        method      : (U.method || 'GET'),
        // dataType [text, html, xml, json, jsonp, script]
        dataType    : (U.type || 'text')
    } );

    // jika data didapatkan dan sukses
    request.done(function(d) {
        Berhasil(d);
    });

    request.error(function(e) {
        if(typeof Error === 'function'){
            Error(e);
        }else{
            alert( "error" + e.responseText );
            alert( "error" + e.readyState );
        }
    });
}),
halaman = ({
    // Switch sederhana
    jalurAktif : 0,
    // a : target
    // u : URL
    // j : jalurAktif
    // cb : callback
    
    // memanggil async fungsi kemudian dapatkan tulisan pada html tersebut.
    method  : (function(a, u, j, cb, err){

        // jika jalurAktif bukan saat ini, maka jangan lakukan perintah didalamnya
        if(this.jalurAktif != j){ 
            async({
                url         : u,
                dataType    : 'html'
            }, 
            // Jika Berhasil
            function(e){
                a.html(e).hide().fadeIn(500);
                if(typeof cb === 'function'){ cb(); }
            }, 
            // Jika Gagal
            function(e){
                if(typeof err === 'function'){
                    err(e);
                }else{
                    a.html('<div class="row"><div class="box"><div class="col-lg-12"><center><h1>Ups :(</h1><p>Terdapat kesalahan saat ingin menjalankan perintah, silahkan coba lagi.</p><i>untuk lebih lengkapnya, silahkan lihat console pada halaman ini</i></center></div></div></div>');
                    console.log('Kemungkinan terjadi galat :\n - Sambungan internet anda terputus\n - Halaman sedang melakukan perbaikan dan perawatan situs\n# Jika kesalahan ini masih berlanjut, silahkan hubungi administrator.');
                }
            });
            this.jalurAktif = j;
        }
    }),

    // Halaman Muka
    muka    : (function(a){ // jalurAktif : 1
        this.method(a, '_bagian/_homepage.html', 1);
    }),

    // Halaman Jadwal Solat
    jSolat  : (function(a){ // jalurAktif : 2
        this.method(a, '_bagian/_jadwal_solat.html', 2, function(){
            komponen.jadwalSolat(a.find('[ajax="jadwalsolat"] > tbody'),function(e, i){
                return '<tr>'
                +           '<td>' + (++i) + '</td>'
                +           '<td>' + e.tanggal + '</td>'
                +           '<td>' + e.waktu.i + '</td>'
                +           '<td>' + e.waktu.s + '</td>'
                +           '<td>' + e.waktu.z + '</td>'
                +           '<td>' + e.waktu.a + '</td>'
                +           '<td>' + e.waktu.m + '</td>'
                +           '<td>' + e.waktu.y + '</td>'
                +      '</tr>';
            });
        })
    }),

    // Halaman Tips
    tips    : (function(a){ // jalurAktif : 3
        this.method(a, '_bagian/_tips.html', 3, function(){
            var halaman = 0
            ,   data = (function(halaman){
                komponen.tips(a.find('[ajax="tips"]'), { 'hal' : halaman } ,function(e,i){
                    return '<div class="col-lg-12 text-center">'
                    +           '<img class="img-responsive img-border img-full" src="' + e.isi.foto + '" alt="">'
                    +           '<h2>' + e.isi.judul + '<br><small>' + e.tanggal + '</small></h2>'
                    +           '<p>' + e.isi.post + '</p>'
                    +           '<a href="#" class="btn btn-default btn-lg">Read More</a>'
                    +           '<hr>'
                    +       '</div>';
                    })
            });
            data(halaman);
            x('[trigger="more"]').off('click').on('click', function(){
                data(++halaman);
                return false;
            })
        })
    })
}),
komponen = ({
    method      : (function(u, cb){
        async({
            url         : u,
            dataType    : 'JSON'
        }, function(e){
            // Callback if async is success
            if(typeof cb === 'function'){ cb(e); }
        })
    }),
    jadwalSolat : (function(a, cb){
        this.method('INTI/data.php?data=jadwalsolat', function(e){
            try{
                var d = eval('(' + e + ')'),
                    e = d.JadwalSolat;
                for(i=0;i<e.length;i++){
                    if(typeof cb === 'function'){
                        x(cb(e[i], i)).appendTo(a).hide().delay(100*i).fadeIn(500);
                    }else{
                        console.log(e[i]);
                    }
                }
            }catch(e){
                console.log('kesalahan pada ajax jadwalsolat >> ' + e);
            }
        })
    }),
    tips        : (function(a, p, cb){
        var hal = p.hal || 0,
            max = p.max || 2;
        this.method('INTI/data.php?data=tipsramadhan&max=' + max + '&hal=' + hal , function(e){
            try{
                var d = eval('(' + e + ')'),
                    e = d.Tips;
                    if(typeof cb === 'function'){
                        for(i=0;i<e.length;i++){
                            x(cb(e[i], i)).appendTo(a).hide().delay(500*i).fadeIn(500);
                        }
                        if( e.length < max && (!(a.find('h2.information').length)) )
                            x('<h2 class="information">Akhir Posting.</h2>').appendTo(a).hide().fadeIn(500);
                    }else{
                            console.log(e[i]);
                    }
            }catch(e){
                console.log('kesalahan pada ajax tips >>> ' + e);
            }
        })
    })
});



x(function(){
    halaman.muka(x('[ajax="page"]'));
    x('[trigger="home"]').on('click', function(e){
        // eksekusi fungsi Posting();
        halaman.muka(x('[ajax="page"]'));
        // Larangan untuk menjalankan perintah dalam fungsi ini lebih dari 1 kali
        e.preventDefault();
        return false;
    });
    x('[trigger="jadwal_solat"]').on('click', function(e){
        // eksekusi fungsi Posting();
        halaman.jSolat(x('[ajax="page"]'));
        // Larangan untuk menjalankan perintah dalam fungsi ini lebih dari 1 kali
        e.preventDefault();
        return false;
    });
    x('[trigger="tips"]').on('click', function(e){
        // eksekusi fungsi Posting();
        halaman.tips(x('[ajax="page"]'));
        // Larangan untuk menjalankan perintah dalam fungsi ini lebih dari 1 kali
        e.preventDefault();
        return false;
    });
});

})(jQuery);