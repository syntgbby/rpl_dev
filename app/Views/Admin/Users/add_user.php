<form id="frmusers" class="p-3">
    <div class="row">
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="name" class="form-label">Name</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="group_cd" class="form-label">Group CD</label>
                    </div>
                    <div class="col-md-7">
                        <!--begin::Input-->
                        <select required class="form-select form-select-md form-select-solid text-sm h-40px" data-control="select2" name="group_cd" id="group_cd" data-placeholder="Pilih Group Cd">
                            <option></option>
                            <?php foreach ($group as $row) : ?>
                                <option value="<?= $row['group_cd'] ?>"><?= $row['group_cd'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!--end::Input-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="fv-row mb-8">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <label for="status" class="form-label">Status</label>
                    </div>
                    <div class="col-md-7">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_user_Y" value="Y">
                            <label class="form-check-label" for="status_user_Y">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_user_N" value="N">
                            <label class="form-check-label" for="status_user_N">Inactive</label>
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
        const submitBtn = $(this);
        const spinner = submitBtn.find('.spinner-border');

        spinner.show();
        submitBtn.prop('disabled', true);

        var rowid = $('#modal').data('rowid');
        var name = $('#name').val();
        var email = $('#email').val();
        // var picture = $('#picture')[0].files[0];
        var group_cd = $('#group_cd').val();
        var status = $('input[name="status"]:checked').val();

        // Cek apakah semua field sudah diisi
        if (name == "" || email == "" || status == "") {
            toastr.error('All fields must be filled!');
            return;  // Jangan lanjutkan eksekusi
        }

        var formData = new FormData();
        formData.append('rowid', rowid);
        formData.append('name', name);
        formData.append('email', email);
        // formData.append('picture', picture);
        formData.append('group_cd', group_cd);
        formData.append('status', status);

        var actionUrl = '<?= base_url('admin/add-users') ?>'; // Ganti dengan URL yang sesuai

        // Kirim request AJAX
        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
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
                spinner.hide();
                submitBtn.prop('disabled', false);
            }
        });
    });

    // Fungsi untuk memuat data jika ada rowid
    function loadData() {
        var rowid = $('#modal').data('rowid');

        if (rowid === 0) {
            // Jika rowid adalah 0, reset form untuk tambah data
            $('#name').val('');
            $('#email').val('');
            // $('#picture').val('');
            $('#group_cd').val('').trigger('change');
            $('#status_user_Y').prop('checked', true);  // Default status Active
        } else {
            // Jika rowid ada, request data untuk mengedit
            $.ajax({
                url: '<?= base_url('admin/get-users/') ?>' + rowid,
                type: 'GET',
                success: function(response) {
                    if (response.status === 'error') {
                        toastr.error(response.message);
                        return;
                    }

                    $('#name').val(response[0].name);
                    $('#email').val(response[0].email);
                    // $('#picture').val(response[0].picture);
                    $('#group_cd').val(response[0].group_cd).trigger('change');

                    if (response[0].status == 'Y') {
                        $('#status_user_Y').prop('checked', true);
                    } else {
                        $('#status_user_N').prop('checked', true);
                    }
                }
            });
        }
    }
</script>