<?php
/*
 Template Name: Test
 */
get_header(); 
?>




<div class="jumbotron">
<h1 class="display-4">Welcome</h1>
  
  <p class="lead">We are a Kitchener-Waterloo based cat resuce organization and we always have cats that are looking for an adoption into a new forever home. Please spend some time to browse through our webpage. If you like what we are doing then consider to volunteer or to to donate.</p>

</div>


<div class="card card-inverse" style="background-color: #2882ab; border-color: #2882ab;">
  <div class="card-block">
    <h3 class="card-title">Auditioning For Adoption</h3>
    <p class="card-text">Pet Patrol is sponsored by two <a style="color: white;" href="http://www.petvalu.com/">Pet Valu</a> stores, one located in Waterloo and one in Elmira. These cats are presently keeping the staff company.</p>

  <div class="card-deck">




<!-- Auditioning -->
<?php
$queryNorthfield = new WP_Query( array(  'relation' => 'AND',
        'post_type' => 'aw_pp_cats' ,
        'meta_key' => 'aw_pp_cat_state', 'meta_value' => 'northfield'  ) );
                

$queryElmiraArthur = new WP_Query( array(  'relation' => 'AND',
        'post_type' => 'aw_pp_cats' ,
        'meta_key' => 'aw_pp_cat_state', 'meta_value' => 'elmiraarthur'  ) );

$numCatsForAudition = $queryNorthfield->have_posts()+$queryElmiraArthur->have_posts();

if($numCatsForAudition > 0) {
  aw_pp_audition_profile($queryNorthfield,"Northfield");
  aw_pp_audition_profile($queryElmiraArthur,"ElmiraArthur");
}
?>

</div>

  </div>
</div>

<div style="margin-bottom: 15px;"></div>


<?php get_footer(); ?>



