<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover align-middle fs-6 gy-5" id="kt_table_prodi">
        <thead class="table-dark">
            <tr>
                <th style="width: 50px; text-align: center;">No</th>
                <th>Deskripsi</th>
                <th style="width: 200px; text-align: center;">Pilih Capaian</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($asesmen): ?>
                <?php $no = 1; ?>
                <?php foreach ($asesmen as $row): ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $row['deskripsi'] ?></td>
                        <td>
                            <select class="form-select form-select-lg h-100 w-100" data-control="select2" data-placeholder="Pilih Nilai Asesmen" name="asesmen[<?= $row['id'] ?>]">
                                <option value="" selected disabled>Pilih Asesmen</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                            </select>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center text-danger">Tidak Ada Data Asesmen</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <!-- Tombol aksi di bawah tabel, rata kanan -->
    <div class="d-flex justify-content-end gap-2 mt-3">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            <i class="bi bi-x-circle"></i> Batal
        </button>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
        </button>
    </div>
</div>
