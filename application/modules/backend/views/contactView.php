<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/vendors/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="col-md-12">
                        <table width="100%" class="table-hover table-bordered table" id="table">
                            <thead>
                            <tr>
                                <th width="50px">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Subjek</th>
                                <th>Pesan</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>	
            </div>	
        </div>	
    </div>	


<div class="modal fade"  id="modalEmail" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <form id="frm" method="POST" action="">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span><i class="fa fa-envelope"></i></span></h4>
                </div>
                <div class="modal-body">

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" name="message" id="message">
                            Nama
                            <input type="text" id="name" name="name" placeholder="" class="form-control" readonly required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            Email
                            <input type="text" id="email" name="email" placeholder="" class="form-control" readonly required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            Subjek
                            <input type="text" id="phone" name="phone" placeholder="" class="form-control" readonly required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            Pesan
                            <textarea size="50" name="pesan" type="text" id="pesan" placeholder="" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="simpan" type="button" class="btn btn-primary">Save changes</button>
                </div>
             </form> 
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
	<!-- /.modal -->
</div>
<!-- DataTables -->
<script type="text/javascript">

    $(document).ready(function(){
      var table = $('#table').DataTable({ 
 
          "processing": true, //Feature control the processing indicator.
          "serverSide": true, //Feature control DataTables' server-side processing mode.
          "order": [], //Initial no order.
          // Load data for the table's condend from an Ajax source
          "ajax": {
              "url": "<?php echo base_url('backend/contact/ajax_list')?>",
              "type": "POST"
          },
   
          //Set column definition initialisation properties.
          "columnDefs": [
          { 
              "targets": [0,1,2,3,4,5], //first column / numbering column
              "orderable": false, //set not orderable
          },
          ],
   
      });

      $(document).on('click','#edit_btn',function(){
        var name = $(this).attr('name');
        var email = $(this).attr('email');
        var phone = $(this).attr('phone');
        var message = $(this).attr('message');

        $('#name').val(name);
        $('#email').val(email);
        $('#phone').val(phone);
        $('#message').val(message);
        $('#modalEmail').modal('show');
      });

      $('#simpan').on('click',function(){
            for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
            }
          var form = $('#frm').serialize();
          $.ajax({
            type : "POST",
            url     : "<?php echo base_url();?>backend/contact/send_pesan",
            dataType:'json',
            data : form,
            beforeSend: function(){
                $('#simpan').attr('disabled','disabled');
            },
            success: function(response,status){
                if(response.error=='1'){
                alert(response.msg);
                }else{
                alert("Pesan Berhasil Di Kirim");  
                $('#close').trigger('click');
                $('#simpan').removeAttr('disabled');
                    table.ajax.reload();
                }
            },
          });
      });
      

       


    $(document).on("click","#delete_btn",function(){
      var id_pesan = $.trim($(this).attr("id_pesan"));
      var c = confirm("Yakin hapus data ini?");

      if(c){
        $.ajax({
          type:"POST",
          error: function(){
            alert('Error!');
          },
          data:"id_pesan="+id_pesan,
          url:"<?php echo base_url();?>backend/contact/delete",
          dataType:"json",
          beforeSend: function(){
          $("#loading").show();
          },
          success: function(data){
            if(data.error=='1'){
              alert(data.message);
              $("#loading").hide();
            }else{
              table.ajax.reload();
              $("#close").click();
              $("#loading").hide();
            }
          }
        });
      }
    });

    });                   
</script>
<script src="<?php echo base_url();?>assets/backend/vendors/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/vendors/ckeditor/ckeditor.js"></script>
<script src="http://malsup.github.io/jquery.form.js"></script>
<script>
    CKEDITOR.replace('pesan');
</script>