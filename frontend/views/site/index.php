<?

?>

<div class="site-index">
<?
$dateCreated = new DateTime();
$dateCreated->setTimestamp(Yii::$app->user->identity->created_at);
echo '<pre>';
print_r($dateCreated);
echo '</pre>';
?>
</div>
