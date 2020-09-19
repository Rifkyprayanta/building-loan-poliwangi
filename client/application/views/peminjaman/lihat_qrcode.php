<!-- untuk menampilkan gambar qr code yang dihasilkan dari peminjaman -->
<?php $no=1; foreach($peminjaman as $a)
          { ?>
<img src="<?php echo base_url().'assets/images/'.$a->qr_code;?>">

<?php } ?>