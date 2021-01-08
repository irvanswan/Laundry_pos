<!-- Ngikut footer -->
</div>
</div>


<script src="<?= base_url('assets/js/core/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/core/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/core/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js'); ?>"></script>

<script src="<?= base_url('assets/js/plugins/chartjs.min.js'); ?>"></script>

<script src="<?= base_url('assets/js/plugins/bootstrap-notify.js'); ?>"></script>

<script src="<?= base_url('assets/js/autoNumeric.js'); ?>"></script>
<script src="<?= base_url('assets/js/autoNumeric.min.js'); ?>"></script>

<script src="<?= base_url('assets/js/now-ui-dashboard.min.js?v=1.5.0'); ?>" type="text/javascript"></script>

<script type="text/javascript" charset="utf8" src="<?= base_url('assets/js/datatables.js'); ?>"></script>

<script type="text/javascript" charset="utf8" src="<?= base_url('assets/js/jautocalc.js'); ?>"></script>

<script src="<?= base_url('assets/js/script.js'); ?>"></script>

<script type="text/javascript">
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    // ------- datatables ---------
    $(document).ready(function() {
        
    });
    $(document).ready(function() {
        $('#list_pemesanan').DataTable();
    });
    $(document).ready(function() {
        $('#omzet_this').DataTable();
    });
    $(document).ready(function() {
        $('#ongkos_this').DataTable();
    });
    $(document).ready(function() {
        $('#customer_this').DataTable();
    });
    // ------- datatables ---------
    $(document).ready(function() {
        $(".editor").hide();
        function autoCalcSetup() {
            $('form[name=cart]').jAutoCalc('destroy');
            $('form[name=cart] tr[name=line_items]').jAutoCalc({
                keyEventsFire: true,
                decimalPlaces: 2,
                thousandOpts: ['.'],
                decimalOpts: [','],
                emptyAsZero: true
            });
            $('form[name=cart]').jAutoCalc({
                decimalPlaces: 2
            });
        }
        autoCalcSetup();

        $('button[name=remove]').click(function(e) {
            e.preventDefault();

            var from = $(this).parents('form');
            $(this).parents('tr').remove();
            autoCalcSetup();
        });

        $('button[name=add]').click(function(e) {
            e.preventDefault();

            var $table = $(this).parents('table');
            var $top = $table.find('tr[name=line_items]').first();
            var $new = $top.clone(true);

            $new.jAutoCalc('destroy');
            $new.insertBefore($top);
            $new.find('input[type=text]').val('');
            $new.find('input[type=text]')
            autoCalcSetup();
        })

    });
    new AutoNumeric('#bayar', {
        decimalPlaces: '2',
        decimalCharacter: ',',
        digitGroupSeparator: '.'
    })

$(function(){
    $(".btn_confirms").hide();
    $(document).on("keydown","#no_telp_customer",function(e){
        let keycode = e.keyCode || e.which;
        let teks = $(this).val();
       if(teks.length < 1){
            if(keycode == 48){
                return false;
            }else{
                return true;
            }
       }else{
            return true;
       }
    });
    $(document).on("keyup",".autofill",function(){
        let nama_customer = $(this).val();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('admin/data_pemesanan') ?>',
            data: 'nama_customer=' + nama_customer,
            success: function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $("#no_telp_customer").val(obj.no_telp_customer);
                $("#status").val(obj.status);
            },
        })
    });
    $(document).on("change","#from-date",function(){
        const form = $(this).parents('form');
        let to = form.find("input[id=to-date]").val();
        filtering($(this).val(),to);
    });
    $(document).on("change","#to-date",function(){
        const form = $(this).parents('form');
        let from = form.find("input[id=from-date]").val();
        filtering(from,$(this).val());
    });

    $(document).on("click",".btn_edit",function(){
        const tr = $(this).parents('tr');
        /*let paket_cucian = tr.find('span[name=paket_cucian]').html();
        let jenis_cucian = tr.find('span[name=jenis_cucian]').html();
        let parfum_cucian = tr.find('span[name=parfum_cucian]').html();*/ 
        tr.find("button[class~='btn_confirms']").show();
        tr.find("span[class~='caption']").hide();
        tr.find("button[class~='btn_edit']").hide();
        tr.find("input[class~='editor']").fadeIn().focus();
        tr.find("select[class~='editor']").fadeIn();
    });

    $(document).on("click",".btn_confirms",function(){
        const tr = $(this).parents('tr');
        let id = $(this).attr("data-id");
        let data = {id:id};
        data.no_pemesanan = tr.find("input[name=no_pemesanan]").val();
        data.nama_customer = tr.find("input[name=nama_customer]").val();
        data.nama_kasir = tr.find("input[name=nama_kasir]").val();
        data.jenis_cucian = tr.find("select[name=jenis_cucian]").val();
        data.paket_cucian = tr.find("select[name=paket_cucian]").val();
        data.berat_cucian = tr.find("input[name=berat_cucian]").val();
        data.parfum_cucian = tr.find("select[name=parfum_cucian]").val();
        data.total_pemesanan = tr.find("input[name=total_pemesanan]").val();
        data.no_telp_customer = tr.find("input[name=no_telp_customer]").val();
        data.status = tr.find("select[name=status]").val();
        $.ajax({
            type : "post",
            cache : "false",
            data : data,
            url:"<?php echo base_url('admin/editpemesanan'); ?>",
            success : function(){
                $(".editor").hide();
                tr.find("button[class~=btn_confirms]").hide();
                tr.find("button[class~=btn_edit]").fadeIn();
                tr.find("span[name=no_pemesanan]").fadeIn().text(data.no_pemesanan);
                tr.find("span[name=nama_customer]").fadeIn().text(data.nama_customer);
                tr.find("span[name=nama_kasir]").fadeIn().text(data.nama_kasir);
                tr.find("span[name = jenis_cucian]").fadeIn().text(data.jenis_cucian);
                tr.find("span[name = paket_cucian]").fadeIn().text(data.paket_cucian);
                tr.find("span[name = berat_cucian]").fadeIn().text(data.berat_cucian);
                tr.find("span[name = parfum_cucian]").fadeIn().text(data.parfum_cucian);
                tr.find("span[name = total_pemesanan]").fadeIn().text(data.total_pemesanan);
                tr.find("span[name = no_telp_customer]").fadeIn().text(data.no_telp_customer);
                  tr.find("span[name = status]").fadeIn().text(data.status);
            }
        })
    });
});

let filtering = (from,to)=>{
    $.ajax({
        dataType : "json",
        method : "POST",
        cache : "false",
        data : {from_date : from, to_date : to},
        url : "<?php  echo base_url('admin/filtering'); ?>",
        success : function(data){
            let table = $("#list_pemesanan");
            let no = 1;
            let html = "";
            for (let i=0; i<data.length;i++){
                  html += "<tr class='data-row' id='data-row'>"
                                    +"<td><span>"+no++ +"</span></td>"
                                    +"<td>"
                                        +"<span class='caption' name='no_pemesanan' data-id="+data[i].id_pemesanan+">"+data[i].no_pemesanan+"</span>"
                                        +"<input type='text' name='no_pemesanan' class='editor' value="+data[i].no_pemesanan+" data-id="+data[i].id_pemesanan+" disabled>"
                                    +"</td>"
                                    +"<td>"
                                        +"<span class='caption' name='nama_customer' data-id="+data[i].id_pemesanan+">"+data[i].nama_customer+"</span>"
                                        +"<input type='text' name='nama_customer' value="+data[i].nama_customer+" class='editor' data-id="+data[i].id_pemesanan+" disabled>"
                                    +"</td>"
                                    +"<td>"
                                        +"<span class='caption' data-id="+data[i].id_pemesanan+" name='nama_kasir'>"+data[i].nama_kasir+"</span>"
                                        +"<input type='text' name='nama_kasir' value="+data[i].nama_kasir+" class='editor' data-id="+data[i].id_pemesanan+" disabled>"
                                    +"</td>"
                                    +"<td>"
                                        +"<span class='caption' data-id="+data[i].id_pemesanan+" name='jenis_cucian'>"+data[i].jenis_cucian+"</span>"
                                        +"<select name='jenis_cucian' class='editor' id='jenis_cucian1'>"
                                            +"<option value="+data[i].jenis_cucian+">"+data[i].jenis_cucian+"</option>"
                                            +"<option value='1000'>Jenis A (1000)</option>"
                                            +"<option value='2000'>Jenis B (2000)</option>"
                                        +"</select>"
                                    +"</td>"
                                    +"<td>"
                                        +"<span class='caption' data-id="+data[i].id_pemesanan+"  name='paket_cucian'>"+data[i].paket_cucian+"</span>"
                                       +"<select name='paket_cucian' class='editor' id='paket_cucian1'>"
                                            +"<option value="+data[i].paket_cucian+">"+data[i].paket_cucian+"</option>"
                                            +"<option value='1000'>Paket A (1000)</option>"
                                            +"<option value='2000'>Paket B (2000)</option>"
                                        +"</select>"
                                    +"</td>"
                                    +"<td>"
                                        +"<span class='caption' data-id="+data[i].id_pemesanan+" name='berat_cucian'>"+data[i].berat_cucian+"</span>"
                                        +"<input type='number' name='berat_cucian' class='editor' value="+data[i].berat_cucian+" data-id="+data[i].id_pemesanan+" id='berat_cucian1' min=0>"
                                    +"</td>"
                                    +"<td>"
                                        +"<span class='caption' name='parfum_cucian' data-id="+data[i].id_pemesanan+">"+data[i].parfum_cucian+"</span>"
                                        +"<select name='parfum_cucian' class='editor' id='parfum_cucian1'>"
                                            +"<option value="+data[i].berat_cucian+">"+data[i].berat_cucian+"</option>"
                                            +"<option value='1000'>Parfum A</option>"
                                            +"<option value='2000'>Parfum B</option>"
                                        +"</select>"
                                    +"</td>"
                                    +"<td>"
                                        +"<span class='caption' name='total_pemesanan' data-id="+data[i].id_pemesanan+">"+data[i].total_pemesanan+"</span>"
                                        +"<input type='text' name='total_pemesanan' class='editor' value="+data[i].total_pemesanan+" data-id="+data[i].id_pemesanan+">"
                                    +"</td>"
                                    +"<td>"
                                        +"<span class='caption' name='no_telp_customer' data-id="+data[i].id_pemesanan+">"+data[i].no_telp_customer+"</span>"
                                        +"<input type='text' name='no_telp_customer' class='editor' data-id="+data[i].id_pemesanan+" value="+data[i].no_telp_customer+">"
                                    +"</td>"
                                    +"<td>"
                                        +"<span class='caption' name='status' data-id="+data[i].id_pemesanan+">"+data[i].status+"</span>"
                                        +"<select name='status' class='editor'>"
                                            +"<option value="+data[i].status+">"+data[i].status+"</option>"
                                            +"<option value='tunggu'>Tunggu</option>"
                                            +"<option value='cuci'>Cuci - Siap Ambil</option>"
                                            +"<option value='dryer'>Dryer - Siap Ambil</option>"
                                            +"<option value='setrika'>Setrika - Siap Ambil</option>"
                                            +"<option value='selesai'>Selesai</option>"
                                        +"</select>"
                                    +"</td>"
                                    +"<td>"
                                        +"<div class='row'>"
                                            +"<div class='col-sm-6 mb-1'>"
                                                +"<form action='<?= base_url('admin/hapuspemesanan'); ?>' class='text-center' method='POST'>"
                                                    +"<input type='hidden' name='id_pemesanan' value="+data[i].id_pemesanan+">"
                                                    +"<button type='submit' class='btn btn-danger' data-toggle='tooltip' data-placement='top' title='Inactive' onclick='return confirm('Apakah anda yakin menghapus data ini ?');'>"
                                                        +"<i class='now-ui-icons ui-1_simple-remove'></i>"
                                                    +"</button>"
                                                +"</form>"
                                            +"</div>"
                                            +"<div class='col-sm-6 mr-1'>"
                                                +"<button type='submit' class='btn btn-warning btn_edit' title='Edit'>"
                                                    +"<i class='now-ui-icons ui-2_settings-90'></i>"
                                                +"</button>"
                                                +"<button type='submit' data-id="+data[i].id_pemesanan+" class='btn btn-primary btn_confirms' id='btn_confirm' title='Edit'>"
                                                    +"<i class='now-ui-icons ui-1_check'></i>"
                                                +"</button>"
                                            +"</div>"
                                        +"</div>"
                                    +"</td>"
                                    +"<td>"
                                        +"<form action='<?= base_url('admin/printpemesanan'); ?>' class='text-center' method='POST'>"
                                            +"<input type='hidden' name='id_pemesanan' value="+data[i].id_pemesanan+">"
                                            +"<input type='hidden' name='no_pemesanan' value="+data[i].no_pemesanan+">"
                                            +"<button type='submit' class='btn btn-success' data-toggle='tooltip' data-placement='top' title='Cetak Struk'>"
                                                +"<i class='now-ui-icons files_paper'></i>"
                                            +"</button>"
                                        +"</form>"
                                    +"</td>"
                                    +"<td>"
                                        +"<form action='' class='text-center'>"
                                            +"<input type='hidden' name='' id=''>"
                                            +"<button type='submit' class='btn btn-info' data-toggle='tooltip' data-placement='top' title='Cetak Struk'>"
                                                +"<i class='now-ui-icons ui-1_send'></i>"
                                            +"</button>"
                                        +"</form>"
                                    +"</td>"
                                +"</tr>";
              }
              newtr = table.find("tbody[class=table-body]");
              newtr.html(html);
              newtr.find($(".editor")).hide();
              newtr.find($(".btn_confirms")).hide();   
        },
    });
}
</script>
</body>

</html>