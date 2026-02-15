<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Orang</title>
</head>
<body>
    <h1>Edit Data Orang</h1>
    
    <!-- Link kembali ke index -->
    <a href="<?php echo route('people.index'); ?>">← Kembali</a>
    
    <br><br>
    
    <!-- Form edit data -->
    <form action="<?php echo route('people.update', $person->id); ?>" method="POST">
        <!-- Token CSRF untuk keamanan -->
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        
        <!-- Spoofing method PUT karena HTML form cuma support GET dan POST -->
        <input type="hidden" name="_method" value="PUT">
        
        <div>
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" value="<?php echo $person->nama; ?>" required>
        </div>
        
        <br>
        
        <div>
            <label for="umur">Umur:</label><br>
            <input type="number" id="umur" name="umur" min="1" max="150" value="<?php echo $person->umur; ?>" required>
        </div>
        
        <br>
        
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>