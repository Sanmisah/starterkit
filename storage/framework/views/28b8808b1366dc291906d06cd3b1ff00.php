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
                <a href="<?php echo e(route('contacts.index')); ?>" class="text-primary hover:underline">Contact </a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Edit</span>
            </li>
        </ul>
        <div class="pt-5">
            <div class="flex items-center justify-between mb-5">
                <!-- <h5 class="font-semibold text-lg dark:text-white-light">Settings</h5> -->
            </div>
            <form class="space-y-5" enctype="multipart/form-data" action="<?php echo e(route('contacts.update',$contact->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="panel">      
                <div class="grid grid-cols-4 gap-4"> 
                    <div>
                        <label for="actionName">Full Name:</label>
                        <input id="actionName" type="text" placeholder="Enter Full Name" class="form-input" name="name" value="<?php echo e($contact->name); ?>" />
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
unset($__errorArgs, $__bag); ?> " name="pancard" value="<?php echo e($contact->pancard); ?>"/>
                      
                    </div>
                    <div>
                        <label for="actionName">Aadhar Card No:</label>
                        <input id="actionName" type="text" placeholder="Enter Pan Card No" class="form-input <?php $__errorArgs = ['pancard'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="aadhar" value="<?php echo e($contact->aadhar); ?>"/>
                      
                    </div>
                    <div>
                        <label for="actionEmail">Email:</label>
                        <div class="flex flex-1">
                            <div
                                class="bg-[#eee] flex justify-center items-center ltr:rounded-l-md rtl:rounded-r-md px-3 font-semibold border ltr:border-r-0 rtl:border-l-0 border-[#e0e6ed] dark:border-[#17263c] dark:bg-[#1b2e4b]">
                                @</div>
                            <input id="actionEmail" type="email" placeholder=""  name="email" value="<?php echo e($contact->email); ?>"
                                class="form-input ltr:rounded-l-none rtl:rounded-r-none" />
                        </div>
                    </div>   
                </div>  
                <div   class="grid grid-cols-3 gap-4" x-data="data">
                    <div>
                        <label for="actionRole">Country:</label>
                        <select class="form-select" name="country_id" x-model="country_id"  x-on:change="countryChange()">
                            <option selected disabled>Select Country</option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($country->id); ?>" 
                                    <?php echo e($contact->country_id ? ($contact->country_id == $country->id ? 'selected' : '') : ''); ?>>
                                    <?php echo e($country->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                            
                        </select>
                    </div>       
                    <div >
                        <label for="actionRole">State:</label>
                        <select class="form-select" x-model="state_id"  name="state_id" >
                        <option selected disabled>Select State</option>
                            <template x-for="state in states">
                            <option 
                                :value='state.id'
                                x-text="state.name"
                            >
                            </option>
                            </template>
                          </select>
                    </div>   
                </div>              
                <div class="grid grid-cols-1">           
                    <div>
                        <label for="actionMessage">Message:</label>
                        <textarea class="form-input" id="actionMessage" name="message" placeholder="Type your message....."  value="<?php echo e($contact->message); ?>"><?php echo e($contact->message); ?></textarea>
                    </div>
                   
                    
                </div>      
                <div class="grid grid-cols-4">           
                    <div >
                    <label for="actionMssage">Picture:</label>
                        <input type="file" name="picture">
                    </div>
                    <div>
                    <img src="<?php echo e($contact->getFirstMediaUrl('picture')); ?>"  width="120px">
                    </div>
                   
                    
                </div> 
                <div class="grid grid-cols-1">           
                   
                    <div>
                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.success-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('success-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php echo e(__('Success')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

                    </div>
                    
                </div>            
            </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data('data', () => ({
                country_id: '',
                state_id: '',
                states: '',
                async countryChange() {
                    console.log("fi");
                    this.result = await (await fetch('/countries/'+ this.country_id, {
                    method: 'GET',
                    headers: {
                        'Content-type': 'application/json;',
                    },
                    })).json();
                    this.states = this.result;
                    console.log(this.states);
                },

                init(){
                    <?php if($contact->country_id): ?>
                    this.country_id = <?php echo e($contact->country_id); ?>;
                    this.countryChange();
                    <?php endif; ?>

                    <?php if($contact->state_id): ?>
                    this.state_id = <?php echo e($contact->state_id); ?>;
                    <?php endif; ?>
                }
            }));
        });    
        document.addEventListener("DOMContentLoaded", function(e) {
            // default
            var els = document.querySelectorAll(".selectize");
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });
        });
</script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\@Projects\starterkit\resources\views/contacts/edit.blade.php ENDPATH**/ ?>