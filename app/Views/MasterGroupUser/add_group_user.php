<form id="frmmastergroupuser" class="p-3">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group mb-5">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="group_cd" class="form-label">Group CD</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="group_cd" name="group_cd" placeholder="Enter Group CD">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group mb-5">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="descs" class="form-label">Description</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="descs" name="descs" placeholder="Enter Description">
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
                            <input class="form-check-input" type="radio" name="status" id="status_master-user_Y" value="Y" checked>
                            <label class="form-check-label" for="status_master-user_Y">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_master-user_N" value="N">
                            <label class="form-check-label" for="status_master-user_N">Inactive</label>
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
        var group_cd = $('#group_cd').val();
        var descs = $('#descs').val();
        var status = $('input[name="status"]:checked').val();

        // Cek apakah semua field sudah diisi
        if (group_cd == "" || descs == "" || status == "") {
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
            group_cd: group_cd,
            descs: descs,
            status: status
        };

        var actionUrl = '<?= base_url('add-master-group-user') ?>'; // Ganti dengan URL yang sesuai

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
            $('#group_cd').val('');
            $('#descs').val('');
            $('#status_master-user_Y').prop('checked', true);  // Default status Active
        } else {
            // Jika rowid ada, request data untuk mengedit
            $.ajax({
                url: '<?= base_url('get-master-group-user/') ?>' + rowid,
                type: 'GET',
                success: function(response) {
                    if (response.status === 'error') {
                        toastr.error(response.message);
                        return;
                    }
                    $('#group_cd').val(response[0].group_cd);
                    $('#descs').val(response[0].descs);
                    if (response[0].status == 'Y') {
                        $('#status_master-user_Y').prop('checked', true);
                    } else {
                        $('#status_master-user_N').prop('checked', true);
                    }
                }
            });
        }
    }
</script>