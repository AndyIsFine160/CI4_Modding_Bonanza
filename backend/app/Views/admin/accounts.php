<?php
// app/Views/admin/accounts.php
// Enhanced accounts management view using brand palette:
// #3d5a80, #98c1d9, #e0fbfc, #ee6c4d, #293241
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Admin · Accounts</title>

    <!-- Tailwind CDN with custom colors (configured before loading tailwind) -->
    <script>
        tailwind = window.tailwind || {};
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-1': '#3d5a80',
                        'brand-2': '#98c1d9',
                        'brand-3': '#e0fbfc',
                        'brand-4': '#ee6c4d',
                        'brand-5': '#293241'
                    },
                    boxShadow: {
                        'soft': '0 6px 18px rgba(41,50,65,0.06)'
                    }
                }
            }
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* subtle branded card background */
        .brand-card {
            background: linear-gradient(180deg, rgba(61, 90, 128, 0.06), rgba(152, 193, 217, 0.03));
            border: 1px solid rgba(41, 50, 65, 0.04);
        }

        /* zebra rows for readability */
        .table-row:nth-child(even) {
            background: rgba(152, 193, 217, 0.02);
        }

        /* hide helpers for small */
        @media (max-width: 640px) {
            .hide-sm {
                display: none;
            }

            .stack-sm {
                display: block;
                width: 100%;
            }
        }
    </style>
</head>

<body class="bg-brand-3 min-h-screen font-sans text-brand-5">

    <div class="mx-auto p-6 max-w-7xl">
        <!-- Header -->
        <header class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-4">
                <div class="flex justify-center items-center bg-brand-1 shadow-soft rounded-md w-12 h-12 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.807.64 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <h1 class="font-semibold text-brand-5 text-2xl">Accounts</h1>
                    <p class="text-brand-5/70 text-sm">Manage application users and permissions</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="<?= site_url('admin/accounts/create') ?>" class="inline-flex items-center gap-2 bg-brand-1 hover:opacity-95 shadow-soft px-4 py-2 rounded-md text-white text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    New Account
                </a>
                <button id="bulkDeleteBtn" class="hidden bg-brand-4 hover:opacity-95 px-3 py-2 rounded-md text-white text-sm" aria-hidden="true">Delete Selected</button>
            </div>
        </header>

        <!-- Controls -->
        <section class="mb-4">
            <form method="get" action="" class="flex sm:flex-row flex-col items-stretch sm:items-center gap-3">
                <div class="flex flex-1 items-center gap-2 p-3 rounded-md brand-card">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-brand-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.414-1.414l4.387 4.387a1 1 0 01-1.414 1.414l-4.387-4.387zM8 14a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd" />
                    </svg>
                    <input name="q" value="<?= esc($_GET['q'] ?? '') ?>" class="flex-1 bg-transparent outline-none text-brand-5 text-sm" placeholder="Search by name or email" aria-label="Search accounts" />
                    <select name="role" class="bg-brand-3 px-2 py-1 border rounded-md text-sm" aria-label="Filter by role">
                        <option value="">All roles</option>
                        <option value="admin" <?= (isset($_GET['role']) && $_GET['role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                        <option value="editor" <?= (isset($_GET['role']) && $_GET['role'] == 'editor') ? 'selected' : '' ?>>Editor</option>
                        <option value="user" <?= (isset($_GET['role']) && $_GET['role'] == 'user') ? 'selected' : '' ?>>User</option>
                    </select>
                    <button type="submit" class="bg-brand-2 ml-2 px-3 py-1 rounded-md text-brand-5 text-sm">Filter</button>
                </div>

                <div class="flex gap-2">
                    <button type="button" id="refreshBtn" class="bg-white/60 px-3 py-2 border rounded-md text-sm">Refresh</button>
                    <button type="button" id="exportBtn" class="bg-white/60 px-3 py-2 border rounded-md text-sm">Export CSV</button>
                </div>
            </form>
        </section>

        <!-- Main card -->
        <main class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="flex justify-between items-center p-4 border-b">
                <h2 class="font-medium text-brand-5 text-lg">User list</h2>
                <p class="text-brand-5/60 text-sm">Showing <span id="rowCount"><?= isset($accounts) ? count($accounts) : 0 ?></span> users</p>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-left" role="table" aria-label="Accounts table">
                    <thead class="bg-brand-3 text-brand-5/70 text-xs uppercase">
                        <tr>
                            <th class="p-3 w-10"><input id="selectAll" type="checkbox" class="w-4 h-4" aria-label="Select all" /></th>
                            <th class="p-3">Name</th>
                            <th class="p-3 hide-sm">Email</th>
                            <th class="p-3">Role</th>
                            <th class="p-3 hide-sm">Created</th>
                            <th class="p-3 w-44">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="accountsTable" class="text-sm">
                        <?php if (!empty($accounts) && is_array($accounts)): ?>
                            <?php foreach ($accounts as $i => $a): ?>
                                <?php
                                $id = is_object($a) ? $a->id : ($a['id'] ?? null);
                                $name = is_object($a) ? $a->name : ($a['name'] ?? '—');
                                $email = is_object($a) ? $a->email : ($a['email'] ?? '—');
                                $role = is_object($a) ? $a->role : ($a['role'] ?? 'user');
                                $created = is_object($a) ? $a->created_at : ($a['created_at'] ?? '—');
                                $roleBadge = $role === 'admin' ? 'bg-brand-4 text-white' : 'bg-brand-2 text-brand-5';
                                ?>
                                <tr class="table-row border-b" role="row">
                                    <td class="p-3 align-top">
                                        <input type="checkbox" class="w-4 h-4 rowCheckbox" data-id="<?= esc($id) ?>" aria-label="Select account <?= esc($name) ?>" />
                                    </td>
                                    <td class="p-3 align-top">
                                        <div class="font-medium text-brand-5"><?= esc($name) ?></div>
                                        <div class="text-brand-5/50 text-xs hide-sm"><?= esc($email) ?></div>
                                    </td>
                                    <td class="p-3 align-top hide-sm"><?= esc($email) ?></td>
                                    <td class="p-3 align-top">
                                        <span class="inline-flex items-center gap-2 px-2 py-1 rounded text-xs font-medium <?= $roleBadge ?>">
                                            <?= esc(ucfirst($role)) ?>
                                        </span>
                                    </td>
                                    <td class="p-3 align-top hide-sm"><?= esc($created) ?></td>
                                    <td class="p-3 align-top">
                                        <div class="flex gap-2">
                                            <a href="<?= site_url('admin/accounts/edit/' . $id) ?>" class="bg-brand-1 px-3 py-1 rounded-md text-white text-sm">Edit</a>
                                            <button data-id="<?= esc($id) ?>" class3 py-1 border rounded-md text-brand-4 text-sm deleteBtn">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="p-6 text-brand-5/60 text-sm text-center">No accounts found. Create the first account.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Footer / pagination placeholder -->
            <div class="flex justify-between items-center p-4 border-t">
                <div class="text-brand-5/60 text-sm">Tip: Click a name to view the profile (not implemented in this view).</div>
                <div class="flex items-center gap-2 text-sm">
                    <button class="bg-white/60 px-3 py-1 border rounded-md">Prev</button>
                    <span class="px-3">1 / 1</span>
                    <button class="bg-white/60 px-3 py-1 border rounded-md">Next</button>
                </div>
            </div>
        </main>
    </div>

    <!-- Accessible delete confirmation modal -->
    <div id="confirmModal" class="hidden z-50 fixed inset-0 justify-center items-center bg-black/40" aria-hidden="true">
        <div class="bg-white p-5 rounded-lg w-11/12 sm:w-96" role="dialog" aria-modal="true" aria-labelledby="confirmTitle">
            <h3 id="confirmTitle" class="mb-2 font-semibold text-brand-5 text-lg">Confirm delete</h3>
            <p class="mb-4 text-brand-5/70 text-sm">Are you sure you want to delete this account? This action cannot be undone.</p>
            <div class="flex justify-end gap-2">
                <button id="cancelModal" class="bg-white px-3 py-1 border rounded-md">Cancel</button>
                <form id="deleteForm" method="post" action="">
                    <!-- CSRF and method override should be added server-side if required -->
                    <input type="hidden" name="id" id="deleteId" value="" />
                    <button type="submit" class="bg-brand-4 px-3 py-1 rounded-md text-white">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Keep the view thin: UI-only behavior, server handles actions.
        (function() {
            const selectAll = document.getElementById('selectAll');
            const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
            const refreshBtn = document.getElementById('refreshBtn');
            const exportBtn = document.getElementById('exportBtn');
            const rowCountEl = document.getElementById('rowCount');

            function refreshState() {
                const checkboxes = Array.from(document.querySelectorAll('.rowCheckbox'));
                const any
                bulkDeleteBtn.hidden = !any;
                bulkDeleteBtn.setAttribute('aria-hidden', !any);
                rowCountEl.textContent = checkboxes.length;
            }

            // Initial state
            refreshState();

            selectAll?.addEventListener('change', (e) => {
                document.querySelectorAll('.rowCheckbox').forEach(cb => cb.checked = e.target.checked);
                refreshState();
            });

            document.addEventListener('change', (e) => {
                if (e.target && e.target.classList && e.target.classList.contains('rowCheckbox')) {
                    refreshState();
                }
            });

            // Bulk delete
            bulkDeleteBtn?.addEventListener('click', () => {
                const ids = Array.from(document.querySelectorAll('.rowCheckbox')).filter(i => i.checked).map(i => i.dataset.id);
                if (!ids.length) return;
                if (confirm('Delete ' + ids.length + ' accounts?')) {
                    const form = document.createElement('form');
                    // Per-row delete
                    form.action = '<?= site_url('admin/accounts/bulk-delete') ?>';
                    ids.forEach(id => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'ids[]';
                        input.value = id;
                        form.appendChild(input);
                    });
                    document.body.appendChild(form);
                    form.submit();
                }
            });

            // Per-row delete -> show modal
            document.querySelectorAll('.deleteBtn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const id = e.currentTarget.dataset.id;
                    document.getElementById('deleteId').value = id;
                    document.getElementById('deleteForm').action = '<?= site_url('admin/accounts/delete') ?>/' + encodeURIComponent(id);
                    const modal = document.getElementById('confirmModal');
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    modal.setAttribute('aria-hidden', 'false');
                    // put focus on cancel button for keyboard users
                    document.getElementById('cancelModal').focus();
                });
            });

            document.getElementById('cancelModal')?.addEventListener('click', (e) => {
                const modal = document.getElementById('confirmModal');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                modal.setAttribute('aria-hidden', 'true');
            });

            refreshBtn?.addEventListener('click', () => location.reload());
            exportBtn?.addEventListener('click', () => {
                location.href = '<?= site_url('admin/accounts/export') ?>';
            });

            // Row click to edit (avoid when clicking controls)
            document.querySelectorAll('#accountsTable tr').forEach(tr => {
                tr.addEventListener('click', (e) => {
                    const link = tr.querySelector('a[href*="edit"]');
                    if (!link) return;
                    if (['input', 'button', 'svg', 'path'].includes(e.target.tagName.toLowerCase()) || e.target.closest('button')) return;
                    window.location = link.href;
                });
            });

            // keyboard: close modal with Escape
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    const modal = document.getElementById('confirmModal');
                    if (modal && !modal.classList.contains('hidden')) {
                        modal.classList.add('hidden');
                        modal.classList.remove('flex');
                        modal.setAttribute('aria-hidden', 'true');
                    }
                }
            });
        })();
    </script>
</body>

</html>