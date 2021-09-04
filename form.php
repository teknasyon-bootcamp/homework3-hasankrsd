<?php

/**
 * UML diyagramında yer alan Form sınıfını oluşturmanız beklenmekte.
 * 
 * Sınıf içerisinde static olmayan `fields`, `action` ve `method`
 * özellikleri (property) olması gerekiyor.
 * 
 * Sınıf içerisinde static olan ve Form nesnesi döndüren `createPostForm`,
 * `createGetForm` ve `createForm` methodları bulunmalı. Bu metodlar isminde de
 * belirtilen metodlarda Form nesneleri oluşturmalı.
 * 
 * Sınıf içerisinde bir "private" başlatıcı (constructor) bulunmalı. Bu başlatıcı
 * içerisinden `action` ve `method` değerleri alınıp ilgili property'lere değerleri
 * aktarılmalıdır.
 * 
 * Sınıf içerisinde static "olmayan" aşağıdaki metodlar bulunmalıdır.
 *   - `addField` metodu `fields` property dizisine değer eklemelidir.
 *   - `setMethod` metodu `method` propertysinin değerini değiştirmelidir.
 *   - `render` metodu form'un ilgili alanlarını HTML çıktı olarak verip bir buton çıktıya eklemelidir.
 * 
 * Sonuç ekran görüntüsüne `result.png` dosyasından veya `result.html` dosyasından ulaşabilirsiniz.
 * `app.php` çalıştırıldığında `result.html` ile aynı çıktıyı verecek şekilde geliştirme yapmalısınız.
 * 
 * > **Not: İsteyenler `app2.php` ve `form2.php` isminde dosyalar oluşturup sınıfa farklı özellikler kazandırabilir.
 */
class Form
{
    //propertyleri ile birlikte action method ve fields'i static olarak tanımlıyoruz

  private string $method;
  private string $action;
  private array $fields;

  //action ve method için değerler çekiyoruz
  private function __construct($action,$method){
    $this->action=$action;
    $this->method=$method;
  }

  // post ile oluşturulan form için action değerini atıyoruz
public static function createPostForm($action){
  return new static($action,"POST");
}
  // get ile oluşturulan form için action değerini atıyoruz

public static function createGetForm($action){
  return new static($action,"GET");
}
  // methodu belirsiz olan formlar için action ve method değerini atıyoruz

public static function createForm($action,$method){
  return new static($action,$method);
}
//addField methoduyla gelecek label name value değerlerini tutuyoruz
public function addField($label, $name, $value=null){
    $field = [$label,$name,$value]; 
    $this->fields[]=$field;
  }
  //form methodu belirlenir

  public function setMethod($method){
    $this->method=$method;
  }

  //render methodunu çağırılmasıyla form oluşturuluyor
public function render(){ ?>

<form action="<?php echo $this->action ?>" method="<?php $this->method ?>">
 <!-- foreach ile field parametresi addfield fonksiyonunu tarar ve gönderilen kadar döndürür -->
<?php foreach ($this->fields as $field) {?>
<label for="<?php echo $field[1] ?>"><?php echo $field[0] ?></label>
<input type="text" name="<?php echo $field[1] ?>" value="<?php echo $field[2] ?>">
<?php } ?>
<button type="submit"> Gönder</button>
</form>

<?php }

} ?>
