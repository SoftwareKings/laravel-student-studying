<?php $__env->startSection('title', __('labels.backend.pages.title').' | '.app_name()); ?>

<?php $__env->startPush('after-styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')); ?>">
    <script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
    <style>
        .select2-container--default .select2-selection--single {
            height: 35px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 35px;
        }
        .bootstrap-tagsinput{
            width: 100%!important;
            display: inline-block;
        }
        .bootstrap-tagsinput .tag{
            line-height: 1;
            margin-right: 2px;
            background-color: #2f353a ;
            color: white;
            padding: 3px;
            border-radius: 3px;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.pages.store'], 'files' => true,]); ?>


    <div class="card">
        <div class="card-header">
            <h3 class="page-title float-left mb-0"><?php echo app('translator')->get('labels.backend.pages.create'); ?></h3>
            <div class="float-right">
                <a href="<?php echo e(route('admin.pages.index')); ?>"
                   class="btn btn-success"><?php echo app('translator')->get('labels.backend.pages.view'); ?></a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 form-group">
                    <?php echo Form::label('title', trans('labels.backend.pages.fields.title'), ['class' => 'control-label']); ?>

                    <?php echo Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => trans('labels.backend.pages.fields.title'), ]); ?>

                </div>

            </div>

            <div class="row">
                <div class="col-12 col-lg-6 form-group">
                    <?php echo Form::label('slug',trans('labels.backend.pages.fields.slug'), ['class' => 'control-label']); ?>

                    <?php echo Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => trans('labels.backend.lessons.slug_placeholder')]); ?>


                </div>
                <div class="col-12 col-lg-6 form-group">
                    <?php echo Form::label('page_image', trans('labels.backend.pages.fields.featured_image').' '.trans('labels.backend.pages.max_file_size'), ['class' => 'control-label']); ?>

                    <?php echo Form::file('page_image', ['class' => 'form-control' , 'accept' => 'image/jpeg,image/gif,image/png']); ?>

                    <?php echo Form::hidden('page_image_max_size', 8); ?>

                    <?php echo Form::hidden('page_image_max_width', 4000); ?>

                    <?php echo Form::hidden('page_image_max_height', 4000); ?>


                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <?php echo Form::label('content', trans('labels.backend.pages.fields.content'), ['class' => 'control-label']); ?>

                    <?php echo Form::textarea('content', old('content'), ['class' => 'form-control ckeditor', 'placeholder' => '','id' => 'editor']); ?>


                </div>
            </div>

            <div class="row">
                <div class="col-12 form-group">
                    <?php echo Form::label('meta_title',trans('labels.backend.pages.fields.meta_title'), ['class' => 'control-label']); ?>

                    <?php echo Form::text('meta_title', old('meta_title'), ['class' => 'form-control', 'placeholder' => trans('labels.backend.pages.fields.meta_title')]); ?>


                </div>
                <div class="col-12 form-group">
                    <?php echo Form::label('meta_description',trans('labels.backend.pages.fields.meta_description'), ['class' => 'control-label']); ?>

                    <?php echo Form::textarea('meta_description', old('meta_description'), ['class' => 'form-control', 'placeholder' => trans('labels.backend.pages.fields.meta_description')]); ?>

                </div>
                <div class="col-12 form-group">
                    <?php echo Form::label('meta_keywords',trans('labels.backend.pages.fields.meta_keywords'), ['class' => 'control-label']); ?>

                    <?php echo Form::textarea('meta_keywords', old('meta_keywords'), ['class' => 'form-control', 'placeholder' => trans('labels.backend.pages.fields.meta_keywords')]); ?>

                </div>
                <div class="col-12 form-group">
                    <div class="checkbox d-inline mr-3">
                        <?php echo Form::hidden('published', 0); ?>

                        <?php echo Form::checkbox('published', 1, false, []); ?>

                        <?php echo Form::label('published',  trans('labels.backend.courses.fields.published'), ['class' => 'checkbox control-label font-weight-bold']); ?>

                    </div>
                    <div class="checkbox d-inline mr-3">
                        <?php echo Form::hidden('sidebar', 0); ?>

                        <?php echo Form::checkbox('sidebar', 1, false, []); ?>

                        <?php echo Form::label('sidebar',  trans('labels.backend.courses.fields.sidebar'), ['class' => 'checkbox control-label font-weight-bold']); ?>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center form-group">
                    <button type="submit" class="btn btn-info waves-effect waves-light ">
                       <?php echo e(trans('labels.general.buttons.save')); ?>

                    </button>
                    <button type="reset" class="btn btn-danger waves-effect waves-light ">
                       <?php echo e(trans('labels.backend.pages.fields.clear')); ?>

                    </button>
                </div>

            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-scripts'); ?>
    <script src="<?php echo e(asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')); ?>"></script>
    <script src="<?php echo e(asset('/vendor/laravel-filemanager/js/lfm.js')); ?>"></script>
    <script>
        CKEDITOR.replace('editor', {
            height : 300,
            filebrowserUploadUrl: `<?php echo e(route('admin.ckeditor_fileupload',['_token' => csrf_token() ])); ?>`,
            filebrowserUploadMethod: 'form',
            extraPlugins: 'font,widget,colorbutton,colordialog,justify',
        });


        var uploadField = $('input[type="file"]');

        $(document).on('change','input[type="file"]',function () {
            var $this = $(this);
            $(this.files).each(function (key,value) {
                if((value.size/1024) > 10240){
                    alert('"'+value.name+'"'+'exceeds limit of maximum file upload size' )
                    $this.val("");
                }
            })
        })

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\diagnosi\resources\views/backend/pages/create.blade.php ENDPATH**/ ?>