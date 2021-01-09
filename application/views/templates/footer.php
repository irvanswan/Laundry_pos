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
            $('table[name=cart] tr[name=list_data_pesan]').jAutoCalc({
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
    new AutoNumeric('#bayar, #harga_satuan', {
        decimalPlaces: '2',
        decimalCharacter: ',',
        digitGroupSeparator: '.'
    })

    $(function() {
        $(".btn_confirms").hide();
        $(document).on("keydown", "#no_telp_customer", function(e) {
            let keycode = e.keyCode || e.which;
            let teks = $(this).val();
            if (teks.length < 1) {
                if (keycode == 48) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return true;
            }
        });
        $(document).on("keyup", ".autofill", function() {
            let nama_customer = $(this).val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('admin/data_pemesanan') ?>',
                data: 'nama_customer=' + nama_customer,
                success: function(data) {
                    var json = data,
                        obj = JSON.parse(json);
                    $("#no_telp_customer").val(obj.no_telp_customer);
                    //$("#status").val(obj.status);
                },
            })
        });
        $(document).on("change", "#from-date", function() {
            const form = $(this).parents('form');
            let to = form.find("input[id=to-date]").val();
            filtering($(this).val(), to);
        });
        $(document).on("change", "#to-date", function() {
            const form = $(this).parents('form');
            let from = form.find("input[id=from-date]").val();
            filtering(from, $(this).val());
        });

        $(document).on("click", ".btn_edit", function() {
            const tr = $(this).parents('tr');
            tr.find("button[class~='btn_confirms']").show();
            tr.find("span[class~='caption']").hide();
            tr.find("button[class~='btn_edit']").hide();
            tr.find("input[class~='editor']").fadeIn().focus();
            tr.find("select[class~='editor']").fadeIn();
        });

        $(document).on("click", ".btn_confirms", function() {
            const tr = $(this).parents('tr');
            let id = $(this).attr("data-id");
            let data = {
                id: id
            };
            data.no_pemesanan = tr.find("input[name=no_pemesanan]").val();
            data.nama_customer = tr.find("input[name=nama_customer]").val();
            data.nama_kasir = tr.find("input[name=nama_kasir]").val();
            data.total_pemesanan = tr.find("input[name=total_pemesanan]").val();
            data.no_telp_customer = tr.find("input[name=no_telp_customer]").val();
            $.ajax({
                type: "post",
                cache: "false",
                data: data,
                url: "<?php echo base_url('admin/editpemesanan'); ?>",
                success: function() {
                    $(".editor").hide();
                    tr.find("button[class~=btn_confirms]").hide();
                    tr.find("button[class~=btn_edit]").fadeIn();
                    tr.find("span[name=no_pemesanan]").fadeIn().text(data.no_pemesanan);
                    tr.find("span[name=nama_customer]").fadeIn().text(data.nama_customer);
                    tr.find("span[name=nama_kasir]").fadeIn().text(data.nama_kasir);
                    tr.find("span[name = total_pemesanan]").fadeIn().text(data.total_pemesanan);
                    tr.find("span[name = no_telp_customer]").fadeIn().text(data.no_telp_customer);
                }
            })
        });
    });

    let filtering = (from, to) => {
        $.ajax({
            dataType: "json",
            method: "POST",
            cache: "false",
            data: {
                from_date: from,
                to_date: to
            },
            url: "<?php echo base_url('admin/filtering'); ?>",
            success: function(data) {
                let table = $("#list_pemesanan");
                let no = 1;
                let html = "";
                for (let i = 0; i < data.length; i++) {
                    html += "<tr class='data-row' id='data-row'>" +
                        "<td><span>" + no++ + "</span></td>" +
                        "<td>" +
                        "<span class='caption' name='no_pemesanan' data-id=" + data[i].id_pemesanan + ">" + data[i].no_pemesanan + "</span>" +
                        "<input type='text' name='no_pemesanan' class='editor' value=" + data[i].no_pemesanan + " data-id=" + data[i].id_pemesanan + " disabled>" +
                        "</td>" +
                        "<td>" +
                        "<span class='caption' name='nama_customer' data-id=" + data[i].id_pemesanan + ">" + data[i].nama_customer + "</span>" +
                        "<input type='text' name='nama_customer' value=" + data[i].nama_customer + " class='editor' data-id=" + data[i].id_pemesanan + ">" +
                        "</td>" +
                        "<td>" +
                        "<span class='caption' data-id=" + data[i].id_pemesanan + " name='nama_kasir'>" + data[i].nama_kasir + "</span>" +
                        "<input type='text' name='nama_kasir' value=" + data[i].nama_kasir + " class='editor' data-id=" + data[i].id_pemesanan + " disabled>" +
                        "</td>" +
                        "<td>" +
                        "<span class='caption' name='total_pemesanan' data-id=" + data[i].id_pemesanan + ">" + data[i].total_pemesanan + "</span>" +
                        "<input type='text' name='total_pemesanan' class='editor' value=" + data[i].total_pemesanan + " data-id=" + data[i].id_pemesanan + " disabled >" +
                        "</td>" +
                        "<td>" +
                        "<span class='caption' name='no_telp_customer' data-id=" + data[i].id_pemesanan + ">" + data[i].no_telp_customer + "</span>" +
                        "<input type='text' name='no_telp_customer' class='editor' data-id=" + data[i].id_pemesanan + " value=" + data[i].no_telp_customer + ">" +
                        "</td>" +
                        "<td>" +
                        "<div class='row'>" +
                        "<div class='col-sm-6 mb-1'>" +
                        "<form action='<?= base_url('admin/hapuspemesanan'); ?>' class='text-center' method='POST'>" +
                        "<input type='hidden' name='id_pemesanan' value=" + data[i].id_pemesanan + ">" +
                        "<button type='submit' class='btn btn-danger' data-toggle='tooltip' data-placement='top' title='Inactive' onclick='return confirm('Apakah anda yakin menghapus data ini ?');'>" +
                        "<i class='now-ui-icons ui-1_simple-remove'></i>" +
                        "</button>" +
                        "</form>" +
                        "</div>" +
                        "<div class='col-sm-6 mr-1'>" +
                        "<button type='submit' class='btn btn-warning btn_edit' title='Edit'>" +
                        "<i class='now-ui-icons ui-2_settings-90'></i>" +
                        "</button>" +
                        "<button type='submit' data-id=" + data[i].id_pemesanan + " class='btn btn-primary btn_confirms' id='btn_confirm' title='Edit'>" +
                        "<i class='now-ui-icons ui-1_check'></i>" +
                        "</button>" +
                        "</div>" +
                        "</div>" +
                        "</td>" +
                        "<td>" +
                        "<form action='<?= base_url('admin/printpemesanan'); ?>' class='text-center' method='POST'>" +
                        "<input type='hidden' name='id_pemesanan' value=" + data[i].id_pemesanan + ">" +
                        "<input type='hidden' name='no_pemesanan' value=" + data[i].no_pemesanan + ">" +
                        "<button type='submit' class='btn btn-success' data-toggle='tooltip' data-placement='top' title='Cetak Struk'>" +
                        "<i class='now-ui-icons files_paper'></i>" +
                        "</button>" +
                        "</form>" +
                        "</td>" +
                        "<td>" +
                        "<form action='' class='text-center'>" +
                        "<input type='hidden' name='' id=''>" +
                        "<button type='submit' class='btn btn-info' data-toggle='tooltip' data-placement='top' title='Cetak Struk'>" +
                        "<i class='now-ui-icons ui-1_send'></i>" +
                        "</button>" +
                        "</form>" +
                        "</td>" +
                        "<td>" +
                        "<button type='submit' class='btn btn-primary' title='Lihat' data-id="+data[i].id_pemesanan +">"+
                        "<i class='now-ui-icons ui-1_zoom-bold'></i>" +
                        "</button>" +
                        "</td>" +
                        "</tr>";
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