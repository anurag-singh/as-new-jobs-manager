<?php
/*
Title: New Job Opening form
Post Type: as-job
Order: 10
Priority: default
*/
?>

<!--
'jobpost category', 'jobpost job type', 'jobpost location', 'jobpost qualification', 'jobpost experience', 'jobpost ctc'
-->

<?php

piklist('field', array(
    'type' => 'group'
    //,'field' => 'address_group'
    ,'label' => 'Job Details'
    ,'fields' => array(
                      array(
                        'type' => 'text'
                        ,'field' => 'postal_code'
                        ,'label' => 'Job Code'
                        ,'columns' => 6
                      )
                      ,array(
                        'type' => 'text'
                        ,'field' => 'phone'
                        ,'label' => 'No. of Openings'
                        ,'columns' => 6
                      )
    )
  ));

piklist('field', array(
    'type' => 'select'
    ,'scope' => 'taxonomy'
    ,'field' => 'jobpost_category'
    ,'label' => 'Department'
    // ,'description' => 'Terms will appear when they are added to <a href="' . network_admin_url() . 'edit-tags.php?taxonomy=jobpost_category&post_type=as_job">View All Terms</a>.'
    ,'choices' => array(
                      '' => 'Choose Department'
                    ) + piklist(
                      get_terms('jobpost_category', array(
                        'hide_empty' => false
                      ))
                      ,array(
                        'term_id'
                        ,'name'
                      )
                )
));

piklist('field', array(
    'type' => 'select'
    ,'scope' => 'taxonomy'
    ,'field' => 'jobpost_job_type'
    ,'label' => 'Nature of Job'
    // ,'description' => 'Terms will appear when they are added to <a href="' . network_admin_url() . 'edit-tags.php?taxonomy=jobpost_job_type&post_type=as_job">View All Terms</a>.'
    ,'choices' => array(
                      '' => 'Choose Job Nature'
                    ) + piklist(
                      get_terms('jobpost_job_type', array(
                        'hide_empty' => false
                      ))
                      ,array(
                        'term_id'
                        ,'name'
                      )
                )
));

piklist('field', array(
    'type' => 'select'
    ,'scope' => 'taxonomy'
    ,'field' => 'jobpost_location'
    ,'label' => 'Location'
    // ,'description' => 'Terms will appear when they are added to <a href="' . network_admin_url() . 'edit-tags.php?taxonomy=jobpost_location&post_type=as_job">View All Terms</a>.'
    ,'attributes' => array(
      'multiple' => 'multiple'
    )
    ,'choices' => array(
                      '' => 'Choose Location'
                    ) + piklist(
                      get_terms('jobpost_location', array(
                        'hide_empty' => false
                      ))
                      ,array(
                        'term_id'
                        ,'name'
                      )
                )
));

piklist('field', array(
    'type' => 'select'
    ,'scope' => 'taxonomy'
    ,'field' => 'jobpost_qualification'
    ,'label' => 'Qualification'
    // ,'description' => 'Terms will appear when they are added to <a href="' . network_admin_url() . 'edit-tags.php?taxonomy=jobpost_qualification&post_type=as_job">View All Terms</a>.'
    ,'attributes' => array(
      'multiple' => 'multiple'
    )
    ,'choices' => array(
                      '' => 'Choose Qualification'
                    ) + piklist(
                      get_terms('jobpost_qualification', array(
                        'hide_empty' => false
                      ))
                      ,array(
                        'term_id'
                        ,'name'
                      )
                )
));

piklist('field', array(
    'type' => 'select'
    ,'scope' => 'taxonomy'
    ,'field' => 'jobpost_experience'
    ,'label' => 'Experience'
    // ,'description' => 'Terms will appear when they are added to <a href="' . network_admin_url() . 'edit-tags.php?taxonomy=jobpost_experience&post_type=as_job">View All Terms</a>.'
    ,'choices' => array(
                      '' => 'Choose Experience'
                    ) + piklist(
                      get_terms('jobpost_experience', array(
                        'hide_empty' => false
                      ))
                      ,array(
                        'term_id'
                        ,'name'
                      )
                )
));

piklist('field', array(
    'type' => 'select'
    ,'scope' => 'taxonomy'
    ,'field' => 'jobpost_ctc'
    ,'label' => 'CTC Offered'
    // ,'description' => 'Terms will appear when they are added to <a href="' . network_admin_url() . 'edit-tags.php?taxonomy=jobpost_ctc&post_type=as_job">View All Terms</a>.'
    ,'choices' => array(
                      '' => 'Choose CTC'
                    ) + piklist(
                      get_terms('jobpost_ctc', array(
                        'hide_empty' => false
                      ))
                      ,array(
                        'term_id'
                        ,'name'
                      )
                )
));

piklist('field', array(
    'type' => 'editor'
    ,'scope' => 'post'
    ,'field' => 'field_name'
    ,'label' => __('Job Description')
    ,'options' => array (
      'wpautop' => true
      ,'media_buttons' => false
      ,'tabindex' => ''
      ,'editor_css' => ''
      ,'editor_class' => ''
      ,'teeny' => false
      ,'dfw' => false
      ,'tinymce' => true
      ,'quicktags' => true
    )
  ));



?>
