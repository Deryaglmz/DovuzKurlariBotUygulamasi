<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    try {
        $VeritabaniBaglantisi = new PDO("mysql:host=localhost;dbname=dovizkurlari;charset=UTF8", "root", "9900");
    } catch(PDOException $Hata) {
        echo "Bağlantı Hatası<br />" . $Hata->getMessage();
        die();
    }

    sleep(5);
    $ZmanaDamgasi = time();
    
    $Link = "https://www.tcmb.gov.tr/kurlar/today.xml";
    $Icerik = simplexml_load_file($Link);

    $USD_Birim       = $Icerik->current[0]->Unit;
    $USD_Adi         = $Icerik->current[0]->Isim;
    $USD_KisaAdi     =$Icerik->current[0]["currencyCode"];
    $USD_Alis        = $Icerik->current[0]->ForexBuying;
    $USD_Satis       = $Icerik->current[0]->ForexSelleding;
    $USD_EfektifAlis  = $Icerik->current[0]->BanknoteBuying;
    $USD_EfektifSatis = $Icerik->current[0]->BanknoteSelleding;

    $USDGuncelle = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satis = ?, efektifalis = ?, efektifsatis = ?, guncellemezamani = ? WHERE kodu = ?");
    $USDGuncelle->execute([$USD_Adi, $USD_Satis, $USD_EfektifAlis, $USD_EfektifSatis, $ZamanaDamgasi, $USD_KisaAdi]);
    $USDEtkilenenSayi = $USDGuncelle->rowCount();
        if ($USDEtkilenenSayi < 1) {
            echo "USD Güncelleme İşleminde Hata Oluştu<br />";
        }

    $AUD_Birim       = $Icerik->current[1]->Unit;
    $AUD_Adi         = $Icerik->current[1]->Isim;
    $AUD_KisaAdi     =$Icerik->current[1]["currencyCode"];
    $AUD_Alis        = $Icerik->current[1]->ForexBuying;
    $AUD_Satis       = $Icerik->current[1]->ForexSelleding;
    $AUD_EfektifAlis  = $Icerik->current[1]->BanknoteBuying;
    $AUD_EfektifSatis = $Icerik->current[1]->BanknoteSelleding;

    $AUDGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, , guncellemezamani = ? efektifsatis = ? WHERE kodu = ?");
    $AUDGuncelle->execute([$AUD_Adi,$AUD_Birim, $AUD_Alis,  $AUD_Satis ,$AUD_EfektifAlis, $ZmanaDamgasi, $AUD_EfektifSatis]);
    $AUDEtkilenenSayi = $AUDGuncelle->rowCount();
        if($AUDEtkilenSayi<1){
            echo "AUD Güncelleme İşlemide Hata Oluştu";
            die();
        }

    $DKK_Birim       = $Icerik->current[2]->Unit;
    $DKK_Adi         = $Icerik->current[2]->Isim;
    $DKK_KisaAdi     =$Icerik->current[2]["currencyCode"];
    $DKK_Alis        = $Icerik->current[2]->ForexBuying;
    $DKK_Satis       = $Icerik->current[2]->ForexSelleding;
    $DKK_EfektifAlis  = $Icerik->current[2]->BanknoteBuying;
    $DKK_EfektifSatis = $Icerik->current[2]->BanknoteSelleding;

    $DKKGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ?, guncellemezamani = ?  WHERE kodu = ?");
    $DKKGuncelle->execute([$DKK_Adi,$DKK_Birim, $DKK_Alis,  $DKK_Satis ,$DKK_EfektifAlis, $ZmanaDamgasi, $DKK_EfektifSatis]);
    $DKKEtkilenenSayi = $AUDGuncelle->rowCount();
        if($DKKEtkilenSayi<1){
            echo "DKK Güncelleme İşlemide Hata Oluştu";
        }
            

    $EUR_Birim       = $Icerik->current[3]->Unit;
    $EUR_Adi         = $Icerik->current[3]->Isim;
    $EUR_KisaAdi     =$Icerik->current[3]["currencyCode"];
    $EUR_Alis        = $Icerik->current[3]->ForexBuying;
    $EUR_Satis       = $Icerik->current[3]->ForexSelleding;
    $EUR_EfektifAlis  = $Icerik->current[3]->BanknoteBuying;
    $EUR_EfektifSatis = $Icerik->current[3]->BanknoteSelleding;

    $EURGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $EURGuncelle->execute([$EUR_Adi,$EUR_Birim, $EUR_Alis,  $EUR_Satis ,$EUR_EfektifAlis, $ZmanaDamgasi, $EUR_EfektifSatis]);
    $EUREtkilenenSayi = $AUDGuncelle->rowCount();
        if($EUREtkilenSayi<1){
            echo "EUR Güncelleme İşlemide Hata Oluştu";
        }

    $GBP_Birim       = $Icerik->current[4]->Unit;
    $GBP_Adi         = $Icerik->current[4]->Isim;
    $GBP_KisaAdi     =$Icerik->current[4]["currencyCode"];
    $GBP_Alis        = $Icerik->current[4]->ForexBuying;
    $GBP_Satis       = $Icerik->current[4]->ForexSelleding;
    $GBP_EfektifAlis  = $Icerik->current[4]->BanknoteBuying;
    $GBP_EfektifSatis = $Icerik->current[4]->BanknoteSelleding;

    $GBPGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $GBPGuncelle->execute([$GBP_Adi,$GBP_Birim, $GBP_Alis,  $GBP_Satis ,$GBP_EfektifAlis, $ZmanaDamgasi, $GBP_EfektifSatis]);
    $GBPEtkilenenSayi = $GBPGuncelle->rowCount();
        if($GBPEtkilenSayi<1){
            echo "GBP Güncelleme İşlemide Hata Oluştu";
        }

    $CHF_Birim       = $Icerik->current[5]->Unit;
    $CHF_Adi         = $Icerik->current[5]->Isim;
    $CHF_KisaAdi     =$Icerik->current[5]["currencyCode"];
    $CHF_Alis        = $Icerik->current[5]->ForexBuying;
    $CHF_Satis       = $Icerik->current[5]->ForexSelleding;
    $CHF_EfektifAlis  = $Icerik->current[5]->BanknoteBuying;
    $CHF_EfektifSatis = $Icerik->current[5]->BanknoteSelleding;

    $CHFGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $CHFGuncelle->execute([$CHF_Adi,$CHF_Birim, $CHF_Alis,  $CHF_Satis ,$CHF_EfektifAlis, $ZmanaDamgasi, $CHF_EfektifSatis]);
    $CHFEtkilenenSayi = $CHFGuncelle->rowCount();
        if($CHFEtkilenSayi<1){
            echo "CHF Güncelleme İşlemide Hata Oluştu";
        }

    $SEK_Birim       = $Icerik->current[6]->Unit;
    $SEK_Adi         = $Icerik->current[6]->Isim;
    $SEK_KisaAdi     =$Icerik->current[6]["currencyCode"];
    $SEK_Alis        = $Icerik->current[6]->ForexBuying;
    $SEK_Satis       = $Icerik->current[6]->ForexSelleding;
    $SEK_EfektifAlis  = $Icerik->current[6]->BanknoteBuying;
    $SEK_EfektifSatis = $Icerik->current[6]->BanknoteSelleding;

    $SEKGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $SEKGuncelle->execute([$SEK_Adi,$SEK_Birim, $SEK_Alis,  $SEK_Satis ,$SEK_EfektifAlis, $ZmanaDamgasi, $SEK_EfektifSatis]);
    $SEKEtkilenenSayi = $SEKGuncelle->rowCount();
        if($SEKEtkilenSayi<1){
            echo "SEK Güncelleme İşlemide Hata Oluştu";
        }

    $CAD_Birim       = $Icerik->current[7]->Unit;
    $CAD_Adi         = $Icerik->current[7]->Isim;
    $CAD_KisaAdi     =$Icerik->current[7]["currencyCode"];
    $CAD_Alis        = $Icerik->current[7]->ForexBuying;
    $CAD_Satis       = $Icerik->current[7]->ForexSelleding;
    $CAD_EfektifAlis  = $Icerik->current[7]->BanknoteBuying;
    $CAD_EfektifSatis = $Icerik->current[7]->BanknoteSelleding;

    $CADGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $CADGuncelle->execute([$CAD_Adi,$CAD_Birim, $CAD_Alis,  $CAD_Satis ,$CAD_EfektifAlis, $ZmanaDamgasi, $CAD_EfektifSatis]);
    $CADEtkilenenSayi = $CADGuncelle->rowCount();
        if($CADEtkilenSayi<1){
            echo "CAD Güncelleme İşlemide Hata Oluştu";
        }

    $KWD_Birim       = $Icerik->current[8]->Unit;
    $_Adi         = $Icerik->current[8]->Isim;
    $KWD_KisaAdi     =$Icerik->current[8]["currencyCode"];
    $KWD_AlKWDis        = $Icerik->current[8]->ForexBuying;
    $KWD_Satis       = $Icerik->current[8]->ForexSelleding;
    $KWD_EfektifAlis  = $Icerik->current[8]->BanknoteBuying;
    $KWD_EfektifSatis = $Icerik->current[8]->BanknoteSelleding;

    $KWDGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $KWDGuncelle->execute([$KWD_Adi,$KWD_Birim, $KWD_Alis,  $KWD_Satis ,$KWD_EfektifAlis, $ZmanaDamgasi, $KWD_EfektifSatis]);
    $KWDEtkilenenSayi = $KWDGuncelle->rowCount();
        if($KWDEtkilenSayi<1){
            echo "KWD Güncelleme İşlemide Hata Oluştu";
        }

    $NOK_Birim       = $Icerik->current[9]->Unit;
    $NOK_Adi         = $Icerik->current[9]->Isim;
    $NOK_KisaAdi     =$Icerik->current[9]["currencyCode"];
    $NOK_Alis        = $Icerik->current[9]->ForexBuying;
    $NOK_Satis       = $Icerik->current[9]->ForexSelleding;
    $NOK_EfektifAlis  = $Icerik->current[9]->BanknoteBuying;
    $NOK_EfektifSatis = $Icerik->current[9]->BanknoteSelleding;

    $NOKGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $NOKGuncelle->execute([$NOK_Adi,$NOK_Birim, $NOK_Alis,  $NOK_Satis ,$NOK_EfektifAlis, $ZmanaDamgasi, $NOK_EfektifSatis]);
    $NOKEtkilenenSayi = $NOKGuncelle->rowCount();
        if($NOKEtkilenSayi<1){
            echo "NOK Güncelleme İşlemide Hata Oluştu";
        }

    $SAR_Birim       = $Icerik->current[10]->Unit;
    $SAR_Adi         = $Icerik->current[10]->Isim;
    $SAR_KisaAdi     =$Icerik->current[10]["currencyCode"];
    $SAR_Alis        = $Icerik->current[10]->ForexBuying;
    $SAR_Satis       = $Icerik->current[10]->ForexSelleding;
    $SAR_EfektifAlis  = $Icerik->current[10]->BanknoteBuying;
    $SAR_EfektifSatis = $Icerik->current[10]->BanknoteSelleding;

    $SARGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ?  , guncellemezamani = ?WHERE kodu = ?");
    $SARGuncelle->execute([$SAR_Adi,$SAR_Birim, $SAR_Alis,  $SAR_Satis ,$SAR_EfektifAlis, $ZmanaDamgasi, $SAR_EfektifSatis]);
    $SAREtkilenenSayi = $SARKGuncelle->rowCount();
        if($SAREtkilenSayi<1){
            echo "SAR Güncelleme İşlemide Hata Oluştu";
        }


    $JPY_Birim       = $Icerik->current[11]->Unit;
    $JPY_Adi         = $Icerik->current[11]->Isim;
    $JPY_KisaAdi     =$Icerik->current[11]["currencyCode"];
    $JPY_Alis        = $Icerik->current[11]->ForexBuying;
    $JPY_Satis       = $Icerik->current[11]->ForexSelleding;
    $JPY_EfektifAlis  = $Icerik->current[11]->BanknoteBuying;
    $JPY_EfektifSatis = $Icerik->current[11]->BanknoteSelleding;

    $JPYGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $JPYGuncelle->execute([$JPY_Adi,$JPY_Birim, $JPY_Alis,  $JPY_Satis ,$JPY_EfektifAlis, $ZmanaDamgasi, $JPY_EfektifSatis]);
    $JPYEtkilenenSayi = $JPYKGuncelle->rowCount();
        if($JPYEtkilenSayi<1){
            echo "JPY Güncelleme İşlemide Hata Oluştu";
        }


    $BGN_Birim       = $Icerik->current[12]->Unit;
    $BGN_Adi         = $Icerik->current[12]->Isim;
    $BGN_KisaAdi     =$Icerik->current[12]["currencyCode"];
    $BGN_Alis        = $Icerik->current[12]->ForexBuying;
    $BGN_Satis       = $Icerik->current[12]->ForexSelleding;
    $BGN_EfektifAlis  = $Icerik->current[12]->BanknoteBuying;
    $BGN_EfektifSatis = $Icerik->current[12]->BanknoteSelleding;

    $BGNGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $BGNGuncelle->execute([$BGN_Adi,$BGN_Birim, $BGN_Alis,  $BGN_Satis ,$BGN_EfektifAlis, $ZmanaDamgasi, $BGN_EfektifSatis]);
    $BGNEtkilenenSayi = $BGNGuncelle->rowCount();
        if($BGNEtkilenSayi<1){
            echo "BGN Güncelleme İşlemide Hata Oluştu";
        }

    $RON_Birim       = $Icerik->current[13]->Unit;
    $DKK_Adi         = $Icerik->current[13]->Isim;
    $DKK_KisaAdi     =$Icerik->current[13]["currencyCode"];
    $RON_Alis        = $Icerik->current[13]->ForexBuying;
    $RON_Satis       = $Icerik->current[13]->ForexSelleding;
    $RON_EfektifAlis  = $Icerik->current[13]->BanknoteBuying;
    $RON_EfektifSatis = $Icerik->current[313]->BanknoteSelleding;

    $RONGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $RONGuncelle->execute([$RON_Adi,$RON_Birim, $RON_Alis,  $RON_Satis ,$RON_EfektifAlis, $ZmanaDamgasi, $RON_EfektifSatis]);
    $RONEtkilenenSayi = $RONGuncelle->rowCount();
        if($RONEtkilenSayi<1){
            echo "RON Güncelleme İşlemide Hata Oluştu";
        }

    $RUB_Birim       = $Icerik->current[14]->Unit;
    $RUB_Adi         = $Icerik->current[14]->Isim;
    $RUB_KisaAdi     =$Icerik->current[14]["currencyCode"];
    $RUB_Alis        = $Icerik->current[14]->ForexBuying;
    $RUB_Satis       = $Icerik->current[14]->ForexSelleding;
    $RUB_EfektifAlis  = $Icerik->current[14]->BanknoteBuying;
    $RUB_EfektifSatis = $Icerik->current[14]->BanknoteSelleding;

    $RUBGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $RUBGuncelle->execute([$RUB_Adi,$RUB_Birim, $RUB_Alis,  $RUB_Satis ,$RUB_EfektifAlis, $ZmanaDamgasi, $RUB_EfektifSatis]);
    $RUBEtkilenenSayi = $RUBGuncelle->rowCount();
        if($RUBEtkilenSayi<1){
            echo "RUB Güncelleme İşlemide Hata Oluştu";
        }

    $IRR_Birim       = $Icerik->current[15]->Unit;
    $IRR_Adi         = $Icerik->current[15]->Isim;
    $IRR_KisaAdi     =$Icerik->current[15]["currencyCode"];
    $IRR_Alis        = $Icerik->current[15]->ForexBuying;
    $IRR_Satis       = $Icerik->current[15]->ForexSelleding;
    $IRR_EfektifAlis  = $Icerik->current[15]->BanknoteBuying;
    $IRR_EfektifSatis = $Icerik->current[15]->BanknoteSelleding;

    $IRRGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $IRRGuncelle->execute([$IRR_Adi,$IRR_Birim, $IRR_Alis,  $IRR_Satis ,$IRR_EfektifAlis ,$ZmanaDamgasi,  $IRR_EfektifSatis]);
    $IRREtkilenenSayi = $IRRGuncelle->rowCount();
        if($IRREtkilenSayi<1){
            echo "IRR Güncelleme İşlemide Hata Oluştu";
        }

    $CNY_Birim       = $Icerik->current[16]->Unit;
    $CNY_Adi         = $Icerik->current[16]->Isim;
    $CNY_KisaAdi     =$Icerik->current[16]["currencyCode"];
    $CNY_Alis        = $Icerik->current[16]->ForexBuying;
    $CNY_Satis       = $Icerik->current[16]->ForexSelleding;
    $CNY_EfektifAlis  = $Icerik->current[16]->BanknoteBuying;
    $CNY_EfektifSatis = $Icerik->current[16]->BanknoteSelleding;

    $CNYGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $CNYGuncelle->execute([$CNY_Adi,$CNY_Birim, $CNY_Alis,  $CNY_Satis ,$CNY_EfektifAlis, $ZmanaDamgasi, $CNY_EfektifSatis]);
    $CNYEtkilenenSayi = $IRRGuncelle->rowCount();
        if($CNYEtkilenSayi<1){
            echo "CNY Güncelleme İşlemide Hata Oluştu";
        }

    $PKR_Birim       = $Icerik->current[17]->Unit;
    $PKR_Adi         = $Icerik->current[17]->Isim;
    $PKR_KisaAdi     =$Icerik->current[17]["currencyCode"];
    $PKR_Alis        = $Icerik->current[17]->ForexBuying;
    $PKR_Satis       = $Icerik->current[17]->ForexSelleding;
    $PKR_EfektifAlis  = $Icerik->current[17]->BanknoteBuying;
    $PKR_EfektifSatis = $Icerik->current[17]->BanknoteSelleding;

    $PKRGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $PKRGuncelle->execute([$PKR_Adi,$PKR_Birim, $PKR_Alis,  $PKR_Satis ,$PKR_EfektifAlis, $ZmanaDamgasi, $PKR_EfektifSatis]);
    $PKREtkilenenSayi = $PKRGuncelle->rowCount();
        if($PKREtkilenSayi<1){
            echo "
             Güncelleme İşlemide Hata Oluştu";
        } 

    $QAR_Birim       = $Icerik->current[18]->Unit;
    $QAR_Adi         = $Icerik->current[18]->Isim;
    $QAR_KisaAdi     =$Icerik->current[18]["currencyCode"];
    $QAR_Alis        = $Icerik->current[18]->ForexBuying;
    $QAR_Satis       = $Icerik->current[18]->ForexSelleding;
    $QAR_EfektifAlis  = $Icerik->current[18]->BanknoteBuying;
    $QAR_EfektifSatis = $Icerik->current[18]->BanknoteSelleding;

    $QARGuncelle     = $VeritabaniBaglantisi->prepare("UPDATE dovizkurlari SET adi = ?, satiş = ?, efektifsatis = ?, efektifsatis = ? , guncellemezamani = ? WHERE kodu = ?");
    $QARGuncelle->execute([$QAR_Adi,$QAR_Birim, $QAR_Alis,  $QAR_Satis ,$QAR_EfektifAlis, $ZmanaDamgasi, $QAR_EfektifSatis]);
    $QAREtkilenenSayi = $QARGuncelle->rowCount();
        if($QAREtkilenSayi<1){
            echo "QAR Güncelleme İşlemide Hata Oluştu";
        } 

    ?>
   <table align="center" width="800" border="0" cellpadding="0" cellspacing="0">
        <tr height="30" bgcolor="#CCCCCC">
            <th align="left" width="250">Adı</th>
            <th align="left" width="100">Kısa Adı</th>
            <th align="left" width="100">Birim</th>
            <th align="left" width="100">Alış</th>
            <th align="left" width="100">Satiş</th>
            <th align="left" width="125">Efektif Alış</th>
            <th align="left" width="125">Efektif Satış</th>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $USD_Adi;?></td>
            <td align="left" width="100"><?php echo $USD_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $USD_Birim;?></td>
            <td align="left" width="125"><?php echo $USD_Alis;?></td>
            <td align="left" width="125"><?php echo $USD_Satis;?></td>
            <td align="left" width="125"><?php echo $USD_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $USD_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $AUD_Adi;?></td>
            <td align="left" width="100"><?php echo $AUD_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $AUD_Birim;?></td>
            <td align="left" width="125"><?php echo $AUD_Alis;?></td>
            <td align="left" width="125"><?php echo $AUD_Satis;?></td>
            <td align="left" width="125"><?php echo $AUD_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $AUD_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $DKK_Adi;?></td>
            <td align="left" width="100"><?php echo $DKK__KisaAdi;?></td>
            <td align="left" width="100"><?php echo $DKK_Birim;?></td>
            <td align="left" width="125"><?php echo $DKK_Alis;?></td>
            <td align="left" width="125"><?php echo $DKK_Satis;?></td>
            <td align="left" width="125"><?php echo $DKK_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $DKK_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $EUR_Adi;?></td>
            <td align="left" width="100"><?php echo $EUR_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $EUR_Birim;?></td>
            <td align="left" width="125"><?php echo $EUR_Alis;?></td>
            <td align="left" width="125"><?php echo $EUR_Satis;?></td>
            <td align="left" width="125"><?php echo $EUR_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $EUR_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $GBP_Adi;?></td>
            <td align="left" width="100"><?php echo $GBP_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $GBP_Birim;?></td>
            <td align="left" width="125"><?php echo $GBP_Alis;?></td>
            <td align="left" width="125"><?php echo $GBP_Satis;?></td>
            <td align="left" width="125"><?php echo $GBP_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $GBP_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $CHF_Adi;?></td>
            <td align="left" width="100"><?php echo $CHF_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $CHF_Birim;?></td>
            <td align="left" width="125"><?php echo $CHF_Alis;?></td>
            <td align="left" width="125"><?php echo $CHF_Satis;?></td>
            <td align="left" width="125"><?php echo $CHF_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $CHF_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $SEK_Adi;?></td>
            <td align="left" width="100"><?php echo $SEK_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $SEK_Birim;?></td>
            <td align="left" width="125"><?php echo $SEK_Alis;?></td>
            <td align="left" width="125"><?php echo $SEK_Satis;?></td>
            <td align="left" width="125"><?php echo $SEK_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $SEK_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $CAD_Adi;?></td>
            <td align="left" width="100"><?php echo $CAD_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $CAD_Birim;?></td>
            <td align="left" width="125"><?php echo $CAD_Alis;?></td>
            <td align="left" width="125"><?php echo $CAD_Satis;?></td>
            <td align="left" width="125"><?php echo $CAD_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $CAD_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $KWD_Adi;?></td>
            <td align="left" width="100"><?php echo $KWD_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $KWD_Birim;?></td>
            <td align="left" width="125"><?php echo $KWD_Alis;?></td>
            <td align="left" width="125"><?php echo $KWD_Satis;?></td>
            <td align="left" width="125"><?php echo $KWD_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $KWD_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $NOK_Adi;?></td>
            <td align="left" width="100"><?php echo $NOK_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $NOK_Birim;?></td>
            <td align="left" width="125"><?php echo $NOK_Alis;?></td>
            <td align="left" width="125"><?php echo $NOK_Satis;?></td>
            <td align="left" width="125"><?php echo $NOK_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $NOK_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $SAR_Adi;?></td>
            <td align="left" width="100"><?php echo $SAR_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $SAR_Birim;?></td>
            <td align="left" width="125"><?php echo $SAR_Alis;?></td>
            <td align="left" width="125"><?php echo $SAR_Satis;?></td>
            <td align="left" width="125"><?php echo $SAR_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $SAR_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $JPY_Adi;?></td>
            <td align="left" width="100"><?php echo $JPY_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $JPY_Birim;?></td>
            <td align="left" width="125"><?php echo $JPY_Alis;?></td>
            <td align="left" width="125"><?php echo $JPY_Satis;?></td>
            <td align="left" width="125"><?php echo $JPY_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $JPY_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $BGN_Adi;?></td>
            <td align="left" width="100"><?php echo $BGN_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $BGN_Birim;?></td>
            <td align="left" width="125"><?php echo $BGN_Alis;?></td>
            <td align="left" width="125"><?php echo $BGN_Satis;?></td>
            <td align="left" width="125"><?php echo $BGN_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $BGN_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $RON_Adi;?></td>
            <td align="left" width="100"><?php echo $RON_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $RON_Birim;?></td>
            <td align="left" width="125"><?php echo $RONAlis;?></td>
            <td align="left" width="125"><?php echo $RON_Satis;?></td>
            <td align="left" width="125"><?php echo $RON_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $RON_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $RUB_Adi;?></td>
            <td align="left" width="100"><?php echo $RUB_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $RUB_Birim;?></td>
            <td align="left" width="125"><?php echo $RUB_Alis;?></td>
            <td align="left" width="125"><?php echo $RUB_Satis;?></td>
            <td align="left" width="125"><?php echo $RUB_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $RUB_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $IRR_Adi;?></td>
            <td align="left" width="100"><?php echo $IRR_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $IRR_Birim;?></td>
            <td align="left" width="125"><?php echo $IRR_Alis;?></td>
            <td align="left" width="125"><?php echo $IRR_Satis;?></td>
            <td align="left" width="125"><?php echo $IRR_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $IRR_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $CNY_Adi;?></td>
            <td align="left" width="100"><?php echo $CNY_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $CNY_Birim;?></td>
            <td align="left" width="125"><?php echo $CNY_Alis;?></td>
            <td align="left" width="125"><?php echo $CNY_Satis;?></td>
            <td align="left" width="125"><?php echo $CNY_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $CNY_EfektifSatis;?></td>

        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $PKR_Adi;?></td>
            <td align="left" width="100"><?php echo $PKR_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $PKR_Birim;?></td>
            <td align="left" width="125"><?php echo $PKR_Alis;?></td>
            <td align="left" width="125"><?php echo $PKR_Satis;?></td>
            <td align="left" width="125"><?php echo $PKR_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $PKR_EfektifSatis;?></td>
        </tr>

        <tr height="30">
            <td align="left" width="250"><?php echo $QAR_Adi;?></td>
            <td align="left" width="100"><?php echo $QAR_KisaAdi;?></td>
            <td align="left" width="100"><?php echo $QAR__Birim;?></td>
            <td align="left" width="125"><?php echo $QAR_Alis;?></td>
            <td align="left" width="125"><?php echo $QAR_Satis;?></td>
            <td align="left" width="125"><?php echo $QAR_EfektifAlis;?></td>
            <td align="left" width="125"><?php echo $QAR__EfektifSatis;?></td>
        </tr>
   </table>
</body>
</html>