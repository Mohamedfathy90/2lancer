<div class="w-full px-2 lg:px-0">
    <div class="w-full lg:max-w-4xl mx-auto">
        <div class="relative py-16 bg-white dark:bg-zinc-800 overflow-hidden rounded-md shadow-sm border border-gray-100 dark:border-zinc-700">
            <div class="relative px-4 sm:px-6 lg:px-8">
                <div class="text-lg mx-auto">
                    <h1>
                       @if($page->slug=="terms" && config('app.locale')=="ar")
                        <span class="block text-xl text-center leading-8 font-extrabold tracking-wide text-gray-900 dark:text-gray-100 sm:text-3xl mb-2">شروط البيع</span>
                        @elseif($page->slug=="affiliate" && config('app.locale')=="en")
                        <span class="block text-xl text-center leading-8 font-extrabold tracking-wide text-gray-900 dark:text-gray-100 sm:text-3xl mb-2">Affiliate</span>
                        @elseif($page->slug=="affiliate" && config('app.locale')=="fr")
                        <span class="block text-xl text-center leading-8 font-extrabold tracking-wide text-gray-900 dark:text-gray-100 sm:text-3xl mb-2">Affiliation</span>
                        @else
                        <span class="block text-xl text-center leading-8 font-extrabold tracking-wide text-gray-900 dark:text-gray-100 sm:text-3xl mb-2">{{ $page->title }}</span>
                        @endif
                        
                        <span class="block text-xs text-center text-gray-400 dark:text-gray-300 font-normal tracking-widest">
                            {{ __('messages.t_page_last_update_date', ['date' => format_date($page->updated_at)]) }}
                        </span>
                    </h1>
                </div>
                <div class="mt-16 dark:text-gray-200 quill-container break-words text-sm md:text-base leading-relaxed md:px-12 px-2">
                
                    @if($page->slug=="terms" && config('app.locale')=="ar")
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
                    
                                       @elseif($page->slug=="affiliate" && config('app.locale')=="en")
                    <b> 2lancer Referral Program : How It Works?</b><br><br>

At 2lancer, we value your support and want to share our success with you! That's why we're introducing a special referral program that allows you to earn monetary rewards by inviting your friends and acquaintances to join our platform and utilize our services. Here's how it works: <br><br>

1. Obtaining Your Referral Link : Every member of the 2lancer platform has a unique referral link that can be shared with friends, family, and acquaintances. <br>

2. Sharing Your Referral Link : Share your unique link on social media, via email, or even through text messages to invite others to register on 2lancer and start purchasing or offering services.<br>

3. Earning Rewards : When someone signs up using your referral link and begins purchasing, you will receive 30% of the value of their purchases for a y month from their registration date!<br><br>

Benefits:<br>

- Significant Monetary Rewards : The more people you invite who shop on 2lancer, the more monetary rewards you can earn.<br>
- Ease of Sharing : Your referral link is easy to use and can be shared at any time and from anywhere, allowing you to access your rewards faster.<br>
- Tracking Referrals : You can track your referrals and rewards through your dashboard on 2lancer, enabling you to see how much you've earned in rewards thanks to your invitations.<br><br>

At 2lancer, we are committed to providing a satisfying and beneficial experience for all our users. This referral program is our way of saying thank you.
                    
                    
                    @elseif($page->slug=="affiliate" && config('app.locale')=="fr") 
<b>Programme d'Affiliation 2lancer : Comment ça marche ?</b> <br><br>

Chez 2lancer, nous apprécions votre soutien et souhaitons partager notre succès avec vous ! C'est pourquoi nous lançons un programme d'affiliation spécial qui vous permet de gagner des récompenses monétaires en invitant vos amis et connaissances à rejoindre notre plateforme et à utiliser nos services. Voici comment ça fonctionne :<br><br>

1. Obtenir Votre Lien d'Affiliation : Chaque membre de la plateforme 2lancer dispose d'un lien d'affiliation unique qui peut être partagé avec des amis, de la famille et des connaissances.<br>

2. Partager Votre Lien d'Affiliation : Partagez votre lien unique sur les réseaux sociaux, par e-mail, ou même par SMS pour inviter d'autres personnes à s'inscrire sur 2lancer et à commencer à acheter ou à proposer des services.<br>

3. Gagner des Récompenses : Lorsque quelqu'un s'inscrit en utilisant votre lien d'affiliation et commence à acheter, vous recevrez 30% de la valeur de leurs achats pendant un mois à partir de leur date d'inscription !<br><br>

Avantages :<br>

- Récompenses Monétaires Significatives : Plus vous invitez de personnes qui achètent sur 2lancer, plus vous pouvez gagner de récompenses monétaires.<br>
- Facilité de Partage : Votre lien d'affiliation est facile à utiliser et peut être partagé à tout moment et depuis n'importe où, vous permettant ainsi d'accéder plus rapidement à vos récompenses.<br>
- Suivi des Affiliations : Vous pouvez suivre vos affiliations et vos récompenses via votre tableau de bord sur 2lancer, ce qui vous permet de voir combien vous avez gagné en récompenses grâce à vos invitations.<br><br>

Chez 2lancer, nous nous engageons à offrir une expérience satisfaisante et bénéfique pour tous nos utilisateurs. Ce programme d'affiliation est notre façon de vous dire merci.
                    
                    
                    
                    @else
                    
                    {!! htmlspecialchars_decode($page->content) !!}
                    
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>