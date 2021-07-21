$(function() {

    $('.tombolTambahData').on('click', function() {

        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Simpan Data');
        $('.modal-body form').attr('action', 'http://localhost:8080/mvc-php/public/mahasiswa/tambah');
        
        $('#nama').val('');
        $('#nim').val('')
        $('#prodi').val('');
        $('#email').val('');
        console.log('tes tombol tambah');
    });

    $('.tampilModalUbah').on('click', function() {
        
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost:8080/mvc-php/public/mahasiswa/ubah');

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost:8080/mvc-php/public/mahasiswa/getUbah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#prodi').val(data.prodi);
                $('#email').val(data.email);
                $('#id').val(data.id);
            }
        });

    });

});