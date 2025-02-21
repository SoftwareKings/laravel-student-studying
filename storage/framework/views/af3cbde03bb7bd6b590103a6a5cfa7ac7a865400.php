<?php $__env->startSection('title', __('labels.backend.questions.title').' | '.app_name()); ?>
<?php
$color1="";
$color2="";
?>
<?php $qtypes = ["Single Input", "Check Box", "RadioGroup", "Image", "Matrix", "Rating", "Dropdown", "File", "Stars", "Range", "€"];
$operators=["equals","not equals","contains","not contains","greater","less","greater or equals","less or equals"]; ?>
<?php $__env->startPush('before-styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/metronic_assets/global/plugins/jquery-ui/jquery-ui.min.css')); ?>"/>   
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/metronic_assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')); ?>"/>   
<?php $__env->stopPush(); ?>
<?php $__env->startPush('after-styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/admin/textgroup.css')); ?>" />
    <script type="text/javascript" src="<?php echo e(asset('js/3.5.1/jquery.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    
    <div class="card">
        <div class="card-header">
            <h3 class="page-title float-left mb-0">Selection of Tests</h3>
            <div class="float-right">
                <a 
                    href="<?php echo e(route('admin.questions.index', [
                        'test_id' => request('test_id'),
                        'course_id' => request('course_id'),
                    ])); ?>"
                   class="btn btn-success"
                ><?php echo app('translator')->get('labels.backend.questions.view'); ?></a>

                <a id="add_another_question" style="display:none" href="<?php echo e(route('admin.questions.create', [
                    'test_id' => request('test_id'),
                    'course_id' => request('course_id'),
                ])); ?>"
                       class="btn btn-success">Add Another Question</a>
            </div>
                     
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-6 form-group">
                    <?php echo Form::label('course_id', trans('labels.backend.tests.fields.course'), ['class' => 'control-label']); ?>

                    <?php echo Form::select('course_id', $courses, request('course_id', old('course_id')), ['class' => 'form-control select2']); ?>

                </div>

                <div class="col-12 col-lg-6 form-group">
                    <?php echo Form::label('tests', 'Test', ['class' => 'control-label']); ?>

                     <select class="form-control select2 required" name="tests_id" id="tests_id" placeholder="Options" multiple onautocomplete="off">
                        <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option 
                                value="<?php echo e($test->id); ?>" 
                                data-color1="<?php echo e($test->color1); ?>" 
                                data-color2="<?php echo e($test->color2); ?>"
                            >
                            <?php echo e($test->title); ?>

                            </option>                             
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    </select>

                    <div id="tests_id1"></div>
                     <p class="help-block"></p>
                    <?php if($errors->has('question')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('question')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    


        <div class="row">
            
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="page-title float-left mb-0">Question Deatils</h3>           
                    </div>
                    <div id="question_edit" class="card-body">
                        <div class="row">
                            <div class="col-12" >
                                    <div class="form-group">
                                        <div class="form-group form-md-line-input has-info" style="margin-top:10px">
                                            <textarea name="question_content" id="question_content" class="form-control ckeditor"></textarea>
                                            <!-- <input type="text" class="form-control"   id="question_content"> -->
                                            
                                            <label for="question_content">Question</label>
                                        </div>               
                                        
                                        <div class="form-group form-md-line-input has-info">
                                            <textarea name="help-editor" id="help-editor" class="form-control ckeditor"></textarea>
                                            
                                            <label for="question_help_info">Question Help or Information</label>
                                        </div>  
                                        <div class="row">
                                            <div class="col-12 col-lg-6 form-group">
                                                <label for="">Help information hide/show</label>
                                            <label for="hint"> <input type='radio' name='hint' class='helpaccess' value='0' /> Hide</label>
                                            <label for="hint"><input type='radio' name='hint' class='helpaccess' value='1'checked /> Show</label>
                                            </div>
                                        </div>    
                                        <div class="form-group form-md-line-input has-info">
                                            <textarea name="hint-editor" id="hint-editor" class="form-control ckeditor"></textarea>
                                            
                                            <label for="question_hint_info">Question Hint</label>
                                        </div>  
                                        <div class="row">
                                            <div class="col-12 col-lg-6 form-group">
                                                <label for="">Hint information hide/show</label>
                                            <label for="hint"> <input type='radio' name='hintRight' class='hintaccess' value='0' /> Hide</label>
                                            <label for="hint"><input type='radio' name='hintRight' class='hintaccess' value='1' checked/> Show</label>
                                            </div>
                                        </div>      
                                        
                                        <?php if($errors->has('question')): ?>
                                            <p class="help-block">
                                                <?php echo e($errors->first('question')); ?>

                                            </p>
                                        <?php endif; ?>
                                    </div>    
                                    <div class="mt-2">
                                        <div class="mb-2" style="
                                            gap: 2rem;
                                            display: flex;
                                        ">
                                            <?php $__currentLoopData = $question->questionimage ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div id="preview" class="position-relative">
                                                    <img
                                                        width="100%"
                                                        src="<?php echo e(asset('uploads/image/'.$image)); ?>"
                                                    />

                                                    <input type="hidden" class="quiz_img" value="<?php echo e($image); ?>" />

                                                    <button 
                                                        type="button"
                                                        style="right: 0"
                                                        class="btn remove-image btn-danger del-btn position-absolute" 
                                                    >
                                                        <i class="fa fa-trash" style="color:white"></i>
                                                    </button>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <div id="preview-clone" class="hidden position-relative">
                                                <img
                                                    width="100%"
                                                    src=""
                                                />

                                                <input type="hidden" value="" />

                                                <button 
                                                    type="button"
                                                    style="right: 0"
                                                    class="btn remove-image btn-danger del-btn position-absolute" 
                                                >
                                                    <i class="fa fa-trash" style="color:white"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <form id="question_type_image" action="" method="POST" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <label class="form-label mb-0">Image</label>
                                                <input type="file" id="img" class="form-control" name="file[]" accept="image/*">
                                                <input type="hidden" id="quiz_img" name="quiz_img">
                                            </div>
                                        </form>
                                    </div>       
                            </div>
                        </div>
                        </div>     
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3>Question Type</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <?php
                                $question_type =['Single Input','Check Box','RadioGroup','Image','Matrix','Rating','Dropdown','File','Stars','Range','€'];
                            ?>
                            <?php echo Form::label('question_type', trans('labels.backend.questions.fields.question_type'), ['class' => 'control-label']); ?>

                            <select class="form-control"  name="options" id="question_type" placeholder="Options">
                                <?php for($i=0 ;$i< count($question_type);$i++): ?>
                                    <option value="<?php echo e($i); ?>"><?php echo e($question_type[$i]); ?></option>
                                <?php endfor; ?>
                                </select>
                            <p class="help-block" id="question_type1"></p>
                        </div>
                        <div id="question-type-box">
                            
                            <?php echo $__env->make('backend.questions.components.simple.single_input',[
                                
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            

                            
                            <?php echo $__env->make('backend.questions.components.simple.checkbox',[
                                'display' => 'none'
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            

                            
                            <?php echo $__env->make('backend.questions.components.simple.radiogroup',[
                                'display' => 'none'
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            
                            
                            
                            <?php echo $__env->make('backend.questions.components.simple.image',[
                                'display' => 'none'
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                                        

                            
                            <?php echo $__env->make('backend.questions.components.simple.matrix',[
                                'display' => 'none'
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            
                            
                            
                            <?php echo $__env->make('backend.questions.components.simple.file',[
                                'display' => 'none'
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            
                            
                            
                            <?php echo $__env->make('backend.questions.components.simple.dropdown',[
                                'display' => 'none'
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            

                            
                            <?php echo $__env->make('backend.questions.components.simple.range',[
                                'display' => 'none'
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            
                            
                            
                            <?php echo $__env->make('backend.questions.components.simple.rating',[
                                'display' => 'none',
                                'default_color' => ''
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            

                            
                            <?php echo $__env->make('backend.questions.components.simple.euro',[
                                'display' => 'none'
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            
                            
                            <div id="score-box" class="form-group" style="display: none;">
                                <label class="from-label">Score</label>
                                <input type="number" id="score" name="score"  class="form-control" placeholder="0">
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="page-title float-left mb-0">Logic</h3>          
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 form-group">                    
                                <div>
                                    <div class="logic_part" style="border:1px solid #bbbbbb;padding:10px;">
                                        <div id="sortable-14">
                                        </div>  
                                        <div class="text-right">
                                            <a href="javascript:add_condition()" class="btn btn-danger"><i class="fa fa-plus"></i> Add Condition</a>
                                        </div>                       
                                    </div>
                                </div>
                            </div>
                            <?php if($errors->has('question')): ?>
                                <p class="help-block">
                                    <?php echo e($errors->first('question')); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                
                    </div>
                </div>
                
            </div>
            

            
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3>Layout Properties</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-check">
                                    <input type="checkbox" name="required" id="required" placeholder="" class="form-check-input"/>
                                    <?php echo Form::label('required', 'Is Required', ['class' => 'form-check-label']); ?>

                                </div>
                                <div id="more_than_one_answer_box" class="form-check">
                                    <input type="checkbox" name="more_than_one_answer" id="more_than_one_answer" placeholder="" class="form-check-input"/>
                                    <?php echo Form::label('more_than_one_answer', 'More than 1 answers', ['class' => 'form-check-label']); ?>

                                </div>
                                <?php echo Form::label('state', 'State', ['class' => 'control-label']); ?>

                                <select class="form-control" name="options" id="state" placeholder="Options">
                                    <option value="default">Default</option>
                                    <option value="collapsed">Collapsed</option>
                                    <option value="expanded">Expanded</option>
                                </select>

                                <h3 class="mt-2 mb-0">Description</h3>
                                <hr class="mt-0"/>

                                <?php echo Form::label('title_location', 'Title location', ['class' => 'control-label']); ?>

                                <select class="form-control" name="options" id="title_location" placeholder="Options">
                                    <option value="default">Default</option>
                                    <option value="top">Top</option>
                                    <option value="center">Center</option>
                                    <option value="bottom">Bottom</option>
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                    <option value="hidden">Hidden</option>
                                </select>

                                <form id="title_form" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: .5rem 1rem; padding: .5rem 0;">
                                    <div style="grid-column: span 2 / span 2;">
                                        <?php echo Form::label('description_align', 'Title Aligment', ['class' => 'control-label']); ?>

                                        <select class="form-control" name="layout_properties[description][align]" id="description_align" placeholder="Options">
                                            <option value="left">Left</option>
                                            <option value="right">Right</option>
                                            <option value="center">Center</option>
                                        </select>
                                    </div>

                                    <div>
                                        <?php echo Form::label('description_top', 'Top', ['class' => 'control-label m-0']); ?>

                                        <input 
                                            type="number" 
                                            placeholder="" 
                                            class="form-control" 
                                            id="description_top" 
                                            name="layout_properties[description][top]" 
                                            value="40"
                                        />
                                    </div>
        
                                    <div>
                                        <?php echo Form::label('description_down', 'Down', ['class' => 'control-label m-0']); ?>

                                        <input 
                                            type="number" 
                                            placeholder="" 
                                            class="form-control" 
                                            id="description_down" 
                                            name="layout_properties[description][down]" 
                                            value="0"
                                        />
                                    </div>
        
                                    <div>
                                        <?php echo Form::label('description_left', 'Left', ['class' => 'control-label m-0']); ?>

                                        <input 
                                            type="number" 
                                            placeholder="" 
                                            class="form-control" 
                                            id="description_left" 
                                            name="layout_properties[description][left]" 
                                            value="20"
                                        />
                                    </div>
        
                                    <div>
                                        <?php echo Form::label('description_right', 'Right', ['class' => 'control-label m-0']); ?>

                                        <input 
                                            type="number" 
                                            placeholder="" 
                                            class="form-control" 
                                            id="description_right" 
                                            name="layout_properties[description][right]" 
                                            value="20"
                                        />
                                    </div>
                                </form>

                                <h3 class="mt-2 mb-0">Answer</h3>
                                <hr class="mt-0"/>

                                <?php echo Form::label('answer_location', 'Answer location', ['class' => 'control-label']); ?>

                                <select class="form-control" name="options" id="answerposition" placeholder="Options">
                                    <option value="bottom">Default</option>
                                    <option value="top">Top</option>
                                    <option value="bottom">Bottom</option>
                                    <option value="center">Center</option>
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                    <option value="hidden">Hidden</option>
                                </select>

                                <?php echo Form::label('answer_aligment', 'Answer Aligment', ['class' => 'control-label']); ?>

                                <select class="form-control" name="answer_aligment" id="answer_aligment" placeholder="Options">
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                    <option value="center">Center</option>
                                    <option value="space-between">Full</option>
                                </select>

                                <form id="answer_form" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: .5rem 1rem; padding: .5rem 0;">
                                    <div>
                                        <?php echo Form::label('answer_top', 'Top', ['class' => 'control-label m-0']); ?>

                                        <input 
                                            type="number" 
                                            placeholder="" 
                                            class="form-control" 
                                            id="answer_top" 
                                            name="layout_properties[answer][top]" 
                                            value="20"
                                        />
                                    </div>
        
                                    <div>
                                        <?php echo Form::label('answer_down', 'Down', ['class' => 'control-label m-0']); ?>

                                        <input 
                                            type="number" 
                                            placeholder="" 
                                            class="form-control" 
                                            id="answer_down" 
                                            name="layout_properties[answer][down]" 
                                            value="0"
                                        />
                                    </div>
        
                                    <div>
                                        <?php echo Form::label('answer_left', 'Left', ['class' => 'control-label m-0']); ?>

                                        <input 
                                            type="number" 
                                            placeholder="" 
                                            class="form-control" 
                                            id="answer_left" 
                                            name="layout_properties[answer][left]" 
                                            value="20"
                                        />
                                    </div>
        
                                    <div>
                                        <?php echo Form::label('answer_right', 'Right', ['class' => 'control-label m-0']); ?>

                                        <input 
                                            type="number" 
                                            placeholder="" 
                                            class="form-control" 
                                            id="answer_right" 
                                            name="layout_properties[answer][right]" 
                                            value="20"
                                        />
                                    </div>
                                </form>

                                <h3 class="mt-2 mb-0">Images</h3>
                                <hr class="mt-0"/>

                                <?php echo Form::label('image_location', 'Image location', ['class' => 'control-label']); ?>

                                <select class="form-control" name="options" id="imageposition" placeholder="Options">
                                    <option value="default">Default</option>
                                    <option value="top">Top</option>
                                    <option value="bottom">Bottom</option>
                                    <option value="center">Center</option>
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                    <option value="hidden">Hidden</option>
                                </select>

                                <?php echo Form::label('image_aligment', 'Image aligment', ['class' => 'control-label']); ?>

                                <select class="form-control" name="image_aligment" id="image_aligment" placeholder="Options">
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                    <option value="center">Center</option>
                                    <option value="space-between">full</option>
                                </select>

                                <?php echo Form::label('imagefit', 'Image Fit', ['class' => 'control-label']); ?>  
                                <select class="form-control" name="options" id="image_fit" placeholder="Options">
                                    <option value="0">None</option>
                                    <option value="1">Contain</option>
                                    <option value="2">Cover</option>
                                    <option value="3">Fill</option>
                                </select>

                                <div id="options1"></div>

                                <?php echo Form::label('image_width', 'Image Width', ['class' => 'control-label']); ?>

                                <input type="text" name="image_width" id="image_width" placeholder="" class="form-control"  value=""/>
                                <div id="image_width1"></div>

                                <?php echo Form::label('image_height', 'Image Height', ['class' => 'control-label']); ?>

                                <input type="text" name="image_height" id="image_height" placeholder="" class="form-control"  value=""/>
                                <div id="image_height1"></div>

                                <form id="image_form" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: .5rem 1rem; padding: .5rem 0;">
                                    <div>
                                        <?php echo Form::label('image_top', 'Top', ['class' => 'control-label m-0']); ?>

                                        <input 
                                            type="number" 
                                            placeholder="" 
                                            class="form-control" 
                                            id="image_top" 
                                            name="layout_properties[image][top]" 
                                            value="30"
                                        />
                                    </div>
        
                                    <div>
                                        <?php echo Form::label('image_down', 'Down', ['class' => 'control-label m-0']); ?>

                                        <input 
                                            type="number" 
                                            placeholder="" 
                                            class="form-control" 
                                            id="image_down" 
                                            name="layout_properties[image][down]" 
                                            value="0"
                                        />
                                    </div>
        
                                    <div>
                                        <?php echo Form::label('image_left', 'Left', ['class' => 'control-label m-0']); ?>

                                        <input 
                                            type="number" 
                                            placeholder="" 
                                            class="form-control" 
                                            id="image_left" 
                                            name="layout_properties[image][left]" 
                                            value="10"
                                        />
                                    </div>
        
                                    <div>
                                        <?php echo Form::label('image_right', 'Right', ['class' => 'control-label m-0']); ?>

                                        <input 
                                            type="number" 
                                            placeholder="" 
                                            class="form-control" 
                                            id="image_right" 
                                            name="layout_properties[image][right]" 
                                            value="0"
                                        />
                                    </div>
                                </form>

                                <h3 class="mt-2 mb-0">Question</h3>
                                <hr class="mt-0"/>

                                <?php echo Form::label('question_bg_color', 'Question Backgroud', ['class' => 'control-label']); ?>

                                <select class="form-control" name="options" id="question_bg_color" placeholder="Options">
                                    <option value="#fff">White</option>
                                    <option value="#ff5733">Light Brown</option>
                                    <option value="#ffe933">Yellow</option>
                                    <option value="#cab81d">Dark Yellow</option>
                                    <option value="#1d76ca">Blue</option>
                                </select>
                                <!-- <?php echo Form::label('help_info_location', 'Help Info location', ['class' => 'control-label']); ?>

                                <select class="form-control" name="options" id="help_info_location" placeholder="Options">
                                    <option value="default">Default</option>
                                    <option value="top">Top</option>
                                    <option value="bottom">Bottom</option>
                                    <option value="left">Left</option>
                                    <option value="hidden">Hidden</option>
                                </select> -->
                                <?php echo Form::label('indent', 'Indent', ['class' => 'control-label']); ?>

                                <input type="number" name="indent" id="indent" placeholder="" class="form-control" value=""/>

                                <?php echo Form::label('width', 'Width', ['class' => 'control-label']); ?>

                                <input type="number" name="width" id="width" placeholder="" class="form-control" value=""/>

                                <?php echo Form::label('min_width', 'Min Width', ['class' => 'control-label']); ?>

                                <input type="number" name="min_width" id="min_width" placeholder="" class="form-control" value=""/>

                                <?php echo Form::label('max_width', 'Max Width', ['class' => 'control-label']); ?>

                                <input type="number" name="max_width" id="max_width" placeholder="" class="form-control" value=""/>

                                <?php echo Form::label('size', 'Size', ['class' => 'control-label']); ?>

                                <input type="number" name="size" id="size" placeholder="" class="form-control"  value=""/>
                                <div id="size1"></div>
                                
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-2">
                    <button id="save_data" class="btn btn-danger">Save Data</button>
                </div>
            </div>
            
        </div>


    

    <!-- <?php for($question=1; $question<=2; $question++): ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 form-group">
                    <?php echo Form::label('option_text_' . $question, trans('labels.backend.questions.fields.option_text').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::textarea('option_text_' . $question, old('option_text'), ['class' => 'form-control ', 'rows' => 3, 'required' =>  true]); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('option_text_' . $question)): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('option_text_' . $question)); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <?php echo Form::label('explanation_' . $question, trans('labels.backend.questions.fields.option_explanation'), ['class' => 'control-label']); ?>

                    <?php echo Form::textarea('explanation_' . $question, old('explanation_'.$question), ['class' => 'form-control ', 'rows' => 3]); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('explanation_' . $question)): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('explanation_' . $question)); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <?php echo Form::label('correct_' . $question, trans('labels.backend.questions.fields.correct'), ['class' => 'control-label']); ?>

                    <?php echo Form::hidden('correct_' . $question, 0); ?>

                    <?php echo Form::checkbox('correct_' . $question, 1, false, []); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('correct_' . $question)): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('correct_' . $question)); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endfor; ?>
    <div class="col-12 text-center">
        <?php echo Form::submit(trans('strings.backend.general.app_save'), ['class' => 'btn btn-danger mb-4 form-group']); ?>

    </div>

    <?php echo Form::close(); ?> -->
<?php $__env->stopSection(); ?>  
<?php $__env->startPush('after-scripts'); ?>
    <script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/ui-nestable.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.nestable.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/dataTables.bootstrap.js')); ?>"></script>
    
    <script type="text/javascript" src="<?php echo e(asset('assets/metronic_assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')); ?>"></script>
    
    <script src="<?php echo e(asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')); ?>"></script>
    <!--
        <script type="text/javascript" src="<?php echo e(asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')); ?>"></script>
    -->
    <script src="<?php echo e(asset('/vendor/laravel-filemanager/js/lfm.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/question-create.js')); ?>?t=<?php echo e(time()); ?>"></script>

    <script>
        CKEDITOR.replace('question_content', {
            height : 300,
            filebrowserUploadUrl: `<?php echo e(route('admin.questions.editor_fileupload',['_token' => csrf_token() ])); ?>`,
            filebrowserUploadMethod: 'form',
            extraPlugins: 'font,widget,colorbutton,colordialog,justify',
        });

        CKEDITOR.replace('help-editor', {
            height : 300,
            filebrowserUploadUrl: `<?php echo e(route('admin.questions.editor_fileupload',['_token' => csrf_token() ])); ?>`,
            filebrowserUploadMethod: 'form',
            extraPlugins: 'font,widget,colorbutton,colordialog,justify',
        });

        CKEDITOR.replace('hint-editor', {
            height : 300,
            filebrowserUploadUrl: `<?php echo e(route('admin.questions.editor_fileupload',['_token' => csrf_token() ])); ?>`,
            filebrowserUploadMethod: 'form',
            extraPlugins: 'font,widget,colorbutton,colordialog,justify',
        });

        jQuery(document).ready(function(e) {       
            TableEditable.init();
            QuestionCreate.init();  
            //UIToastr.init();
            // $('#tests_id').on('change', function() {
            //     var selectedVals = $('#tests_id').val();
            //     if (selectedVals.length) {
            //         var selectedOption = $(`#tests_id option[value=${selectedVals[0]}]`);
            //         console.log(selectedOption);
            //         var color1 = selectedOption.data('color1');
            //         var color2 = selectedOption.data('color2');
            //         $('#color1').val(color1);
            //         $('#color2').val(color2);
            //         $('#color').val(color1);
            //     }
            // })
            $("#tests_id").on("change",function(e) {
                var route = '/user/questions';
                var getReportRoute = '';
                <?php
                    $route = route('get_test_default');
                ?>

                route = '<?php echo e($route); ?>';

                var test_id=$(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    data : {
                        'test_id':test_id,
                    },
                    url: route,
                    type: "POST",
                    dataType: 'json',
                    success: function(response) {
                        CKEDITOR.instances['help-editor'].setData(response[0]['text2'], (editor) => {
                            CKEDITOR.instances['help-editor'].focus();
                        });

                        CKEDITOR.instances['hint-editor'].setData(response[0]['text2'], () => {
                            CKEDITOR.instances['hint-editor'].focus();
                        });


                        CKEDITOR.instances['question_content'].setData(response[0]['text1'], (editor) => {
                            CKEDITOR.instances['question_content'].focus();
                        });

                        var col1=response[0]['color1'];
                        var col2=response[0]['color2'];

                        $("input[name='color1']").val(col1);
                        $("input[name='color2']").val(col2);
                        
                          
                    },
                    error: function(response) {
                        var responseTextObject = jQuery.parseJSON(response.responseText);
                        swal("Error!", "Fill in the form correctly!", "error");
                    }

                });
            });

            const test_id = <?php echo e(request('test_id') ?? '0'); ?>;

            if(test_id) {
                $('#tests_id').val(test_id).trigger('change');
            }
        });

        $('.jstree-anchor').on('click', function(e) {
            alert("clicked");
            e.preventDefault();

            // This removes the class on selected li's
            $("#sizelist li").removeClass("select");

            // adds 'select' class to the parent li of the clicked element
            // 'this' here refers to the clicked a element
            $(this).closest('li').addClass('select');

            // sets the input field's value to the data value of the clicked a element
            $('#sizevalue').val($(this).data('value'));
        });

        function radioScore(ele){
            $(ele).data('value',ele.value);
            $('#'+ele.dataset.q_id).attr('value',ele.value);
        } 

        $(document).on('change', '#course_id', function (e) {
            var course_id = $(this).val();
            window.location.href = "?course_id=" + course_id
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\diagnosi\resources\views/backend/questions/create.blade.php ENDPATH**/ ?>