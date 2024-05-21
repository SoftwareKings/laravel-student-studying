<?php $__env->startSection('title', __('labels.backend.reports.sales_report').' | '.app_name()); ?>

<?php $__env->startPush('after-styles'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <h3 class="page-title d-inline"><?php echo app('translator')->get('labels.backend.reports.sales_report'); ?></h3>
        </div>
        <div class="card-body">
            <div class="row my-4">
                <div class="col-12">
                    <form autocomplete="off">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="date"><?php echo app('translator')->get('labels.backend.reports.date_range'); ?></label>
                                <input type="text" name="date" class="form-control" placeholder="" id="date" autocomplete="off" value="<?php echo e(request()->get('date')); ?>">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="applyDate" value="1" <?php echo e(request()->get('applyDate')?'checked': ''); ?>>
                                    <label class="form-check-label" for="applyDate"><?php echo app('translator')->get('labels.backend.reports.apply_date'); ?></label>
                                </div>
                            </div>
                            <div class="col">
                                <label for="students"><?php echo app('translator')->get('labels.backend.reports.select_student'); ?></label>
                                <select class="form-control select2" name="student">
                                    <option value=""><?php echo app('translator')->get('labels.backend.reports.select_student'); ?></option>
                                    <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($student->id); ?>" <?php if(request()->get('student')): ?> <?php echo e(request()->get('student') == $student->id ? 'selected': ''); ?> <?php endif; ?>><?php echo e($student->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="students"><?php echo app('translator')->get('labels.backend.reports.select_course'); ?></label>
                                <select class="form-control select2" name="course">
                                    <option value=""><?php echo app('translator')->get('labels.backend.reports.select_course'); ?></option>
                                    <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($course->id); ?>" <?php if(request()->get('course')): ?> <?php echo e(request()->get('course') == $course->id ? 'selected': ''); ?> <?php endif; ?>><?php echo e($course->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="students"><?php echo app('translator')->get('labels.backend.reports.select_bundle'); ?></label>
                                <select class="form-control select2" name="bundle">
                                    <option value=""><?php echo app('translator')->get('labels.backend.reports.select_bundle'); ?></option>
                                    <?php $__empty_1 = true; $__currentLoopData = $bundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($bundle->id); ?>" <?php if(request()->get('bundle')): ?> <?php echo e(request()->get('bundle') == $bundle->id ? 'selected': ''); ?> <?php endif; ?>><?php echo e($bundle->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('labels.backend.reports.filter'); ?></button>
                        <a class="btn btn-danger" href="<?php echo e(route('admin.reports.sales')); ?>"><?php echo app('translator')->get('labels.backend.reports.reset'); ?></a>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-5">
                    <div class="card text-white bg-primary text-center">
                        <div class="card-body">
                            <h2 class=""><?php echo e($appCurrency['symbol'].' '.$total_earnings); ?></h2>
                            <h5><?php echo app('translator')->get('labels.backend.reports.total_earnings'); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 ml-auto">
                    <div class="card text-white bg-success text-center">
                        <div class="card-body">
                            <h2 class=""><?php echo e($total_sales); ?></h2>
                            <h5><?php echo app('translator')->get('labels.backend.reports.total_sales'); ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4><?php echo app('translator')->get('labels.backend.reports.courses'); ?></h4>
                    <div class="table-responsive">
                        <table id="myCourseTable" class="table table-bordered table-striped ">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('labels.general.sr_no'); ?></th>
                                <th><?php echo app('translator')->get('labels.general.id'); ?></th>
                                <th><?php echo app('translator')->get('labels.backend.reports.fields.student'); ?></th>
                                <th><?php echo app('translator')->get('labels.backend.reports.fields.name'); ?></th>
                                <th><?php echo app('translator')->get('labels.backend.reports.fields.transaction'); ?></th>
                                <th><?php echo app('translator')->get('labels.backend.reports.fields.amount'); ?> <span style="font-weight: lighter">(in <?php echo e($appCurrency['symbol']); ?>)</span></th>
                                <th><?php echo app('translator')->get('labels.backend.reports.fields.date'); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <h4><?php echo app('translator')->get('labels.backend.reports.bundles'); ?></h4>
                    <div class="table-responsive">
                        <table id="myBundleTable" class="table table-bordered table-striped ">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('labels.general.sr_no'); ?></th>
                                <th><?php echo app('translator')->get('labels.general.id'); ?></th>
                                <th><?php echo app('translator')->get('labels.backend.reports.fields.student'); ?></th>
                                <th><?php echo app('translator')->get('labels.backend.reports.fields.name'); ?></th>
                                <th><?php echo app('translator')->get('labels.backend.reports.fields.transaction'); ?></th>
                                <th><?php echo app('translator')->get('labels.backend.reports.fields.amount'); ?> <span style="font-weight: lighter">(in <?php echo e($appCurrency['symbol']); ?>)</span></th>
                                <th><?php echo app('translator')->get('labels.backend.reports.fields.date'); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-scripts'); ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>

        var queryParams= '';
        <?php if(request()->get('applyDate')): ?>
            queryParams += "applyDate=<?php echo e(request()->get('applyDate')); ?>&";
        <?php endif; ?>
        <?php if(request()->get('date')): ?>
            queryParams += "date=<?php echo e(request()->get('date')); ?>&";
        <?php endif; ?>
        <?php if(request()->get('student')): ?>
            queryParams += "student=<?php echo e(request()->get('student')); ?>&";
        <?php endif; ?>
        <?php if(request()->get('course')): ?>
            queryParams += "course=<?php echo e(request()->get('course')); ?>&";
        <?php endif; ?>
        <?php if(request()->get('bundle')): ?>
            queryParams += "bundle=<?php echo e(request()->get('bundle')); ?>";
        <?php endif; ?>

        $(document).ready(function () {
            var course_route = '<?php echo e(route('admin.reports.get_course_data')); ?>?'+queryParams;
            var bundle_route = '<?php echo e(route('admin.reports.get_bundle_data')); ?>?'+queryParams;

            $('#myCourseTable').DataTable({
                processing: true,
                serverSide: true,
                iDisplayLength: 10,
                retrieve: true,
                order: [
                    [5, 'desc']
                ],
                dom: 'lfBrtip<"actions">',
                buttons: [
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    'colvis'
                ],
                ajax: course_route,
                columns: [
                    {data: "DT_RowIndex", name: 'DT_RowIndex', width: '8%',  orderable: false, searchable: false},
                    {data: "id", name: 'id', width: '8%'},
                    {data: "student", name: 'order.user.name', orderable: false, searchable: false},
                    {data: "title", name: 'item.title', orderable: false, searchable: false},
                    {data: "transaction", name: 'order.transaction_id', orderable: false, searchable: false},
                    {data: "amount", name: 'order.amount', orderable: false, searchable: false},
                    {data: "created_at", name: 'created_at'},
                ],


                createdRow: function (row, data, dataIndex) {
                    $(row).attr('data-entry-id', data.id);
                },
            });

            $('#myBundleTable').DataTable({
                processing: true,
                serverSide: true,
                iDisplayLength: 10,
                retrieve: true,
                order: [
                    [5, 'desc']
                ],
                dom: 'lfBrtip<"actions">',
                buttons: [
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    'colvis'
                ],
                ajax: bundle_route,
                columns: [
                    {data: "DT_RowIndex", name: 'DT_RowIndex', width: '8%',  orderable: false, searchable: false},
                    {data: "id", name: 'id', width: '8%'},
                    {data: "student", name: 'order.user.name', orderable: false, searchable: false},
                    {data: "title", name: 'item.title', orderable: false, searchable: false},
                    {data: "transaction", name: 'order.transaction_id', orderable: false, searchable: false},
                    {data: "amount", name: 'order.amount', orderable: false, searchable: false},
                    {data: "created_at", name: 'created_at'},
                ],
                language:{
                    url : '<?php echo e(asset('plugins/jquery-datatable/lang/'.config('app.locale').'.json')); ?>',
                    buttons :{
                        colvis : '<?php echo e(trans("datatable.colvis")); ?>',
                        pdf : '<?php echo e(trans("datatable.pdf")); ?>',
                        csv : '<?php echo e(trans("datatable.csv")); ?>',
                    }
                },


                createdRow: function (row, data, dataIndex) {
                    $(row).attr('data-entry-id', data.id);
                },
            });
        });

        $('#date').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD',
                separator: ' / '
            },
            ranges: {
                '<?php echo e(trans('labels.backend.reports.date_input_lang.today')); ?>': [moment(), moment()],
                '<?php echo e(trans('labels.backend.reports.date_input_lang.yesterday')); ?>': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '<?php echo e(trans('labels.backend.reports.date_input_lang.last_7_days')); ?>': [moment().subtract(6, 'days'), moment()],
                '<?php echo e(trans('labels.backend.reports.date_input_lang.last_30_days')); ?>': [moment().subtract(29, 'days'), moment()],
                '<?php echo e(trans('labels.backend.reports.date_input_lang.this_month')); ?>': [moment().startOf('month'), moment().endOf('month')],
                '<?php echo e(trans('labels.backend.reports.date_input_lang.last_month')); ?>': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                '<?php echo e(trans('labels.backend.reports.date_input_lang.quarter_to_date')); ?>': [moment().startOf('quarter'), moment()],
                '<?php echo e(trans('labels.backend.reports.date_input_lang.year_to_date')); ?>': [moment().startOf('year'), moment()],
            },
            opens: "left",
        }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\FreelancerTask\Laravel\diagnosi12_05_01\resources\views/backend/reports/sales.blade.php ENDPATH**/ ?>