<?php
$hash = password_hash('admin123', PASSWORD_DEFAULT);
file_put_contents('hash.txt', $hash);
echo "Hash guardado correctamente en hash.txt\n";