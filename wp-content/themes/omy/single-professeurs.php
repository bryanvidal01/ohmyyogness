<?php
get_header();


$teacherKeyWords = get_field('posttype_prof_key_words', $postID);


$urlGoogleAgenda = get_field('posttype_prof_calendar_url');
$agendaTeacher = getCalendarFromGoogle($urlGoogleAgenda);
$emailTeacher = get_field('posttype_prof_calendar_email');
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <a href="" class="link-back">
                Retour à la liste des prof's
            </a>
        </div>
        <div class="col-sm-6">
            <div class="image-prof">
                <img src="http://fakeimg.pl/700x700/" width="100%" alt="">
            </div>
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
                        <li>
                            <div class="label">
                                Mantra
                            </div>
                            <div class="response">
                                Titre du mantra
                            </div>
                        </li>
                        <li>
                            <div class="label">
                                Enseigne le Yoga depuis
                            </div>
                            <div class="response">
                                3 ans
                            </div>
                        </li>
                        <li>
                            <div class="label">
                                Spécialité(s)
                            </div>
                            <div class="response">
                                Style de Yoga 1, style de Yoga 2
                            </div>
                        </li>
                    </ul>
                </li>

                <li class="col-sm-6">
                    <ul>
                        <li>
                            <div class="label">
                                Recommandé par
                            </div>
                            <div class="response">
                                2 élèves
                            </div>
                        </li>

                        <li>
                            <div class="label">
                                L'enseignement de <?php echo get_the_title(); ?> est reconnu pour être:
                            </div>
                            <div class="response">
                                <ul class="attributs">
                                    <li>
                                        à l'écoute <strong>2</strong>
                                    </li>
                                    <li>
                                        Cours particulier <strong>2</strong>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>

            <a href="" class="button primary">Recommander ce prof</a>
        </div>
    </div>
</div>

<div class="strate-video-prof">
    <img src="https://images.pexels.com/photos/326256/pexels-photo-326256.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="strate-video-prof-background" alt="">
    <div class="container strate-video-prof-container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-hand white">
                    En vidéo
                </div>
            </div>
            <div class="col-sm-6">
                <div class="title">
                    Les dessous des prof's
                </div>
                <iframe width="100%" height="343" src="https://www.youtube.com/embed/tYy14QhR5B0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-sm-6">
                <div class="title">
                   10 minutes de cours avec <?php echo get_the_title(); ?>
                </div>
                <iframe width="100%" height="343" src="https://www.youtube.com/embed/tYy14QhR5B0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<div class="strate-text-background">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 mx-auto">
                <div class="title">
                    Le dessous des profs
                </div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae culpa deserunt iusto quaerat quasi sunt ullam, voluptatum! Ab asperiores aut beatae deleniti eum laudantium minus non repellat rerum, soluta, voluptatibus.
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae culpa deserunt iusto quaerat quasi sunt ullam, voluptatum! Ab asperiores aut beatae deleniti eum laudantium minus non repellat rerum, soluta, voluptatibus.
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae culpa deserunt iusto quaerat quasi sunt ullam, voluptatum! Ab asperiores aut beatae deleniti eum laudantium minus non repellat rerum, soluta, voluptatibus.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container" >
    <div class="row">
        <div class="col-sm-12 text-center marge-top-sup">
            <h1 class="title-hand">Calendrier</h1>
        </div>

        <div class="navigation-calendar text-center col-sm-12">
            <a href="collectif" class="button primary active">Cours collectif</a>
            <a href="particulier" class="button primary">Cours particulier</a>
        </div>

        <div class="col-sm-12">
            <table class="calendar-dates">
                <thead>
                    <tr>
                        <th width="15%">
                            Date
                        </th>
                        <th width="20%">
                            Début du cours
                        </th>
                        <th width="20%">
                            Fin du cours
                        </th>
                        <th width="15%">
                            Niveau
                        </th>
                        <th width="25%">
                            Lieu
                        </th>
                        <th width="10%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $array = $agendaTeacher;

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
                                <?php if($lieuEvent): ?>
                                    <?php echo $lieuEvent; ?>
                                <?php else: ?>
                                    Non défini
                                <?php endif; ?>
                            </td>
                            <td width="20%" class="text-right">
                                <?php if($linkRedirect): ?>
                                    <a class="button primary" target="_blank" href="<?php echo $linkRedirect; ?>">S'inscrire</a>
                                <?php elseif($emailTeacher): ?>
                                    <a class="button primary" href="mailto:<?php echo $emailTeacher; ?>">S'inscrire</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif;
                endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-12 text-center">
            <a href="more" class="moreCalendar button primary">Voir plus</a>
        </div>
    </div>
</div>


<div class="strate-citation">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 mx-auto text-center">
                <div class="citation">
                Le Yoga, un chemin vers l'auto-guérison du corps et de l'esprit
                </div>
                <div class="author">
                    <?php echo get_the_title(); ?>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="strate-recommandations">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-hand">
                    Recommendations
                </div>
            </div>
            <div class="col-sm-6">
                <div class="recommendations-number">
                    <strong>2</strong> élèves
                </div>
                Ont recommandés ce prof
            </div>
            <div class="col-sm-6 text-right">
                <a href="" class="button primary">Recommander ce professeur</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="item-recommandation">
                    <div class="name-recommandation">
                        Noémie
                    </div>
                    <div class="date-recommandation">
                        12/07/2020 à 13h30
                    </div>
                    <div class="status-recommandation">
                        " Je recommande vivement "
                    </div>
                    <div class="domaines-recommandation">
                        à l'écoute, cours particuliers
                    </div>
                    <div class="message-recommandation">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aspernatur commodi excepturi itaque iusto minus odio reiciendis rerum. Inventore, nostrum, saepe. Amet aperiam debitis et facilis molestias omnis sequi tempora!
                    </div>
                </div>
                <div class="item-recommandation">
                    <div class="name-recommandation">
                        Noémie
                    </div>
                    <div class="date-recommandation">
                        12/07/2020 à 13h30
                    </div>
                    <div class="status-recommandation">
                        " Je recommande vivement "
                    </div>
                    <div class="domaines-recommandation">
                        à l'écoute, cours particuliers
                    </div>
                    <div class="message-recommandation">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aspernatur commodi excepturi itaque iusto minus odio reiciendis rerum. Inventore, nostrum, saepe. Amet aperiam debitis et facilis molestias omnis sequi tempora!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="strate-add-recommendation">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="container-select">
                    <div class="label">
                        Localisation
                    </div>
                    <select name="location" id="" class="select-filter">
                        <option value="">Choisissez une ville</option>
                        <option value="">Choisissez une ville</option>
                        <option value="">Choisissez une ville</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="label">
                    Domaines recommandés
                </div>

            </div>
        </div>
    </div>
</div>
<?php
get_footer();
