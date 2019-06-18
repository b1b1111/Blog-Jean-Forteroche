<?php
$orig = 'J\'ai "sorti" le <strong>chien</strong> tout à l\'heure';

$b = html_entity_decode($orig);

echo $b; // J'ai "sorti" le <strong>chien</strong> tout à l'heure

?>