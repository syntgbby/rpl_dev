<table class="table">
    <?php foreach ($asesmen as $cpl): ?>
        <tr>
            <td class="text-start"><?= $cpl['deskripsi'] ?></td>
            <td>
                <select name="asesmen[<?= $cpl['id'] ?>]" class="form-select">
                    <option value="Cukup" selected>Cukup</option>
                    <option value="Baik">Baik</option>
                    <option value="Sangat Baik">Sangat Baik</option>
                </select>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<div class="d-flex justify-content-end mt-3">
    <button class="btn btn-primary" id="simpanAsesmenBtn">Simpan Penilaian</button>
</div>

<script>
    $(document).on('click', '#simpanAsesmenBtn', function () {
        const asesmenStorage = JSON.parse(localStorage.getItem('asesmen') || '{}');

        $('select[name^="asesmen"]').each(function () {
            const id = $(this).attr('name').match(/\[(\d+)\]/)[1];
            const nilai = $(this).val() || 'Cukup'; // default "Cukup" kalau belum dipilih
            asesmenStorage[id] = nilai;
        });

        localStorage.setItem('asesmen', JSON.stringify(asesmenStorage));

        // Optional: Close modal
        $('#modal').modal('hide');
    });

</script>