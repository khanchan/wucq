<?php

/**
 * 公钥加密
 *
 * @param string 明文
 * @param string 证书文件（.crt）
 * @return string 密文（base64编码）
 */
function publickey_encodeing($sourcestr, $fileName)
{
    $key_content = file_get_contents($fileName);
    $pubkeyid    = openssl_get_publickey($key_content);

    if (openssl_public_encrypt($sourcestr, $crypttext, $pubkeyid))
    {
        return base64_encode("".$crypttext);
    }
}
/**
 * 私钥解密
 *
 * @param string 密文（二进制格式且base64编码）
 * @param string 密钥文件（.pem / .key）
 * @param string 密文是否来源于JS的RSA加密
 * @return string 明文
 */
function privatekey_decodeing($crypttext, $fileName, $fromjs = FALSE)
{
    $key_content = file_get_contents($fileName);
    // echo $key_content;
    $prikeyid    = openssl_get_privatekey($key_content);
    $crypttext   = base64_decode($crypttext);
    // echo $crypttext;
    // 注意填充的的格式。OPENSSL_PKCS1_PADDING
    $padding = $fromjs ? OPENSSL_NO_PADDING : OPENSSL_PKCS1_PADDING;
    //$bin_ciphertext, $plaintext, $private_key, OPENSSL_PKCS1_PADDING
    if (openssl_private_decrypt($crypttext, $sourcestr, $prikeyid, $padding))
    {
        return $fromjs ? rtrim(strrev($sourcestr), "/0") : "".$sourcestr;
    }
    return ;
}


if(isset($_GET['op']) && $_GET['op'] == 'post'){

    // define("CRT", "f:/op/pub.pem"); //公钥文件
    // define("PEM", "f:/op/pre.pem"); //私钥文件
    define("PEM", "f:/1.p"); //私钥文件
    //JS->PHP 测试
    $data = $_POST['pwd'];
    $txt_en = pack("H*", $data);
    // file_put_contents('f:/op/123.txt', $txt_en);
    // file_put_contents('f:/op/123data.txt', $data);
     $txt_en = base64_encode($txt_en); //转成base64格式
    // echo $txt_en ;
    $txt_de = privatekey_decodeing($txt_en, PEM, FALSE);
    var_dump($txt_de);
    // //PHP->PHP 测试
    // $data = "测试TEST"; //PHP端支持汉字:D
    // $txt_en = publickey_encodeing($data, CRT);
    // $txt_de = privatekey_decodeing($txt_en, PEM);
    // var_dump($txt_de);
}else{


} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="./lib/BigInt.js"></script>
    <script type="text/javascript" src="./lib/Barrett.js"></script>
    <script type="text/javascript" src="./lib/RSA.js"></script>
    <script type='text/javascript' src='./lib/jquery-1.4.1.min.js'></script>
</head>
<body>
<form action="<?=$_SERVER['PHP_SELF']?>?op=post" id='myform' method='POST'>
    <input type="pasword" value='' name="pwd" id='pwd'/>
    <input type='submit' value='提交' id='btn' />
</form>
<script>
// $(function(){
///
        $('#btn').click(function(){
        // var rsa_n = "AB535D1302D5639443AF647A393633C6E6D3FE2325406E7A06AB11BE3BADDDC1CCFABF0D8FF665CA2361D47538A1910C1E842ECD28895193510717607C9A907210D09E5752D2C69C342E28BA901C705D0994B10155D4FC304437C802A76FB4A54948F63CA899F2DD0B9337D2EE8C7D40FA2091E5AA8E44024D1D4C2EE0CEF535";
        var rsa_n = 'B8F42C6C629BBD47601A23509F1738BF1C3B35D97A8B72E8C951EEB4C1CBB151B0474E01641E2A62917816BD28C322A23F149482F35AED1858612E3C2AA4D110113EDB54E5029C566C1C764D423DC2B825B7CFAF3BB9722820A4155F1E00DA97018AFE13006E5C045947891D2C94B66DED14F3FD105F465A439748130676FD1DCFF5B34B6282705A081550D5C650F47C7077288E88FB032991D62B8EC25A58CFE26367FA185E4931E0B140B307C4E15E841847D37040C112B310449681F9BDE700D928E7CB7623A56CC01C7354CA6C505C9F83ED084BDF8A575F7C125FE17A85B03DE614B82E41DECE7FEDD6ECABFC5B85661085596F7F411048C674522745A7';

        /**
        * 比如是2048位的rsa秘钥256+3
        * 比如是1024位的rsa秘钥128+3
        */
        setMaxDigits(259); //131 => n的十六进制位数/2+3
        //var key = new RSAKeyPair(e , d , n);
        var key  = new RSAKeyPair( "10001" , '' ,rsa_n );

        // alert(key);
        var password = $('#pwd').val();
        password = encryptedString(key, password); //不支持汉字
        $("#pwd").val(password);
        $("#myform").submit();
        // alert(password); //test
        // alert(decryptedString(key , password))
    });
// });
</script>
</body>
</html>
