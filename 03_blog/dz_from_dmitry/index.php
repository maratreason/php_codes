<!doctype html>
<html>
<head>
    <title>Список новостей</title>
	<style>
		.edit{
			border: 1px solid red;
		padding: 4px;
		background: #cc5e7c;
		color: #fff;
		font-weight: bold;
		}
	</style>
</head>
<body>
    <?php
		
        $news = scandir('data');
        
        foreach($news as $one){
            if(is_file("data/$one")){
                echo  "<h3><a href=\"article.php?f=$one\">$one</a></h3><hr>";
            }
        }
    ?>
	<a href="add.php">Добавить новость</a>
</body>
</html>	