<?php
    if(isset($content)){
        $content = json_decode($question->content);
    }
    $width = $height = '';
    isset($content[0]->width) ? $width = $content[0]->width : '';
    isset($content[0]->height) ? $height = $content[0]->height : '';
?>
<?php

if(isset($firstFontSize)){
    $firstFontSize = $firstFontSize;
}else{
    $firstFontSize = '';
}

if(isset($firstStyle)){
    $firstStyle = $firstStyle;
}else{
    $firstStyle = '';
}

if(isset($firstFamily)){
    $firstFamily = $firstFamily;
}else{
    $firstFamily = '';
}

if(isset($firstFontSize1)){
    $firstFontSize1 = $firstFontSize1;
}else{
    $firstFontSize1 = '';
}

if(isset($firstStyle1)){
    $firstStyle1 = $firstStyle1;
}else{
    $firstStyle1 = '';
}

if(isset($firstFamily1)){
    $firstFamily1 = $firstFamily1;
}else{
    $firstFamily1 = '';
}

?>
<div class="euroinput" id="q_<?php echo e($question->id); ?>">
  <div class="row">
    <div class="col">
      <div class="d-flex relative-position" style="width: 230px;height:50px;">
        <span 
            class="coin" 
            style="color:<?php echo e($question->color1 == NULL ? 'black' : $question->color1); ?>; text-align: center !important; background-color: <?php echo e($question->color2 == NULL ? $question->color2 : $question->color2); ?>;font-size:<?php echo e($firstFontSize); ?>;font-style:<?php echo e($firstStyle); ?>;font-family:<?php echo e($firstFamily); ?>;">
          €
        </span>
        <input 
            type="text" 
            name="number" 
            onchange='formatEuros(<?php echo e($question->id); ?>)' 
            class="form-control euroNum" 
            value="0" 
            id="<?php echo e($question->id); ?>" 
            <?php if($question->required): ?> required <?php endif; ?> 
            style="border-color:<?php echo e($question->color2); ?>;<?php echo e($firstStyle); ?>">
      </div>
    </div>
  </div>
</div>

<script>
function formatEuros(id) {  
    var num = $("#"+id).val();
    var decimalPart;
    var array = Math.floor(num).toString().split('');
    var index = -3; 
    while ( array.length + index > 0 ) { 
        array.splice( index, 0, '.' );              
        index -= 4;
    }
    decimalPart = parseFloat(num, 10).toFixed(2).split(".")[1];
    var replacedValue = array.join('') + "," + decimalPart; 
    $(".euroNum").val(replacedValue);
}

</script><?php /**PATH F:\xampp\htdocs\diagnosi\resources\views/frontend/components/questions/euro.blade.php ENDPATH**/ ?>