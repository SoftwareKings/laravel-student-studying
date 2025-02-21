<?php
$currentUrl = url()->current();
if (config('nav_menu') != 0) {
    $nav_menu = \Harimayco\Menu\Models\Menus::find(config('nav_menu'));
    // $nav_menu = \DB::table('admin_menu_items')->find(config('nav_menu'));
}
?>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="https//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="<?php echo e(asset('vendor/harimayco-menu/style.css')); ?>" rel="stylesheet">
<div id="hwpwrap">
    <div class="custom-wp-admin wp-admin wp-core-ui js   menu-max-depth-0 nav-menus-php auto-fold admin-bar">
        <div id="wpwrap">
            <div id="wpcontent">
                <div id="wpbody">
                    <div id="wpbody-content">

                        <div class="wrap">

                            <div class="manage-menus">
                                <form method="get" action="<?php echo e($currentUrl); ?>">
                                    <label for="menu" class="selected-menu"><?php echo e(__('strings.backend.menu_manager.select_to_edit')); ?></label>

                                    <?php echo Menu::select('menu', $menulist); ?>


                                    <span class="submit-btn">
										<input type="submit" class="button-secondary" value="Choose">
									</span>
                                    <span class="add-new-menu-action"> or <a
                                                href="<?php echo e($currentUrl); ?>?action=edit&menu=0"><?php echo e(__('strings.backend.menu_manager.create_new')); ?></a>. </span>
                                </form>
                            </div>
                            <div id="nav-menus-frame" class="row">

                                <?php if(request()->has('menu')  && !empty(request()->input("menu"))): ?>
                                    <div id="menu-settings-column" class="metabox-holder col-3">

                                        <div class="clear"></div>

                                        <form id="nav-menu-meta" action="" class="nav-menu-meta" method="post"
                                              enctype="multipart/form-data">
                                            <div id="side-sortables" class="accordion-container">
                                                <ul class="outer-border">
                                                    <li class="control-section accordion-section  open add-page"
                                                        id="add-page">
                                                        <h3 class="accordion-section-title hndle" tabindex="0"><?php echo e(__('strings.backend.menu_manager.custom_link')); ?> <span class="screen-reader-text"><?php echo e(__('strings.backend.menu_manager.screen_reader_text')); ?></span>
                                                        </h3>
                                                        <div class="accordion-section-content ">
                                                            <div class="inside">
                                                                <div class="customlinkdiv" id="customlinkdiv">
                                                                    <p id="menu-item-url-wrap">
                                                                        <label class="howto" for="custom-menu-item-url">
                                                                            <span>URL</span>&nbsp;&nbsp;&nbsp;
                                                                            <input id="custom-menu-item-url" name="url"
                                                                                   type="text"
                                                                                   class="code menu-item-textbox"
                                                                                   value="http://">
                                                                        </label>
                                                                    </p>

                                                                    <p id="menu-item-name-wrap">
                                                                        <label class="howto"
                                                                               for="custom-menu-item-name">
                                                                            <span><?php echo e(__('strings.backend.menu_manager.label')); ?></span>&nbsp;
                                                                            <input id="custom-menu-item-name"
                                                                                   name="label" type="text"
                                                                                   class="regular-text menu-item-textbox input-with-default-title"
                                                                                   title="Label menu">
                                                                        </label>
                                                                    </p>



                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="d-inline-block w-100 action-wrapper border-top col-12 pt-2 pb-1">
                                                            <a href="#" onclick="addcustommenu()"
                                                               class="btn btn-light add-to-menu border float-right submit-add-to-menu right"><?php echo e(__('strings.backend.menu_manager.add_to_menu')); ?></a>
                                                            <span class="spinner" id="spincustomu"></span>

                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </form>

                                        <?php if(isset($pages)): ?>

                                            <div class="accordion-container mt-4">
                                                <ul class="outer-border">
                                                    <li class="control-section accordion-section open">
                                                        <h3 class="accordion-section-title hndle"
                                                            data-toggle="collapse"
                                                            data-target="#pages"
                                                            aria-expanded="true" aria-controls="pages"
                                                            id="headingThree" tabindex="0"> <?php echo e(__('strings.backend.menu_manager.pages')); ?><span
                                                                    class="screen-reader-text"><?php echo e(__('strings.backend.menu_manager.screen_reader_text')); ?></span>
                                                        </h3>

                                                        <div id="pages" class="collapse show" aria-labelledby="pages"
                                                             data-parent="#accordion">
                                                            <div class="card-body px-3 pt-3  pb-0">
                                                                <div class="form-group">
                                                                    <input type="text"
                                                                           placeholder="Search Pages"
                                                                           class="form-control searchInput mb-3">
                                                                    <div class="checkbox-wrapper page">
                                                                        <?php if($pages->count() > 0): ?>
                                                                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <div class="checkbox"
                                                                                     data-value="<?php echo e($item->title); ?>">
                                                                                    <?php echo e(html()->label(html()->checkbox('category[]')->value($item->id).' &nbsp;'.$item->title)); ?>

                                                                                </div>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-inline-block w-100 action-wrapper border-top col-12 pt-2 pb-1">
                                                                <div class="checkbox float-left">
                                                                    <?php echo e(html()->label(html()->checkbox()->class('select_all').' &nbsp; '. __('strings.backend.menu_manager.select_all') )->class('my-2')); ?>

                                                                </div>
                                                                <button class="btn btn-light add-to-menu border float-right">
                                                                    <?php echo e(__('strings.backend.menu_manager.add_to_menu')); ?>

                                                                </button>
                                                            </div>
                                                        </div>

                                                    </li>
                                                </ul>
                                            </div>
                                        <?php endif; ?>


                                    </div>
                                <?php endif; ?>



                                <div class="col-lg-9 col-12" id="menu-management-liquid">
                                    <div id="menu-management">
                                        <form id="update-nav-menu" action="" method="post"
                                              enctype="multipart/form-data">
                                            <div class="menu-edit ">
                                                <div id="nav-menu-header">
                                                    <div class="major-publishing-actions">
                                                        <label class="menu-name-label howto open-label"
                                                               for="menu-name">
                                                            <span><?php echo e(__('strings.backend.menu_manager.name')); ?></span>
                                                            <input name="menu-name" id="menu-name" type="text"
                                                                   class="menu-name regular-text menu-item-textbox"
                                                                   title="Enter menu name"
                                                                   value="<?php if(isset($indmenu)): ?><?php echo e($indmenu->name); ?><?php endif; ?>">
                                                            <input type="hidden" id="idmenu"
                                                                   value="<?php if(isset($indmenu)): ?><?php echo e($indmenu->id); ?><?php endif; ?>"/>
                                                        </label>

                                                        <?php if(request()->has('action')): ?>
                                                            <div class="publishing-action">
                                                                <a onclick="createnewmenu()" name="save_menu"
                                                                   id="save_menu_header"
                                                                   class="btn btn-primary menu-save"><?php echo e(__('strings.backend.menu_manager.create_menu')); ?></a>
                                                            </div>
                                                        <?php elseif(request()->has("menu")): ?>
                                                            <div class="publishing-action">
                                                                <a onclick="getmenus()" name="save_menu"
                                                                   id="save_menu_header"
                                                                   class="btn btn-primary menu-save"><?php echo e(__('strings.backend.menu_manager.save_menu')); ?></a>
                                                                <span class="spinner" id="spincustomu2"></span>
                                                            </div>

                                                        <?php else: ?>
                                                            <div class="publishing-action">
                                                                <a onclick="createnewmenu()" name="save_menu"
                                                                   id="save_menu_header"
                                                                   class="btn btn-primary menu-save"><?php echo e(__('strings.backend.menu_manager.create_menu')); ?></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div id="post-body">
                                                    <div id="post-body-content">

                                                        <?php if(request()->has("menu")): ?>
                                                            <h3><?php echo e(__('strings.backend.menu_manager.menu_structure')); ?></h3>
                                                            <div class="drag-instructions post-body-plain"
                                                                 style="">
                                                                <p>
                                                                    <?php echo e(__('strings.backend.menu_manager.drag_instruction_1')); ?>

                                                                </p>
                                                            </div>

                                                        <?php else: ?>
                                                            <h3><?php echo e(__('strings.backend.menu_manager.menu_creation')); ?></h3>
                                                            <div class="drag-instructions post-body-plain"
                                                                 style="">
                                                                <p>
                                                                    <?php echo e(__('strings.backend.menu_manager.drag_instruction_2')); ?>

                                                                </p>
                                                            </div>
                                                        <?php endif; ?>

                                                        <ul class="menu ui-sortable" id="menu-to-edit">
                                                            <?php if(isset($menus)): ?>
                                                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li id="menu-item-<?php echo e($m->id); ?>"
                                                                        class="menu-item menu-item-depth-<?php echo e($m->depth); ?> menu-item-page menu-item-edit-inactive pending"
                                                                        style="display: list-item;">
                                                                        <dl class="menu-item-bar">
                                                                            <dt class="menu-item-handle col-12 col-lg-7">
                                                                                <span class="item-title"> <span
                                                                                            class="menu-item-title"> <span
                                                                                                id="menutitletemp_<?php echo e($m->id); ?>"><?php echo e($m->label); ?></span> <span
                                                                                                style="color: transparent;">|<?php echo e($m->id); ?>

                                                                                            |</span> </span> <span
                                                                                            class="is-submenu"
                                                                                            style="<?php if($m->depth==0): ?>display: none;<?php endif; ?>"><?php echo e(__('strings.backend.menu_manager.sub_menu')); ?></span> </span>
                                                                                <span class="item-controls"> <span
                                                                                            class="item-type"><?php echo e($m->type); ?> </span> <span
                                                                                            class="item-order hide-if-js"> <a
                                                                                                href="<?php echo e($currentUrl); ?>?action=move-up-menu-item&menu-item=<?php echo e($m->id); ?>&_wpnonce=8b3eb7ac44"
                                                                                                class="item-move-up"><abbr
                                                                                                    title="Move Up">↑</abbr></a> | <a
                                                                                                href="<?php echo e($currentUrl); ?>?action=move-down-menu-item&menu-item=<?php echo e($m->id); ?>&_wpnonce=8b3eb7ac44"
                                                                                                class="item-move-down"><abbr
                                                                                                    title="Move Down">↓</abbr></a> </span> <a
                                                                                            class="item-edit"
                                                                                            id="edit-<?php echo e($m->id); ?>"
                                                                                            title=" "
                                                                                            href="<?php echo e($currentUrl); ?>?edit-menu-item=<?php echo e($m->id); ?>#menu-item-settings-<?php echo e($m->id); ?>"> </a> </span>
                                                                            </dt>
                                                                        </dl>

                                                                        <div class="menu-item-settings col-12 col-lg-7"
                                                                             id="menu-item-settings-<?php echo e($m->id); ?>">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <input type="hidden"
                                                                                           class="edit-menu-item-id"
                                                                                           name="menuid_<?php echo e($m->id); ?>"
                                                                                           value="<?php echo e($m->id); ?>"/>
                                                                                    <p class="description description-thin">
                                                                                        <label class="d-inline-block w-100"
                                                                                               for="edit-menu-item-title-<?php echo e($m->id); ?>">
                                                                                            <?php echo e(__('strings.backend.menu_manager.label')); ?>

                                                                                            <br>
                                                                                            <input type="text"
                                                                                                   id="idlabelmenu_<?php echo e($m->id); ?>"
                                                                                                   class="widefat edit-menu-item-title form-control"
                                                                                                   name="idlabelmenu_<?php echo e($m->id); ?>"
                                                                                                   value="<?php echo e($m->label); ?>">
                                                                                        </label>
                                                                                    </p>
                                                                                </div>

                                                                                <p class="field-css-url description col-12 description-wide">
                                                                                    <label for="edit-menu-item-url-<?php echo e($m->id); ?>">
                                                                                        <?php echo e(__('strings.backend.menu_manager.url')); ?>

                                                                                        <br>
                                                                                        <input type="text"
                                                                                               id="url_menu_<?php echo e($m->id); ?>"
                                                                                               class="widefat form-control edit-menu-item-url"
                                                                                               value="<?php echo e($m->link); ?>">
                                                                                    </label>
                                                                                </p>
                                                                            </div>


                                                                            <p class="field-move hide-if-no-js description description-wide">
                                                                                <label> <span><?php echo e(__('strings.backend.menu_manager.move')); ?>

                                                                                        :</span> <a
                                                                                            href="<?php echo e($currentUrl); ?>"
                                                                                            class="menus-move-up"
                                                                                            style="display: none;"><?php echo e(__('strings.backend.menu_manager.move_up')); ?></a>
                                                                                    <a
                                                                                            href="<?php echo e($currentUrl); ?>"
                                                                                            class="menus-move-down"
                                                                                            title="Mover uno abajo"
                                                                                            style="display: inline;"><?php echo e(__('strings.backend.menu_manager.move_down')); ?></a>
                                                                                    <a
                                                                                            href="<?php echo e($currentUrl); ?>"
                                                                                            class="menus-move-left"
                                                                                            style="display: none;"></a>
                                                                                    <a href="<?php echo e($currentUrl); ?>"
                                                                                       class="menus-move-right"
                                                                                       style="display: none;"></a>
                                                                                    <a
                                                                                            href="<?php echo e($currentUrl); ?>"
                                                                                            class="menus-move-top"
                                                                                            style="display: none;"><?php echo e(__('strings.backend.menu_manager.top')); ?></a>
                                                                                </label>
                                                                            </p>

                                                                            <div class="menu-item-actions description-wide submitbox text-right">

                                                                                <a class="item-delete submitdelete deletion btn btn-danger"
                                                                                   id="delete-<?php echo e($m->id); ?>"
                                                                                   href="<?php echo e($currentUrl); ?>?action=delete-menu-item&menu-item=<?php echo e($m->id); ?>&_wpnonce=2844002501"><?php echo e(__('strings.backend.menu_manager.delete')); ?></a>
                                                                                <span class="meta-sep hide-if-no-js"> | </span>
                                                                                <a class="item-cancel btn btn-default submitcancel hide-if-no-js button-secondary"
                                                                                   id="cancel-<?php echo e($m->id); ?>"
                                                                                   href="<?php echo e($currentUrl); ?>?edit-menu-item=<?php echo e($m->id); ?>&cancel=1424297719#menu-item-settings-<?php echo e($m->id); ?>"><?php echo e(__('strings.backend.menu_manager.cancel')); ?></a>
                                                                                <span class="meta-sep hide-if-no-js"> | </span>
                                                                                <a onclick="updateitem(<?php echo e($m->id); ?>)"
                                                                                   class="btn btn-primary updatemenu"
                                                                                   id="update-<?php echo e($m->id); ?>"
                                                                                   href="javascript:void(0)"><?php echo e(__('strings.backend.menu_manager.update_item')); ?></a>
                                                                            </div>
                                                                        </div>

                                                                        <ul class="menu-item-transport"></ul>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </ul>
                                                        <?php if(request()->has('menu') && request('menu') != 0): ?>
                                                            <hr>

                                                            <div class="menu-settings border-0 mt-0">
                                                                <h5><?php echo e(__('strings.backend.menu_manager.menu_settings')); ?></h5>
                                                                <div class="form-group row">

                                                                    <label class="col-lg-2 col-12"><i><?php echo e(__('strings.backend.menu_manager.display')); ?></i></label>
                                                                    <div class="checkbox col-lg-10 col-12">
                                                                        <label><input type="checkbox"
                                                                                      name="nav_menu" value="">
                                                                            <?php echo e(__('strings.backend.menu_manager.top_menu')); ?>

                                                                        </label>
                                                                        <?php if(isset($nav_menu) && $nav_menu->id != request('menu')): ?>
                                                                            <small>
                                                                                (Currently set to : <?php echo e($nav_menu->name); ?>)
                                                                            </small>
                                                                        <?php endif; ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div id="nav-menu-footer">
                                                    <div class="major-publishing-actions">
                                                        <?php if(request()->has('action')): ?>
                                                            <div class="publishing-action">
                                                                <a onclick="createnewmenu()" name="save_menu"
                                                                   id="save_menu_header"
                                                                   class="btn btn-primary menu-save"><?php echo e(__('strings.backend.menu_manager.create_menu')); ?></a>
                                                            </div>
                                                        <?php elseif(request()->has("menu")): ?>
                                                            <span class="delete-action"> <a
                                                                        class="submitdelete deletion btn btn-danger menu-delete"
                                                                        onclick="deletemenu()"
                                                                        href="javascript:void(9)"><?php echo e(__('strings.backend.menu_manager.delete_menu')); ?></a> </span>
                                                            <div class="publishing-action">

                                                                <a onclick="getmenus()" name="save_menu"
                                                                   id="save_menu_header"
                                                                   class="btn btn-primary menu-save"><?php echo e(__('strings.backend.menu_manager.save_menu')); ?></a>
                                                                <span class="spinner" id="spincustomu2"></span>
                                                            </div>

                                                        <?php else: ?>
                                                            <div class="publishing-action">
                                                                <a onclick="createnewmenu()" name="save_menu"
                                                                   id="save_menu_header"
                                                                   class="btn btn-primary menu-save"><?php echo e(__('strings.backend.menu_manager.create_menu')); ?></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

<?php $__env->startPush('after-scripts'); ?>
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        //Updating Menu settings via controller
        <?php if(config('nav_menu') != 0 && (request('menu') == config('nav_menu'))): ?>
        $('.menu-settings').find('input[name="nav_menu"]').attr('checked', true)
                <?php endif; ?>
        var i, menu;


        //Updating Menu settings via config
        <?php if(config('menu_list')): ?>
            menu_id = '<?php echo e(request('menu')); ?>';
        menu = '<?php echo e(config('menu_list')); ?>';
        menu = menu.replace(/&quot;/gi, "\"");
        menu = JSON.parse(menu);
        $(menu).each(function (key, value) {
            if (menu_id == value.id) {
                $('.menu-settings').find('input[name="' + value.location + '"]').attr('checked', true)
            }
            if ((value.id == "") || (value.id == 0)) {
                $('select#location_' + value.location).find('option:first').attr('selected', true);
                $('select#location_' + value.location).siblings('a').attr('href', "<?php echo e(route('admin.menu-manager')); ?>").text('Create New');
            } else {
                $('select#location_' + value.location).val(value.id).attr('selected', true).siblings('a').attr('href', "<?php echo e(route('admin.menu-manager')); ?>?menu=" + value.id)
            }

        });

        <?php endif; ?>
        //Searching inputs
        $(document).on("input", ".searchInput", function () {
            var v = $(this).val();
            var filter = v.toUpperCase();
            var elements = $(this).siblings('.checkbox-wrapper').find('.checkbox');
            console.log(elements)
            for (i = 0; i < elements.length; i++) {
                var value = elements[i].getAttribute('data-value')
                if (value.toUpperCase().indexOf(filter) > -1) {
                    elements[i].style.display = "";
                } else {
                    elements[i].style.display = "none";
                }
            }
        });

        //select all checkboxes
        $(".select_all").change(function () {
            var status = this.checked;
            var checkboxes = $(this).parents('.action-wrapper').siblings('.card-body').find('.checkbox-wrapper .checkbox input');
            checkboxes.each(function () {
                this.checked = status;
            });
        });

        //Checkbox change events
        $('.checkbox-wrapper .checkbox input').change(function () {
            var selectCheckBox = $(this).parents('.checkbox-wrapper').parents('.card-body:first').siblings('.action-wrapper').find('.select_all');
            if (this.checked == false) {
                selectCheckBox.checked = false; //change "select all" checked status to false
            }

            var checked = $(this).parents('.checkbox-wrapper').find('input:checked').length;
            var totalCheckbox = $(this).parents('.checkbox-wrapper').find('input').length;
            if (checked === totalCheckbox) {
                selectCheckBox.checked = true; //change "select all" checked status to true
            }
        });

        //Changing edit link on location change
        $('#menu-locations-wrap').find('select').on('change', function () {
            if ($(this).val() == "") {
                $(this).find('option:first').attr('selected', true);
                $(this).siblings('a').attr('href', "<?php echo e(route('admin.menu-manager')); ?>").text('Create New');
            } else {
                $(this).siblings('a').attr('href', "<?php echo e(route('admin.menu-manager')); ?>?menu=" + $(this).val()).text('Edit')

            }
        });

        //Custom-link, post, page, category add to menu.
        $(document).on('click', '.add-to-menu', function () {
            var value, link, type, label;
            var data = [];

            var card = $(this).parents('.action-wrapper').siblings('.card-body');

            var checked = $(card).find('.checkbox-wrapper input:checked');
            if (checked.length > 0) {
                $(checked).each(function () {
                    if ($(card).find('.checkbox-wrapper').hasClass('category')) {
                        link = $(location).attr('protocol') + '//' + $(location).attr('hostname') + '/category';
                        type = 'category';
                    } else if ($(card).find('.checkbox-wrapper').hasClass('page')) {
                        link = $(location).attr('protocol') + '//' + $(location).attr('hostname')
                        type = 'page';

                    } else if ($(card).find('.checkbox-wrapper').hasClass('post')) {
                        link = $(location).attr('protocol') + '//' + $(location).attr('hostname') + '/post'
                        type = 'post';

                    } else {
                        link = 'Custom Link'
                        type = 'custom-link';

                    }
                    value = $(this).val();
                    label = $(this).parent('label').text().trim();
                    label = $(this).parent('label').text().trim();
                    data.push({
                        labelmenu: label,
                        link: link,
                        item_id: value,
                        type: type,
                        idmenu: $("#idmenu").val()
                    });


                });
                $.ajax({
                    data: {data: data},
                    url: '<?php echo e(route('hcustomitem')); ?>',
                    type: 'POST',
                    success: function (response) {
                        window.location = "";
                    },
                    complete: function () {
                        $("#spincustomu").hide();
                    }

                });
            }
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH E:\FreelancerTask\Laravel\diagnosi12_05_01\resources\views/vendor/wmenu/menu-html.blade.php ENDPATH**/ ?>