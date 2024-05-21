<?php $__env->startSection('title', __('labels.backend.questions.title').' | '.app_name()); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h3 class="page-title float-left mb-0">Quetion_<?php echo e($question->id); ?></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><?php echo app('translator')->get('labels.backend.questions.fields.question'); ?></th>
                            <td><?php echo $question->question; ?></td>
                        </tr>
                        <tr>
                            <th>Question Type</th>
                            <td>
                                <?php if($question->questiontype == 0): ?>
                                    <p>Single Input</p>
                                <?php elseif($question->questiontype == 1): ?>
                                    <p>CheckBox</p>
                                <?php elseif($question->questiontype == 2): ?>
                                    <p>RadioGroup</p>
                                <?php elseif($question->questiontype == 3): ?>
                                    <p>Image Selection</p>
                                <?php elseif($question->questiontype == 4): ?>
                                    <p>Matrix</p>
                                <?php endif; ?>
                            </td>
                        </tr>
                     
                    </table>
                </div>
            </div><!-- Nav tabs -->

            
            <?php
           
                if($question->questiontype != "4"){
                    $content= json_decode($question->content);    
                }else{
                    $content = $question->content;
                }
            ?>
            <?php if($question->questiontype ==0): ?>
                    <div class="row main-content" id="single_input_part" >
                        <div class="col-8 form-group">
                        <label  class="control-label">Single Input</label>
                        <input type="textarea" class="form-control" rows="2" value="<?php echo e($content[0]->value); ?>">
                    
                        </div>
                        <div class="col-4">
                            <div class="form-body">                                    
                                <div class="form-group ">
                                    <img  src="/uploads/image/<?php echo e($question->questionimage); ?>"
                                    alt="single ptext part" style="max-height: 150px;">
                                </div>
                
                            </div>
                        </div>
                    </div>
            <?php elseif($question->questiontype ==1): ?>      
                <div class="row main-content" style="borde:1px solid #00ff00;" id="checkbox_part">
                    <div id="sortable-10" class="col-7 form-group" style="margin-left:20px">
                        <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                            <?php if(isset($c->label)): ?>
                                <div  class="checkbox">
                                    <label><input type="checkbox" ><?php echo e($c->label); ?></label>         
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-body">                                 
                            <div class="form-group ">
                                <img  src="/uploads/image/<?php echo e($question->questionimage); ?>"
                                alt="checkbox part" style="max-height: 150px;">
                            </div>
            
                        </div>
                    </div>
                </div>
            <?php elseif($question->questiontype ==2): ?>    
                <div class="row" style="borde:1px solid #00ff00;"    id="radio_part">
                    <div class="col-7  form-group " id="sortable-11" style="margin-left:20px">
                        <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($c->label)): ?>
                                <div class="radio">
                                    <label ><input type="radio" name="optradio"><?php echo e($c->label); ?></label>
                                </div>     
                            <?php endif; ?>  
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col-4">
                        <div class="form-body">                                    
                            <div class="form-group ">
                                <img src="/uploads/image/<?php echo e($question->questionimage); ?>"
                                alt="radiopart" style="max-height: 150px;">
                            </div>
            
                        </div>
                    </div>
                </div>
            <?php elseif($question->questiontype ==3): ?>       
                <div class="row">
                        <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($c->label)): ?>  
                                <div class="col-3 image_box" style="padding-left:30px;width:7vw;height:10vw;" display="inline-flex" >
                                    <div  class="checkbox">
                                        <label><input type="checkbox"><?php echo e($c->label); ?></label>                      
                                    </div>
                                    <img src="/uploads/image/<?php echo e($content[$num]); ?>"  width="100px" height="100px" style="max-width:100%; max-height:100%; object-fit:fill">
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            <?php elseif($question->questiontype ==4): ?>
                <div class="row">
                    <?php 
                        $content = $question->content;
                        $content = str_replace('contenteditable="false"','contenteditable="true"',$content);
                        $content = str_replace('id=""','id="delete_matrix_row"',$content);
                        $content = str_replace('class="hide_btn"','class="btn btn-danger"',$content);
                        $content = str_replace('<th></th>','<th>Action</th>',$content);
                    ?>
                    <?php echo $content; ?>

                   
                </div>
            <?php elseif($question->questiontype == 5): ?>
                <div class="row">
                    <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($c->label)): ?>
                        <div class="radio">
                            <label  style="color:transparent"><input type="radio" name="opt_rating" <?php if(isset($c->is_checked)): ?><?php echo e(($c->is_checked==1) ? 'checked' : ''); ?><?php endif; ?>>Option 1</label>
                            <input class="radio_label" type="text" value="<?php echo e($c->label); ?>" style="margin-left:-2vw;;margin-right:5vw;z-index:20;" required>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            <?php elseif($question->questiontype == 6): ?>
                <div class="row">
                    <?php $__currentLoopData = $radioContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($c->label)): ?>
                            <div class="radio">
                            <label  style="color:transparent"><input type="radio" name="opt_drop" <?php if(isset($c->is_checked)): ?><?php echo e(($c->is_checked==1) ? 'checked' : ''); ?><?php endif; ?>>Option 1</label>
                                <input class="radio_label" type="text" value="<?php echo e($c->label); ?>" style="margin-left:-2vw;;margin-right:5vw;z-index:20;border:none;">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            <?php elseif($question->questiontype == 8): ?>
                <div class="row">
                    <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($c->label)): ?>
                        <div class="radio">
                            <label  style="color:transparent"><input type="radio" name="opt_rating" <?php if(isset($c->is_checked)): ?><?php echo e(($c->is_checked==1) ? 'checked' : ''); ?><?php endif; ?>>Option 1</label>
                            <input class="radio_label" type="text" value="<?php echo e($c->label); ?>" style="margin-left:-2vw;;margin-right:5vw;z-index:20;" required>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
         

            <a href="<?php echo e(route('admin.questions.index')); ?>"
               class="btn btn-default border mt-3"><?php echo app('translator')->get('strings.backend.general.app_back_to_list'); ?></a>
        </div>
    </div>

    <script>
     
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\diagnosi\resources\views/backend/questions/show.blade.php ENDPATH**/ ?>