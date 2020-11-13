<?php
get_header();


$postID = get_the_ID();

if($_POST){
    $returnRecommendation = sendRecommendation($postID);
}

$teacherKeyWords = get_field('posttype_prof_key_words', $postID);

$urlGoogleAgenda = get_field('posttype_prof_calendar_url');
if($urlGoogleAgenda) {
    $agendaTeacher = getCalendarFromGoogle($urlGoogleAgenda);
}
$emailTeacher = get_field('posttype_prof_calendar_email');
$teachRecommandation = get_field('posttype_prof_recommandation',$postID);

$postsRecommendations = get_posts(array(
    'numberposts'	=> -1,
    'post_type'		=> 'recommendations',
    'meta_key'		=> 'recommendation_prof_id',
    'meta_value'	=> get_the_ID()
));
$domaines = get_domaines_recommendations($postsRecommendations);
$domainesProfesseur = get_field('recommandation_domaines');

$profMantra = get_field('posttype_prof_mantra');
$profYears = get_field('posttype_prof_years');
$profSpecialities = get_field('posttype_prof_specialities');

$teacherImage = get_field('posttype_prof_image', $postID);
if($teacherImage){
    $teacherImageURL = lsd_get_thumb($teacherImage, 'imageStratePartners');
}


// Video

$paramsBackgroundVideo = get_field('params_background_video', 'option');

if($paramsBackgroundVideo){
    $paramsBackgroundVideoURL = lsd_get_thumb($paramsBackgroundVideo, '192_1080');
}

$profVideo1 = get_field('posttype_prof_video_1');
if($profVideo1){
    parse_str( parse_url( $profVideo1, PHP_URL_QUERY ), $profVideo1Array );
}

$profVideo2 = get_field('posttype_prof_video_2');
if($profVideo2){
    parse_str( parse_url( $profVideo2, PHP_URL_QUERY ), $profVideo2Array );
}

// Content
$profContentTitle = get_field('posttype_prof_content_title');
$profContentText = get_field('posttype_prof_content_text');

// Citation
$profCitationText = get_field('posttype_prof_citation_text');
$profCitationAuthor = get_field('posttype_prof_citation_author');


?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <a href="<?= get_the_permalink(PAGE_PROFESSEURS); ?>" class="link-back">
                Retour vers la liste des professeurs
            </a>
        </div>
        <div class="col-sm-6">
            <?php if(isset($teacherImageURL)): ?>
            <div class="image-prof">
                <img src="<?= $teacherImageURL; ?>" width="100%" alt="">
            </div>
            <?php endif; ?>
        </div>
        <div class="col-sm-6">
            <div class="title-hand">
                <?php echo get_the_title(); ?>
            </div>
            <div class="title sub-title-prof">
                <?php echo $teacherKeyWords; ?>
            </div>

            <ul class="teacher-infos-single row">

                <li class="col-sm-6">
                    <ul>
                        <?php if($profMantra): ?>
                        <li>
                            <div class="label">
                                Sa spécialité
                            </div>
                            <div class="response">
                                <?= $profMantra; ?>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php if($profYears): ?>
                        <li>
                            <div class="label">
                                Enseigne le yoga depuis
                            </div>
                            <div class="response">
                                <?= $profYears; ?>
                            </div>
                        </li>
                        <?php endif; ?>

                        <?php if($profSpecialities): ?>
                        <li>
                            <div class="label">
                                Type(s) de yoga
                            </div>
                            <div class="response">
                                <?= $profSpecialities; ?>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="col-sm-6">
                    <ul>
                        <?php if($teachRecommandation): ?>
                            <li>
                                <div class="label">
                                    Recommandé(e) par
                                </div>
                                <div class="response">
                                    <?php echo $teachRecommandation; ?> élève<?= ($teachRecommandation > 1)? 's' : ''; ?>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if($domaines): ?>
                        <li>
                            <div class="label">
                                L'enseignement de <?php echo get_the_title(); ?> est reconnu pour être :
                            </div>
                            <div class="response">
                                <ul class="attributs">
                                    <?php foreach ($domaines as $key => $domaine): ?>
                                        <li>
                                            <?php echo $key; ?>
                                            <strong>
                                                <?php echo $domaine; ?>
                                            </strong>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>

            <a href="#add-recommandation" class="button primary">Recommander ce professeur</a>
        </div>
    </div>
</div>

<?php if(isset($profVideo1Array) || isset($profVideo2Array)): ?>
<div class="strate-video-prof">
    <img src="<?= (isset($paramsBackgroundVideoURL))? $paramsBackgroundVideoURL : ''; ?>" class="strate-video-prof-background" alt="">
    <div class="container strate-video-prof-container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title big white text-center title-sans-serif">
                    En vidéo
                </div>
            </div>
            <?php if(isset($profVideo1Array)): ?>
            <div class="col-sm-6 mx-auto">
                <div class="title">
                    Les dessous des profs’
                </div>
                <iframe width="100%" height="343" src="https://www.youtube.com/embed/<?= $profVideo1Array['v']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <?php endif; ?>
            <?php if(isset($profVideo2Array)): ?>
            <div class="col-sm-6 mx-auto">
                <div class="title">
                    5 minutes sur le tapis <!--avec --><?php /*echo get_the_title(); */?>
                </div>
                <iframe width="100%" height="343" src="https://www.youtube.com/embed/<?= $profVideo2Array['v']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if($profContentTitle || $profContentText): ?>
<div class="strate-text-background">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title big title-sans-serif">
                    <?= $profContentTitle; ?>
                </div>
                <?= $profContentText; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if($urlGoogleAgenda): ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-left marge-top">
            <h1 class="title-hand">Planning des cours</h1>
        </div>

        <!--<div class="navigation-calendar text-center col-sm-12">
            <a href="collectif" class="button primary active">Cours collectif</a>
            <a href="particulier" class="button primary">Cours particulier</a>
        </div>-->

        <div class="col-sm-12">
            <table class="calendar-dates">
                <thead>
                    <tr>
                        <th width="">
                            Date
                        </th>
                        <th width="">
                            Début du cours
                        </th>
                        <th width="">
                            Fin du cours
                        </th>
                        <th width="">
                            Niveau
                        </th>
                        <th width="">
                            Type de yoga
                        </th>
                        <th width="">
                            Lieu
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $array = $agendaTeacher;

                if($array):
                    function date_compare($element1, $element2) {
                        $datetime1 = strtotime($element1['startCompare']);
                        $datetime2 = strtotime($element2['startCompare']);
                        return $datetime1 - $datetime2;
                    }

                    usort($array, 'date_compare');

                    foreach ($array as $agendaTeacherItem):
                        $dateEvent = new DateTime($agendaTeacherItem['startCompare']);
                        $dateNow = new DateTime();
                        $levelClasse = '';
                        $linkRedirect = '';
                        $lieuEvent = '';

                        if($dateEvent > $dateNow):
                            $eventDescription = $agendaTeacherItem['eventDescription'];
                            $posts = get_posts(array(
                                'numberposts'   => 1,
                                'post_type'     => 'combinaison',
                                'meta_key'      => 'post_combinaison_id',
                                'meta_value'    => $eventDescription
                            ));

                            if($posts):
                                $postSingle = reset($posts);
                                $postID = $postSingle->ID;
                                // ACF Fields
                                $levelClasse = get_field('post_combinaison_level', $postID);
                                $linkRedirect = get_field('post_combinaison_redirection', $postID);
                                $lieuEvent = get_field('post_combinaison_lieu', $postID);
                                $typeYoga = get_field('post_combinaison_type_yoga', $postID);
                            endif;



                            ?>
                            <tr class="<?= ($posts) ? 'collectif hidde' : 'particulier hidde'; ?>">
                                <td>
                                    <?php echo $agendaTeacherItem['startDateDay']; ?>
                                </td>
                                <td>
                                    <?php echo $agendaTeacherItem['startDate']; ?>
                                </td>
                                <td>
                                    <?php echo $agendaTeacherItem['endDate']; ?>
                                </td>
                                <td>
                                    <?php if($levelClasse): ?>
                                        <?php echo $levelClasse; ?>
                                    <?php else: ?>
                                        Non défini
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= ($typeYoga)? $typeYoga : 'Non défini'; ?>
                                </td>
                                <td>
                                    <?php if($lieuEvent): ?>
                                        <?php echo $lieuEvent; ?>
                                    <?php else: ?>
                                        Non défini
                                    <?php endif; ?>
                                </td>
                                <!--<td width="20%" class="text-right">
                                    <?php /*if($linkRedirect): */?>
                                        <a class="button primary" target="_blank" href="<?php /*echo $linkRedirect; */?>">S'inscrire</a>
                                    <?php /*elseif($emailTeacher): */?>
                                        <a class="button primary" href="mailto:<?php /*echo $emailTeacher; */?>">S'inscrire</a>
                                    <?php /*endif; */?>
                                </td>-->
                            </tr>
                        <?php endif;
                    endforeach;
                endif;?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-12 text-center">
            <a href="more" class="moreCalendar button primary">Voir plus</a>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if($profCitationText || $profCitationAuthor): ?>
<div class="strate-citation">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto text-center">
                <?php if($profCitationText): ?>
                <div class="citation">
                <?= $profCitationText; ?>
                </div>
                <?php endif; ?>
                <div class="author">
                    <?= $profCitationAuthor; ?>
                </div>

            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if($teachRecommandation): ?>
<div class="strate-recommandations">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-hand">
                    Recommendations
                </div>
            </div>
            <div class="col-sm-6">
                <?php if($teachRecommandation): ?>
                <div class="recommendations-number">
                    <strong><?php echo $teachRecommandation; ?></strong> élève<?= ($teachRecommandation > 1)? 's' : ''; ?>
                </div>
                <?= ($teachRecommandation > 1)? 'Ont recommandé ce professeur' : 'A recommandé ce professeur'; ?>
                <?php endif; ?>
            </div>
            <div class="col-sm-6 text-right">
                <a href="#add-recommandation" class="button primary">Recommander ce professeur</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">

                <?php
                foreach ($postsRecommendations as $postsRecommendationsItem):
                    $authorRecommandationID = get_field('recommendation_user_id', $postsRecommendationsItem);
                    $recommandationDateTimestamp = get_field('recommendation_date', $postsRecommendationsItem);
                    $recommandationDate = date('d/m/Y à H:i', $recommandationDateTimestamp);
                    $recommandationStatusID = get_field('recommendation_status', $postsRecommendationsItem);
                    $recommandationDomaines = get_field('recommendation_domaines', $postsRecommendationsItem);
                    $recommandationStatus = get_recommendation_status($recommandationStatusID);
                    $recommandationMessage = get_field('recommendation_commentaire', $postsRecommendationsItem);
                    $authorRecommandation = get_userdata($authorRecommandationID);
                    $authorRecommandationName = $authorRecommandation->display_name;

                ?>
                    <div class="item-recommandation">
                        <div class="name-recommandation">
                            <?php echo $authorRecommandationName; ?>
                        </div>
                        <div class="date-recommandation">
                            <?php echo $recommandationDate; ?>
                        </div>
                        <div class="status-recommandation">
                            "<?php echo $recommandationStatus; ?>"
                        </div>
                        <?php if($recommandationDomaines): ?>
                        <div class="domaines-recommandation">
                            Domaines recommandés : <?php $i = 0; foreach ($recommandationDomaines as $recommandationDomaineItem): ?><?= ($i > 0)? ', ' : ''; ?><?php echo $recommandationDomaineItem['recommendation_domaines_label']; ?><?php $i++; endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <?php if($recommandationMessage): ?>
                        <div class="message-recommandation">
                            <?php echo $recommandationMessage; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="strate-add-recommendation" id="add-recommandation">
    <form class="container" method="post" id="send-recommandation">
        <div class="row">
            <div class="col-sm-12 text-left">
                <div class="title-hand">
                    Votre avis compte !
                </div>
            </div>
        </div>

        <?php if(is_user_logged_in()): ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="container-select">
                        <div class="label">
                            Recommandation
                        </div>
                        <select name="recommandationStatus" id="status-recommendation" class="select-filter">
                            <option value="0"></option>
                            <option value="1">Je recommande vivement</option>
                            <option value="2">Je recommande</option>
                            <option value="3">Aucun avis</option>
                            <option value="4">Je ne recommande pas</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row recommendation-domaine-list" style="display: none;">
                <div class="col-sm-8">
                    <div class="label">
                        Cliquez sur le ou les attribut(s) qui correspond(ent) le plus au style d’enseignement du professeur
                    </div>
                    <?php if($domainesProfesseur): ?>
                        <?php $i = 0; foreach ($domainesProfesseur as $domaineProfesseurItem): ?>
                            <div class="domaine-checkbox">
                                <input type="checkbox" id="domaine-<?= $i; ?>" name="domaine[]" value="<?= $domaineProfesseurItem['recommandation_domaine_name']; ?>">
                                <label for="domaine-<?= $i; ?>"><?= $domaineProfesseurItem['recommandation_domaine_name']; ?></label>
                            </div>
                        <?php $i++; endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row message">
                <div class="col-sm-12">
                    <div class="label">
                        Commentaire
                    </div>
                    <div class="sub-label">
                        Laissez votre commentaire
                    </div>
                    <textarea name="commentaire" id="" cols="30" rows="10" name="commentaire" placeholder="Votre commentaire ici..."></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 text-center">
                    <input type="submit" class="button primary submit-recommandation" value="Envoyer votre recommandation">
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="title">Connectez-vous pour laisser un avis sur ce professeur</div>

                    <a href="" class="button primary">Connectez-vous</a>
                </div>
            </div>
        <?php endif; ?>
    </form>
</div>
<?php
get_footer();
