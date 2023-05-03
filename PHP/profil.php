<? include('index.php'); ?>

<?php session_start(); ?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
</html>

<?php if(isset($_SESSION['flash']['success'])) {
    $message = $_SESSION['flash']['success'];
    unset($_SESSION['flash']['success']);

    ?>
    <div class="alert alert-success" role="alert">
        <?php echo $message; ?>
    </div>
    
<?php }
?>