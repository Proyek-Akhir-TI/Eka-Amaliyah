
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 
 
    


 <script src="<?php echo base_url();?>assets/js/datamask/dist/jquery.mask.min.js"></script>
 
<script src="<?php echo base_url();?>assets/themabaru/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/themabaru/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/themabaru/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url();?>assets/themabaru/js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?php echo base_url();?>assets/themabaru/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>assets/themabaru/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="<?php echo base_url();?>assets/datepicker/js/bootstrap-datepicker.js"></script>

  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });

     $(function () {

        //Date range picker
        $('#datepicker').datepicker({
          format: 'yyyy-mm-dd',
          defaultViewDate: {year:1945, month:0, day:1},
          clearBtn: true,
          todayBtn: true,
          todayHighlight: true,
          useCurrent: true,
        });
      });

     $(function () {

        //Date range picker
        $('#datepicker_pembayaran').datepicker({
          format: 'yyyy-mm-dd',
          clearBtn: true,
          todayBtn: true,
          todayHighlight: true,
          useCurrent: true,
        });
      });

     $(function () {

        //Date range picker
        $('#datepicker_pembayaran_akhir').datepicker({
          format: 'yyyy-mm-dd',
          clearBtn: true,
          todayBtn: true,
          todayHighlight: true,
          useCurrent: true,
        });
      });


     $("#success-alert").fadeTo(2000, 700).slideUp(700, function(){
    $("#success-alert").slideUp(700);
  });
  </script>

</body>

</html>