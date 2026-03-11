<x-admin.app-layout>
    <!-- Page Content -->
    <div class="p-8">
        <!-- Header Actions -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Daftar Galeri</h3>
                <p class="text-slate-500 dark:text-slate-400 mt-1">Kelola konten visual dan dokumentasi
                    kegiatan organisasi</p>
            </div>
            <button
                class="flex items-center justify-center gap-2 bg-primary hover:bg-primary/90 text-white px-6 py-2.5 rounded-lg font-semibold text-sm transition-all shadow-md shadow-primary/20">
                <span class="material-symbols-outlined">add_circle</span>
                Add New Image
            </button>
        </div>
        <!-- Table Container -->
        <div
            class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-800">
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-16">
                                NO</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-32">
                                IMAGE</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-1/4">
                                TITLE</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                DESCRIPTION</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-right w-32">
                                ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        <!-- Row 1 -->
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 text-sm text-slate-500">1</td>
                            <td class="px-6 py-4">
                                <div class="w-20 h-14 rounded-lg bg-slate-100 overflow-hidden">
                                    <img class="w-full h-full object-cover"
                                        data-alt="Corporate tech event keynote presentation"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCwjSd_pj7f-5qhJyGoaMlidRyaDNbPTAinrQAvpsgCQlNQMrbkFe3MfpH1fTxIuSsKtaysZd6gqBj-ETubsfrJbcdCxLHW-rvXg1sEXZJ360qNUp8xMkqpbsCzsyD7Qg6iyfNLVS4eK-aGHQ_bJMFWn-LWXn-85ov4oSCHCedTDLR7lLS0O8gDlI19cYzyOGXhokO1me_37TZY2Atsk-x7Ew3JlXJs-MHDDGjgziyCHh6M1WiDDbMm2ewVQxRjRBsZqLAe4JCrHig" />
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-semibold text-slate-900 dark:text-white">Annual Tech
                                    Exhibition 2024</p>
                                <p class="text-xs text-slate-400 mt-1">Uploaded: 12 Jan 2024</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-slate-600 dark:text-slate-400 line-clamp-2">The major
                                    technology event showcasing the latest innovations in software and
                                    hardware development.</p>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="p-1.5 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-colors"
                                        title="Edit">
                                        <span class="material-symbols-outlined text-xl">edit</span>
                                    </button>
                                    <button
                                        class="p-1.5 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors"
                                        title="Delete">
                                        <span class="material-symbols-outlined text-xl">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 text-sm text-slate-500">2</td>
                            <td class="px-6 py-4">
                                <div class="w-20 h-14 rounded-lg bg-slate-100 overflow-hidden">
                                    <img class="w-full h-full object-cover"
                                        data-alt="Modern open space office interior design"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCEeYNTmoSNed3XY5p4CR-uPwXzB_1cl52HN3dWlP4b3hPcElbExQbFL-b_jdYiu8ucLI3wp1cQAycS1r9EiOTCJsK53uOSthKgCl-OcnmQk7GYHKiSP1ot1ggg9qvrDieBQz3d0sT3mkCW4iyaf5RCGVQmr7syQC7FnA5BZmLrv5H4wuOqLrFQM5u1---2iX_tQOe9y6jetVzg1lSUCmb__IhWggwA1aUaVmXZtXQd-bDaL9Qkd7cGnslW9IgRqyMl6mr2XznbFuQ" />
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-semibold text-slate-900 dark:text-white">Modern
                                    Workspace Design</p>
                                <p class="text-xs text-slate-400 mt-1">Uploaded: 08 Jan 2024</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-slate-600 dark:text-slate-400 line-clamp-2">
                                    Showcasing our new headquarter design focused on collaboration and
                                    modern aesthetic.</p>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="p-1.5 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-xl">edit</span>
                                    </button>
                                    <button
                                        class="p-1.5 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-xl">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 text-sm text-slate-500">3</td>
                            <td class="px-6 py-4">
                                <div class="w-20 h-14 rounded-lg bg-slate-100 overflow-hidden">
                                    <img class="w-full h-full object-cover"
                                        data-alt="Corporate team building outbound activity"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAMFzj1gbqRCVYDjD8cKuQFVhcImAtCuWaH3-ZHrFozDKE7jK2pOzc-_jyi14M36b90gLan--xXd_1r7Q8lZmWUTLMIY7l0VlEI09UfU76XgHJb4ltS7OT-MKVmNoUU_hr9_8YaU3UivcTApYmdbm2HiRwe-WP0IYtyPzmKc_mVU7uab-pFlm5cdTxaD649tnvuOuhSalrD7h7Ajtb45tmkTtg8Xe_K-MtpmWQUjwm5MtPEztUqqR3jhGiIKRROXSGzkF_ucNSmN0k" />
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-semibold text-slate-900 dark:text-white">Team
                                    Building Outbound</p>
                                <p class="text-xs text-slate-400 mt-1">Uploaded: 05 Jan 2024</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-slate-600 dark:text-slate-400 line-clamp-2">Annual
                                    employee outbound activity held at Puncak, Bogor to strengthen team
                                    synergy.</p>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="p-1.5 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-xl">edit</span>
                                    </button>
                                    <button
                                        class="p-1.5 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-xl">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Row 4 -->
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 text-sm text-slate-500">4</td>
                            <td class="px-6 py-4">
                                <div class="w-20 h-14 rounded-lg bg-slate-100 overflow-hidden">
                                    <img class="w-full h-full object-cover"
                                        data-alt="New mobile application launch event"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAY6Ny2y4R8OUzZic8mdGp3oeIed0wDqKYIHBGWY91EKx_FGG4M_gZQIDnZRwyfs4uHk4qYeKTpz0dfMYCDNX3Y601zJdK65V7LnUJWtGc72Rk3rqJs3fEENIfNlLl7UyYhtNffWc1y_tLE1-_9E0COsy3GHHM_zlEu4PcgiPsw0kgbl-17N6MTzdjvhnEvRpTBs4Pjp0GckkC1SGi1juyIvoBWBEsaY-eVBg_TvJBsd3OyMf88b5CcDxag1Fy89uU__8CJdrQamAw" />
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-semibold text-slate-900 dark:text-white">Mobile App
                                    Grand Launch</p>
                                <p class="text-xs text-slate-400 mt-1">Uploaded: 02 Jan 2024</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-slate-600 dark:text-slate-400 line-clamp-2">Press
                                    conference and launching event of the version 2.0 mobile ecosystem.</p>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="p-1.5 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-xl">edit</span>
                                    </button>
                                    <button
                                        class="p-1.5 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-xl">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Row 5 -->
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4 text-sm text-slate-500">5</td>
                            <td class="px-6 py-4">
                                <div class="w-20 h-14 rounded-lg bg-slate-100 overflow-hidden">
                                    <img class="w-full h-full object-cover"
                                        data-alt="UI/UX design workshop interactive session"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmEgYde8rbMwdApLkuu36yPWc5oL7fkt4j44RMPgN1hXOTvTt-oHAgTKu_hIXxojm9kVd4cPnkIN0DkKynnTXSE5pqlKQUsrmZWuV_CoOJoURMZ5GgN2s09hQqOXtSCVHKak8Y9JSVoBg0iNKWbX-oIRW2EvJJosOzJqZkrvW-mjwBr3gZ-MfzTTFq-_UxlSkJhHn57ld7UFkiawcb4d1AdMzbuDO10bDaDimu_Z-2Uh9aj0QZDWbQjvP_hvpaxLkfW822QTETa4U" />
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-semibold text-slate-900 dark:text-white">Design
                                    Workshop Series</p>
                                <p class="text-xs text-slate-400 mt-1">Uploaded: 28 Dec 2023</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-slate-600 dark:text-slate-400 line-clamp-2">Internal
                                    workshop for product designers and developers to align on the new design
                                    system.</p>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="p-1.5 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-xl">edit</span>
                                    </button>
                                    <button
                                        class="p-1.5 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-xl">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div
                class="px-6 py-4 bg-slate-50 dark:bg-slate-800/30 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between">
                <p class="text-xs text-slate-500 font-medium">Showing 1 to 5 of 24 entries</p>
                <div class="flex gap-1">
                    <button
                        class="size-8 flex items-center justify-center rounded border border-slate-200 dark:border-slate-700 text-slate-400 hover:bg-white dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined text-sm">chevron_left</span>
                    </button>
                    <button
                        class="size-8 flex items-center justify-center rounded border border-primary bg-primary text-white font-bold text-xs shadow-sm shadow-primary/20">1</button>
                    <button
                        class="size-8 flex items-center justify-center rounded border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:bg-white dark:hover:bg-slate-800 transition-colors font-medium text-xs">2</button>
                    <button
                        class="size-8 flex items-center justify-center rounded border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:bg-white dark:hover:bg-slate-800 transition-colors font-medium text-xs">3</button>
                    <button
                        class="size-8 flex items-center justify-center rounded border border-slate-200 dark:border-slate-700 text-slate-400 hover:bg-white dark:hover:bg-slate-800 transition-colors">
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
