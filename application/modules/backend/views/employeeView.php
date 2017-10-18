<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark"><button type="button" id="add_pegawai" class="btn btn-success">[ + ] tambah</button></h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <table id="table_pegawai" class="table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th width="230px">Action</th>
                                    <th width="50px">No</th>
                                    <th width="50px">ID</th>
                                    <th width="150px">NIP</th>
                                    <th width="150px">No KTP</th>
                                    <th width="150px">Nama</th>
                                    <th width="150px">Agama</th>
                                    <th width="150px">Pendidikan</th>
                                    <th width="150px">Tempat lahir</th>
                                    <th width="150px">Tanggal lahir</th>
                                    <th width="150px">Jenis Kelamin</th>
                                    <th width="150px">Alamat</th>
                                    <th width="150px">Telepon</th>
                                    <th width="150px">Email</th>
                                    <th width="150px">status</th>
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
</div>
<!-- /Row -->

<div class="modal fade" id="myModalAddJabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="close_modal_ad" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id="title_pegawai">Tambah pegawai</span></h4>
      </div>
      <div class="modal-body">
		<form id="frm">
        <div class="row">
		<div class="col-md-12">
		<br>
		Nama pegawai :
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<input type="text" class="form-control" id="nama">
		<input type="hidden" class="form-control" id="id_employee">
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<br>
		Jenis kelamin :
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<select class="form-control" id="jns">
		<option value=""></option>
		<option value="L">Laki-laki</option>
		<option value="P">Perempuan</option>
		</select>
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<br>
		Agama :
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<select class="form-control" id="agama">
		<option value=""></option>
		<option value="islam">Islam</option>
		<option value="kristen">Kristen</option>
		<option value="hindu">Hindu</option>
		<option value="budha">Budha</option>
		<option value="katolik">Katolik</option>
		<option value="konghucu">Konghucu</option>
		</select>
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<br>
		NIP :
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<input type="text" class="form-control" id="nip">
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<br>
		No KTP :
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<input type="text" class="form-control" id="nokktp">
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<br>
		Tempat lahir :
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<input type="text" class="form-control" id="tmp">
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<br>
		Tanggal lahir :
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<input type="date" class="form-control" id="tgl">
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<br>
		Alamat :
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<input type="text" class="form-control" id="al">
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
        <br>
        Pendidikan :
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<input type="text" class="form-control" id="edu">
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<br>
		Telepon :
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<input type="text" class="form-control" id="tel">
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<br>
		Email :
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<input type="text" class="form-control" id="em">
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<br>
		Status :
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<select name="" id="stat"  class="form-control">
		<option value=""></option>
		<option value="1">Aktif</option>
		<option value="2">Tidak Aktif</option>
		</select>
		</div>
		</div>

      </div>
      <div class="modal-footer">
		<div class="row">
		<div class="col-md-5" style="float:left">
		<span id="loading" style="display:none">
		loading ...
		</span>
		</div>
		<div class="col-md-3" style="float:right">
		<span id="print_d">
        <button type="button" class="btn btn-primary" id="simpan">Simpan</button>
		</span>
		</div>
		<div class="col-md-2" style="float:right">
        <button id="close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
		</form>
		</div>
      </div>
    </div>
  </div>
</div>

<button id="add_hidden" style="display:none" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalAddJabatan" data-backdrop="static">
		  Click
</button>
<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
		$(document).ready(function(){
		

		var employee = $('#table_pegawai').DataTable({ 
		scrollX: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('backend/employee/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });

	$("#add_pegawai").click(function(){
		$("#title_pegawai").text('Tambah pegawai');
		$("#loading").hide();
		$("#frm").trigger('reset');
		$("#add_hidden").click();
	});

	$("#simpan").click(function(){

		if($.trim($("#nama").val()).length<1){
			alert('Nama pegawai harus diisi!');
			return false;
		}

		var judul = $.trim($("#title_pegawai").text());
		if(judul=='Tambah pegawai'){
		$.ajax({
			type:"POST",
			error: function(){
				alert('Error!');
			},
			data:"jns="+$("#jns").val()+"&agama="+$("#agama").val()+"&nama="+$.trim($("#nama").val())+"&nip="+$.trim($("#nip").val())+"&nokktp="+$.trim($("#nokktp").val())+"&tmp="+$.trim($("#tmp").val())+"&tgl="+$.trim($("#tgl").val())+"&al="+$.trim($("#al").val())+"&tel="+$.trim($("#tel").val())+"&em="+$.trim($("#em").val())+"&stat="+$.trim($("#stat").val())+"&id_unit="+$.trim($("#idunit").val())+"&edu="+$.trim($("#edu").val()),
			url:"<?php echo base_url();?>backend/employee/insert",
			dataType:"json",
			beforeSend: function(){
				$("#loading").show();
			},
			success: function(data){
				if(data.error=='1'){
					alert(data.message);
					$("#loading").hide();
					}else{
						employee.ajax.reload();
						$("#close").click();
						$("#nj").val('');
						$("#loading").hide();
					}
			}
			});

		}else if(judul=='Edit pegawai'){

			var id = $.trim($("#id_employee").val());
			var nj = $.trim($("#nj").val());
			$.ajax({
			type:"POST",
			error: function(){
				alert('Error!');
			},
			beforeSend: function(){
				$("#loading").show();
			},
			data:"jns="+$("#jns").val()+"&agama="+$("#agama").val()+"&id_employee="+$("#id_employee").val()+"&nama="+$.trim($("#nama").val())+"&nip="+$.trim($("#nip").val())+"&nokktp="+$.trim($("#nokktp").val())+"&tmp="+$.trim($("#tmp").val())+"&tgl="+$.trim($("#tgl").val())+"&al="+$.trim($("#al").val())+"&tel="+$.trim($("#tel").val())+"&em="+$.trim($("#em").val())+"&stat="+$.trim($("#stat").val())+"&edu="+$.trim($("#edu").val()),
			url:"<?php echo base_url();?>backend/employee/update",
			success: function(){
				$("#loading").hide();
				$("#close").click();
				employee.ajax.reload();
			}
			});

		}

	});
	
	$(document).on("click","#delete_btn",function(){
		var id = $.trim($(this).attr("id_employee"));
		var nj = $.trim($(this).attr("nama_pegawai"));
		var c = confirm("Yakin hapus file ini?");

		if(c){

			$.ajax({
			type:"POST",
			error: function(){
				alert('Error!');
			},
			beforeSend: function(){
				$("#loading").show();
			},
			data:"id_employee="+id+"&nama_pegawai="+nj,
			url:"<?php echo base_url();?>backend/employee/delete",
			success: function(){
				$("#loading").show();
				employee.ajax.reload();
			}
			});

		}else{

		}
	});

	$(document).on("click","#edit_btn",function(){
		var ie = $.trim($(this).attr("id_employee"));
		var nip = $.trim($(this).attr("nip"));
		var ktp = $.trim($(this).attr("no_ktp"));
		var nama = $.trim($(this).attr("nama"));
		var tmp = $.trim($(this).attr("tmp"));
		var nj = $.trim($(this).attr("nama_employee"));
		var tel = $.trim($(this).attr("telepon"));
		var al = $.trim($(this).attr("alamat"));
		var em = $.trim($(this).attr("email"));
		var stat = $.trim($(this).attr("status"));
		var tl = $.trim($(this).attr("tgl"));
		var ag = $.trim($(this).attr("agama"));
		var jns = $.trim($(this).attr("jns"));
        var edu = $.trim($(this).attr("edu"));
		var idunit = $.trim($(this).attr("id_unit"));
		
		/*
		data:"id_employee="+id+"&nama="+$.trim($("#nama").val())+"&idjab="+$.trim($("#idjab").val())+"&iddept="+$.trim($("#iddept").val())+"&nip="+$.trim($("#nip").val())+"&nokktp="+$.trim($("#nokktp").val())+"&tmp="+$.trim($("#tmp").val())+"&tgl="+$.trim($("#tgl").val())+"&al="+$.trim($("#al").val())+"&tel="+$.trim($("#tel").val())+"&em="+$.trim($("#em").val())+"&stat="+$.trim($("#stat").val()),
		*/

		$("#title_pegawai").text('Edit pegawai');
		$("#id_employee").val(ie);
		$("#nama").val(nama);
		$("#agama").val(ag);
		$("#nip").val(nip);
		$("#nokktp").val(ktp);
		$("#tmp").val(tmp);
		$("#tgl").val(tl);
		$("#al").val(al);
		$("#tel").val(tel);
		$("#em").val(em);
		$("#jns").val(jns).change();
		$("#stat").val(stat);
        $("#edu").val(edu);
		$("#add_hidden").click();
	});


});
	</script>

