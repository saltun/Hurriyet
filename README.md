# Hurriyet PHP Api Sınıfı
Developers Hurriyet için geliştirilmiş php api sınıfı api sistemini kolay bir şekilde kullanmanızı sağlar.
Api Sistemi v1

Key bilgisi edinmek için => [Developers Hurriyet](https://developers.hurriyet.com.tr/)

Kullanımı
=========

Key bilginizi dahil edip sınıfı başlatmanız yeterli.

``` php
require_once "Hurriyet.php";
$h = new Hurriyet(KEY_BILGINIZ);
```

Yazıları listeleme fonksiyonu 

``` php
$h->listArticle();
```
Ayrıca bu fonksiyon 3 farklı kural alabilir bunlar için döküman sayfasını takip edip parametreleri tek tek sırası ile göndere bilirsiniz. 



``` php
$h->listArticle('foo','foo',1);
```

Belirli bir içeriği listeleme

``` php
$h->getArticle('40262101'); // benzersiz yazı numarasını listelediğiniz verilerden alabilirsiniz.
```
[Detaylar için tıklayınız](https://developers.hurriyet.com.tr/docs/versions/1.0/resources/article)

Köşe yazılarının yazılarını listeleme
``` php
$h->getColumnists();
```
Ayrıca bu fonksiyon 3 farklı kural alabilir bunlar için döküman sayfasını takip edip parametreleri tek tek sırası ile göndere bilirsiniz. 

``` php
$h->getColumnists("WriterId eq '55ea09f6f018fbaf449423e5'",'Title',2);
```

Sabit bir köşe yazarının id numarasına göre içeriklerini listeleme
``` php
$h->getColumnist('40262192') // benzersiz id numarasını listelettiğiniz köşe yazarlarından edine bilirsiniz. 
```

[Detaylar için tıklayınız](https://developers.hurriyet.com.tr/docs/versions/1.0/resources/column)

Date fonksiyonu
RFC 1123 tipinde tarih dizisi döndürür. RFC 1123 için "ols.ietf.org/html/rfc1123" adresine bakınız.
``` php
$h->date()  
```

[Detaylar için tıklayınız](https://developers.hurriyet.com.tr/docs/versions/1.0/resources/date)

Api sonuçlarını listeleme
``` php
$h->getData() // json değeri döner
```

Eklenecek methodlar
=========
- News Photo Gallery
- Page
- Path
- Writer



Author : [Savaş Can Altun](http://savascanaltun.com.tr)
Mail : savascanaltun@gmail.com
Web : [http://savascanaltun.com.tr](http://savascanaltun.com.tr)

