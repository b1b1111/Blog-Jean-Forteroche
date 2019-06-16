<?php $title = 'Jean Forteroche'; ?>
<?php require('header.php');
$menu = view_menu();
?> 

<?php ob_start(); ?>

<section id="section_one">

    <div id="presentation">
        <p>Bonjour à tous, <br />
            Je travaille actuellement sur mon prochain roman, "Billet simple pour l'Alaska", je souhaite innover et le publier par épisode en ligne sur mon propre site.<br />
            Vous aurez la possibilité de laisser des commentaires, n'hésitez pas, l'inspiration vient d'abord de vous. <br />
            C'est donc avec une grande joie que je vous laisse découvrir l'aventure au fil des chapitres.</p>

        <h5 class="signature">Jean Forteroche</h5>
    </div>

    <img id="jean_img" src="public/images/heron.jpg" alt="jean">

</section>

<section id="section_two">

    <div id="resum">
        <p>La nuit, <br />
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean hendrerit metus turpis, vel accumsan ligula sagittis non. Nullam nec viverra risus. Sed pretium, nibh ac ultricies sagittis, urna purus rhoncus eros, in mattis tortor velit ac libero. Nulla molestie, ipsum at malesuada auctor, metus arcu hendrerit neque, vel interdum massa lorem vel diam. Nam semper pharetra augue, nec pharetra purus eleifend a. Donec eget lorem nec orci egestas consequat sed eu ipsum. Etiam rhoncus neque ac dolor sodales, sit amet pharetra arcu dictum. In commodo dui at nunc lobortis porttitor. In maximus porttitor iaculis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris venenatis tincidunt consequat. Integer luctus feugiat tristique. Mauris nulla libero, aliquam et diam sit amet, dapibus rutrum nibh. Nunc et odio vestibulum, accumsan diam vitae, pulvinar metus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sagittis justo a magna pretium, sed sagittis dui aliquet.<br /><br /><br /><br />


            Ut suscipit nisl quam, non bibendum urna semper ut. Integer id ultricies lorem, in fermentum mauris. Nam venenatis mauris sed rhoncus blandit. Etiam facilisis eros venenatis dui varius, ut consectetur ipsum mollis. Nam congue sed metus vel ultricies. Integer eu nisl commodo, ultricies sem a, venenatis arcu. Curabitur facilisis tortor ex, at dignissim elit condimentum sed. Vestibulum fermentum porta nisl, rhoncus congue lectus lobortis id. In hac habitasse platea dictumst. Quisque ac laoreet mi, id ornare lectus.<br /><br /><br /><br />


            Aliquam sit amet dapibus eros, sit amet hendrerit lacus. Fusce tempus orci eros, id vulputate massa tempor rhoncus. Aenean ut ante imperdiet, consequat tellus sed, placerat tellus. Proin dolor ex, gravida a magna id, pharetra volutpat ex. Sed elementum libero finibus, lobortis sem eget, cursus nulla. Proin quis semper orci. Nullam at ultrices mauris. Sed et pharetra lorem, id cursus lectus. In sollicitudin, nisl quis tempor euismod, odio lorem blandit ipsum, ut interdum tortor ligula in risus.</p>

        <h5 class="signature">Jean Forteroche</h5>

        <em><a href="chapters.php">Lire les chapitres</a></em>
    </div>

    <img id="bear_img" src="public/images/moon.jpg" alt="bear">

</section>

<footer>

</footer>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>