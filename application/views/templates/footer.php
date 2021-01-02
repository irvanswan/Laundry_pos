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
    $(document).on("keyup",".autofill",function(){
        let nama_customer = $(this).val();
        $.ajax({
            type: 'GET',
            url: '<?= base_url('admin/data_pemesanan') ?>',
            data: 'nama_customer=' + nama_customer,
            success: function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $("#no_pemesanan").val(obj.no_pemesanan);
                $("#no_telp_customer").val(obj.no_telp_customer);
                $("#status").val(obj.status);
            },
        })
    });

    $(document).on("click",".btn_edit",function(){
        const tr = $(this).parents('tr');
        tr.find("button[class~='btn_confirms']").show();
        tr.find("span[class~='caption']").hide();
        tr.find("button[class~='btn_edit']").hide();
        tr.find("input[class~='editor']").fadeIn().focus();
    });

    $(document).on("click",".btn_confirms",function(){
        const tr = $(this).parents('tr');
        let id = $(this).attr("data-id");
        let data = {id:id};
        data.no_pemesanan = tr.find("input[name=no_pemesanan]").val();
        data.nama_customer = tr.find("input[name=nama_customer]").val();
        data.nama_kasir = tr.find("input[name=nama_kasir]").val();
        data.jenis_cucian = tr.find("input[name=jenis_cucian]").val();
        data.paket_cucian = tr.find("input[name=paket_cucian]").val();
        data.berat_cucian = tr.find("input[name=berat_cucian]").val();
        data.parfum_cucian = tr.find("input[name=parfum_cucian]").val();
        data.total_pemesanan = tr.find("input[name=total_pemesanan]").val();
        data.no_telp_customer = tr.find("input[name=no_telp_customer]").val();
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
            }
        })
    });
});
</script>
</body>

</html>