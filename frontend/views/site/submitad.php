<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->   
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'atextarea' });</script>
  <script src="<?php echo Yii::getAlias('@web') ?>/design/js/jquery-2.1.4.min.js"></script>
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use dosamigos\ckeditor\CKEditor;
use dosamigos\ckeditor\CKEditorInline;
use backend\models\FilterName;

?>
  <style>
      .abc {
          z-index: 1 !important;
      }
      .abcd {
          z-index: 1 !important;
      }
      #ui-datepicker-div {
          z-index: 2 !important;
      }
      </style>
<main>
  <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submitad-wrap">
      <div class="container submitad-main-outer">
      <h4 class="form-ttl">Ad Details</h4>
        <!--<form role="form">-->
        <?php
        $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
        ?>
         <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 submitad-main">
           <?= $form->field($model, 'advertise_title', ['template' => ' <div class="input-group hvr_div active custom-field-wrap">
              <label>Title<b class="asterisk">*</b></label>
              {input}
              <div class="error-placement">{error}<span id="textarea_feedback"></span></div>
                    </div>']) ?>
              
                

              
              
            
            
            <?= $form->field($model, 'category_id', ['template' => ' <div class="input-group hvr_div custom-field-wrap" id="cate">
              <label>Category<b class="asterisk">*</b></label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->textInput(['data-target'=>'#category', 'data-toggle'=>'modal', 'id'=>'showcat','readonly'=>true,'placeholder'=>"Please select category by clicking here"]); ?> 
             <div class="hiddene" >
                 <input id="advertisement-category_id" class="form-control fild_stle" name="Advertisements[category_id]">
                 
             </div>
             
             <div id="optional">
               
             </div>
             
             <div id="additional_optional">
               
             </div>
            
             <div class="input-group hvr_div custom-field-wrap description-popover">
                    
            </div> 
             
           
            <?= $form->field($model, 'description', ['template' => '  <div class="input-group hvr_div custom-field-wrap description-popover">
              <label>Description<b class="asterisk">*</b></label>
            {input}<div class="error-placement">{error}<span id="textarea_description"></span></div>
            </div>'])->textarea(array('rows'=>5, 'class'=>'form-control abc', 'placeholder'=>"Include the brand, model, age, and any included accessories.")); ?>  
                
        <?= $form->field($model, 'price', ['template' => '<div class="input-group hvr_div custom-field-wrap abcd">
              <label>Price<b class="asterisk">*</b></label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->textarea(array('rows'=>0, 'style' => 'resize:none', 'placeholder'=>"Enter Price", 'onchange' => 'ChangePriceCondition()')); ?> 
        
        <?= $form->field($model, 'condition', ['template'=>'<div class="input-group hvr_div contact-field-wrap">,
              <label>Condition<b class="asterisk">*</b></label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->dropDownList(['used'=>'Used', 'new'=>'New'],['class'=>'form-control abc', 'onchange' => 'ChangePriceCondition()']) ?>     
           

            <div class="input-group custom-field-wrap">
              <label>Upload photos</label>
              <div class="custom-file-input-wrap">
                  
                <?php 
              
// 
//
//                echo FileInput::widget([
//                    'name' => 'Advertisements[imageFiles][]',
//                     'pluginOptions' => [
//                        'id'=>'advertisements-imagefiles',
//                        'showCaption' => false,
//                        'showRemove' => true,
//                        'showUpload' => false,
//                        'browseClass' => 'btn btn-primary btn-block',
//                        'browseIcon' => '<i class="glyphicon glyphicon-camera"> Select Multiplae images(max-20)</i> ',
//                        'browseLabel' =>  'Select Photo'
//                    ],
//                    'options' => ['accept' => 'image/*', 'multiple' => true]
//                ]);

                ?>
               <div class="row"><div class="anyName1 col-md-3">
            <input name='Advertisements[imageFiles][]' type="file" accept="image/gif, image/jpeg, image/png">
        </div>
                <div class="anyName2 col-md-3">
            <input name='Advertisements[imageFiles][]' type="file" accept="image/gif, image/jpeg, image/png">
        </div><div class="anyName3 col-md-3" >
            <input name='Advertisements[imageFiles][]' type="file" accept="image/gif, image/jpeg, image/png">
        </div><div class="anyName4 col-md-3">
            <input name='Advertisements[imageFiles][]' type="file" accept="image/gif, image/jpeg, image/png">
        </div></div>
                <div class="row">
              <div class="anyName5 col-md-3">
            <input name='Advertisements[imageFiles][]' type="file" accept="image/gif, image/jpeg, image/png">
        </div><div class="anyName6 col-md-3">
            <input name='Advertisements[imageFiles][]' type="file" accept="image/gif, image/jpeg, image/png">
        </div><div class="anyName7 col-md-3">
            <input name='Advertisements[imageFiles][]' type="file" accept="image/gif, image/jpeg, image/png">
        </div><div class="anyName8 col-md-3">
            <input name='Advertisements[imageFiles][]' type="file" accept="image/gif, image/jpeg, image/png">
        </div>
             
            </div>
                  
              </div>
              
              </div><!-- /custom-field-wrap-->
<!--           <div class="row">
               
                 <div class="col-md-9 col-sm-9 pull-right twnty-padng ">
            
           <atextarea name="Advertisements[description]" id="advertisements-description" class="form-control abc"></atextarea>
            </div>
            </div>-->
           <?php if($user->is_company==1){
          echo $form->field($model, 'link', ['template' => ' <div class="input-group hvr_div  custom-field-wrap">
              <label>Video/Product link</label>
              {input}
              <div class="error-placement">{error}<span id="textarea_feedback"></span></div>
                    </div>']);?>
        <?php   } ?>
               
            </div><!-- /submitad-main-->
           
<!--        <div class="col-md-3 col-sm-3 hidden-xs adpost-offer">
          <div class="adpost-offer-inr">
            <h4>Ad Posting Offers:</h4>
            <ul>
              <li>i) Lorem ipsum dolor sit amet Lorem ipsum </li>
              <li>ii) Lorem ipsum dolor sit amet Lorem ipsum </li>
              <li>iii) Lorem ipsum dolor sit amet Lorem ipsum </li>
              <li>iv)Lorem ipsum dolor sit amet Lorem ipsum </li>
            </ul>
          </div> /adpost-offer-inr
        </div> /adpost-offer-->
      <!--</form>-->
      <h4 class="form-ttl">Contact Details</h4>
      <section class="col-md-10 col-md-offset-2 col-sm-8 col-sm-offset-2 contact-dtl-wrap">
        <!--form role="form"-->
         <div class="col-md-9 col-sm-9 contact-dtl-main">

              <?= $form->field($model, 'contact_name', ['template' => ' <div class="input-group hvr_div contact-field-wrap">
                <div class="popup_shw"></div>              
                <label>Name<b class="asterisk">*</b></label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->textInput(['value'=>$user->name, 'class'=>'form-control abc']); ?> 
            
            
             <?= $form->field($model, 'mobile_number', ['template' => '<div class="input-group  hvr_div contact-field-wrap">
              <label>Phone<b class="asterisk">*</b></label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->textInput(['value'=>$user->mobile,'class'=>'form-control abc']); ?> 
              <?php if($user->is_company==1){
             echo $form->field($model, 'com_url', ['template' => '<div class="input-group  hvr_div contact-field-wrap">
              <label>Company URL<b class="asterisk">*</b></label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->textInput(['value'=>$user->com_url,'class'=>'form-control abc']);  
              } ?>
    <?php
         $city_name = \frontend\models\City::findOne($user->city);
          
         $city_all = \frontend\models\City::find()->where(['region_id'=>$user->state])->all();
         $city = ArrayHelper::map($city_all, 'id', 'name');
         $po_dropdown = ArrayHelper::map($po, 'id', 'code');        
          
        $state = \frontend\models\Region::findOne($user->state);
        $selected_city = \frontend\models\City::findOne($user->city);//         $state = ArrayHelper::map($array_region, 'id', 'name'); ?>

             <?php if($state['id']==0){ ?>
              <?= $form->field($model, 'state_id', ['template'=>'<div class="input-group hvr_div contact-field-wrap">
              <label>State<b class="asterisk">*</b></label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->dropDownList($region ,['options' => ['class'=>'form-control abc'], 'onChange'=>'select_city(this)']); ?>
             <?php }else{ ?>
                
             <?= $form->field($model, 'state_id', ['template'=>'<div class="input-group hvr_div contact-field-wrap">
              <label>State<b class="asterisk">*</b></label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->dropDownList($region ,['options' => [$state->id => ['Selected'=>'Selected']],'class'=>'form-control abc', 'onChange'=>'select_city(this)']); ?>
              
           <?php  }
             
             ?>
             
            
              <?= $form->field($model, 'city_id', ['template'=>'<div id="city" class="input-group hvr_div contact-field-wrap">
              <label>City<b class="asterisk">*</b></label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->dropDownList($city, ['options' => [$user->city => ['Selected'=>'Selected']],'class'=>'form-control abc']); ?>
             
            
<!--             <div class="input-group contact-field-wrap" id="city">
              <label>City<b class="asterisk">*</b></label>
              <select class="form-control">
                <option><?php // $city->name ?></option>
                
              </select>
            </div> /custom-field-wrap-->
               
            
             <?= $form->field($model, 'address', ['template' => '<div class="input-group hvr_div contact-field-wrap">
              <label>Address</label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->textinput(array('value'=>$user->address, 'rows'=>3, 'class'=>'form-control abc')); ?>  



               
             <?= $form->field($model, 'po_id', ['template'=>'<div id="po_id" class="input-group hvr_div contact-field-wrap">
              <label>Post Code<b class="asterisk">*</b></label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->dropDownList($po_dropdown,['class'=>'form-control abc', 'prompt' => ' -- Select Post Code --']); ?>
             


            <div class="submit-ad-button-box">
              <!--<a class="btn-submit-ad" href="#">Submit an Ad</a>-->              
              <?= Html::submitButton('Submit', ['class'=> 'btn-submit-ad']) ;?>
              <?= Html::submitButton('Preview', ['class'=> 'btn-submit-ad','onclick'=>'make_perview()' ,'name'=>'preview', 'id'=>'btn_preview']) ;?>
              <div class="tos-box">
                 By clicking "Submit", you accept our <a href="#">Terms of Use and conditions</a>
              </div>
            </div>
            
          
  <input type="hidden" name="perview_true" value="0" id="new_record" />
      <?php ActiveForm::end(); ?>
          </div><!-- /contact-dtl-main-->
          
        <!--/form-->
        <div class="col-md-2 contact-dtl-right hidden-sm hidden-xs">
            <br><br><br>
           <?php if(!empty($user->img)){?>
            <img class="img-responsive" src="<?=Yii::$app->request->baseUrl?>/user/<?= $user->id?>.<?= $user->img?>">
            <?php } else { ?>
                <img alt="LOGO" class="img-responsive" src="<?=Yii::$app->request->baseUrl?>/uploads/noimg.png">
                <?php } ?>
        </div>
     </section>

      </div>
      </section>
<!-- category_select-->
<div id="category" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" class="modal fade custom-modal custom-modal2">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="col-lg-4 col-md-4 col-sm-4 col-xs-12 modal-title">Categories</h4>
            <h4 class="col-lg-4 col-md-4 col-sm-4 col-xs-12 modal-title example" id="categoryName">Categories Name</h4>
            <h4 class="col-lg-3 col-md-3 col-sm-3 col-xs-12 modal-title example" id="selectCategory">Selected Category</h4>
          </div>
          <div class="category-box-inr">
           
              
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 category-left-list category-list-active main" id="clickCategory">
              <ul id="saved-list">
                  <?php 
                  $a=[];
                  $b=[];
                  foreach($main_cat as $cat){
                      echo '<li class="" id="'.$cat->id.'">'.$cat->title.'<i class="fa fa-angle-right"></i></li>';
                  }
                  ?>
             
              </ul>  
            </div>
              
              
	        <div id="clickSubCategory" >
                            <?php foreach( $main_cat as $scat){ ?>
                          
            <!--------------------------2rd Step Start-------------------------------------------->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 category-left-list example sub3 subm" id="s<?= $scat->id; ?>">
              <ul> 
                <?php
               
                 $child_cats = \frontend\models\Category::find()->where(['parent_id'=>$scat->id])->all();
                foreach( $child_cats as $scattit){ 
                    
                   $end;
                  $end = \frontend\models\Category::find()->where(['parent_id'=>$scattit->id])->one();
                 if(!isset($end)){
                    $end = "end2";
                 }else{  $end = "no"; 
                 array_push($a, $scattit->id);
                 
                 }
                  ?>
                  
                  <li class="<?= $end ?>" catid="<?= $scattit->id; ?>"  target="sb<?= $scattit->id; ?>"><?= $scattit->title; ?> <?php if( $end == "no"){ ?><i class="fa fa-angle-right"></i><?php } ?></li>
                
                <?php  } ?>
              </ul>  
            </div>
                                
                          <?php  } ?>
            
            <?php foreach( $main_cat as $scat){ ?>
                          
            <!--------------------------2rd Step Start-------------------------------------------->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 category-left-list example sub3 subm sb ssb" id="sb<?= $scat->id; ?>">
              <ul> 
                <?php
               
                 $child_cats = \frontend\models\Category::find()->where(['parent_id'=>$scat->id])->all();
                foreach( $child_cats as $scattit){ 
                    
                   $end;
                  $end = \frontend\models\Category::find()->where(['parent_id'=>$scattit->id])->one();
                 if(!isset($end)){
                    $end = "end3";
                 }else{  $end = "no"; 
                 array_push($a, $scattit->id);
                 
                 }
                  ?>
                  
                  <li class="<?= $end ?>" catid="<?= $scattit->id; ?>"  target="sb<?= $scattit->id; ?>"><?= $scattit->title; ?> <?php if( $end == "no"){ ?><i class="fa fa-angle-right"></i><?php } ?></li>
                
                <?php  } ?>
              </ul>  
            </div>
                                
                          <?php  } ?>
            
            
                       
                        
                 <!--------------------------2rd Step end-------------------------------------------->    
	
		<!--------------------------3rd Step Start-------------------------------------------->
                
		
            <?php
//            print_r($a);
            foreach($a as $child){
                $schilds = \frontend\models\Category::find()->where(['parent_id'=>$child])->all();
//               echo $child;
                
                ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 category-left-list example sub sb ssb" id="sb<?= $child ?>">
                    <ul class="ssb">
            <?php
                foreach($schilds as $schild ){
                        $end;
                  $end = \frontend\models\Category::find()->where(['parent_id'=>$schild->id])->one();
                 if(!isset($end)){
                    $end = "end3";
                 }else{  $end = "no"; 
                 array_push($a, $scattit->id);
                 
                 } ?>
                    <li class="<?= $end ?>" catid="<?= $schild->id; ?>"  target="lst<?= $schild->id; ?>"><?= $schild->title; ?> <?php if( $end == "no"){ ?><i class="fa fa-angle-right"></i><?php } ?></li> 
               <?php } ?>
                    </ul>  
                     </div>                   
           <?php
            }
            ?>       
                
               

            
                
                
 <?php 
              $main_cat_lst = \frontend\models\Category::find()->all();
             foreach( $main_cat_lst as $scat){ ?>
                          
            <!--------------------------2rd Step Start-------------------------------------------->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 category-left-list example sub3 subm sb ssb lst" id="lst<?= $scat->id; ?>">
              <ul> 
                <?php
               
                 $child_cats = \frontend\models\Category::find()->where(['parent_id'=>$scat->id])->all();
                foreach( $child_cats as $scattit){ 
                   
                  ?>
                  
                  <li catid="<?= $scattit->id; ?>"  target="sb<?= $scattit->id; ?>"><?= $scattit->title; ?></li>
                
                <?php  } ?>
              </ul>  
            </div>
                                
                          <?php  } ?>
                        
            </div>	
         
             
          </div>

        </div>

      </div><!-- /Modal content-->
     
    </div><!-- /Modal -->
   



<!-- Ads Boxes -->
<!--  <div class="ads-vr ads-vr-left">Space Available For Ad</div>
  <div class="ads-vr ads-vr-right">Space Available For Ad</div>-->
<!-- /Ads Boxes -->
</main>
<script>
    
    //This function copy the Price and Condition values from the original text box
    //and put in into filters textboxes.
    function ChangePriceCondition()
    {
        var original_price = document.getElementById('advertisements-price').value;
        var original_condition = document.getElementById('advertisements-condition').value;
        var hidden_price = document.getElementById('hidden_filter_price');
        var hidden_condition = document.getElementById('hidden_filter_condition');
        //alert("test" + original_price);
        //alert("sceond   " + original_condition);
        hidden_price.value = original_price;
        hidden_condition.value = original_condition;        
    }
    
    
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    function select_city(item) {
        $.ajax({
            type: "GET",
            url: "<?php echo Yii::$app->getUrlManager()->createUrl('site/select_city'); ?>",
            data: {
                id: item.value
            },

            success: function(data) {
                document.getElementById("city").innerHTML = data;
            }
        });
    }
    
    function subdropdown(id)
    {
        var dd_id = id.value;
        dd_id = $(id).find(':selected').attr('data_value')  //this variable contains the ID of dropdown's options
      //  alert(dd_id)
          $.ajax({
            type: "GET",
            dataType: "html",
            url: "<?php echo Yii::$app->getUrlManager()->createUrl('site/sub_dd_options'); ?>",
            data: {
                id: dd_id
            },success: function(data) {
                // document.getElementById("additional_optional").innerHTML = "asdasdasd";
                // debugger;

                document.getElementById("additional_optional").innerHTML = data;
            },
            error: function() {
            console.log(arguments);
            }

            });
    }
    
    
jQuery(document).ready(function($) {

    var text_max = 99;
    $('#textarea_feedback').html(text_max + ' letters remaining');

    $('#advertisements-advertise_title').keyup(function() {
        var text_length = $('#advertisements-advertise_title').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' letters remaining');
    });
    
    
    var text_max_des = 4096;
    $('#textarea_description').html(text_max_des + ' letters remaining');

    $('#advertisements-description').keyup(function() {
        var text_length = $('#advertisements-description').val().length;
        var text_remaining = text_max_des - text_length;

        $('#textarea_description').html(text_remaining + ' letters remaining');
    });
    

    $('[data-toggle="popover"]').popover();   

    
    $("#btn_preview").click(function(){        
//        var idString = $( this ).text() + " = " + $( this ).attr( "target" );
        
//        if(idString != '1undefined'){
//            alert("echo");
//        }
            
//    alert(idString);
        $('#w0').attr('target', '_black');
        $('#w0').removeAttr("action");
        $('#w0').attr('action', '<?php echo Yii::$app->getUrlManager()->createUrl('site/submitad_preview'); ?>');
        
//        $('#w0').renameAttr('action', 'test123' );
    });
    

    
    });
    
    function make_perview()
    {
        $('#new_record').val('1');
    }
    
    function img(item){
    alert(item);   
    }
    
  $('.input-group').click(function() {
    $('.input-group.active').removeClass('active');
    $(this).closest('.input-group').addClass('active');
});


</script>

<script src="<?php echo Yii::getAlias('@web') ?>/design/js/jquery.upload_preview.min.js"></script>
    <script type="text/javascript">
        $('.anyName1').uploadPreview({
            width: '80px',
            height: '80px',
            backgroundSize: 'cover',
            fontSize: '8px',
            borderRadius: '80px',
            border: '3px solid #dedede',
            lang: 'en', //language
        });
          $('.anyName2').uploadPreview({
            width: '80px',
            height: '80px',
            backgroundSize: 'cover',
            fontSize: '8px',
            borderRadius: '80px',
            border: '3px solid #dedede',
            lang: 'en', //language
        });
          $('.anyName3').uploadPreview({
            width: '80px',
            height: '80px',
            backgroundSize: 'cover',
            fontSize: '8px',
            borderRadius: '80px',
            border: '3px solid #dedede',
            lang: 'en', //language
        });
          $('.anyName4').uploadPreview({
            width: '80px',
            height: '80px',
            backgroundSize: 'cover',
            fontSize: '8px',
            borderRadius: '80px',
            border: '3px solid #dedede',
            lang: 'en', //language
        });
          $('.anyName5').uploadPreview({
            width: '80px',
            height: '80px',
            backgroundSize: 'cover',
            fontSize: '8px',
            borderRadius: '80px',
            border: '3px solid #dedede',
            lang: 'en', //language
        });
          $('.anyName6').uploadPreview({
            width: '80px',
            height: '80px',
            backgroundSize: 'cover',
            fontSize: '8px',
            borderRadius: '80px',
            border: '3px solid #dedede',
            lang: 'en', //language
        });
          $('.anyName7').uploadPreview({
            width: '80px',
            height: '80px',
            backgroundSize: 'cover',
            fontSize: '8px',
            borderRadius: '80px',
            border: '3px solid #dedede',
            lang: 'en', //language
        });
          $('.anyName8').uploadPreview({
            width: '80px',
            height: '80px',
            backgroundSize: 'cover',
            fontSize: '8px',
            borderRadius: '80px',
            border: '3px solid #dedede',
            lang: 'en', //language
        });
    </script>
 
<?php $this->endBody() ?>