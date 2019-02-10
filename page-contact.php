<?php
/*
    Template Name: Contact
*/
if($_POST){
    $errors = array();
    if(!wp_verify_nonce($_POST['_wpnonce'], 'wp_contact_form')){
        array_push($errors, 'Sorry, something went wrong with processing this form. Please try again.');
    } else {
        if(!$_POST['contactName']){
            array_push($errors, "Please enter your name.");
        } else if(strlen($_POST['contactName']) < 2){
            array_push($errors, "Please enter at least 2 characters for your name");
        }
        $content = $_POST['contactMessage'];
        if(!$_POST['contactMessage']){
            array_push($errors, "Please enter a message.");
        } else if(strlen($_POST['contactMessage']) < 10){
            array_push($errors, "Please enter at least 10 characters for your message");
        }
        if(!$_POST['contactEmail']){
            array_push($errors, "Please enter your email.");
        } else if(!filter_var($_POST['contactEmail'], FILTER_VALIDATE_EMAIL)){
            array_push($errors, "Please enter a valid email address.");
        }
        if(empty($errors)){
            $args = array(
                'post_title' => $_POST['contactName'],
                'post_content' => $_POST['contactMessage'],
                'post_type' => 'enquiries',
                'meta_input' => array(
                    'email' => $_POST['contactEmail'],
                )
            );
            wp_insert_post($args);
            echo "Your message has been sent.";
        }
    }
}
 ?>

<?php get_header(); ?>

<?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>
      <div class="page-title">
        <h1><?php the_title(); ?></h1>
      </div>
      <div class="page-content">
        <?php the_content(); ?>
      </div>
    <?php if($_POST && !empty($errors)): ?>
        <div class="row mb-2">
            <div class="col">
                <div class="alert alert-danger pb-0" role="alert">
                    <ul>
                        <?php foreach($errors as $singleError): ?>
                            <li><?= $singleError; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>

            <form class="contact-form page-contact" action="<?= get_permalink(); ?>" method="post">
                <?php wp_nonce_field('wp_contact_form'); ?>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="contactName" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="">Message (include cat you are interested in)</label>
                    <?php
                    $settings = array(
                        'media_buttons' => false,
                        'textarea_rows' => '10',
                        'teeny' => true,
                        'quicktags' => false);
                    wp_editor($content, 'contactMessage', $settings); ?>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="contactEmail" class="form-control" value="">
                </div>
                <div class="form-group">
                    <input type="submit" name="" value="Contact us" class="btn button">
                </div>
            </form>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
