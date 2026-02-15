<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Sederhana - Data Orang</title>
</head>
<body>
    <h1>Data Orang</h1>
    
    <!-- Tampilkan pesan sukses -->
    <?php if(session('success')): ?>
        <div style="color: green; margin-bottom: 10px;">
            <?php echo session('success'); ?>
        </div>
    <?php endif; ?>
    
    <!-- Tombol tambah data -->
    <a href="<?php echo route('people.create'); ?>">
        <button type="button">Tambah Data</button>
    </a>
    
    <br><br>
    
    <!-- Tabel data -->
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach($people as $person): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $person->nama; ?></td>
                <td><?php echo $person->umur; ?> tahun</td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="<?php echo route('people.edit', $person->id); ?>">
                        <button type="button">Edit</button>
                    </a>
                    
                    <!-- Form Hapus (pakai POST karena method DELETE) -->
                    <form action="<?php echo route('people.destroy', $person->id); ?>" method="POST" style="display: inline;">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            
            <!-- Jika data kosong -->
            <?php if(count($people) == 0): ?>
            <tr>
                <td colspan="4" align="center">Belum ada data</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>