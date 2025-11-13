<?php
// app/Views/admin/accounts.php
// Expecting $accounts = array of ['id'=>, 'name'=>, 'email'=>, 'role'=>, 'created_at'=>]
// This is a presentation-only view. Keep business logic in controllers/services.
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Account Management</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Raleway:wght@600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CDN (for quick layout utilities) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --color-primary: #3d5a80;
            --color-secondary: #98c1d9;
            --color-bg: #e0fbfc;
            --color-accent: #ee6c4d;
            --color-dark: #293241;
        }

        /* Typography */
        body {
            font-family: "DM Sans", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            background: var(--color-bg);
            color: var(--color-dark);
        }

        h1,
        h2,
        .header-font {
            font-family: "Raleway", "DM Sans", sans-serif;
        }

        /* UI accents */
        .primary {
            background-color: var(--color-primary);
            color: white;
        }

        .primary-border {
            border-color: var(--color-primary);
        }

        .secondary {
            background-color: var(--color-secondary);
            color: var(--color-dark);
        }

        .accent {
            background-color: var(--color-accent);
            color: white;
        }

        /* Table styles */
        .table-head {
            background: linear-gradient(90deg, rgba(61, 90, 128, 0.98), rgba(41, 50, 65, 0.95));
            color: #fff;
        }

        .table-row:hover {
            background: rgba(0, 0, 0, 0.03);
        }

        /* Small helpers */
        .pill {
            border-radius: 9999px;
            padding: 0.25rem 0.625rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .shadow-soft {
            box-shadow: 0 6px 18px rgba(41, 50, 65, 0.06);
        }

        .muted {
            color: rgba(41, 50, 65, 0.6);
            font-size: 0.9rem;
        }

        /* Responsive container width */
        .container-max {
            max-width: 1100px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <div class="py-10 min-h-screen">
        <div class="px-6 container-max">
            <header class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-3xl header-font" style="color:var(--color-dark)">Accounts</h1>
                    <p class="muted">Manage user accounts, roles and access</p>
                </div>

                <div class="flex items-center gap-3">
                    <button id="importBtn" class="flex items-center gap-2 shadow-soft px-4 py-2 rounded secondary">
                        <!-- import icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v12m0 0l-4-4m4 4 4-4M21 12v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6" />
                        </svg>
                        Import
                    </button>

                    <button id="addBtn" class="flex items-center gap-2 shadow-soft px-4 py-2 rounded accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Account
                    </button>
                </div>
            </header>

            <!-- Search & filters -->
            <div class="flex sm:flex-row flex-col sm:justify-between sm:items-center gap-3 mb-4">
                <div class="flex items-center gap-3 w-full sm:w-2/3">
                    <input id="search" type="search" placeholder="Search by name or email" class="px-4 py-2 border primary-border rounded focus:outline-none w-full" />
                </div>

                <div class="flex items-center gap-3">
                    <select id="roleFilter" class="px-3 py-2 border rounded">
                        <option value="">All roles</option>
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                        <option value="viewer">Viewer</option>
                    </select>

                    <button id="resetFilter" class="px-3 py-2 border rounded">Reset</button>
                </div>
            </div>

            <!-- Accounts table -->
            <div class="bg-white shadow-soft rounded-lg overflow-hidden">
                <table class="w-full table-auto">
                    <thead class="table-head">
                        <tr>
                            <th class="px-6 py-3 text-left">Name</th>
                            <th class="px-6 py-3 text-left">Email</th>
                            <th class="px-6 py-3 text-left">Role</th>
                            <th class="px-6 py-3 text-left">Created</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($accounts) && is_array($accounts)): ?>
                            <?php foreach ($accounts as $acct): ?>
                                <tr class="table-row border-b">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold" style="color:var(--color-dark)"><?= esc($acct['name'] ?? '—') ?></div>
                                        <div class="text-sm muted"><?= esc($acct['username'] ?? '') ?></div>
                                    </td>
                                    <td class="px-6 py-4"><?= esc($acct['email'] ?? '—') ?></td>
                                    <td class="px-6 py-4">
                                        <?php $role = strtolower($acct['role'] ?? 'viewer'); ?>
                                        <span class="pill" style="background: <?= $role === 'admin' ? 'var(--color-primary)' : ($role === 'editor' ? 'var(--color-secondary)' : '#f1f5f9') ?>; color: <?= $role === 'admin' ? 'white' : 'var(--color-dark)' ?>;">
                                            <?= esc(ucfirst($role)) ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4"><?= esc($acct['created_at'] ?? '—') ?></td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="inline-flex gap-2">
                                            <button class="px-3 py-1 border rounded text-sm" onclick="openEdit(<?= (int)$acct['id'] ?>)">Edit</button>
                                            <button class="px-3 py-1 border rounded text-sm" onclick="confirmDelete(<?= (int)$acct['id'] ?>)">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- Placeholder sample rows -->
                            <?php
                            $sample = [
                                ['id' => 1, 'name' => 'Alyssa Rivera', 'email' => 'alyssa@example.com', 'role' => 'Admin', 'created_at' => '2024-03-12'],
                                ['id' => 2, 'name' => 'Ben Torres', 'email' => 'ben@example.com', 'role' => 'Editor', 'created_at' => '2024-04-01'],
                                ['id' => 3, 'name' => 'Carmen Lee', 'email' => 'carmen@example.com', 'role' => 'Viewer', 'created_at' => '2024-05-08'],
                            ];
                            foreach ($sample as $acct):
                            ?>
                                <tr class="table-row border-b">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold"><?= esc($acct['name']) ?></div>
                                        <div class="text-sm muted">@<?= strtolower(str_replace(' ', '', explode(' ', $acct['name'])[0])) ?></div>
                                    </td>
                                    <td class="px-6 py-4"><?= esc($acct['email']) ?></td>
                                    <td class="px-6 py-4">
                                        <span class="pill" style="background: <?= strtolower($acct['role']) === 'admin' ? 'var(--color-primary)' : (strtolower($acct['role']) === 'editor' ? 'var(--color-secondary)' : '#f1f5f9') ?>; color: <?= strtolower($acct['role']) === 'admin' ? 'white' : 'var(--color-dark)' ?>;">
                                            <?= esc($acct['role']) ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4"><?= esc($acct['created_at']) ?></td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="inline-flex gap-2">
                                            <button class="px-3 py-1 border rounded text-sm" onclick="openEdit(<?= (int)$acct['id'] ?>)">Edit</button>
                                            <button class="px-3 py-1 border rounded text-sm" onclick="confirmDelete(<?= (int)$acct['id'] ?>)">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination (visual only) -->
            <div class="flex justify-between items-center mt-4 text-sm">
                <div class="muted">Showing 1 to 10 of 42 accounts</div>
                <div class="flex items-center gap-2">
                    <button class="px-3 py-1 border rounded">Prev</button>
                    <button class="px-3 py-1 border rounded primary" style="background:var(--color-primary);">1</button>
                    <button class="px-3 py-1 border rounded">2</button>
                    <button class="px-3 py-1 border rounded">Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Simple Modal (Add/Edit) -->
    <div id="modal" class="hidden fixed inset-0 justify-center items-center bg-black/40 p-4">
        <div class="bg-white shadow-soft rounded-lg w-full max-w-lg overflow-hidden">
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h2 id="modalTitle" class="text-lg header-font">Add Account</h2>
                <button onclick="closeModal()" class="px-2 text-muted">✕</button>
            </div>
            <form id="modalForm" class="space-y-3 px-6 py-4" onsubmit="submitForm(event)">
                <input type="hidden" name="id" id="acctId" />
                <div>
                    <label class="block font-medium text-sm">Name</label>
                    <input id="name" name="name" required class="px-3 py-2 border rounded w-full" />
                </div>
                <div>
                    <label class="block font-medium text-sm">Email</label>
                    <input id="email" name="email" type="email" required class="px-3 py-2 border rounded w-full" />
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex-1">
                        <label class="block font-medium text-sm">Role</label>
                        <select id="role" name="role" class="px-3 py-2 border rounded w-full">
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                            <option value="viewer" selected>Viewer</option>
                        </select>
                    </div>
                    <div class="flex-1">
                        <label class="block font-medium text-sm">Password</label>
                        <input id="password" name="password" type="password" class="px-3 py-2 border rounded w-full" />
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 border rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded" style="background:var(--color-primary); color:#fff">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Minimal JS for modal + simple actions (presentation-only)
        const modal = document.getElementById('modal');
        const addBtn = document.getElementById('addBtn');
        const modalTitle = document.getElementById('modalTitle');
        const acctId = document.getElementById('acctId');
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const roleInput = document.getElementById('role');
        const passwordInput = document.getElementById('password');

        addBtn?.addEventListener('click', () => {
            openAdd();
        });

        function openAdd() {
            modalTitle.textContent = 'Add Account';
            acctId.value = '';
            nameInput.value = '';
            emailInput.value = '';
            roleInput.value = 'viewer';
            passwordInput.value = '';
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function openEdit(id) {
            // In a real app, fetch account by id and populate fields.
            // Here we mock sample behavior.
            modalTitle.textContent = 'Edit Account';
            acctId.value = id;
            nameInput.value = 'Loading...';
            emailInput.value = '';
            roleInput.value = 'viewer';
            passwordInput.value = '';
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            // Simulate async fetch (presentation only)
            setTimeout(() => {
                nameInput.value = 'User #' + id;
                emailInput.value = 'user' + id + '@example.com';
                roleInput.value = id % 2 === 0 ? 'editor' : 'viewer';
            }, 250);
        }

        function closeModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function submitForm(e) {
            e.preventDefault();
            // presentation-only: collect values and close
            const data = {
                id: acctId.value || null,
                name: nameInput.value,
                email: emailInput.value,
                role: roleInput.value
            };
            console.log('Submit account (demo only):', data);
            closeModal();
            alert('Saved (demo). Implement real save in controller/service.');
        }

        function confirmDelete(id) {
            if (confirm('Delete account #' + id + '? This action cannot be undone.')) {
                // In real app, call API/submit form.
                alert('Deleted (demo). Implement delete in controller/service.');
            }
        }
    </script>
</body>

</html>