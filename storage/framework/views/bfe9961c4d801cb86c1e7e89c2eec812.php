<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout.default','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.default'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="<?php echo e(route('contacts.index')); ?>" class="text-primary hover:underline">Contact Form</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Account Settings</span>
            </li>
        </ul>
        <div class="pt-5">
            <div class="flex items-center justify-between mb-5">
                <!-- <h5 class="font-semibold text-lg dark:text-white-light">Settings</h5> -->
            </div>
            <form action="<?php echo e(route('contacts.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="panel">
                <div class="grid grid-cols-3 gap-4">              
                
                    <div>
                        <label for="actionName">Full Name:</label>
                        <input id="actionName" type="text" placeholder="Enter Full Name" class="form-input" name="name"/>
                    </div>
                    <div>
                        <label for="actionName">Pan Card No:</label>
                        <input id="actionName" type="text" placeholder="Enter Pan Card No" class="form-input <?php $__errorArgs = ['pancard'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="pancard"/>
                      
                    </div>
                    <div>
                        <label for="actionEmail">Email:</label>
                        <div class="flex flex-1">
                            <div
                                class="bg-[#eee] flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border ltr:border-r-0 rtl:border-l-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                @</div>
                            <input id="actionEmail" type="email" placeholder=""  name="email"
                                class="form-input ltr:rounded-l-none rtl:rounded-r-none" />
                        </div>
                    </div>    
                </div>      
                <div class="grid grid-cols-1">           
                    <div>
                        <label for="actionMessage">Message:</label>
                        <textarea class="form-input" id="actionMessage" name="message" placeholder="Type your message....."></textarea>
                    </div>
                    <div>
                    <button type="submit" class="btn btn-primary !mt-6 float-right">Submit</button>

                    </div>
                    
                </div> 
            </div>
            </form>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH /home/sanmisha/@Projects/starterkit/resources/views/contacts/create.blade.php ENDPATH**/ ?>