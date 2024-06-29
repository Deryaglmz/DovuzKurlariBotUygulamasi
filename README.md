
# Döviz Kurları Güncelleme Projesi

Bu proje, Türkiye Cumhuriyet Merkez Bankası (TCMB) tarafından sağlanan döviz kurları verilerini alarak bir veritabanına kaydeder ve günceller. PHP ve MySQL kullanılarak geliştirilmiştir.

## Kurulum

### Gereksinimler

- PHP 7.0 veya üstü
- MySQL veritabanı
- İnternet bağlantısı (TCMB'den veri çekebilmek için)

 **Veritabanı Kurulumu**

   SQL sorgusunu kullanarak bir MySQL veritabanı ve tablo oluşturun:


**Proje Dosyalarını İndirme**

   Proje dosyalarını yerel sunucunuza veya web sunucunuza indirin ve uygun bir dizine yerleştirin.

**Veritabanı Bağlantısı Ayarları**

   `index.php` dosyasındaki veritabanı bağlantı ayarlarını kendi veritabanı bilgilerinize göre güncelleyin:

   ```php
   try {
       $VeritabaniBaglantisi = new PDO("mysql:host=localhost;dbname=dovizkurlari;charset=UTF8", "root", "9900");
   } catch(PDOException $Hata) {
       echo "Bağlantı Hatası<br />" . $Hata->getMessage();
       die();
   }
   ```

**Uygulamayı Çalıştırma**

   Proje dosyalarını bir tarayıcıda açarak çalıştırabilirsiniz. Bu işlem, TCMB'den döviz kuru verilerini çekecek ve veritabanında güncelleyecektir.

## Kullanım

Bu proje, TCMB'den alınan döviz kurları verilerini her çalıştırıldığında veritabanında günceller. Bu sayede, güncel döviz kurlarını veritabanında saklayabilir ve kullanabilirsiniz.

### Örnek Veritabanı Güncelleme İşlemi

`index.php` dosyasındaki döviz güncelleme kodu şu şekildedir:

```php
$USDGuncelle = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellemezamani = ? WHERE kodu = ?");
$USDGuncelle->execute([$USD_Adi, $USD_Satis, $USD_EfektifAlis, $USD_EfektifSatis, $ZamanaDamgasi, $USD_KisaAdi]);
$USDEtkilenenSayi = $USDGuncelle->rowCount();
if ($USDEtkilenenSayi < 1) {
    echo "USD Güncelleme İşleminde Hata Oluştu<br />";
}
```

Bu örnekte, USD döviz kurunun veritabanında nasıl güncellendiği gösterilmiştir. Diğer döviz kurları için benzer işlemler yapılmaktadır.


![Ekran görüntüsü 2024-06-24 230551](https://github.com/Deryaglmz/DovuzKurlariBotUygulamasi/assets/129391768/76ad9d28-7bff-4129-bf18-2166921e2eef)
