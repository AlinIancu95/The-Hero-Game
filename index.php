<?php
require_once 'vendor/autoload.php';
use HeroGame\GameEngine\Gameplay;

?>
<form id="frm" method="post"  action="?game" >
    <input type="submit" value="Start Game" id="submit" />
</form>

<?php
if(isset($_GET['game']))
{
    $game = new Gameplay;
}
?>



