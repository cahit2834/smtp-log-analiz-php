<?php

$dosya="SMTP-Activity-260328.log";
$logDosyasi = __DIR__ . "/log/$dosya";
$ciktiDosyasi = __DIR__ . "/log/Cikti-$dosya";

$targetMail = "info@*******.com"; // Aramak istediğiniz mail adresi veya kod

$range = 100;


$excludeIp = "185.*.*.14"; // Kendi sunucusunuzdan gelen trafikleri veya özel  bir ip adresini burda ayıklayabilirsiniz

if (!file_exists($logDosyasi)) {
    die("Log dosyası bulunamadı");
}
$lines = file($logDosyasi, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$toplam = count($lines);
$cikti = fopen($ciktiDosyasi, "w");

for ($i = 0; $i < $toplam; $i++) {

    if (stripos($lines[$i], $targetMail) !== false) {
      
        $parts = preg_split('/\t+/', $lines[$i]);
        $ip = trim($parts[4] ?? '');

    //  eğer ana satırın IP'si atlayacağımız ip adresi ise skip
        if (!$ip || $ip === $excludeIp) continue;
        $start = max(0, $i - $range);
        $end   = min($toplam - 1, $i + $range);

    //  fwrite($cikti, "==== MAIL BULUNDU ====\n");
      
        fwrite($cikti, $lines[$i] . "\n");
      
    //   fwrite($cikti, "==== IP: $ip ====\n");
      
        for ($j = $start; $j <= $end; $j++) {
            $p = preg_split('/\t+/', $lines[$j]);
            $currentIp = trim($p[4] ?? '');
          
    //  bu IP'yi tamamen atla
          
            if ($currentIp === $excludeIp) continue;
            if ($currentIp === $ip) {
                fwrite($cikti, $lines[$j] . "\n");
            }
        }
        fwrite($cikti, "\n\n");
    }
}
fclose($cikti);
echo "Tamamlandı → log/Cikti-$dosya";
