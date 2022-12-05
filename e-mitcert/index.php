<?php 
include("conecta.php");
if($_GET['action'] == "validar" and $_POST['email'] != ""){
	
	$email = $_POST['email'];
	$sqlCertificado = "select * from tb_certificados where email = '$email' or cpf = '$email'";
	$tabelaCertificado = mysqli_query($conn, $sqlCertificado);
	$totalCertificado = mysqli_num_rows($tabelaCertificado);
	$linhaCertificado = mysqli_fetch_array($tabelaCertificado);
	$nome = $linhaCertificado['nome'];
	
	header("Location: exibir.php");
	if($totalCertificado > 0){
		$chave = md5('tb_certificados'.$nome);
		header("Location: exibir.php?nome=".$nome."&chave=".$chave."&evento=".$_POST['evento']);
		echo "Location: exibir.php?nome=".$nome."&chave=".$chave;
		exit;
	}
	else
	{
		$msg = "Não foi possivel localizar esse e-mail ou CPF!<br/>Verifique se o endereço de e-mail ou o CPF digitado está correto ou se você participou deste evento.";
	}
}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
	.fm-cert-lc-select, .fm-cert-lc-option, .fm-cert-lc-input {
		font-family: "Roboto", Arial, Tahoma, sans-serif;
		display: block;
		width: 100%;
        	font-size: 1em;
    		border: none;
    		background: #eeeeee;
    		padding: 2%;
    		margin: 2%;
    		color: #828282;
    		text-align: justify;
	}

	.fm-cert-lc-send {
		padding: 2%;
		text-align: center;
		background: #059C4D;
    		color: #ffffff;
	}

	.fm-cert-lc-send:hover {
		background-color: #002D01;
		color: #ffffff;
	}
</style>
<script language="javascript">
function SomenteNumero(e){
		var tecla=(window.event)?event.keyCode:e.which;   
		if((tecla>47 && tecla<58)) return true;
		else{
			if (tecla==8 || tecla==0) return true;
		else  return false;
	}
}
function enviaForm(){
		if(isEmpty(form1.email.value)){
			alert("É necessário que informe o endereço do e-mail.");
			form1.email.focus();
			return false;
		}
		if(isEmpty(form1.evento.value)){
			alert("Selecione o evento desejado, por favor.");
			form1.evento.focus();
			return false;
		}
		form1.button.disabled=true;
		form1.submit();				
}
function isEmpty( inputStr ) {
	 if ( null == inputStr || "" == inputStr ) {
		  return true; 
	  }
	   return false; 
}
</script>
<title>AMBr - Associação Médica de Brasília</title>
</head>
<body>
<?php
	$sqlCertificado = "select id,nome from tb_eventos";
	$tabelaCertificado = mysqli_query($conn, $sqlCertificado);
	$totalCertificado = mysqli_num_rows($tabelaCertificado);
	if ($totalCertificado > 0){
?>
        <form class="fm-cert-lc" action="?action=validar" method="post" name="form1" target="_blank" id="form1">
		
		<select class="fm-cert-lc-select" id="evento" name="evento">
		<option class="fm-cert-lc-option" value="">Selecione um evento...</option>
<?php	while($linhaCertificado = mysqli_fetch_array($tabelaCertificado)){ ?>
		<option class="fm-cert-lc-option" value="<?php echo $linhaCertificado['id']; ?>"><?php echo $linhaCertificado['nome']; ?></option>
<?php } ?>	</select>
        <input class="fm-cert-lc-input" name="email" type="text" id="email" maxlength="110"  placeholder="CPF ou e-mail" />
        <input class="fm-cert-lc-input fm-cert-lc-send" type="button" onclick="enviaForm()" name="button" id="button" value="Emitir Certificado" />
        <a style="text-decoration: none;" href="https://pecambr.com.br/"><input class="fm-cert-lc-input fm-cert-lc-send" type="button" value="Voltar Para o Site" /></a>

        <font color=""><?php echo $msg; ?></font></span>
        </form>
<?php } ?>
</body>
</html>