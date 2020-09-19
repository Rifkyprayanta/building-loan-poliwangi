    <!-- membuat id nnti tampil di bawah sesuai javascriptnya -->
    <div id="myfirstchart" style="height: 250px;"></div>
    
    <!-- memanggil assets script untuk menjalankan grafik morris bar nya -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        new Morris.Bar({
    //script untuk membuat chart, elemen untuk memanggil sesuai id diatas, data adalah apa yang ditampilkan di halaman depan, xkey = ket sumbu x, label adalah label yang di hover mouse
    element: 'myfirstchart',
    data: <?php echo $data;?>,
          xkey: 'status',
          ykeys: ['jumlah'],
          labels: ['Total']
    });
    </script>