<?php $title = 'Jean Forteroche'; ?>

<?php require('header.php');
$menu = view_menu();
?> 


<?php ob_start(); ?>

<section id="section_one">

    <div id="presentation">
        <h3>Bonjour à tous, </h3>
        <p>
            Bienvenue dans mon univers, <br />
            Je travaille actuellement sur mon prochain roman, "Billet simple pour l'Alaska". <br />
            Je souhaite innover et le publier par épisode en ligne sur mon propre site.<br />
            Vous aurez la possibilité de laisser des commentaires, n'hésitez pas, l'inspiration vient d'abord de vous. <br />
            C'est donc avec une grande joie que je vous laisse découvrir l'aventure au fil des chapitres.</p>

        <h5 class="signature">Jean Forteroche</h5>
    </div>

    <img id="dream_img" src="public/images/dream.jpg" alt="dream">

</section>

<div class="separator" ></div>

<section id="section_two">

    <div id="resum">
        <h3>Synopsis </h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean hendrerit metus turpis, vel accumsan ligula sagittis non. Nullam nec viverra risus. Sed pretium, nibh ac ultricies sagittis, urna purus rhoncus eros, in mattis tortor velit ac libero. Nulla molestie, ipsum at malesuada auctor, metus arcu hendrerit neque, vel interdum massa lorem vel diam. Nam semper pharetra augue, nec pharetra purus eleifend a. Donec eget lorem nec orci egestas consequat sed eu ipsum. Etiam rhoncus neque ac dolor sodales, sit amet pharetra arcu dictum. In commodo dui at nunc lobortis porttitor. In maximus porttitor iaculis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris venenatis tincidunt consequat. Integer luctus feugiat tristique. Mauris nulla libero, aliquam et diam sit amet, dapibus rutrum nibh. Nunc et odio vestibulum, accumsan diam vitae, pulvinar metus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sagittis justo a magna pretium, sed sagittis dui aliquet.<br /><br /><br /><br />


            Ut suscipit nisl quam, non bibendum urna semper ut. Integer id ultricies lorem, in fermentum mauris. Nam venenatis mauris sed rhoncus blandit. Etiam facilisis eros venenatis dui varius, ut consectetur ipsum mollis. Nam congue sed metus vel ultricies. Integer eu nisl commodo, ultricies sem a, venenatis arcu. Curabitur facilisis tortor ex, at dignissim elit condimentum sed. Vestibulum fermentum porta nisl, rhoncus congue lectus lobortis id. In hac habitasse platea dictumst. Quisque ac laoreet mi, id ornare lectus.<br /><br /><br /><br />


            Aliquam sit amet dapibus eros, sit amet hendrerit lacus. Fusce tempus orci eros, id vulputate massa tempor rhoncus. Aenean ut ante imperdiet, consequat tellus sed, placerat tellus. Proin dolor ex, gravida a magna id, pharetra volutpat ex. Sed elementum libero finibus, lobortis sem eget, cursus nulla. Proin quis semper orci. Nullam at ultrices mauris. Sed et pharetra lorem, id cursus lectus. In sollicitudin, nisl quis tempor euismod, odio lorem blandit ipsum, ut interdum tortor ligula in risus.</p>

        <h5 class="signature">Jean Forteroche</h5>

        <em><a href="chapitres">Lire les chapitres</a></em>
    </div>

    <img id="moon_img" src="public/images/witch.jpg" alt="witch">

</section>

<footer>

    <div id="paragraphe3">
        <div id="bio">
            <h3>Jean Forteroche</h3>
            <p>
            Curabitur tempor posuere tellus, et commodo augue tincidunt eget. Vivamus venenatis, sapien efficitur ornare pulvinar, quam eros euismod tortor, eget vestibulum velit lectus vitae ante. Nunc euismod lacus a auctor porta. Praesent quis volutpat dui, nec dignissim nisi. Quisque ultricies est vitae nibh volutpat tristique. Donec tincidunt, metus at molestie fermentum, nunc ipsum porta nibh, ut molestie leo mauris in est. Phasellus eu tristique libero. Duis molestie felis sed lobortis finibus. Proin luctus turpis efficitur venenatis congue. Donec quis iaculis tortor. Cras et eros tempus, tristique magna in, tempor arcu. Nulla sit amet massa libero.<br /><br /><br /><br />

            Morbi tempus lacus quis volutpat scelerisque. Etiam magna metus, commodo at orci et, feugiat dapibus lectus. Donec semper mi ornare lectus luctus feugiat. Etiam nulla nulla, euismod et molestie eget, interdum sit amet libero. Curabitur lacus eros, aliquet non fermentum quis, accumsan et orci. Vestibulum a risus ac ex dapibus tincidunt at ut mi. Fusce scelerisque in quam id cursus.</p>

            <h5 class="signature">Jean Forteroche</h5>
        </div>

        <img id="jean_img" src="public/images/jean.jpg" alt="jean">
    </div>
</footer>
<?php $content = ob_get_clean(); ?>
<?php require('html.php'); ?>
<p>
    <img src="public/images/alaska.jpg" alt="alaska" id="alaska">
</p>
<?php require('footer.php'); ?>
