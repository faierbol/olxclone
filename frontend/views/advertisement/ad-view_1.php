<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
 $adid = $_GET['id'];
 $userid = YII::$app->user->id;
?>

    <!-- Custom Stylesheet -->
<main>
	 <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 adview-wrap">
			<div class="container">
				<div class="col-md-9 adview-content">
						<div class="offercontent">
								<div class="offerheadinner">
										<h1><?= $ads->advertise_title ?></h1>
										<p>
												<span class="offerheadleft">
														<span class="markerloc"></span>
													<span class="offerheadtxt"><?= $state->name ?>, <?=  $city->name ?></span>
												</span>
												<span class="offerheadright">
														<span>Added at <?= Yii::$app->formatter->asDatetime($ads->created_date)?>, <span>Ad ID: <span><?= $ads->id ?></span></span>
														</span>
												</span>
										</p>
								</div>
								
								
								
								
								
								
								
								
								
								
								
								
<div class="col-xs-12">
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            
            <?php 
    
    $k=0;
    
    if(empty($imgs)){
        ?>
            
            <div class="item active">
                <img class="fancybox" src="./design/img/no-image-available.jpg">
            </div>
              <?php
              
              
    }
    else {
    foreach($imgs as $img){?>
            
            <div class="item <?php if ($k==0) { ?> active <?php } ?>">
                <img class="fancybox" src="<?php echo Yii::getAlias('@web') ?>/uploads/<?= $img->advertise_id?>/<?= $img->image?>">
            </div>
              <?php
              
              $k=$k+1;
    } }?>
        </div>
    </div> 
    <div class="clearfix">
        <div id="thumbcarousel" class="carousel slide" data-interval="false">
            <div class="carousel-inner">
                <?php 
        $t=0;
    foreach($imgs as $img){?>
                <div class="item active">
                    <div data-target="#carousel" data-slide-to="<?php echo $t; ?>" class="thumb">
                        <img src="<?php echo Yii::getAlias('@web') ?>/uploads/<?= $img->advertise_id?>/<?= $img->image?>"></div>
                   
                </div><!-- /item -->
                <?php
              
              $t=$t+1;
            } 
            
          ?>
            </div><!-- /carousel-inner -->
          <?php if(!empty($imgs)) { ?>
            <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
            
          <?php } ?>
        </div> <!-- /thumbcarousel -->
    </div><!-- /clearfix -->
</div> <!-- /col-xs-12 -->

			<div class="addescriptionwraptxt">
									<div class="addescriptiontoptxt">
<!--										<h4>Brand</h4>
										<p>Nokia</p>-->
									</div>
									<p><?= $ads->description ?></p>
									<div class="adnote">
											When you call, don't forget to mention that you found this ad on Adpost.no
											I do not wish to be contacted by telemarketers or representatives of any other website. 
									</div>
									<div class="adview">
											Views:<strong><?= $ads->views ?></strong>
									</div>
								</div>
						</div>
                                   
				</div><!--/.adview-content-->
                                <div class="col-md-3 adview-right">
					<div class="row">
						<div class="pricelabel text-center">
					Kr. <?= $ads->price ?>
						</div>
						<div class="userdatabox">
						   <div class="userbox">
						      <span class="icon-user"></span>
						      <div class="userdetails">
						         <div class="ad-user-name"><?= $ads->contact_name ?></div>
						         <!-- <div class="ad-user-status">Away</div>     -->
						         <!-- <div class="sinceline">Active on site since 1 Month</div> -->
						         <div class="">
						         	<!-- <a href="https://www.olx.com.pk/all-results/user/1WnVl/" class="link lheight22 normal" id="linkUserAds"> -->
						         		<span>User Ads</span>
						         	</a>
						         </div>
						      </div>
						   </div>
						</div><!--/userdatabox-->
						<div class="verifiednumberbox">
							<span class="icon-verify"></span>
							<b><?= $ads->mobile_number ?></b>
						</div><!--/verifiednumberbox-->
						<div class="safetyTipsBox">
						   <h4 class="text-center">Safety Tips for Buyers</h4>
						   <ol>
						      <li>Meet seller at a safe location</li>
						      <li>Check the item before you buy</li>
						      <li>Pay only after collecting item</li>
						   </ol>
						   <div class="text-right">
						      <!-- <a href="#" target="_blank">Know more »</a> -->
						   </div>
						</div><!--/safetyTipsBox-->
						<?php if(yii::$app->user->id && ($ads->user_id != yii::$app->user->id )) {?>
                                                <div class="sendmsgbox">
						   <h4>Email Seller</h4>
						   <form>
							<textarea id="msg" name="msg" class="form-control" rows="3"></textarea>
							<a class="btn" id="submit" onclick="msg('<?= $adid ?>')" type="submit" name="submit"  ><i class="fa fa-envelope" aria-hidden="true"></i> Send</a>	
						   </form>
						</div>
                                                <?php } ?>
						<!-- Google Ads-->
						<!--<div class="google-ads" style="float: left;width: 100%; margin: 15px 0;">
							<img style="width: 100%;" src="https://tpc.googlesyndication.com/simgad/16239303515741555270">
						</div>-->
						<!-- Google Ads-->

					</div>
				</div><!--/adview-right-->
                                <br clear="all">
                                 <div class="col-md-12">
						<div class="offercontent">
							<h2 class="useradttl">Similar Ads</h2>
							<table class="table userotherads">
								<tr>
								<?php foreach($random_ads as $random_ad){ 
						$imgs=  \backend\models\Images::find()->where(['advertise_id'=>$random_ad->id])->one();
							?>
									<td>
										<p><?= Yii::$app->formatter->asDate($random_ad->created_date, 'php:d-M')?></p>
									</td>
                                                                        
                                                                        <?php if(!empty($imgs)){?>
									<td class="td-img">
										<a href="<?= Yii::$app->urlManager->createUrl(['advertisement/ad-view', 'id' => $random_ad->id]) ?>" title="QMobile Noir i9">
										<img class="img-responsive" src="<?php echo Yii::getAlias('@web') ?>/uploads/<?= $random_ad['id']?>/<?= $imgs['image']?>">
										</a>
									</td>
                                                                        <?php } else {?>
                                                                        <td class="td-img">
										<a href="<?= Yii::$app->urlManager->createUrl(['advertisement/ad-view', 'id' => $random_ad->id]) ?>" title="QMobile Noir i9">
										<img class="img-responsive" src="./design/img/no-image-available_thumb.jpg">
										</a>
									</td>
                                                                        <?php }?>
									<td>
										<a href=""><p><?= $random_ad->advertise_title?></p></a>
										<!-- <p>Qmobile</p> -->
									</td>
									<td class="td-price">
										<p>Kr. <?= $random_ad->price?></p>
									</td>
								</tr>
								<?php     } ?>
							</table>
							<div class="google-ads-container"></div>
						</div>
					</div><!-- /offercontent-->
				
				
                                <br clear="all">
                                
			</div>
			<!-- /container-->
	 </section>
	 
<!-- Ads Boxes -->
	<!--<div class="ads-vr ads-vr-left">Space Available For Ad</div>
	<div class="ads-vr ads-vr-right">Space Available For Ad</div>-->
<!-- /Ads Boxes -->
</main>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>