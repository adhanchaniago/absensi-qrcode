        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; 2020 <a href="https://undhirabali.ac.id" target="_blank">Universitas Dhyana Pura Bali</a>. All Rights Reserved.</p>
            </div>
        </footer>
        </div>
        <!-- END WRAPPER -->
        <!-- Javascript -->
        <script src="<?php echo $linkglobal; ?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo $linkglobal; ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo $linkglobal; ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo $linkglobal; ?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
        <script src="<?php echo $linkglobal; ?>assets/vendor/chartist/js/chartist.min.js"></script>
        <script src="<?php echo $linkglobal; ?>assets/scripts/klorofil-common.js"></script>
        <script>
            Tanya = () => {
                if(confirm("Yakin akan Mengahpus Data Ini??")){
                    return true;
                }else{
                    return false;
                }
            }

            GetMataKuliahByDosen = () =>{
                let dosen = $("#dosen").val();
                $.post(
                    "<?php echo $linkglobal; ?>ajax/getmatakuliahbydosen.php",
                    {
                        dosen:dosen
                    },
                    (data) => {
                        $("#matakuliah").html(data);
                    }
                );
            }

            GoToMhs = () =>{
                let vCount = $("#count").val();
                if(vCount==="" || vCount==0){
                    alert("Jumlah Tidask Boleh Kosong atau 0");
                }else{
                    document.location="<?php echo $linkglobal; ?>page/mahasiswa/add.php?jml="+vCount
                }
               
            }

        </script>
        </body>

        </html>