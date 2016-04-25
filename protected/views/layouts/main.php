<hmtl>
	<head>
		<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/assets/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/assets/materialize/js/materialize.min.js"></script>
		<link rel="stylesheet" href="<?= Yii::app()->request->baseUrl ?>/assets/materialize/css/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body class="container blue-grey lighten-5">
		<div>
			<?= $content ?>
		</div>
	</body>

</hmtl>