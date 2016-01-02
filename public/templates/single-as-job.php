<?php get_header();?>

    <?php 
$post = array(
  'post_title'     => wp_strip_all_tags($_POST['']);
  'post_content'   => $_POST['post_content'];
  'post_status'    => 'publish';
  'post_type'      => 'jobpost_applicants';
  'post_parent'    => $post->ID; // Sets the parent of the new post, 
  'post_category'  => //[ array(<category id>, ...) ] // Default empty.
  'tax_input'      => array(
                        'jobpost_category' => $_POST[]
                        ,'jobpost_job_type' => $_POST[]
                        ,'jobpost_location' => $_POST[]
                        ,'jobpost_qualification' => $_POST[]
                        ,'jobpost_experience' => $_POST[]
                        ,'jobpost_ctc' => $_POST[]      
                        );
    
    //[ array( <taxonomy> => <array | string>, <taxonomy_other> => <array | string> ) ] // For custom taxonomies. Default empty.
);  

?>

        <div class="cntn-sec">
            <div class="wper">
                <div class="pg-lft-clm">
                    <div class="pg-bnr">
                        <span class="pg-brn-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Be-Informed-bnr.png" align="right"> </span>
                        <div class="pg-bnr-tilel">
                            <div>
                                <h2><?php echo ucfirst($post->post_type);?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="pg-cntnt">
                        <?php get_template_part('partials/breadcrumbs/breadcrumbs');?>
                            <?php if(have_posts()) : while(have_posts()) : the_post();?>
                                <div class="tbl-ovr-flo">
                                    <table class="jobs">
                                        <tbody>
                                            <tr>
                                                <td>Designation :</td>
                                                <td>Accounts Executive</td>
                                            </tr>
                                            <tr>
                                                <td>Department :</td>
                                                <?php $departments = wp_get_post_terms($post->ID, 'jobpost_category', array("fields" => "all")); ?>
                                                    <td>
                                                        <?php foreach($departments as $dept) {
                                            echo $dept->name;
                                        } ?>
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td>Job Code :</td>
                                                <td>
                                                    <?php echo get_post_meta($post->ID, 'postal_code', true)?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>No. of Openings :</td>
                                                <td>
                                                    <?php echo get_post_meta($post->ID, 'no_of_opening', true)?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Job Qualification :</td>
                                                <?php $qualifications = wp_get_post_terms($post->ID, 'jobpost_qualification', array('fields' => 'all'));?>
                                                    <td>
                                                        <?php
                                                    foreach($qualifications as $qualification) { echo $qualification->name; } ?>
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td>Job Experience :</td>
                                                <?php $experiences = wp_get_post_terms($post->ID, 'jobpost_experience', array('fields' => 'all'));?>
                                                    <td>
                                                        <?php
                                            foreach($experiences as $experience){echo $experience->name;}
                                            ?>
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td>Job Location :</td>
                                                <?php $locations = wp_get_post_terms($post->ID, 'jobpost_location', array('fields'=> 'all'))?>
                                                    <td>
                                                        <?php foreach($locations as $location){ echo $location->name;} ?>
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td>Job Type :</td>
                                                <?php $jobtype = wp_get_post_terms($post->ID, 'jobpost_job_type', array('fields'=> 'all'))?>
                                                    <td>
                                                        <?php foreach($jobtype as $type){ echo $type->name;} ?>
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td>CTC :</td>
                                                <?php $ctcs = wp_get_post_terms($post->ID, 'jobpost_ctc', array('fields'=> 'all'))?>
                                                    <td>
                                                        <?php foreach($ctcs as $ctc){ echo $ctc->name;} ?>
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td>Job Description :</td>
                                                <td>
                                                    <?php echo get_the_content();?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <?php endwhile; endif;?>


                                    <div class="accordion">
                                        <div class="accordion-section">
                                            <a style="width:150px; color:#fff; padding: 8px 16px; border-bottom:3px solid #9e2013;" href="#as" class="accordion-section-title btn-accordion active">Apply Now</a>

                                            <div class="accordion-section-content open" id="as" style="display: block;">
                                                <div class="apply-frm" id="apply">
                                                    <h1>Applicant Details Form</h1>
                                                    <form enctype="multipart/form-data" id="cs-assignments-form" name="c-assignments-form" class="jobpost_form">
                                                        <h2>Personal Details</h2>
                                                        <div class="form-group input-bx">
                                                            <label for="jobapp_name">Name</label>
                                                            <input type="text" required="" id="jobapp_name" class="form-control" name="jobapp_name">
                                                        </div>
                                                        <div class="form-group input-bx">
                                                            <label for="jobapp_contact_no_">Contact No </label>
                                                            <input type="text" required="" id="jobapp_contact_no_" class="form-control" name="jobapp_contact_no_">
                                                        </div>
                                                        <div class="form-group input-bx">
                                                            <label for="jobapp_email_id">Email Id</label>
                                                            <input type="text" required="" id="jobapp_email_id" class="form-control" name="jobapp_email_id">
                                                        </div>
                                                        <div class="form-group input-bx">
                                                            <label for="jobapp_age">Age</label>
                                                            <input type="text" required="" id="jobapp_age" class="form-control" name="jobapp_age">
                                                        </div>
                                                        <div class="form-group input-bx">
                                                            <label for="jobapp_gender">Gender</label>
                                                            <div id="jobapp_gender">
                                                                <select required="" id="jobapp_gender" name="jobapp_gender">
                                                                    <option value="Male" class="">Male </option>
                                                                    <option value=" Female" class=""> Female </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group input-bx">
                                                            <label for="jobapp_educational_qualifications">Educational Qualifications</label>
                                                            <input type="text" required="" id="jobapp_educational_qualifications" class="form-control" name="jobapp_educational_qualifications">
                                                        </div>
                                                        <div class="form-group input-bx">
                                                            <label for="jobapp_professional_qualifications">Professional Qualifications</label>
                                                            <input type="text" required="" id="jobapp_professional_qualifications" class="form-control" name="jobapp_professional_qualifications">
                                                        </div>
                                                        <h2>Current Employment Detail</h2>
                                                        <div class="form-group input-bx">
                                                            <label for="jobapp_name_of_the_organisation">Name Of The Organisation</label>
                                                            <input type="text" required="" id="jobapp_name_of_the_organisation" class="form-control" name="jobapp_name_of_the_organisation">
                                                        </div>
                                                        <div class="form-group input-bx">
                                                            <label for="jobapp_designation">Designation</label>
                                                            <input type="text" required="" id="jobapp_designation" class="form-control" name="jobapp_designation">
                                                        </div>
                                                        <div class="form-group input-bx">
                                                            <label for="jobapp_duration_of_service">Duration Of Service</label>
                                                            <input type="text" required="" id="jobapp_duration_of_service" class="form-control" name="jobapp_duration_of_service">
                                                        </div>
                                                        <div class="form-group input-bx">
                                                            <label for="jobapp_role_&amp;_responsibility">Role &amp; Responsibility</label>
                                                            <textarea required="" id="jobapp_role_&amp;_responsibility" class="form-control" name="jobapp_role_&amp;_responsibility"></textarea>
                                                        </div>
                                                        <div class="form-group input-bx">
                                                            <label for="jobapp_current_ctc">Current Ctc</label>
                                                            <input type="text" required="" id="jobapp_current_ctc" class="form-control" name="jobapp_current_ctc">
                                                        </div>
                                                        <div class="form-group input-bx">
                                                            <label for="jobapp_overall_work_experience_(in_years)">Overall Work Experience (in Years)</label>
                                                            <input type="text" required="" id="jobapp_overall_work_experience_(in_years)" class="form-control" name="jobapp_overall_work_experience_(in_years)">
                                                        </div>
                                                        <div class="form-group input-bx">
                                                            <label for="jobapp_preferred_work_location">Preferred Work Location</label>
                                                            <input type="text" required="" id="jobapp_preferred_work_location" class="form-control" name="jobapp_preferred_work_location">
                                                        </div>
                                                        <div class="form-group input-bx">
                                                            <label for="applicant_resume">Attach Resume </label>
                                                            <input type="file" id="applicant_resume" class="" name="applicant_resume">
                                                            <label style="color:red;" id="file_error_message"></label>
                                                        </div>
                                                        <input type="hidden" value="<?php get_the_ID();?>" name="job_id">
                                                        <input type="hidden" value="process_applicant_form" name="action">
                                                        <input type="hidden" value="e41fdaf3a5" name="wp_nonce">
                                                        <div class="input-bx">
                                                            <label for=""></label>
                                                            <input type="submit" id="jobpost_submit_button" value="Submit" class="btn">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="jobpost_form_status"></div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
        <?php get_footer();?>