<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout.default','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.default'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>


    <div x-data="invoiceEdit">
        <div class="flex xl:flex-row flex-col gap-2.5">
            <div class="panel px-0 flex-1 py-6 ltr:xl:mr-6 rtl:xl:ml-6">
               
                <hr class="border-[#e0e6ed] dark:border-[#1b2e4b] my-6">
               
                <div class="mt-8">
                    <template x-if="items">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th class="w-1">Quantity</th>
                                        <th class="w-1">Price</th>
                                        <th>Total</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-if="items.length <= 0">
                                        <tr>
                                            <td colspan="5" class="!text-center font-semibold">No Item Available
                                            </td>
                                        </tr>
                                    </template>
                                    <template x-for="(item, i) in items" :key="i">
                                        <tr class="align-top border-b border-[#e0e6ed] dark:border-[#1b2e4b]">
                                            <td>
                                                <input type="text" class="form-input min-w-[200px]"
                                                    placeholder="Enter Item Name" x-model="item.title" />
                                                <textarea class="form-textarea mt-4" placeholder="Enter Description" x-model="item.description"></textarea>
                                            </td>
                                            <td><input type="number" class="form-input w-32" placeholder="Quantity"
                                                    x-model="item.quantity" min="0" /></td>
                                            <td><input type="number" class="form-input w-32" placeholder="Price"
                                                    x-model="item.amount" min="0" /></td>
                                            <td x-text="`$${item.amount * item.quantity}`"></td>
                                            <td>
                                                <button type="button" @click="removeItem(item)">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="w-5 h-5">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18"></line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18"></line>
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </template>

                    <div class="flex justify-between sm:flex-row flex-col mt-6 px-4">
                        <div class="sm:mb-0 mb-6">
                            <button type="button" class="btn btn-primary" @click="addItem()">Add Item</button>
                        </div>
                        <div class="sm:w-2/5">
                            <div class="flex items-center justify-between">
                                <div>Subtotal</div>
                                <div>$265.00</div>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <div>Tax(%)</div>
                                <div>0%</div>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <div>Shipping Rate($)</div>
                                <div>$0.00</div>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <div>Discount(%)</div>
                                <div>0%</div>
                            </div>
                            <div class="flex items-center justify-between mt-4 font-semibold">
                                <div>Total</div>
                                <div>$265.00</div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
          
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data('invoiceEdit', () => ({
                items: [],
                selectedFile: null,
                params: {
                    title: 'Tailwind',
                    invoiceNo: '#0001',
                    to: {
                        name: 'Jesse Cory',
                        email: 'redq@company.com',
                        address: '405 Mulberry Rd. Mc Grady, NC, 28649',
                        phone: '(128) 666 070'
                    },

                    invoiceDate: new Date(),
                    dueDate: '',
                    bankInfo: {
                        no: '1234567890',
                        name: 'Bank of America',
                        swiftCode: 'VS70134',
                        country: 'United States',
                        ibanNo: 'K456G'
                    },
                    notes: 'It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!',
                },
                currencyList: [
                    'USD - US Dollar',
                    'GBP - British Pound',
                    'IDR - Indonesian Rupiah',
                    'INR - Indian Rupee',
                    'BRL - Brazilian Real',
                    'EUR - Germany (Euro)',
                    'TRY - Turkish Lira',
                ],
                selectedCurrency: 'USD - US Dollar',
                tax: 0,
                discount: 0,
                init() {
                    //set default data
                    this.items.push({
                        id: 1,
                        title: 'Calendar App Customization',
                        description: 'Make Calendar App Dynamic',
                        quantity: 2,
                        amount: 120,
                        isTax: false
                    }, {
                        id: 2,
                        title: 'Chat App Customization',
                        description: 'Customized Chat Application to resolve some Bug Fixes',
                        quantity: 1,
                        amount: 25,
                        isTax: false,
                    });

                    let dt = new Date();
                    const month = dt.getMonth() + 1 < 10 ? '0' + (dt.getMonth() + 1) : dt.getMonth() +
                    1;
                    let date = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
                    this.params.invoiceDate = dt.getFullYear() + '-' + month + '-' + date;
                    this.params.dueDate = dt.getFullYear() + '-' + month + '-' + date;
                },

                addItem() {
                    let maxId = 0;
                    if (this.items && this.items.length) {
                        maxId = this.items.reduce((max, character) => (character.id > max ? character
                            .id : max), this.items[0].id);
                    }
                    this.items.push({
                        id: maxId + 1,
                        title: '',
                        description: '',
                        rate: 0,
                        quantity: 0,
                        amount: 0
                    });
                },

                removeItem(item) {
                    this.items = this.items.filter((d) => d.id != item.id);
                }
            }));
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH /home/sanmisha/@Projects/starterkit/resources/views/students/edit.blade.php ENDPATH**/ ?>