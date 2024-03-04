<div class="flex w-full max-w-sm grow flex-col justify-center p-5">

	{{-- Welcome back message --}}
	<div class="text-center">
		<div class="mt-4">
			<h2 class="text-xl font-bold text-zinc-700 dark:text-white">
				@lang('messages.t_welcome_to_app_name', ['name' => config('app.name')])
			</h2>
			<p class="text-zinc-400 dark:text-gray-300">
				@lang('messages.t_pls_signup_to_continue')
			</p>
			<a href="{{ url('/') }}" class="block lg:hidden mt-3 text-sm tracking-wider font-semibold text-blue-600 hover:underline">
				@lang('messages.t_back_to_homepage')
			</a>
		</div>
	</div>

	{{-- Form --}}
	<div class="mt-8">
		
		{{-- Session success message --}}
		@if (session()->has('success'))
			<div class="mb-6 sm:max-w-md sm:w-full sm:mx-auto sm:overflow-hidden">
				<div class="rounded-md bg-green-100 p-4">
					<div class="flex">
						<div class="flex-shrink-0">
							<svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/> </svg>
						</div>
						<div class="ltr:ml-3 rtl:mr-3">
							<p class="text-sm font-medium text-green-800">{{ session()->get('success') }}</p>
						</div>
					</div>
				</div>
			</div>
		@endif
	
		<div class="w-full relative">
			
			{{-- Register form --}}
			<div class="mt-6">
				<form x-data="window.UcZWcDFfVKBjfgP" x-on:submit.prevent="register" class="grid grid-cols-12 md:gap-x-6 gap-y-6">

					{{-- Fullname --}}
					<div class="col-span-12">
						<div class="relative w-full shadow-sm rounded-md">

							{{-- Input --}}
							<input type="text" x-model="form.fullname" class="{{ $errors->first('fullname') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300' }} border text-gray-900 text-sm rounded-md font-medium block w-full ltr:pr-12 rtl:pl-12 p-4 placeholder:font-normal dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.t_enter_your_fullname') }}">

							{{-- Icon --}}
							<div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
							</div>

						</div>

						{{-- Error --}}
						@error('fullname')
							<p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
								{{ $errors->first('fullname') }}
							</p>
						@enderror

					</div>

                    {{-- E-mail address --}}
					<div class="col-span-12">
						<div class="relative w-full shadow-sm rounded-md">

							{{-- Input --}}
							<input type="email" x-model="form.email" class="{{ $errors->first('email') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300' }} border text-gray-900 text-sm rounded-md font-medium block w-full ltr:pr-12 rtl:pl-12 p-4 placeholder:font-normal dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.t_enter_email_address') }}">

							{{-- Icon --}}
							<div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
								<svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd"></path></svg>
							</div>

						</div>

						{{-- Error --}}
						@error('email')
							<p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
								{{ $errors->first('email') }}
							</p>
						@enderror

					</div>

                    {{-- Username --}}
                    <div class="col-span-12">
						<div class="relative w-full shadow-sm rounded-md">

							{{-- Input --}}
							<input type="text" x-model="form.username" class="{{ $errors->first('username') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300' }} border text-gray-900 text-sm rounded-md font-medium block w-full ltr:pr-12 rtl:pl-12 p-4 placeholder:font-normal dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.t_enter_username') }}">

							{{-- Icon --}}
							<div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
							</div>

						</div>

						{{-- Error --}}
						@error('username')
							<p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
								{{ $errors->first('username') }}
							</p>
						@enderror

					</div>

					{{-- Phone Number --}}
                    <div class="col-span-12">
						<div class="flex relative shadow-sm rounded-md">
						<select wire:model="countryCode" style="width:8.5rem;" class="text-gray-900 text-xs rounded-md font-medium">
							<option data-countryCode="DZ" value="213">Algeria(+213)</option>
							<option data-countryCode="AD" value="376">Andorra(+376)</option>
							<option data-countryCode="AO" value="244">Angola(+244)</option>
							<option data-countryCode="AI" value="1264">Anguilla(+1264)</option>
							<option data-countryCode="AG" value="1268">Antigua&amp;Barbuda(+1268)</option>
							<option data-countryCode="AR" value="54">Argentina(+54)</option>
							<option data-countryCode="AM" value="374">Armenia(+374)</option>
							<option data-countryCode="AW" value="297">Aruba(+297)</option>
							<option data-countryCode="AU" value="61">Australia(+61)</option>
							<option data-countryCode="AT" value="43">Austria(+43)</option>
							<option data-countryCode="AZ" value="994">Azerbaijan(+994)</option>
							<option data-countryCode="BS" value="1242">Bahamas(+1242)</option>
							<option data-countryCode="BH" value="973">Bahrain(+973)</option>
							<option data-countryCode="BD" value="880">Bangladesh(+880)</option>
							<option data-countryCode="BB" value="1246">Barbados(+1246)</option>
							<option data-countryCode="BY" value="375">Belarus(+375)</option>
							<option data-countryCode="BE" value="32">Belgium(+32)</option>
							<option data-countryCode="BZ" value="501">Belize(+501)</option>
							<option data-countryCode="BJ" value="229">Benin(+229)</option>
							<option data-countryCode="BM" value="1441">Bermuda(+1441)</option>
							<option data-countryCode="BT" value="975">Bhutan(+975)</option>
							<option data-countryCode="BO" value="591">Bolivia(+591)</option>
							<option data-countryCode="BA" value="387">Bosnia(+387)</option>
							<option data-countryCode="BW" value="267">Botswana(+267)</option>
							<option data-countryCode="BR" value="55">Brazil(+55)</option>
							<option data-countryCode="BN" value="673">Brunei(+673)</option>
							<option data-countryCode="BG" value="359">Bulgaria(+359)</option>
							<option data-countryCode="BF" value="226">BurkinaFaso(+226)</option>
							<option data-countryCode="BI" value="257">Burundi(+257)</option>
							<option data-countryCode="KH" value="855">Cambodia(+855)</option>
							<option data-countryCode="CM" value="237">Cameroon(+237)</option>
							<option data-countryCode="CA" value="1">Canada(+1)</option>
							<option data-countryCode="CV" value="238">CapeVerde(+238)</option>
							<option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
							<option data-countryCode="CF" value="236">Central African Republic (+236)</option>
							<option data-countryCode="CL" value="56">Chile(+56)</option>
							<option data-countryCode="CN" value="86">China(+86)</option>
							<option data-countryCode="CO" value="57">Colombia(+57)</option>
							<option data-countryCode="KM" value="269">Comoros(+269)</option>
							<option data-countryCode="CG" value="242">Congo(+242)</option>
							<option data-countryCode="CK" value="682">Cook Islands(+682)</option>
							<option data-countryCode="CR" value="506">Costa Rica(+506)</option>
							<option data-countryCode="HR" value="385">Croatia(+385)</option>
							<option data-countryCode="CU" value="53">Cuba(+53)</option>
							<option data-countryCode="CY" value="90392">Cyprus North(+90392)</option>
							<option data-countryCode="CY" value="357">Cyprus South(+357)</option>
							<option data-countryCode="CZ" value="42">Czech Republic(+42)</option>
							<option data-countryCode="DK" value="45">Denmark(+45)</option>
							<option data-countryCode="DJ" value="253">Djibouti(+253)</option>
							<option data-countryCode="DM" value="1809">Dominica(+1809)</option>
							<option data-countryCode="DO" value="1809">Dominican Republic(+1809)</option>
							<option data-countryCode="EC" value="593">Ecuador(+593)</option>
							<option data-countryCode="EG" value="20">Egypt(+20)</option>
							<option data-countryCode="SV" value="503">El Salvador(+503)</option>
							<option data-countryCode="GQ" value="240">Equatorial Guinea(+240)</option>
							<option data-countryCode="ER" value="291">Eritrea(+291)</option>
							<option data-countryCode="EE" value="372">Estonia(+372)</option>
							<option data-countryCode="ET" value="251">Ethiopia(+251)</option>
							<option data-countryCode="FK" value="500">Falkland Islands(+500)</option>
							<option data-countryCode="FO" value="298">Faroe Islands(+298)</option>
							<option data-countryCode="FJ" value="679">Fiji(+679)</option>
							<option data-countryCode="FI" value="358">Finland(+358)</option>
							<option data-countryCode="FR" value="33">France(+33)</option>
							<option data-countryCode="GF" value="594">French Guiana(+594)</option>
							<option data-countryCode="PF" value="689">French Polynesia(+689)</option>
							<option data-countryCode="GA" value="241">Gabon(+241)</option>
							<option data-countryCode="GM" value="220">Gambia(+220)</option>
							<option data-countryCode="GE" value="7880">Georgia(+7880)</option>
							<option data-countryCode="DE" value="49">Germany(+49)</option>
							<option data-countryCode="GH" value="233">Ghana(+233)</option>
							<option data-countryCode="GI" value="350">Gibraltar(+350)</option>
							<option data-countryCode="GR" value="30">Greece(+30)</option>
							<option data-countryCode="GL" value="299">Greenland(+299)</option>
							<option data-countryCode="GD" value="1473">Grenada(+1473)</option>
							<option data-countryCode="GP" value="590">Guadeloupe(+590)</option>
							<option data-countryCode="GU" value="671">Guam(+671)</option>
							<option data-countryCode="GT" value="502">Guatemala(+502)</option>
							<option data-countryCode="GN" value="224">Guinea(+224)</option>
							<option data-countryCode="GW" value="245">Guinea-Bissau(+245)</option>
							<option data-countryCode="GY" value="592">Guyana(+592)</option>
							<option data-countryCode="HT" value="509">Haiti(+509)</option>
							<option data-countryCode="HN" value="504">Honduras(+504)</option>
							<option data-countryCode="HK" value="852">HongKong(+852)</option>
							<option data-countryCode="HU" value="36">Hungary(+36)</option>
							<option data-countryCode="IS" value="354">Iceland(+354)</option>
							<option data-countryCode="IN" value="91">India(+91)</option>
							<option data-countryCode="ID" value="62">Indonesia(+62)</option>
							<option data-countryCode="IR" value="98">Iran(+98)</option>
							<option data-countryCode="IQ" value="964">Iraq(+964)</option>
							<option data-countryCode="IE" value="353">Ireland(+353)</option>
							<option data-countryCode="IL" value="972">Israel(+972)</option>
							<option data-countryCode="IT" value="39">Italy(+39)</option>
							<option data-countryCode="JM" value="1876">Jamaica(+1876)</option>
							<option data-countryCode="JP" value="81">Japan(+81)</option>
							<option data-countryCode="JO" value="962">Jordan(+962)</option>
							<option data-countryCode="KZ" value="7">Kazakhstan(+7)</option>
							<option data-countryCode="KE" value="254">Kenya(+254)</option>
							<option data-countryCode="KI" value="686">Kiribati(+686)</option>
							<option data-countryCode="KP" value="850">KoreaNorth(+850)</option>
							<option data-countryCode="KR" value="82">KoreaSouth(+82)</option>
							<option data-countryCode="KW" value="965">Kuwait(+965)</option>
							<option data-countryCode="KG" value="996">Kyrgyzstan(+996)</option>
							<option data-countryCode="LA" value="856">Laos(+856)</option>
							<option data-countryCode="LV" value="371">Latvia(+371)</option>
							<option data-countryCode="LB" value="961">Lebanon(+961)</option>
							<option data-countryCode="LS" value="266">Lesotho(+266)</option>
							<option data-countryCode="LR" value="231">Liberia(+231)</option>
							<option data-countryCode="LY" value="218">Libya(+218)</option>
							<option data-countryCode="LI" value="417">Liechtenstein(+417)</option>
							<option data-countryCode="LT" value="370">Lithuania(+370)</option>
							<option data-countryCode="LU" value="352">Luxembourg(+352)</option>
							<option data-countryCode="MO" value="853">Macao(+853)</option>
							<option data-countryCode="MK" value="389">Macedonia(+389)</option>
							<option data-countryCode="MG" value="261">Madagascar(+261)</option>
							<option data-countryCode="MW" value="265">Malawi(+265)</option>
							<option data-countryCode="MY" value="60">Malaysia(+60)</option>
							<option data-countryCode="MV" value="960">Maldives(+960)</option>
							<option data-countryCode="ML" value="223">Mali(+223)</option>
							<option data-countryCode="MT" value="356">Malta(+356)</option>
							<option data-countryCode="MH" value="692">Marshall Islands(+692)</option>
							<option data-countryCode="MQ" value="596">Martinique(+596)</option>
							<option data-countryCode="MR" value="222">Mauritania(+222)</option>
							<option data-countryCode="YT" value="269">Mayotte(+269)</option>
							<option data-countryCode="MX" value="52">Mexico(+52)</option>
							<option data-countryCode="FM" value="691">Micronesia(+691)</option>
							<option data-countryCode="MD" value="373">Moldova(+373)</option>
							<option data-countryCode="MC" value="377">Monaco(+377)</option>
							<option data-countryCode="MN" value="976">Mongolia(+976)</option>
							<option data-countryCode="MS" value="1664">Montserrat(+1664)</option>
							<option data-countryCode="MA" value="212">Morocco(+212)</option>
							<option data-countryCode="MZ" value="258">Mozambique(+258)</option>
							<option data-countryCode="MN" value="95">Myanmar(+95)</option>
							<option data-countryCode="NA" value="264">Namibia(+264)</option>
							<option data-countryCode="NR" value="674">Nauru(+674)</option>
							<option data-countryCode="NP" value="977">Nepal(+977)</option>
							<option data-countryCode="NL" value="31">Netherlands(+31)</option>
							<option data-countryCode="NC" value="687">New Caledonia(+687)</option>
							<option data-countryCode="NZ" value="64">New Zealand(+64)</option>
							<option data-countryCode="NI" value="505">Nicaragua(+505)</option>
							<option data-countryCode="NE" value="227">Niger(+227)</option>
							<option data-countryCode="NG" value="234">Nigeria(+234)</option>
							<option data-countryCode="NU" value="683">Niue(+683)</option>
							<option data-countryCode="NF" value="672">Norfolk Islands(+672)</option>
							<option data-countryCode="NP" value="670">Northern Marianas(+670)</option>
							<option data-countryCode="NO" value="47">Norway(+47)</option>
							<option data-countryCode="OM" value="968">Oman(+968)</option>
							<option data-countryCode="PW" value="680">Palau(+680)</option>
							<option data-countryCode="PA" value="507">Panama(+507)</option>
							<option data-countryCode="PG" value="675">Papua New Guinea(+675)</option>
							<option data-countryCode="PY" value="595">Paraguay(+595)</option>
							<option data-countryCode="PE" value="51">Peru(+51)</option>
							<option data-countryCode="PH" value="63">Philippines(+63)</option>
							<option data-countryCode="PL" value="48">Poland(+48)</option>
							<option data-countryCode="PT" value="351">Portugal(+351)</option>
							<option data-countryCode="PR" value="1787">Puerto Rico(+1787)</option>
							<option data-countryCode="QA" value="974">Qatar(+974)</option>
							<option data-countryCode="RE" value="262">Reunion(+262)</option>
							<option data-countryCode="RO" value="40">Romania(+40)</option>
							<option data-countryCode="RU" value="7">Russia(+7)</option>
							<option data-countryCode="RW" value="250">Rwanda(+250)</option>
							<option data-countryCode="SM" value="378">San Marino(+378)</option>
							<option data-countryCode="ST" value="239">SaoTome&amp;Principe(+239)</option>
							<option data-countryCode="SA" value="966">Saudi Arabia(+966)</option>
							<option data-countryCode="SN" value="221">Senegal(+221)</option>
							<option data-countryCode="CS" value="381">Serbia(+381)</option>
							<option data-countryCode="SC" value="248">Seychelles(+248)</option>
							<option data-countryCode="SL" value="232">Sierra Leone(+232)</option>
							<option data-countryCode="SG" value="65">Singapore(+65)</option>
							<option data-countryCode="SK" value="421">Slovak Republic(+421)</option>
							<option data-countryCode="SI" value="386">Slovenia(+386)</option>
							<option data-countryCode="SB" value="677">Solomon Islands(+677)</option>
							<option data-countryCode="SO" value="252">Somalia(+252)</option>
							<option data-countryCode="ZA" value="27">South Africa(+27)</option>
							<option data-countryCode="ES" value="34">Spain(+34)</option>
							<option data-countryCode="LK" value="94">SriLanka(+94)</option>
							<option data-countryCode="SH" value="290">St.Helena(+290)</option>
							<option data-countryCode="KN" value="1869">St.Kitts(+1869)</option>
							<option data-countryCode="SC" value="1758">St.Lucia(+1758)</option>
							<option data-countryCode="SD" value="249">Sudan(+249)</option>
							<option data-countryCode="SR" value="597">Suriname(+597)</option>
							<option data-countryCode="SZ" value="268">Swaziland(+268)</option>
							<option data-countryCode="SE" value="46">Sweden(+46)</option>
							<option data-countryCode="CH" value="41">Switzerland(+41)</option>
							<option data-countryCode="SI" value="963">Syria(+963)</option>
							<option data-countryCode="TW" value="886">Taiwan(+886)</option>
							<option data-countryCode="TJ" value="7">Tajikstan(+7)</option>
							<option data-countryCode="TH" value="66">Thailand(+66)</option>
							<option data-countryCode="TG" value="228">Togo(+228)</option>
							<option data-countryCode="TO" value="676">Tonga(+676)</option>
							<option data-countryCode="TT" value="1868">Trinidad&amp;Tobago(+1868)</option>
							<option data-countryCode="TN" value="216">Tunisia(+216)</option>
							<option data-countryCode="TR" value="90">Turkey(+90)</option>
							<option data-countryCode="TM" value="7">Turkmenistan(+7)</option>
							<option data-countryCode="TM" value="993">Turkmenistan(+993)</option>
							<option data-countryCode="TC" value="1649">Turks&amp;Caicos(+1649)</option>
							<option data-countryCode="TV" value="688">Tuvalu(+688)</option>
							<option data-countryCode="UG" value="256">Uganda(+256)</option>
							<option data-countryCode="GB" value="44">UK(+44)</option> 
							<option data-countryCode="UA" value="380">Ukraine(+380)</option>
							<option data-countryCode="AE" value="971">United Arab Emirates(+971)</option>
							<option data-countryCode="UY" value="598">Uruguay(+598)</option>
							<option data-countryCode="US" value="1">USA(+1)</option> 
							<option data-countryCode="UZ" value="7">Uzbekistan(+7)</option>
							<option data-countryCode="VU" value="678">Vanuatu(+678)</option>
							<option data-countryCode="VA" value="379">Vatican City(+379)</option>
							<option data-countryCode="VE" value="58">Venezuela(+58)</option>
							<option data-countryCode="VN" value="84">Vietnam(+84)</option>
							<option data-countryCode="VG" value="84">Virgin Islands-British(+1284)</option>
							<option data-countryCode="VI" value="84">Virgin Islands- US(+1340)</option>
							<option data-countryCode="WF" value="681">Wallis&amp;Futuna(+681)</option>
							<option data-countryCode="YE" value="969">Yemen(North)(+969)</option>
							<option data-countryCode="YE" value="967">Yemen(South)(+967)</option>
							<option data-countryCode="ZM" value="260">Zambia(+260)</option>
							<option data-countryCode="ZW" value="263">Zimbabwe(+263)</option>
				
							</select>
						
						
							{{-- Input --}}
							<input style="width:13rem;" type="text" x-model="form.phone" class="{{ $errors->first('phone') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300' }} border text-gray-900 text-sm rounded-md font-medium block ltr:pr-12 rtl:pl-12 p-4 placeholder:font-normal dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.t_enter_phone') }}">

							{{-- Icon --}}
							<div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
							<svg xmlns="http://www.w3.org/2000/svg" class="svg-icon" style="width: 1em;height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1"><path d="M670.19 870.91c-24.45 0-50.53-3.21-78.33-9.6-96.61-22.19-173.3-78.8-229.32-125.64-62.52-52.29-132.62-117.97-178.5-208.74-24.27-48.02-35.55-93.81-35.48-144.03-4.36-84.8 54.81-140.17 99.78-174.49 33.02-25.23 76.49-24.12 108.15 2.77 29.49 25.05 58.71 53.9 86.83 85.74 26.99 30.56 26.72 81.98-0.62 117.06-1.99 2.55-4.09 5-6.21 7.43-1.16 1.35-2.33 2.68-3.45 4.06-24.93 30.47-24.93 30.47-4.11 60.37 47.83 68.7 104.18 111.96 172.27 132.21 5.73 1.69 6.89 0.85 9.67-2.07l3.18-3.3c7.58-7.87 14.72-15.3 21.35-23.05 18.91-22.13 44.47-35.21 71.99-36.81 26.99-1.47 53.42 8.2 74.24 27.51 20.58 19.11 41.6 39.81 62.48 61.53v0.01c39.46 41.07 42.03 91.2 7.06 137.53-46.21 61.22-105.84 91.51-180.98 91.51zM300.83 245.37c-6.41 0-12.87 2.32-18.97 6.98-56.57 43.17-80.65 82.74-78.08 128.29l0.05 0.83-0.01 0.83c-0.16 42.04 8.95 78.96 29.54 119.7 41.35 81.82 106.42 142.6 164.62 191.27 51.28 42.89 121.07 94.62 206.24 114.18 91.03 20.91 155.47 1.41 202.84-61.33 18.43-24.42 17.56-44.75-2.81-65.95-20.15-20.97-40.4-40.92-60.22-59.31-9.81-9.11-21.47-13.51-33.44-12.86-12.35 0.71-24.12 6.95-33.18 17.56-7.7 8.99-15.76 17.36-23.55 25.45l-3.14 3.26c-17.68 18.4-40.27 24.21-65.27 16.76-80.57-23.97-146.61-74.21-201.88-153.6-37.93-54.47-31.22-80.62 6.69-126.95 1.46-1.79 2.98-3.54 4.5-5.29 1.48-1.71 2.96-3.4 4.34-5.17 10.76-13.81 12.09-35.98 2.78-46.5-26.38-29.88-53.7-56.86-81.19-80.21-6.22-5.29-13.01-7.94-19.86-7.94z"/></svg>
							</div>

						</div>

						{{-- Error --}}
						@error('phone')
							<p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
								{{ $errors->first('phone') }}
							</p>
						@enderror

					</div>

					{{-- Password --}}
					<div class="col-span-12">
						<div class="relative w-full shadow-sm rounded-md">

							{{-- Input --}}
							<input type="password" x-model="form.password" class="{{ $errors->first('password') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300' }} border text-gray-900 text-sm rounded-md font-medium block w-full ltr:pr-12 rtl:pl-12 p-4 placeholder:font-normal  dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.t_enter_password') }}">

							{{-- Icon --}}
							<div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
								<svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
							</div>

						</div>

						{{-- Error --}}
						@error('password')
							<p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
								{{ $errors->first('password') }}
							</p>
						@enderror

					</div>

                    {{-- Accept terms --}}
                    <div class="col-span-12">
                        <div class="flex items-start space-x-2 rtl:space-x-reverse">
                            <svg class="w-6 h-6 text-gray-400 flex-shrink-0" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-sm text-gray-500 dark:text-zinc-300">@lang('messages.t_by_signup_u_agree_to_terms_privacy')</span>
                        </div>
                    </div>

					{{-- reCaptcha --}}
					@if (settings('security')->is_recaptcha)
						<div class="col-span-12" wire:ignore>
							<div class="g-recaptcha" data-sitekey="{{ config('recaptcha.site_key') }}" data-theme="{{ current_theme() }}"></div>
						</div>
					@endif

					{{-- Register --}}
					<div class="col-span-12">
						<button type="submit" wire:loading.attr="disabled" wire:target="register" :disabled="!form.email || !form.password || !form.fullname || !form.username" class="w-full bg-primary-600 enabled:hover:bg-primary-700 text-white py-4.5 px-4 rounded-md text-[13px] font-semibold tracking-wide disabled:bg-zinc-200 disabled:text-zinc-500 dark:disabled:bg-zinc-500 dark:disabled:text-zinc-300 disabled:cursor-not-allowed">
							
							{{-- Loading indicator --}}
							<div wire:loading wire:target="register">
								<svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
									<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
								</svg>
							</div>

							{{-- Button text --}}
							<div wire:loading.remove wire:target="register">
								@lang('messages.t_create_account')
							</div>
							
						</button>
					</div>
					
				</form>
			</div>

			{{-- Divider --}}
			<div class="my-6 relative">
				<div class="absolute inset-0 flex items-center" aria-hidden="true">
					<div class="w-full border-t border-gray-300 dark:border-zinc-700"></div>
				</div>
				<div class="relative flex justify-center text-sm">
					<span class="px-2 bg-white dark:bg-zinc-800 text-gray-500 dark:text-gray-400">
						{{ __('messages.t_or') }}
					</span>
				</div>
			</div>

			{{-- Social media login --}}
			@if ($social_grid)
				<div class="mt-1 grid grid-cols-5 gap-3">

					{{-- Facebook login --}}
					@if (settings('auth')->is_facebook_login)
						<div>
							<a href="{{ url('auth/facebook') }}" class="w-full inline-flex justify-center py-3 rounded-sm bg-zinc-200 hover:bg-[#eeeded] dark:bg-zinc-700 dark:hover:bg-zinc-600 text-sm font-medium">
								<svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.995 1.67a8.325 8.325 0 1 0 0 16.65 8.325 8.325 0 0 0 0-16.65Z" fill="#039BE5"></path><path d="M11.122 12.201h2.154l.339-2.188H11.12V8.817c0-.91.297-1.716 1.148-1.716h1.367v-1.91c-.24-.032-.748-.103-1.708-.103-2.004 0-3.178 1.058-3.178 3.469v1.456H6.69V12.2h2.06v6.016c.408.061.82.103 1.245.103.383 0 .758-.035 1.127-.085V12.2Z" fill="#fff"></path></svg>
							</a>
						</div>
					@endif

					{{-- Google login --}}
					@if (settings('auth')->is_google_login)
						<div>
							<a href="{{ url('auth/google') }}" class="w-full inline-flex justify-center py-3 rounded-sm bg-zinc-200 hover:bg-[#eeeded] dark:bg-zinc-700 dark:hover:bg-zinc-600 text-sm font-medium">
								<svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.171 8.368h-.67v-.035H10v3.333h4.709A4.998 4.998 0 0 1 5 10a5 5 0 0 1 5-5c1.275 0 2.434.48 3.317 1.266l2.357-2.357A8.295 8.295 0 0 0 10 1.667a8.334 8.334 0 1 0 8.171 6.7Z" fill="#FFC107"></path><path d="M2.628 6.121 5.366 8.13A4.998 4.998 0 0 1 10 4.999c1.275 0 2.434.482 3.317 1.267l2.357-2.357A8.295 8.295 0 0 0 10 1.667 8.329 8.329 0 0 0 2.628 6.12Z" fill="#FF3D00"></path><path d="M10 18.333a8.294 8.294 0 0 0 5.587-2.163l-2.579-2.183A4.963 4.963 0 0 1 10 15a4.998 4.998 0 0 1-4.701-3.311L2.58 13.783A8.327 8.327 0 0 0 10 18.333Z" fill="#4CAF50"></path><path d="M18.171 8.368H17.5v-.034H10v3.333h4.71a5.017 5.017 0 0 1-1.703 2.321l2.58 2.182c-.182.166 2.746-2.003 2.746-6.17 0-.559-.057-1.104-.162-1.632Z" fill="#1976D2"></path></svg>
							</a>
						</div>
					@endif

					{{-- Github login --}}
					@if (settings('auth')->is_github_login)
						<div>
							<a href="{{ url('auth/github') }}" class="w-full inline-flex justify-center py-3 rounded-sm bg-zinc-200 hover:bg-[#eeeded] dark:bg-zinc-700 dark:hover:bg-zinc-600 text-sm font-medium">
								<svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.083 1.75C5.25 2.167 2.167 5.25 1.75 9c-.5 4.167 2.083 7.75 5.75 8.917V16s-.333.083-.75.083c-1.167 0-1.667-1-1.75-1.583-.083-.333-.25-.583-.5-.833-.25-.084-.333-.084-.333-.167 0-.167.25-.167.333-.167.5 0 .917.584 1.083.834C6 14.833 6.5 15 6.75 15c.333 0 .583-.083.75-.167.083-.583.333-1.166.833-1.5C6.417 12.917 5 11.833 5 10c0-.917.417-1.833 1-2.5-.083-.167-.167-.583-.167-1.167 0-.333 0-.833.25-1.333 0 0 1.167 0 2.334 1.083.416-.166 1-.25 1.583-.25s1.167.084 1.667.25C12.75 5 14 5 14 5c.167.5.167 1 .167 1.333 0 .667-.084 1-.167 1.167.583.667 1 1.5 1 2.5 0 1.833-1.417 2.917-3.333 3.333.5.417.833 1.167.833 1.917V18c3.417-1.083 5.833-4.25 5.833-7.917 0-5-4.25-8.916-9.25-8.333Z" fill="#000"></path></svg>
							</a>
						</div>
					@endif

					{{-- Twitter login --}}
					@if (settings('auth')->is_twitter_login)
						<div>
							<a href="{{ url('auth/twitter') }}" class="w-full inline-flex justify-center py-3 rounded-sm bg-zinc-200 hover:bg-[#eeeded] dark:bg-zinc-700 dark:hover:bg-zinc-600 text-sm font-medium">
								<svg fill="#1da1f2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 27" width="20px" height="20px"><path d="M 25.855469 5.574219 C 24.914063 5.992188 23.902344 6.273438 22.839844 6.402344 C 23.921875 5.75 24.757813 4.722656 25.148438 3.496094 C 24.132813 4.097656 23.007813 4.535156 21.8125 4.769531 C 20.855469 3.75 19.492188 3.113281 17.980469 3.113281 C 15.082031 3.113281 12.730469 5.464844 12.730469 8.363281 C 12.730469 8.773438 12.777344 9.175781 12.867188 9.558594 C 8.503906 9.339844 4.636719 7.246094 2.046875 4.070313 C 1.59375 4.847656 1.335938 5.75 1.335938 6.714844 C 1.335938 8.535156 2.261719 10.140625 3.671875 11.082031 C 2.808594 11.054688 2 10.820313 1.292969 10.425781 C 1.292969 10.449219 1.292969 10.46875 1.292969 10.492188 C 1.292969 13.035156 3.101563 15.15625 5.503906 15.640625 C 5.0625 15.761719 4.601563 15.824219 4.121094 15.824219 C 3.78125 15.824219 3.453125 15.792969 3.132813 15.730469 C 3.800781 17.8125 5.738281 19.335938 8.035156 19.375 C 6.242188 20.785156 3.976563 21.621094 1.515625 21.621094 C 1.089844 21.621094 0.675781 21.597656 0.265625 21.550781 C 2.585938 23.039063 5.347656 23.90625 8.3125 23.90625 C 17.96875 23.90625 23.25 15.90625 23.25 8.972656 C 23.25 8.742188 23.246094 8.515625 23.234375 8.289063 C 24.261719 7.554688 25.152344 6.628906 25.855469 5.574219"/></svg>
							</a>
						</div>
					@endif

					{{-- Linkedin login --}}
					@if (settings('auth')->is_linkedin_login)
						<div>
							<a href="{{ url('auth/linkedin') }}" class="w-full inline-flex justify-center py-3 rounded-sm bg-zinc-200 hover:bg-[#eeeded] dark:bg-zinc-700 dark:hover:bg-zinc-600 text-sm font-medium">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="20" height="20"viewBox="0 0 48 48"style=" fill:#000000;"><path fill="#0078d4" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z"></path><path d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479C18,16.523,16.521,18,14.485,18H18v19H11z" opacity=".05"></path><path d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z" opacity=".07"></path><path fill="#fff" d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z"></path></svg>
							</a>
						</div>
					@endif
					
				</div>
			@endif

			{{-- Action links --}}
			<div class="mt-6">
				<ul class="list-disc list-inside text-slate-500 text-[13px] space-y-2 dark:text-gray-300">

					{{-- Login --}}
					<li>
						<a class="hover:text-slate-600 dark:hover:text-zinc-100 hover:underline" href="{{ url('auth/login') }}">
							@lang('messages.t_already_have_account') @lang('messages.t_login')
						</a>
					</li>

					{{-- Resend activation url --}}
					<li>
						<a class="hover:text-slate-600 dark:hover:text-zinc-100 hover:underline" href="{{ url('auth/request') }}">
							@lang('messages.t_resend_verification_email')	
						</a>
					</li>

					{{-- Privacy policy & Terms of services --}}
					@if (settings('footer')->privacy && settings('footer')->terms)

						{{-- Privacy --}}
						<li>
							<a class="hover:text-slate-600 dark:hover:text-zinc-100 hover:underline" href="{{ url('page', settings('footer')->privacy->slug) }}">{{ settings('footer')->privacy->title }}</a>
						</li>

						{{-- Terms --}}
						<li>
							<a class="hover:text-slate-600 dark:hover:text-zinc-100 hover:underline" href="{{ url('page', settings('footer')->terms->slug) }}">{{ settings('footer')->terms->title }}</a>
						</li>
					@endif

				</ul>
			</div>
			
		</div>

	</div>

</div>

@push('styles')
	
	{{-- reCaptcha --}}
	@if (settings('security')->is_recaptcha)
		<script src='https://www.google.com/recaptcha/api.js' async defer></script>
	@endif

@endpush

@push('scripts')
	<script>
		function UcZWcDFfVKBjfgP() {
			return {

				// reCaptcha
				recaptcha: Boolean("{{ settings('security')->is_recaptcha ? true : false }}"),

				// Form
				form: {
					email   : null,
					password: null,
					fullname: null,
					username: null
				},

				// Register
				register() {
					var _this = this;

					// Is recapctah enabled
					if (_this.recaptcha && document.getElementById('g-recaptcha-response')) {

						// Get recaptcha response
						var recaptcha_token = document.getElementById('g-recaptcha-response').value;
	
						// Validate recapctah
						if (!recaptcha_token) {
						
							// Error
							window.$wireui.notify({
								title      : "{{ __('messages.t_error') }}",
								description: "{{ __('messages.t_recaptcha_error_message') }}",
								icon       : 'error'
							});
	
							return;
	
						}
						
					} else {

						// reCaptcha has no response
						var recaptcha_token = null;

					}

					// Validate form
					if (!_this.form.email || !_this.form.password || !_this.form.fullname || !_this.form.username || !_this.form.phone) {
                        
						// Error
						window.$wireui.notify({
							title      : "{{ __('messages.t_error') }}",
							description: "{{ __('messages.t_pls_check_ur_inputs_and_try_again') }}",
							icon       : 'error'
						});

						return;

					}

					// Register
					@this.register({
						'email'          : _this.form.email,
						'password'       : _this.form.password,
						'username'       : _this.form.username,
						'fullname'       : _this.form.fullname,
						'phone'          : _this.form.phone,
						'recaptcha_token': recaptcha_token
					});

				}

			}
		}
		window.UcZWcDFfVKBjfgP = UcZWcDFfVKBjfgP();
	</script>
@endpush