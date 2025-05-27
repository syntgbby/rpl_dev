<div class="table-responsive">
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_prodi">
        <thead>
            <tr>
                <th>No</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($asesmen): ?>
                <?php $no = 1; ?>
                <?php foreach ($asesmen as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['deskripsi'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2" class="text-center">Tidak Ada Data Asesmen</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>