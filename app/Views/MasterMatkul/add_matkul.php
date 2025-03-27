<form id="frmmastermatkul" class="p-3">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group mb-5">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="matkul_cd" class="form-label">Matkul CD</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="matkul_cd" name="matkul_cd" placeholder="Enter Matkul CD">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group mb-5">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="matkul_descs" class="form-label">Matkul Descs</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="matkul_descs" name="matkul_descs" placeholder="Enter Matkul Descs">
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
                            <input class="form-check-input" type="radio" name="status" id="status_master-matkul_Y" value="Y" checked>
                            <label class="form-check-label" for="status_master-matkul_Y">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_master-matkul_N" value="N">
                            <label class="form-check-label" for="status_master-matkul_N">Inactive</label>
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
        var matkul_cd = $('#matkul_cd').val();
        var matkul_descs = $('#matkul_descs').val();
        var status = $('input[name="status"]:checked').val();

        // Cek apakah semua field sudah diisi
        if (matkul_cd == "" || matkul_descs == "" || status == "") {
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
            matkul_cd: matkul_cd,
            matkul_descs: matkul_descs,
            status: status
        };

        var actionUrl = '<?= base_url('add-master-matkul') ?>'; // Ganti dengan URL yang sesuai

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
            $('#matkul_cd').val('');
            $('#matkul_descs').val('');
            $('#status_master-matkul_Y').prop('checked', true);  // Default status Active
        } else {
            // Jika rowid ada, request data untuk mengedit
            $.ajax({
                url: '<?= base_url('get-master-matkul/') ?>' + rowid,
                type: 'GET',
                success: function(response) {
                    if (response.status === 'error') {
                        toastr.error(response.message);
                        return;
                    }

                    $('#matkul_cd').val(response[0].matkul_cd);
                    $('#matkul_descs').val(response[0].matkul_descs);
                    if (response[0].status == 'Y') {
                        $('#status_master-matkul_Y').prop('checked', true);
                    } else {
                        $('#status_master-matkul_N').prop('checked', true);
                    }
                }
            });
        }
    }
</script>