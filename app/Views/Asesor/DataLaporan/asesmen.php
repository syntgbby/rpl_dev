<div class="table-responsive">
    <table class="table align-middle table-row-dashed table-border fs-6 gy-5" id="kt_table_prodi">
        <thead>
            <tr>
                <th>No</th>
                <th>Deskripsi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($asesmen): ?>
                <?php $no = 1; ?>
                <?php foreach ($asesmen as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['deskripsi'] ?></td>
                        <td><?= $row['status'] ?></td>
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