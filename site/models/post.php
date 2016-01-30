<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.5&appId=297398273735176";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<section>
    <div class="block">

        <div class="container">
            <div class="row">

                    <div class="col-md-8 column">
					<?php
					$post_id = $get_part1;
					$post=$dbCon->query("SELECT * FROM post WHERE post_id='$post_id'");
					while($repost = $post->fetch_object()){
					?>
                        <div class="blog-post-box">
                            <div class="post-attachement">
                                <img src="<?php echo $urlimg;?>/images/blog/<?php echo $repost->post_cover;?>" alt="">  
                            </div><!-- Post attachement -->

                            <div class="post-metas">
                                <ul class="left-metas">
                                    <li>
                                        <img class="avatar-post" src="images/profile.png" alt="">
                                        <a href="#" title="">Salah Raddaoui</a>
                                    </li>
                                    <li>in <a href="#" title="">Wordpress Tuts</a></li>
                                </ul>

                                <ul class="right-metas">
                                    <li><i class="fa fa-clock-o"></i> <?php echo convertdate($repost->post_datetime);?></li>
                                    <li><i class="fa fa-comment-o"></i> 12 comments</li>
                                </ul>
                            </div><!--/ post metas -->

                            <div class="post-content">
								
                                <h1 class="post-title"><?php echo $repost->post_name;?></h1>
								
                                <p><?php echo $repost->post_description;?></p>
                            </div><!--/ post content -->


                            <div class="share-post">
                                <ul>
                                    <li><a href="#" class="re-tooltip" title="Facebook" data-placement="top"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="re-tooltip" title="Twitter" data-placement="top"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="re-tooltip" title="Pinterest" data-placement="top"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a href="#" class="re-tooltip" title="Linkedin" data-placement="top"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#" class="re-tooltip" title="Google Plus" data-placement="top"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
						
                        </div><!-- Blog Post Box --> 
					<?php
					}
					?>
					
					<?php
					$step=$dbCon->query("SELECT * FROM post_step WHERE post_id='$post_id'");
					while($restep = $step->fetch_object()){
					?>
						<div class="blog-post-box" style="margin-top:20px;">
							<div class="post-metas" style="margin-bottom:0px; padding:20px 30px;">
                                <ul class="left-metas">
								  <li> <div class="numberCircle"><?php echo $restep->step_number;?></div></li> 
                                </ul> 
								<ul class="left-metas">
								  <li style="margin: 18px 0px 18px 18px; font-size:20px; color:#fff"> <?php echo $restep->step_title;?></li> 
                                </ul>
                            </div><!--/ post metas -->
							
                            <div class="post-attachement" style="margin-bottom:20px;">
                                <img src="<?php echo $urlimg;?>/images/blog/<?php echo $restep->step_img;?>" alt="">  
                            </div><!-- Post attachement -->

                            <div class="post-content">
                                <p><?php echo $restep->step_description;?></p>
                            </div><!--/ post content -->

						
                        </div><!-- Blog Post Box --> 
					<?php
					}
					?>

                        <div class="related_posts">
                            <div class="box-heading"><h4>Related Posts</h4></div>

                            <!-- Related Posts Carousel -->
                            <div class="relatedposts_carousel owl-carousel">

                                    <div class="item">
                                        <div class="overlay-img"></div><!-- overlay -->
                                        <a href="#">
                                            <img src="images/blog/blog-img3.jpg" alt="">
                                        </a>

                                        <div class="post_infos">
                                            <h3><a href="#" title="">Bright and Stylish for the Summer</a></h3>
                                        </div><!-- Post info -->
                                    </div>
                                    <!--/ Single item  -->

                            </div><!--/ Related Posts Carousel  -->

                        </div><!--/ Related Posts --> 
						<div class="related_posts">
						<div class="fb-comments" data-href="<?php echo $url."/".$get_part0."/".$get_part1;?>" width="100%" data-numposts="5"></div>
						</div>
                    </div><!--/ column -->



                    <div class="col-md-4 column">
                    <div class="sidebar">
                        

						<!-- Start Widget -->
                        <div class="widget about-me-widget">
                            <div class="widget-body">
                            <?php
							$member=$dbCon->query("SELECT * FROM member LEFT JOIN post ON member.member_id=post.member_id");
							while($result_member = $member->fetch_object()){
							?>    
                                <div class="img-profile">
                                    <img src="<?php echo $urlimg;?>/images/avatar/<?php echo $result_member->member_avatar;?>" alt="">
                                </div>   

                                <div class="content-profile">
                                    <h5><?php echo $result_member->member_name;?> <?php echo $result_member->member_surname;?></h5>
                                    <p>
                                        My name is Salah Doe, a lifestyle Web designer and blogger currently living in Salé, Morocco. I write my thoughts and travel stories inside this blog.
                                    </p>
                                    <ul class="social-icons-profile">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    </ul>
                                </div>                             
							<?php
							}
							?>
                            </div>
                        </div>
                        <!-- End Widget -->

						
                        <!-- Start Widget -->
                        <div class="widget widget-recent-posts">
                            <div class="widget-heading"><h4>Popular Posts</h4></div>
                            <div class="widget-body">
                                
                                <ul class="recent-posts">
								<?php
								$post=$dbCon->query("SELECT * FROM post WHERE post_status='1' ORDER BY post_rating DESC");
								while($repost = $post->fetch_object()){
								?>
                                    <!-- one Post -->
                                    <li>
                                        <div class="post_img">
                                            <img src="<?php echo $url;?>/images/blog/<?php echo $repost->post_cover;?>" alt="">
                                        </div>
                                        <div class="the_post_container">
                                            <div class="date"><?php echo convertdate($repost->post_datetime);?></div>
                                            <h5 class="posttitle"><a href="#"><?php echo $repost->post_name;?></a></h5>
                                        </div>
                                    </li>
								<?php
								}
								?>
                                    
                                </ul>

                            </div>
                        </div>
                        <!-- End Widget -->


                        <!-- Start Widget -->
                        <div class="widget widget-categories">
                            <div class="widget-heading"><h4>Categories</h4></div>
                            <div class="widget-body">
                                <ul>
								<?php
								$category=$dbCon->query("SELECT * FROM category LEFT JOIN post ON category.category_id=post.category_id ORDER BY category_name asc");
								while($recategory = $category->fetch_object()){
								?>    
                                    <li><a href="#"><?php echo $recategory->category_name;?></a> <span><?php echo countcategory($recategory->category_id);?></span></li>
								<?php
								}
								?>
                                </ul>

                            </div>
                        </div>
                        <!-- End Widget -->


                        <!-- Start Widget -->
                        <div class="widget widget-tags">
                            <div class="widget-heading"><h4>Tags</h4></div>
                            <div class="widget-body">
                                
                                <a class="tag-link" href="#">Blog</a>

                            </div>
                        </div>
                        <!-- End Widget -->


                        <!-- Start Widget -->
                        <div class="widget widget-ads-300">
                            <div class="widget-heading"><h4>Advertisement</h4></div>
                            <div class="widget-body">
                                
                                <div><a href="#" title="">
                                    <img src="images/ads300.jpg" alt="">
                                </a></div>

                            </div>
                        </div>
                        <!-- End Widget -->

                    </div><!-- sidebar -->
                </div><!-- column -->



            </div><!--/ row  -->    
        </div><!--/ Container ends  -->    

    </div><!--/ Block -->    
</section>
<!--/ end Section -->