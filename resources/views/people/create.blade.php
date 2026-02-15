<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Orang</title>
</head>
<body>
    <h1>Tambah Data Orang</h1>
    
    <!-- Link kembali ke index -->
    <a href="<?php echo route('people.index'); ?>">← Kembali</a>
    
    <br><br>
    
    <!-- Form tambah data -->
    <form action="<?php echo route('people.store'); ?>" method="POST">
        <!-- Token CSRF untuk keamanan -->
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        
        <div>
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" required>
        </div>
        
        <br>
        
        <div>
            <label for="umur">Umur:</label><br>
            <input type="number" id="umur" name="umur" min="1" max="150" required>
        </div>
        
        <br>
        
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</body>
</html>