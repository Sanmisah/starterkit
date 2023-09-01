<div class="panel">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">
<?php if(Session::has('success')): ?>

    <div class="flex items-center p-3.5 rounded text-white bg-success">
        <span class="ltr:pr-2 rtl:pl-2">
            <strong class="ltr:mr-1 rtl:ml-1">Warning!</strong>Lorem Ipsum is simply dummy text of the
            printing.
        </span>
        <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">

            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    
<?php endif; ?>

<?php if(Session::has('error')): ?>
               
    <div class="flex items-center p-3.5 rounded text-white bg-danger">
        <span class="ltr:pr-2 rtl:pl-2"><strong class="ltr:mr-1 rtl:ml-1">Info!</strong>Lorem Ipsum is
            simply dummy text of the printing.</span>
        <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">

            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
</div>
<?php endif; ?>
                <template x-if="codeArr.includes('code3')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">
    &lt;!-- primary --&gt;
    &lt;div class=&quot;flex items-center p-3.5 rounded text-white bg-primary&quot;&gt;
        &lt;span class=&quot;ltr:pr-2 rtl:pl-2&quot;&gt;
            &lt;strong class=&quot;ltr:mr-1 rtl:ml-1&quot;&gt;Warning!&lt;/strong&gt;Lorem Ipsum is simply dummy text of the printing.
        &lt;/span&gt;
        &lt;button type=&quot;button&quot; class=&quot;ltr:ml-auto rtl:mr-auto hover:opacity-80&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
    &lt;/div&gt;

    &lt;!-- warning --&gt;
    &lt;div class=&quot;flex items-center p-3.5 rounded text-white bg-warning&quot;&gt;
        &lt;span class=&quot;ltr:pr-2 rtl:pl-2&quot;&gt;&lt;strong class=&quot;ltr:mr-1 rtl:ml-1&quot;&gt;Info!&lt;/strong&gt;Lorem Ipsum is simply dummy text of the printing.&lt;/span&gt;
        &lt;button type=&quot;button&quot; class=&quot;ltr:ml-auto rtl:mr-auto hover:opacity-80&quot;&gt;
            &lt;svg&gt; ... &lt;/svg&gt;
        &lt;/button&gt;
    &lt;/div&gt;
    </pre>
                </template>
            </div><?php /**PATH /home/sanmisha/@Projects/starterkit/resources/views/components/common/alert.blade.php ENDPATH**/ ?>