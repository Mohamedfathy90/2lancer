<div class="w-full px-2 lg:px-0">
    <div class="w-full lg:max-w-4xl mx-auto">
        <div class="relative py-16 bg-white dark:bg-zinc-800 overflow-hidden rounded-md shadow-sm border border-gray-100 dark:border-zinc-700">
            <div class="relative px-4 sm:px-6 lg:px-8">
                <div class="text-lg mx-auto">
                    <h1>
                        <?php if($page->slug=="terms" && config('app.locale')=="ar"): ?>
                        <span class="block text-xl text-center leading-8 font-extrabold tracking-wide text-gray-900 dark:text-gray-100 sm:text-3xl mb-2">شروط البيع</span>
                        <?php else: ?>
                        <span class="block text-xl text-center leading-8 font-extrabold tracking-wide text-gray-900 dark:text-gray-100 sm:text-3xl mb-2"><?php echo e($page->title, false); ?></span>
                        <?php endif; ?>
                        
                        <span class="block text-xs text-center text-gray-400 dark:text-gray-300 font-normal tracking-widest">
                            <?php echo e(__('messages.t_page_last_update_date', ['date' => format_date($page->updated_at)]), false); ?>

                        </span>
                    </h1>
                </div>
                <div class="mt-16 dark:text-gray-200 quill-container break-words text-sm md:text-base leading-relaxed md:px-12 px-2">
                
                    <?php if($page->slug=="terms" && config('app.locale')=="ar"): ?>
                    <b>شروط البيع عبر الانترنت :</b><br>
ندعوك لقراءة هذه الشروط والأحكام المتعلقة بالبيع عبر الإنترنت من قبل الموقع الإلكتروني 2lancer.ma                           <br>
يعتبر إتمام عملية الدفع من قبلكم بمثابة قبول لا رجعة فيه لهذه الشروط:                    <br><br>
<b>1. الديباجة</b>         <br>
شروط البيع التالية تحكم جميع المعاملات التجارية التي تتم من خلال الموقع الإلكتروني 2lancer.ma  أي معاملة تجارية تتم من خلال هذا الموقع الإلكتروني تفترض قبول غير مشروط وغير قابل للإلغاء لهذه الشروط من قبل الزبون    <br> <br>
<b>2. الغرض</b>                <br>
تهدف هذه الشروط لتحديد حقوق والتزامات الأطراف المعنية بعمليات البيع عن طريق الإنترنت و عبر الموقع الإلكتروني  2lancer.ma               <br><br>
<b>3 . عملية البيع </b>         <br>
عند الدخول للموقع الإلكتروني 2lancer.ma  ،  يقوم الزبون باختيار العناصر التي يرغب في شرائها ، و يملأ معلومات تعريف الهوية الخاصة به ، ويقبل الشروط.        
يتم بعد ذلك توجيه الزبون عبر الإنترنت إلى منصة الدفع الآمنة لمركز النقديات حيث يقوم بإكمال معلومات الدفع الخاصة به.                            <br><br>
<b>4 . طرق الدفع</b>          <br>
للدفع بواسطة بطاقة الائتمان، يقوم الزبون بإدخال الإحداثيات والرقم السري لبطاقة الدفع الخاصة به. عندما يتم قبول المعاملة من قبل البنك و يؤكد الموقع الإلكتروني 2lancer.ma قبول العملية، يتم خصم المبلغ من حساب الزبون في يوم العمل التالي لتاريخ تأكيد المعاملة.              <br>
يتم تأمين الدفع عبر الإنترنت من قبل مركز النقديات الذي يوفر خدمة دفع آمنة بالكامل.
يضمن الزبون للموقع الإلكتروني 2LANCER.MA  امتلاكه الأموال الكافية لاستخدام طريقة الدفع التي اختارها خلال عملية الدفع.         <br>
عند الدفع عن طريق بطاقة الائتمان، الأحكام المتعلقة باستخدام طريقة الدفع هذه، والمنصوص عليها في الاتفاقيات المبرمة بين الزبون وبنكه، وبين الموقع الإلكتروني 2LANCER.MA وبنكه، تأخذبعين الإعتبار.                       <br><br>
<b>5 . خصوصية البيانات</b>          <br>
تتم معالجة المعلومات المطلوبة من الزبون أثناء الشراء عبر الموقع الإلكتروني 2LANCER.MA   بسرية. لدى الزبون الحق في الإطلاع أو تصحيح هذه المعلومات الشخصية بإرسال طلب عن طريق البريد على العنوان التالي SUPPORT@2ANCER.MA   أو عن طريق البريد الإلكتروني التالي
SUPPORT@2ANCER.COM      <br>               <br>
 
<b>6 . إثبات عملية الدفع </b>             <br>
تشكل المعلومات المخزنة على مستوى منصة مركز النقديات لصالح الموقع الإلكتروني 2LANCER.MA  إثباتا لعملية الدفع عبر الإنترنت التي قام بها الزبون.
                    
                    <?php else: ?>
                    <?php echo htmlspecialchars_decode($page->content); ?>

                    
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/u100719507/domains/2lancer.ma/public_html/resources/views/livewire/main/page/page.blade.php ENDPATH**/ ?>