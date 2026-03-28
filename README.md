📧 SMTP Log Analiz (PHP)

Mail sunucunuzun SMTP log dosyalarından belirli bir e-posta adresine ait tüm smtp trafik kayıtlarını filtrelemek için geliştirilmiş PHP script.

Bu şekilde bir kod sayesinde büyük ve karmaşık log dosyalarından sadece ilgili mail trafiğini ayrıştırabilir, müşterinize özel log çıktısı oluşturabilirsiniz.


🚀 Kod Özellikleri

📌 Belirli bir e-posta adresine göre filtreleme

🌐 Aynı IP üzerinden geçen tüm SMTP trafiğini yakalama

⚡ Büyük log dosyalarında hızlı çalışma

🧠 Mail akışını (EHLO, MAIL FROM, RCPT, DATA) analiz etme

🚫 İstenmeyen IP adreslerini hariç tutma

📁 Otomatik çıktı dosyası oluşturma


🧠 Nasıl Çalışır?

SMTP logları satır bazlı ve parçalıdır.

Bu script şu mantıkla çalışır:

Mail adresinin geçtiği satırı bulur

O satırdaki IP adresini alır

Alt ve üst satırlarda aynı IP’ye ait logları toplar

Bu sayede ilgili mailin tüm SMTP akışı çıkarılır.



📂 Kurulum

Bu repoyu indir:

git clone [https://github.com/cahit2834/smtp-log-analiz-php](https://github.com/cahit2834/smtp-log-analiz-php.git)

Log dosyanızı /log/ klasörüne koyun:

/log/SMTP-Activity.log

Script içinde mail adresini düzenleyin:

$targetMail = "info@example.com";

Scripti çalıştırın:

php script.php



⚙️ Kullanım

Script şu işlemleri yapar:

Log dosyasını okur

Hedef mail adresini arar

Aynı IP üzerinden geçen trafik akışını filtreler

Sonucu yeni bir log dosyasına yazar


🧾 Örnek Log

RCPT TO:<destek@sizinsayfaniz.com>

MAIL FROM:<example@mail.com>

DATA

🧑‍💻 Örnek Kod

$targetMail = "info@example.com";

$range = 100;

$excludeIp = "185.86.***.14";


🎯 Kullanım Senaryoları

Mail trafiğini analiz etmek

Müşteriye kendine özel log vermek

SMTP hata tespiti yapmak

Brute force saldırı analizi yapmak

Spam mail incelemeleri


🔗 Detaylı Anlatım (Blog)

👉 Bu scriptin detaylı anlatımı ve kullanım rehberi:

[https://sizinsayfaniz.com/blog2/Kurumsal-Mail-Sunuculari-Icin-Php-Log-Analizi.html](https://sizinsayfaniz.com/blog2/Kurumsal-Mail-Sunuculari-Icin-Php-Log-Analizi.html)


⚠️ Notlar

Log formatı TAB (\t) ayrımlıdır, sizin loglarınız farklı ise kendi loglarınıza göre düzenleyin
Aynı IP üzerinden aynı saniyelerde faklı adreslere gelen log satırları gelebilir (nadir)
Daha doğru sonuç için çıktı dosyanız kontrol edilmelidir

⭐ Katkı Sağla

Pull request ve katkılara açıktır.

📜 Lisans

MIT License
