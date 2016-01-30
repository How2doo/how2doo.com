<section>
    <div class="block">

        <div class="container">
            <div class="row">

                <div class="col-md-12 column">
                    <div class="list-blog-posts">
					<?php
					$post=$dbCon->query("SELECT * FROM post WHERE post_status='1' ORDER BY post_rating DESC");
					while($repost = $post->fetch_object()){
					?>
                        <div class="single-post">

                            <div class="top-post">

                                <ul class="post-share-icons">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>

                                <div class="attachement-post overlay-img" style="height: 212px; overflow: hidden;">
                                    <img src="images/blog/<?php echo $repost->post_cover;?>" alt="">
                                </div><!--/ Attachement -->

                            </div><!-- top post -->

                            <div class="content-single-post">
                                <h3><a href="<?php echo $url.'post/'.$repost->post_id;?>" title=""><?php echo $repost->post_name;?></a></h3>
                                <p><?php echo truncateStr($repost->post_description,300);?></p>

                                <ul class="metas">
                                    <li>
                                        <div class="user-avatar-small"><img src="images/profile.png" alt=""></div>
                                        <a href="#" title="">Salah Raddaoui</a>
                                    </li>
                                    <li><i class="fa fa-clock-o"></i> <?php echo convertdate($repost->post_datetime);?></li>
                                </ul>

                            </div><!-- content post -->

                        </div><!--/ Single Post / Standard Post -->
					<?php
					}
					?>
                        <div class="single-post hidden">

                            <div class="top-post">

                                <div class="attachement-post postgallery-slider">
                                    <!-- item 1 -->
                                    <div class="item"><img src="images/blog/blog-img21.jpg" alt=""></div>
                                    <!-- item 2 -->
                                    <div class="item"><img src="images/blog/blog-img22.jpg" alt=""></div>
                                    <!-- item 3 -->
                                    <div class="item"><img src="images/blog/blog-img24.jpg" alt=""></div>
                                </div><!--/ Attachement -->

                            </div><!-- top post -->

                            <div class="content-single-post">
                                <div class="post-category"><a href="#">Entairtenement</a></div>
                                <h3><a href="#" title="">Post Width Gallery images</a></h3>
                                <p>Mauris id sapien ante. Praesent vulputate feugiat quam. eget blandit nunc suscipit. Ut placerat urna ac nisl</p>

                                <ul class="metas">
                                    <li>
                                        <div class="user-avatar-small"><img src="images/profile.png" alt=""></div>
                                        <a href="#" title="">Salah Raddaoui</a>
                                    </li>
                                    <li><i class="fa fa-clock-o"></i> 10 March 2015</li>
                                </ul>

                            </div><!-- content post -->

                        </div><!--/ Single Post / Gallery Post -->


                        <div class="single-post hidden">

                            <div class="top-post">

                                <div class="attachement-post">
                                    <iframe height="240" src="http://www.youtube.com/embed/niHSsSIfyDw"></iframe>
                                </div><!--/ Attachement -->

                            </div><!-- top post -->

                            <div class="content-single-post">
                                <div class="post-category"><a href="#">Video Tutorial</a></div>
                                <h3><a href="#" title="">Post Width Youtube Video</a></h3>
                                <p>Mauris id sapien ante. Praesent vulputate feugiat quam. eget blandit nunc suscipit. Ut placerat urna ac nisl</p>

                                <ul class="metas">
                                    <li>
                                        <div class="user-avatar-small"><img src="images/profile.png" alt=""></div>
                                        <a href="#" title="">Salah Raddaoui</a>
                                    </li>
                                    <li><i class="fa fa-clock-o"></i> 10 March 2015</li>
                                </ul>

                            </div><!-- content post -->

                        </div><!--/ Single Post / Video Post -->

                        <div class="pagination-area">
                            <ul class="pagination-lists">
                                <li><a href="#">1</a></li>
                                <li><a class="active" href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                            </ul>
                            <ul class="pagination-arrows">
                                <li class="next"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                <li class="previous"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div><!-- Pagination -->


                    </div><!--/ list posts -->
                </div><!-- column -->
 

            </div><!--/ row  -->    
        </div><!--/ Container ends  -->    

    </div><!--/ Block -->    
</section>
<!--/ end Section -->