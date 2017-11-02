<?php echo form_open('backend/courses/simpanPelajaran', "method='post', class='form form-horizontal' id='simpanformModal'")?>
<input type="hidden" name="id_coursesModal" id="id_coursesModal" value="<?php echo $idcourses;?>">
<div class="form-group">
    <label for="recipient-name" class="control-label mb-10">pelajaran </label>
    <select class="form-control"  name="id_lesson" id="id_lesson" required>
        <option value=""></option>
    </select>
</div>
<button type="submit" class="btn btn-success btn-xs" id="simpanPelajaran">Simpan</button>
</form>
<hr>
<table id="dataemployee" class="table table-hover">
    <thead>
    <tr>
    <th>No.</th>
    <th>Aksi</th>
    <th>Judul Pelajaran</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    $i = 1;
    foreach ($pelajaran as $de)
    {
    echo "<tr>";
    echo "<td style='background-color:rgba(136, 135, 135, 0.32);'>".$i."</td>";
    echo "<td><i id_courses=".$de['id_courses']." id_lesson=".$de['id_lesson']." class='btn btn-danger btn-sm fa fa-trash hapusPelajaranModal' title='Hapus'></i></td>";
    echo "<td>".$de['title_lesson']."</td>";
   echo "</tr>";
    $i++;
    }
    ?>     
    </tbody>
</table>
<script>
    $(document).ready(function(){
        $("#id_lesson").select2({
		    minimumInputLength: 3,
		    minimumResultsForSearch: 10,
		    ajax: {
				cache: true,
		        url: "<?php echo base_url();?>backend/courses/lesson_list",
		        dataType: "json",
		        type: "GET",
		        data: function (params) {

		            var queryParameters = {
		                term: params.term
		            }
		            return queryParameters;
		        },
		        processResults: function (data) {
		            return {
		                results: $.map(data, function (item) {
		                    return {
		                        text: item.itemName,
		                        id: item.id
		                    }
		                })
		            };
		        }
		    }
		});
    });
</script>