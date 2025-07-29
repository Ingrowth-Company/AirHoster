<?php get_template_part('template-parts/html', 'head'); ?>
<header class="bg-blue-600   mt-10" id="teste">
  <nav class="nav">
  header
  </nav>
</header>



<?php if(!wp_is_mobile()): ?>

<?php wp_nav_menu(array('theme_location' => 'menu_1', 'menu_class' => 'me-component-menu')); ?>

<?php else: ?>

<?php wp_nav_menu(array('theme_location' => 'menu_3', 'menu_class' => 'me-component-menu-mobile')); ?>

<?php endif; ?>





<main class="main" role="main">
<div class="bg-blue-400 text-white p-4">Teste Tailwind</div>
  <h1 class="text-3xl font-bold underline bg-blue-500">
    Hello world!
  </h1>

  <div class="mx-auto flex max-w-sm items-center gap-x-4 rounded-xl bg-white p-6 shadow-lg outline outline-black/5 dark:bg-slate-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10">
  <img class="size-12 shrink-0" src="/img/logo.svg" alt="ChitChat Logo" />
  <div>
    <div class="text-xl font-medium text-black dark:text-white">ChitChat</div>
    <p class="text-gray-500 dark:text-gray-400">You have a new message!</p>
  </div>
</div>


<div class="mx-auto flex max-w-sm items-center gap-x-4 rounded-xl bg-white p-6 shadow-lg">
    <h1 class="text-3xl font-bold underline">Hello world!</h1>
</div>

<table class="border-collapse border border-gray-400 ...">
  <thead>
    <tr>
      <th class="border border-gray-300 ...">State</th>
      <th class="border border-gray-300 ...">City</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="border border-gray-300 ...">Indiana</td>
      <td class="border border-gray-300 ...">Indianapolis</td>
    </tr>
    <tr>
      <td class="border border-gray-300 ...">Ohio</td>
      <td class="border border-gray-300 ...">Columbus</td>
    </tr>
    <tr>
      <td class="border border-gray-300 ...">Michigan</td>
      <td class="border border-gray-300 ...">Detroit</td>
    </tr>
  </tbody>
</table>