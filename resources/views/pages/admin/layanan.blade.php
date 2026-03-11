<x-admin.app-layout>

    <div class="flex-1 overflow-y-auto p-8 space-y-8">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-black text-slate-900 dark:text-slate-50 tracking-tight">Services</h1>
                <p class="text-slate-500 text-sm">Manage your platform's service catalog and offerings.</p>
            </div>
            <div class="flex items-center gap-3">
                <button
                    class="flex items-center gap-2 px-4 py-2 border border-primary/20 text-primary bg-primary/5 font-semibold rounded-lg hover:bg-primary/10 transition-all text-sm">
                    <span class="material-symbols-outlined text-lg">download</span>
                    Export
                </button>
                <button
                    class="flex items-center gap-2 px-4 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-primary/90 transition-all shadow-lg shadow-primary/20 text-sm">
                    <span class="material-symbols-outlined text-lg">add</span>
                    Add Service
                </button>
            </div>
        </div>
        <!-- Table Section -->
        <div class="bg-white dark:bg-background-dark rounded-xl border border-primary/10 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-primary/5 border-b border-primary/10">
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Image</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Service Name</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Category</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Sort
                            </th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-primary/5">
                        <!-- Row 1 -->
                        <tr class="hover:bg-primary/5 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="size-12 rounded-lg bg-slate-100 overflow-hidden border border-slate-200">
                                    <div class="w-full h-full bg-cover bg-center"
                                        data-alt="Abstract tech service background pattern"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBeG4lHcV-B_eJQMG4phtbcnHGjZPkWdP21whX25SAf9rtbkjA4YXSVwJv8d-rHEAVU1S-ew_xh_dZr9TBAxbYphlZG9JEbvSHllwVDI1ZfzC66r0dTHh7shYC-Nth8UBzLdnAoTBDR_sjw0esNE7voV5cVEWxonj_aRuy8A3cnymU2wS-8WEBs4ZGvvuHT9yJ6G2nMBoxTFSJtG0CvV96Jndj2vyWoEJJkWiDT2yyUjlPw3_H3NhlpCdaaa19dtzFR4rQUf9qD4RM');">
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-semibold text-slate-900 dark:text-slate-50">Web Application Dev
                                </p>
                                <p class="text-xs text-slate-500">Custom Laravel solutions</p>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded text-xs font-medium uppercase tracking-wide">Development</span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="flex items-center gap-1.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400">
                                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                    Active
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500">01</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button class="p-2 text-slate-400 hover:text-primary transition-colors"><span
                                            class="material-symbols-outlined text-xl">edit</span></button>
                                    <button class="p-2 text-slate-400 hover:text-red-500 transition-colors"><span
                                            class="material-symbols-outlined text-xl">delete</span></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr class="hover:bg-primary/5 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="size-12 rounded-lg bg-slate-100 overflow-hidden border border-slate-200">
                                    <div class="w-full h-full bg-cover bg-center"
                                        data-alt="Modern UI UX design colorful gradient"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBeraTY2ujhV4aMOKRMtW9Ww-TAnrb0NdGJ947q27CEfOBsszhf6pLsfhDVWHGfWszkRmVj7to7x0vJW-oPZ_lHgveBDm1SIg15Yxr5-pNRpNQk2pu5402k5P39ISYaZls0wa19-GyA9AdD4PXy2xrmXhJP3KgKMTsFlFwbojZy8iDvBITmWvyS6ve_Hz9jQzG3h8IhxJTP3lY-9tffiA1Thfn5CtZAdNfUX_xG8KcqCbLg6dvh1SPIvUtMZutj2EbTYXX8KzxYNwA');">
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-semibold text-slate-900 dark:text-slate-50">UI/UX Design</p>
                                <p class="text-xs text-slate-500">Figma to Prototype</p>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded text-xs font-medium uppercase tracking-wide">Design</span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="flex items-center gap-1.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400">
                                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                    Active
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500">02</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button class="p-2 text-slate-400 hover:text-primary transition-colors"><span
                                            class="material-symbols-outlined text-xl">edit</span></button>
                                    <button class="p-2 text-slate-400 hover:text-red-500 transition-colors"><span
                                            class="material-symbols-outlined text-xl">delete</span></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr class="hover:bg-primary/5 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="size-12 rounded-lg bg-slate-100 overflow-hidden border border-slate-200">
                                    <div class="w-full h-full bg-cover bg-center"
                                        data-alt="SEO and marketing metrics graph pattern"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBCA__fguhaL4xljv868qoIUZkRRAH2ZHcwhwDaJLGWWAQNTop2j942D-S9MsoecqCN5PZA1BdlxNCUPbqtxkkO_5GaXhw4l7cTiRA509RWHgzFaxcx0gnkB7niL7Ct-dvIgsFRUPfZ2hPitdtJc1ALB8M-WcD_s_MMe4ouo1muys3lv7HEGncitZv09l6Q0T_DtpzdB_uzjTy8z9MdJAJCO0_LS5dzI5kMKY8_Ml0g_b1Iiz3SAfMDq6Azup3IgdnJNtp-VN7IWCk');">
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-semibold text-slate-900 dark:text-slate-50">SEO Optimization</p>
                                <p class="text-xs text-slate-500">Google Search Engine</p>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded text-xs font-medium uppercase tracking-wide">Marketing</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="flex items-center gap-1.5 text-xs font-semibold text-slate-400">
                                    <span class="size-1.5 rounded-full bg-slate-400"></span>
                                    Draft
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500">03</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button class="p-2 text-slate-400 hover:text-primary transition-colors"><span
                                            class="material-symbols-outlined text-xl">edit</span></button>
                                    <button class="p-2 text-slate-400 hover:text-red-500 transition-colors"><span
                                            class="material-symbols-outlined text-xl">delete</span></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Row 4 -->
                        <tr class="hover:bg-primary/5 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="size-12 rounded-lg bg-slate-100 overflow-hidden border border-slate-200">
                                    <div class="w-full h-full bg-cover bg-center"
                                        data-alt="Secure cloud server infrastructure illustration"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBudzQzDZrGRBcPCTw5Me3ESod0800MdDZEPUFeC4Ejjxu-VuHoizw-KSIghMHwBOVGbSBN92JNOsfxpjr_UrA5unMCYOiwH1OUsWVyzWOhfJu2m5AyrGVERHgfd1EXN00QgH-H9a1ib5W-1Yg0s8AMVaEGXSBbbZeSBJfGk-zv41gNNoSF6JhPcQMT7cyzdkVErjx0JAxkkHzT9uEytdCb_ow7VsUWV9gFgLAyvVFw0dv70u0HqzVGV67b5NRBDohS0x_syb7YJeE');">
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-semibold text-slate-900 dark:text-slate-50">Cloud Hosting</p>
                                <p class="text-xs text-slate-500">AWS &amp; Digital Ocean</p>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded text-xs font-medium uppercase tracking-wide">Infrastructure</span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="flex items-center gap-1.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400">
                                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                    Active
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500">04</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button class="p-2 text-slate-400 hover:text-primary transition-colors"><span
                                            class="material-symbols-outlined text-xl">edit</span></button>
                                    <button class="p-2 text-slate-400 hover:text-red-500 transition-colors"><span
                                            class="material-symbols-outlined text-xl">delete</span></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Row 5 -->
                        <tr class="hover:bg-primary/5 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="size-12 rounded-lg bg-slate-100 overflow-hidden border border-slate-200">
                                    <div class="w-full h-full bg-cover bg-center"
                                        data-alt="Mobile app interface icons on phone"
                                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC0wLj_FmHE8CoeU3w3Sqvk0Zvw-onCa4Ps5iWFVcFCxxDjNprFM2ywGfgCvZpB_x5N0YFhwMk7sLiEgYkrPJXYAAvRA1JeISryYixxE-AApQe_G6cdrvT5oZV-9JAD2nr1g6RNlFiDevMrzzLg0Dqs9R-kD7pCQl4ovydjXPianlZkYTe6-LKiZ7-_RzNQUeJBYlE3BtB2EHjYQgghYlXIy06m76H47bTfW_LFw7b_ojjQ-PGYtF2rmMNZvbJwW0uZFVzONnqEqLk');">
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-semibold text-slate-900 dark:text-slate-50">Mobile App Dev</p>
                                <p class="text-xs text-slate-500">iOS &amp; Android Apps</p>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded text-xs font-medium uppercase tracking-wide">Development</span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="flex items-center gap-1.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400">
                                    <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                    Active
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500">05</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button class="p-2 text-slate-400 hover:text-primary transition-colors"><span
                                            class="material-symbols-outlined text-xl">edit</span></button>
                                    <button class="p-2 text-slate-400 hover:text-red-500 transition-colors"><span
                                            class="material-symbols-outlined text-xl">delete</span></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Form Section (Create / Edit Service) -->
        <div class="bg-white dark:bg-background-dark rounded-xl border border-primary/10 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-primary/10 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">edit_note</span>
                <h2 class="font-bold text-lg">Create / Edit Service</h2>
            </div>
            <form class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column: Primary Details -->
                    <div class="lg:col-span-2 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Service
                                    Name</label>
                                <input
                                    class="w-full bg-primary/5 border-primary/10 rounded-lg focus:ring-primary focus:border-primary transition-all text-sm"
                                    type="text" value="Web Application Dev" />
                            </div>
                            <div class="space-y-1">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Slug</label>
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-primary/10 bg-primary/5 text-slate-500 text-xs">/services/</span>
                                    <input
                                        class="flex-1 min-w-0 bg-primary/5 border-primary/10 rounded-none rounded-r-lg focus:ring-primary focus:border-primary transition-all text-sm"
                                        type="text" value="web-app-dev" />
                                </div>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Excerpt</label>
                            <textarea
                                class="w-full bg-primary/5 border-primary/10 rounded-lg focus:ring-primary focus:border-primary transition-all text-sm"
                                placeholder="Short summary for list views..." rows="2">Our high-performance custom Laravel applications are built to scale with your business needs.</textarea>
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Description</label>
                            <div class="border border-primary/10 rounded-lg overflow-hidden">
                                <div class="bg-primary/5 px-3 py-2 border-b border-primary/10 flex gap-4">
                                    <button class="text-slate-500 hover:text-primary" type="button"><span
                                            class="material-symbols-outlined text-sm">format_bold</span></button>
                                    <button class="text-slate-500 hover:text-primary" type="button"><span
                                            class="material-symbols-outlined text-sm">format_italic</span></button>
                                    <button class="text-slate-500 hover:text-primary" type="button"><span
                                            class="material-symbols-outlined text-sm">link</span></button>
                                    <button class="text-slate-500 hover:text-primary" type="button"><span
                                            class="material-symbols-outlined text-sm">format_list_bulleted</span></button>
                                </div>
                                <textarea class="w-full bg-transparent border-none focus:ring-0 text-sm"
                                    placeholder="Full service description details..." rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Right Column: Settings & Media -->
                    <div class="space-y-6">
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Featured
                                Image</label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-primary/10 border-dashed rounded-lg bg-primary/5 hover:bg-primary/10 transition-colors group cursor-pointer">
                                <div class="space-y-2 text-center">
                                    <div class="size-32 mx-auto relative group">
                                        <div
                                            class="absolute inset-0 bg-primary/20 rounded-lg opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                            <span class="material-symbols-outlined text-white">upload</span>
                                        </div>
                                        <div class="w-full h-full bg-cover bg-center rounded-lg border border-primary/20"
                                            data-alt="Featured service image preview"
                                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuASo5i6QyBA98jefBctrXD3qhP7g_JqjeuNo7umAwa9GwXpuyxyvhyBzpAmtb4EdKi9l2EfrL80SICanQOrxx_ksH6DuX_bjmShCKtXyleD_A9uulmzlZgtLPqU240hVtkCt5bacmRDug6U-Ve89wut5UYQDpRcddHBFzgisxR4kK4daP_FG7DxblT1eUAs_3Mlsoll8KYPqiNr6f5mo7Z0J0hHvaSXEdMBDs5vKjM838rMD3eZog38S5ZZIwXwGB1T9SDkSCW1GVI');">
                                        </div>
                                    </div>
                                    <div class="flex text-xs text-slate-600 justify-center">
                                        <span class="text-primary font-bold">Upload a file</span>
                                        <span class="pl-1">or drag and drop</span>
                                    </div>
                                    <p class="text-[10px] text-slate-500">PNG, JPG up to 5MB</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label
                                    class="text-sm font-semibold text-slate-700 dark:text-slate-300">Category</label>
                                <select
                                    class="w-full bg-primary/5 border-primary/10 rounded-lg focus:ring-primary focus:border-primary transition-all text-sm">
                                    <option>Development</option>
                                    <option>Design</option>
                                    <option>Marketing</option>
                                    <option>Infrastructure</option>
                                </select>
                            </div>
                            <div class="space-y-1">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Sort
                                    Order</label>
                                <input
                                    class="w-full bg-primary/5 border-primary/10 rounded-lg focus:ring-primary focus:border-primary transition-all text-sm"
                                    type="number" value="1" />
                            </div>
                        </div>
                        <div class="p-4 bg-primary/5 rounded-lg border border-primary/10">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-bold">Service Visibility</p>
                                    <p class="text-[11px] text-slate-500 leading-tight">Decide if this service
                                        should be publicly visible on the website.</p>
                                </div>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input checked="" class="sr-only peer" type="checkbox" />
                                    <div
                                        class="relative w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="pt-4 flex items-center gap-3">
                            <button
                                class="flex-1 px-4 py-2 bg-primary text-white font-bold rounded-lg hover:bg-primary/90 transition-all text-sm"
                                type="button">Save Service</button>
                            <button
                                class="px-4 py-2 border border-slate-200 text-slate-500 font-bold rounded-lg hover:bg-slate-50 transition-all text-sm"
                                type="button">Discard</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin.app-layout>
