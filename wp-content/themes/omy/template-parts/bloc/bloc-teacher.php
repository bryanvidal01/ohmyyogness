<?php
    $postID = $args;
    $teacherName = get_the_title($postID);
    $teacherKeyWords = get_field('posttype_prof_key_words', $postID);
    $teachRecommandation = get_field('posttype_prof_recommandation',$postID);
    $teacherImage = get_field('posttype_prof_image', $postID);
    if($teacherImage){
        $teacherImageURL = lsd_get_thumb($teacherImage, '400_400');
    }
    $yogaStyle = get_the_terms($postID, 'yoga_style');
    $teachStyle = get_the_terms($postID, 'teach_style');


?>
<a href="<?php echo get_the_permalink(); ?>" class="teacher text-center">
    <div class="image">
        <?php if(isset($teacherImageURL)): ?>
        <img src="<?php echo $teacherImageURL; ?>" alt="">
        <?php endif; ?>
        <div class="info-sup">
            <?php if($teachStyle): ?>
            <ul class="criteria">
                <?php foreach ($teachStyle as $teachStyleItem): ?>
                    <li>
                        <?php echo $teachStyleItem->name; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <?php if($teachRecommandation): ?>
            <div class="recommendations">
                <strong><?php echo $teachRecommandation; ?></strong> élève<?= ($teachRecommandation > 1)? 's recommandent' : ' recommande'; ?> ce prof'
            </div>
            <?php endif; ?>

            <?php if($yogaStyle): ?>
            <ul class="style">
                <?php foreach ($yogaStyle as $yogaStyleItem): ?>
                <li>
                    <?php echo $yogaStyleItem->name; ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
    <h4 class="teacher-name">
        <?php echo $teacherName; ?>
    </h4>
    <h5 class="teacher-description">
        <?php echo $teacherKeyWords; ?>
    </h5>
    <div class="link">En savoir plus</div>
</a>
