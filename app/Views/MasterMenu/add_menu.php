<form id="frmmastermenu" class="p-3">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group mb-5">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="menu_cd" class="form-label">Menu CD</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="menu_cd" name="menu_cd" placeholder="Enter Menu CD">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group mb-5">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="title" class="form-label">Title</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group mb-5">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="url" class="form-label">URL</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group mb-5">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="parent_menucd" class="form-label">Menu Parent</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="parent_menucd" name="parent_menucd" placeholder="Enter Parent Menu CD">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group mb-5">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="icon" class="form-label">Icon</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Enter Icon">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group mb-5">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="order_seq" class="form-label">Order Sequence</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="order_seq" name="order_seq" placeholder="Enter Order Sequence">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group mb-5">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="status" class="form-label">Status</label>
                    </div>
                    <div class="col-md-7">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_master-menu_Y" value="Y" checked>
                            <label class="form-check-label" for="status_master-menu_Y">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_master-menu_N" value="N">
                            <label class="form-check-label" for="status_master-menu_N">Inactive</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        var rowid = $('#modal').data('rowid');

        if (rowid != 0) {
            loadData();
        }
    });

    $('#savefrm').on('click', function(e) {
        e.preventDefault();
        var rowid = $('#modal').data('rowid');
        var menu_cd = $('#menu_cd').val();
        var title = $('#title').val();
        var url = $('#url').val();
        var parent_menucd = $('#parent_menucd').val();
        var icon = $('#icon').val();
        var order_seq = $('#order_seq').val();
        var status = $('input[name="status"]:checked').val();

        // Cek apakah semua field sudah diisi
        if (menu_cd == "" || title == "" || url == "" || parent_menucd == "" || icon == "" || order_seq == "" || status == "") {
            toastr.error('All fields must be filled!');
            return;  // Jangan lanjutkan eksekusi
        }

        // Menyembunyikan indikator dan menampilkan spinner
        $('.indicator-label').hide();
        $('.indicator-progress').show();

        // Menonaktifkan tombol Save untuk mencegah klik ganda
        $('#savefrm').prop('disabled', true);

        var formData = {
            rowid: rowid,
            menu_cd: menu_cd,
            title: title,
            url: url,
            parent_menucd: parent_menucd,
            icon: icon,
            order_seq: order_seq,
            status: status
        };

        var actionUrl = '<?= base_url('add-master-menu') ?>'; // Ganti dengan URL yang sesuai

        // Kirim request AJAX
        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.status === 'success') {
                    toastr.success(response.message);
                    location.reload();  // Reload halaman setelah berhasil
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                toastr.error('An error occurred while sending the request.');
            },
            complete: function() {
                // Mengembalikan status tombol setelah selesai
                $('#savefrm').prop('disabled', false);
                $('.indicator-label').show();
                $('.indicator-progress').hide();
            }
        });
    });

    // Fungsi untuk memuat data jika ada rowid
    function loadData() {
        var rowid = $('#modal').data('rowid');

        if (rowid === 0) {
            // Jika rowid adalah 0, reset form untuk tambah data
            $('#menu_cd').val('');
            $('#title').val('');
            $('#url').val('');
            $('#parent_menucd').val('');
            $('#icon').val('');
            $('#order_seq').val('');
            $('#status_master-menu_Y').prop('checked', true);  // Default status Active
        } else {
            // Jika rowid ada, request data untuk mengedit
            $.ajax({
                url: '<?= base_url('get-master-menu/') ?>' + rowid,
                type: 'GET',
                success: function(response) {
                    if (response.status === 'error') {
                        toastr.error(response.message);
                        return;
                    }

                    $('#menu_cd').val(response[0].menu_cd);
                    $('#title').val(response[0].title);
                    $('#url').val(response[0].url);
                    $('#parent_menucd').val(response[0].parent_menucd);
                    $('#icon').val(response[0].icon);
                    $('#order_seq').val(response[0].order_seq);
                    if (response[0].status == 'Y') {
                        $('#status_master-menu_Y').prop('checked', true);
                    } else {
                        $('#status_master-menu_N').prop('checked', true);
                    }
                }
            });
        }
    }
</script>